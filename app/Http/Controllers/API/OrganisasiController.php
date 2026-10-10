<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\KategoriOrganisasi;
use App\Models\Program;
use App\Models\Fakultas;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Organisasi::query();
        if (\Illuminate\Support\Facades\Schema::hasTable('kategori_organisasis')) {
            $query->with('kategori');
        }
        $organisasi = $query->get();

        return response()->json($organisasi, 200);
    }
    
    public function indexHome()
    {
        $query = Organisasi::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'home')) {
            $query->where('home', '1');
        }
        if (\Illuminate\Support\Facades\Schema::hasTable('kategori_organisasis') && \Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'kategori_id')) {
            $query->with('kategori');
        }
        $organisasi = $query->get();

        return response()->json($organisasi, 200);
    }
    
    public function indexKategoriOrganisasi()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('kategori_organisasis')) {
            return response()->json([], 200);
        }
        $kategoris = KategoriOrganisasi::with('organisasis')->get();

        return response()->json($kategoris, 200);
    }


    public function organisasiFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $query = Organisasi::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'fakultas_display')) {
            $query->where('fakultas_display', 1);
        }
        if (\Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'program_id')) {
            $query->whereIn('program_id', $programIds);
        }
        if (\Illuminate\Support\Facades\Schema::hasTable('kategori_organisasis') && \Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'kategori_id')) {
            $query->with('kategori');
        }
        $organisasi = $query->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $organisasi
        ], 200);
    }

    public function indexDepartementOrganisasi($id)
    {
        $department = Program::findOrFail($id);

        $programIds = collect([$department->id]);

        $query = Organisasi::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'program_id') && \Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'fakultas_display')) {
            $query->where(function ($q) use ($programIds) {
                $q->whereIn('program_id', $programIds);
            })->orWhere('fakultas_display', 1);
        } elseif (\Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'program_id')) {
            $query->whereIn('program_id', $programIds);
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('kategori_organisasis') && \Illuminate\Support\Facades\Schema::hasColumn('organisasis', 'kategori_id')) {
            $query->with('kategori');
        }
        $organisasi = $query->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $organisasi
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

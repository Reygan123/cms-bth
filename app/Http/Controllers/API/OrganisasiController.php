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
        $organisasi = Organisasi::with('kategori')->get();

        return response()->json($organisasi, 200);
    }
    
    public function indexHome()
    {
        $organisasi = Organisasi::where('home', '1')->with('kategori')->get();

        return response()->json($organisasi, 200);
    }
    
    public function indexKategoriOrganisasi()
    {
        $kategoris = KategoriOrganisasi::with('organisasis')->get();

        return response()->json($kategoris, 200);
    }


    public function organisasiFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $organisasi = Organisasi::where('fakultas_display', 1)
            ->whereIn('program_id', $programIds)
            ->with('kategori')
            ->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $organisasi
        ], 200);
    }

    public function indexDepartementOrganisasi($id)
    {
        $department = Program::with('organisasis')->findOrFail($id);

        $programIds = $department->pluck('id');

        // Ambil organisasi yang punya hubungan ATAU fakultas_display = 1
        $organisasi = Organisasi::where(function ($query) use ($programIds) {
                $query->whereIn('program_id', $programIds);
            })
            ->orWhere('fakultas_display', 1)
            ->with('kategori')
            ->get();

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

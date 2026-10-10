<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Fakultas;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Facility::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('facilities', 'home')) {
            $query->where('home', 1);
        }
        return response()->json($query->get(), 200);
    }

    public function indexHome()
    {
        return $this->index();
    }

    public function fasilitasFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $query = Facility::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('facilities', 'fakultas_display')) {
            $query->where('fakultas_display', 1);
        }
        if (\Illuminate\Support\Facades\Schema::hasColumn('facilities', 'program_id')) {
            $query->whereIn('program_id', $programIds);
        }
        $fasilitas = $query->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $fasilitas
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

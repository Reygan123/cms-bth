<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Program;
use App\Models\Unggulan;
use App\Models\Ourteam;
use App\Models\Facility;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Program::select('id', 'name', 'slug', 'image1')->get(), 200);
    }
    
    public function indexFakultas()
    {
        return response()->json(Fakultas::select('id', 'name', 'slug', 'image1', 'map', 'subtitle')->get(), 200);
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
    public function show($slug)
    {
        $fakultas = Program::where('slug', $slug)->firstOrFail();
        $test = DB::table('fakultas_program as fp')
        ->join('programs as p', 'fp.program_id', '=', 'p.id')
        ->join('fakultas as f', 'fp.fakultas_id', '=', 'f.id')
        ->where('p.slug', $slug)
        ->select('f.name as fakultas_name', 'f.slug as fakultas_slug') // Ambil juga slug fakultas
        ->first();
    

        $unggulan = Unggulan::where('program_id', $fakultas->id)->get(); // Mengambil semua unggulan terkait
        $dekan = Ourteam::where('id', $fakultas->ourteam_id)->first(); // Mengambil semua unggulan terkait
        $ourteam = Ourteam::where('program_id', $fakultas->id)->get(); // Mengambil semua unggulan terkait
        $fasilitas = DB::table('facilities')
            ->select('facilities.title', 'facilities.image', 'facilities.subtitle', 'facilities.description',)
            ->where('facilities.program_id', $fakultas->id)
            ->get();


        return response()->json([
            'departement' => $fakultas,
            'test' => $test,
            'dekan' => $dekan,
            'unggulan' => $unggulan,
            'ourteam' => $ourteam,
            'fasilitas' => $fasilitas
        ], 200);
    }
    
    public function showOneFakultas($slug)
    {
        $programs = DB::table('fakultas_program as fp')
                ->join('programs as p', 'fp.program_id', '=', 'p.id')
                ->join('fakultas as f', 'fp.fakultas_id', '=', 'f.id')
                ->where('f.slug', $slug)
                ->select('p.name as program_name', 'p.slug', 'p.image1', 'f.name as fakultas_name')
                ->get();
        return response()->json([
            'fakultas' => Fakultas::where('slug', $slug)->first(),
            'departements' => $programs,
        ], 200);
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

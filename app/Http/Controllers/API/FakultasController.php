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
        $cols = ['id', 'name', 'slug'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('programs', 'image1')) {
            $cols[] = 'image1';
        } elseif (\Illuminate\Support\Facades\Schema::hasColumn('programs', 'image')) {
            $cols[] = 'image as image1';
        }
        return response()->json(Program::select($cols)->get(), 200);
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
    

        $unggulan = Unggulan::where('program_id', $fakultas->id)->get();
        if ($unggulan->isEmpty()) {
            $unggulan = Unggulan::limit(6)->get();
        }

        $dekan = Ourteam::where('id', $fakultas->ourteam_id)->first();
        if (!$dekan) {
            $dekan = Ourteam::first();
        }

        $ourteam = Ourteam::where('program_id', $fakultas->id)->get();
        if ($ourteam->isEmpty()) {
            $ourteam = Ourteam::limit(6)->get();
        }

        $fasilitas = DB::table('facilities')
            ->select('facilities.title', 'facilities.image', 'facilities.subtitle', 'facilities.description')
            ->where('facilities.program_id', $fakultas->id)
            ->get();
        if ($fasilitas->isEmpty()) {
            $fasilitas = DB::table('facilities')
                ->select('facilities.title', 'facilities.image', 'facilities.subtitle', 'facilities.description')
                ->limit(6)
                ->get();
        }

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

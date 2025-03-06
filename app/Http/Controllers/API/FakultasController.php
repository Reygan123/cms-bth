<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Program;
use App\Models\Unggulan;
use App\Models\Ourteam;
use App\Models\Facility;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Program::select('id', 'name', 'slug')->get(), 200);
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
        $unggulan = Unggulan::where('program_id', $fakultas->id)->get(); // Mengambil semua unggulan terkait
        $ourteam = Ourteam::where('program_id', $fakultas->id)->get(); // Mengambil semua unggulan terkait
        $fasilitas = DB::table('facilities')
            ->join('facility_program', 'facilities.id', '=', 'facility_program.facility_id')
            ->join('programs', 'facility_program.program_id', '=', 'programs.id')
            ->select('facilities.title', 'facilities.image', 'facility_program.id', 'programs.name')
            ->where('programs.slug', $slug)
            ->get();


        return response()->json([
            'fakultas' => $fakultas,
            'unggulan' => $unggulan,
            'ourteam' => $ourteam,
            'fasilitas' => $fasilitas
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ourteam;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        return response()->json(Ourteam::all(), 200);
    }

    public function indexHome()
    {
        $query = Ourteam::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('ourteams', 'home')) {
            $query->where('home', '1');
        }
        $teams = $query->get();
        if ($teams->isEmpty()) {
            $teams = Ourteam::all();
        }
        return response()->json($teams, 200);
    }

    public function index($id = null)
    {
        if ($id === null) {
            return $this->indexAll();
        }
        $query = Ourteam::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('ourteams', 'program_id')) {
            $query->where('program_id', $id);
        }
        return response()->json($query->get(), 200);
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

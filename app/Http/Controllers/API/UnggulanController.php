<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unggulan;
use App\Models\Fakultas;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Unggulan::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('unggulans', 'home')) {
            $query->where('home', 1);
        }
        if (\Illuminate\Support\Facades\Schema::hasColumn('unggulans', 'program_id')) {
            $query->with('program');
        }
        return response()->json($query->get(), 200);
    }

    public function indexHome()
    {
        return $this->index();
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
        return response()->json(Unggulan::where('program_id', $id)->get(), 200);
    }
    
    public function showFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $unggulan = Unggulan::where('fakultas', 1)
            ->whereIn('program_id', $programIds)
            ->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $unggulan
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Models\Fakultas;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Testimony::Latest()->get(), 200);
    }
    
    public function indexHome()
    {
        $query = Testimony::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('testimonies', 'home')) {
            $query->where('home', '1');
        }
        return response()->json($query->get(), 200);
    }

    public function testimoniFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $query = Testimony::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('testimonies', 'fakultas_display')) {
            $query->where('fakultas_display', 1);
        }
        if (\Illuminate\Support\Facades\Schema::hasColumn('testimonies', 'program_id')) {
            $query->whereIn('program_id', $programIds);
        }
        $testimoni = $query->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
            'data' => $testimoni
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
        return response()->json(Testimony::where('program_id', $id)->get(), 200);
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

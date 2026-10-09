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
        return response()->json(Testimony::where('home', '1')->get(), 200);
    }

    public function testimoniFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $testimoni = Testimony::where('fakultas_display', 1)
            ->whereIn('program_id', $programIds)
            ->get();

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

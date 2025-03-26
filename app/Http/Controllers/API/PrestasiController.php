<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Program;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Prestasi::where('home', '1')->orderBy('created_at', 'desc')->get(), 200);
    }

    public function getByProgramSlug($slug)
    {
        // Cari program berdasarkan slug
        $program = Program::where('slug', $slug)->first();

        // Jika program tidak ditemukan, kembalikan 404
        if (!$program) {
            return response()->json([
                'message' => 'Program not found.'
            ], 404);
        }

        // Cari prestasi berdasarkan program_id
        $prestasi = Prestasi::where('program_id', $program->id)->get();

        // Kembalikan 200 dengan data prestasi (meskipun kosong)
        return response()->json([
            'message' => 'Successfully retrieved achievements.',
            'data' => $prestasi
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

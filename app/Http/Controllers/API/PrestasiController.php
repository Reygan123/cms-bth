<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Program;
use App\Models\Fakultas;
use App\Models\Categoriprestasi;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Prestasi::where('home', '1')->orderBy('created_at', 'desc')->with('categoriprestasi')->get(), 200);
    }

    public function indexStstistik()
    {
        $data = Categoriprestasi::withCount('prestasis')->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
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

    public function getByFakultas($id)
    {
        $fakultas = Fakultas::with('programs')->findOrFail($id);

        $programIds = $fakultas->programs->pluck('id');

        $prestasi = Prestasi::where('fakultas_display', 1)
            ->whereIn('program_id', $programIds)
            ->get();

        return response()->json([
            'message' => 'Data Berhasil Di ambil',
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

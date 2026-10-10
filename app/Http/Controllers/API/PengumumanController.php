<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of active announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Pengumuman::where('status', true);

        if ($request->has('category') && $request->category !== 'All' && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        if ($request->has('q') && !empty($request->q)) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        $pengumumans = $query->orderBy('start_date', 'desc')
                             ->orderBy('id', 'desc')
                             ->get();

        return response()->json($pengumumans, 200);
    }

    /**
     * Display the specified announcement by slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->first();

        if (!$pengumuman) {
            return response()->json([
                'message' => 'Pengumuman tidak ditemukan'
            ], 404);
        }

        return response()->json($pengumuman, 200);
    }
}

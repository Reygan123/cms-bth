<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Svg;
use App\Models\Slider;
use App\Models\Fakultas;
use App\Models\Akademik;

class DataApiController extends Controller
{
    // Get Statistik Univ
    public function statistikUniv()
    {
        $data = Svg::first();
        return response()->json([
            "message" => "Data Berhasil Di ambil",
            "data" => $data
        ]);
    }
    
    // Get Hero Home
    public function heroHome()
    {
        $data = Slider::where('home', 1)->first();
        return response()->json([
            "message" => "Data Berhasil Di ambil",
            "data" => $data
        ]);
    }
    
    // Get fakultasDetail
    public function fakultasDetail()
    {
        $data = Fakultas::with('programs')->get();

        return response()->json([
            "message" => "Data Berhasil Di ambil",
            "data" => $data
        ]);
    }

    // Get Akadmeik
    public function akademik()
    {
        $data = Akademik::all();

        return response()->json([
            "message" => "Data Berhasil Di ambil",
            "data" => $data
        ]);
    }

}

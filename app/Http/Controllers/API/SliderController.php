<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Pixel;
use App\Models\Ganalytics;
use App\Models\Welcomechat;
use App\Models\Sidebanner;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Slider::latest()->get(), 200);
    }

    public function indexHome()
    {
        $query = Slider::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('sliders', 'home')) {
            $query->where('home', 1);
        }
        $sliders = $query->latest()->get();
        if ($sliders->isEmpty()) {
            $sliders = Slider::latest()->get();
        }
        return response()->json($sliders, 200);
    }

    
    public function indexSideBanner()
    {
        return response()->json(Sidebanner::latest()->take(1)->get(), 200);
    }
    
    public function indexPixel()
    {
        $pixels = Pixel::oldest()->take(1)->get();
        return response()->json($pixels, 200);
    }
    
    public function indexAnalytics()
    {
        $ganalytics = Ganalytics::oldest()->take(1)->get();
        return response()->json($ganalytics, 200);
    }
    
    public function indexChat()
    {
        $chat = Welcomechat::oldest()->take(1)->get();
        return response()->json($chat, 200);
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

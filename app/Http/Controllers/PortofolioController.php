<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Header;


class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::oldest()->when(request()->q, function ($portofolios) {
            $portofolios = $portofolios->where('name', 'like', '%' . request()->q . '%');
        });
        
        
        $headers = Header::where('id', '=', '4')->get();
        
        return view('front.portofolio.index', compact('portofolios','headers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $headers = Header::where('id', 4)->get();
        $portofolio = Portofolio::where('slug', $slug)->firstOrFail();

        return view('front.portofolio.show', compact('portofolio', 'headers'));
    }
}

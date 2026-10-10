<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Post;
use App\Models\Category;
use App\Models\Agenda;
use App\Models\Sidebanner;

use Carbon\Carbon;


class FpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('pub_date', 'desc')->where('category_id','=','1')->where('pub_date', '<', Carbon::today())->when(request()->q, function($posts) {
            $posts = $posts->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        $agendas = Agenda::oldest()->where('end_date', '>', Carbon::today())->take(3)->get();
        $headers = Header::where('id', '=', '10')->get();
        $banners = Sidebanner::latest()->take(1)->get();
        
        return view('front.fpost.index', compact('posts','agendas','headers','banners'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::latest()->get();
        $post = Post::where('slug', $slug)->first();
        $posts = Post::orderBy('pub_date', 'desc')->where('pub_date', '<', Carbon::today())->take(4)->get();
        $headers = Header::where('id', '=', '10')->get();
        $agendas = Agenda::oldest()->where('end_date', '>', Carbon::today())->take(3)->get();
        $banners = Sidebanner::latest()->take(1)->get();

        return view('front.fpost.show', compact('post','categories','posts','agendas','headers','banners'));
    }

}

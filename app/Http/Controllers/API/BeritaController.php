<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Agenda;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        // Ambil semua post dengan relasi category dan filter pencarian jika ada
        $posts = Post::with('category')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('pub_date', 'desc')
            ->get();

        // Pagination manual
        $perPage = 9;
        $page = (int) $request->get('page', 1);
        $total = $posts->count();
        $lastPage = (int) ceil($total / $perPage);

        // Slice data sesuai halaman
        $paginated = $posts->forPage($page, $perPage)->values();

        // Base URL untuk page link
        $baseUrl = url()->current();
        $queryParams = $request->query();

        $queryParams['page'] = $page + 1;
        $nextPageUrl = $page < $lastPage ? $baseUrl . '?' . http_build_query($queryParams) : null;

        $queryParams['page'] = $page - 1;
        $prevPageUrl = $page > 1 ? $baseUrl . '?' . http_build_query($queryParams) : null;

        return response()->json([
            'data' => $paginated,
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'last_page' => $lastPage,
            'next_page_url' => $nextPageUrl,
            'prev_page_url' => $prevPageUrl,
        ]);
    }

    
    public function postall()
    {
        // Ambil data post dengan pub_date terbaru
        $posts = Post::with('category')->orderBy('pub_date', 'desc')->get();

        return response()->json($posts, 200);
    }

    
    public function indexAgenda()
    {
        return response()->json(Agenda::orderBy('created_at', 'desc')->take(3)->get(), 200);
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
    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->first();

        return response()->json($post, 200);
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

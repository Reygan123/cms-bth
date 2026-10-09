<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\KategoriOrganisasi;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;

class KategoriOrganisasiController extends Controller
{
    public function index()
    {
        $kategories = KategoriOrganisasi::latest()->when(request()->q, function ($kategories) {
            $kategories = $kategories->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.organisasi.indexKategori', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisasi.createKategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'             => 'required',
            'description'             => 'required',
        ]);


        $kategori = KategoriOrganisasi::create([
            'title'                   => $request->title,
            'description'            => $request->description,
        ]);

        if ($kategori) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.kategoriOrganisasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.kategoriOrganisasi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // update
    public function edit($id)
    {
        $kategori = KategoriOrganisasi::findOrfail($id);
        return view('admin.organisasi.editKategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Cari data organisasi
        $kategori = KategoriOrganisasi::findOrFail($id);

        // Update data ke database
        $kategori->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Redirect setelah berhasil
        return redirect()->route('admin.kategoriOrganisasi.index')->with([
            'success' => 'Data Berhasil Diupdate!'
        ]);
    }


    /**
     * destroy 
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $kategori = KategoriOrganisasi::findOrFail($id);
        $kategori->delete();

        if ($kategori) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

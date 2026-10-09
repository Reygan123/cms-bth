<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\KategoriOrganisasi;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasis = Organisasi::latest()->when(request()->q, function ($organisasis) {
            $organisasis = $organisasis->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.organisasi.index', compact('organisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::latest()->get();
        $kategoris = KategoriOrganisasi::all();
        return view('admin.organisasi.create',  compact('programs', 'kategoris'));
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
            'kategori_id'             => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/organisasi', $image->hashName());

        $organisasi = Organisasi::create([
            'image'                => $image->hashName(),
            'kategori_id'                   => $request->kategori_id,
            'title'                   => $request->title,
            'description'            => $request->description,
            'program_id'                => $request->program_id,
            'home'                      => $request->home,
            'fakultas_display'                      => $request->fakultas_display,
        ]);

        if ($organisasi) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.organisasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.organisasi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // update
    public function edit($id)
    {
        $organisasi = Organisasi::findOrfail($id);
        $kategoris = KategoriOrganisasi::all();
        return view('admin.organisasi.edit', compact('organisasi', 'kategoris'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori_id'   => 'required',
            'title'   => 'required',
            'image'   => 'image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        // Cari data organisasi
        $organisasi = Organisasi::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($organisasi->image) {
                Storage::disk('local')->delete('public/organisasi/' . basename($organisasi->image));
            }

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/organisasi', $image->hashName());

            // Update data dengan image baru
            $organisasi->update([
                'image'       => $image->hashName(),
                'kategori_id'       => $request->kategori_id,
                'title'       => $request->title,
                'description' => $request->description,
                'program_id'                => $request->program_id,
                'home'                      => $request->home,
                'fakultas_display'                      => $request->fakultas_display,
            ]);
        } else {
            // Update data tanpa mengganti image
            $organisasi->update([
                'kategori_id'       => $request->kategori_id,
                'title'       => $request->title,
                'description' => $request->description,
                'program_id'                => $request->program_id,
                'home'                      => $request->home,
                'fakultas_display'                      => $request->fakultas_display,
            ]);
        }

        return redirect()->route('admin.organisasi.index')->with([
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
        $benefit = Organisasi::findOrFail($id);
        Storage::disk('local')->delete('public/oraganisasi/' . basename($benefit->image));
        $benefit->delete();

        if ($benefit) {
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

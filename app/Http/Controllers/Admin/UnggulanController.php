<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Unggulan;
use App\Models\Program;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil semua program
        $programs = Program::all();

        // Ambil query pencarian
        $searchQuery = $request->query('q');
        $selectedProgramId = $request->query('program_id');

        // Query unggulan dengan filter pencarian dan program_id
        $unggulans = Unggulan::oldest()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where('title', 'like', '%' . $searchQuery . '%');
            })
            ->when($selectedProgramId, function ($query) use ($selectedProgramId) {
                $query->where('program_id', $selectedProgramId);
            })
            ->paginate(10);

        return view('admin.unggulan.index', compact('unggulans', 'programs', 'searchQuery', 'selectedProgramId'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::latest()->get();
        return view('admin.unggulan.create', compact('programs'));
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
            'image'       => 'required|image|mimes:jpeg,jpg,png,webp|max:1000',
            'title'       => 'required',
            'description' => 'required',
        ]);

        // Upload image dengan memastikan ekstensi terdeteksi
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension(); // Ambil ekstensi asli
        $imageName = time() . '.' . $extension; // Gunakan timestamp agar unik
        $image->storeAs('public/unggulans', $imageName);

        // Simpan ke database
        $unggulan = Unggulan::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title, '-'),
            'description' => $request->description,
            'link'        => $request->link,
            'image'       => $imageName, // Simpan nama file yang sudah diperbaiki
            'program_id'  => $request->program_id,
            'home'        => $request->home ?? 0, // Jika tidak dikirim, set default 0
            'fakultas'        => $request->fakultas ?? 0, // Jika tidak dikirim, set default 0
        ]);

        if ($unggulan) {
            return redirect()->route('admin.unggulan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.unggulan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unggulan $unggulan)
    {
        $programs = Program::latest()->get();
        return view('admin.unggulan.edit', compact('unggulan', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unggulan $unggulan)
    {
        $this->validate($request, [
            'title'             => 'required',
            'description'       => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $unggulan = unggulan::findOrFail($unggulan->id);
            $unggulan->update([
                'title'             => $request->title,
                'slug'              => Str::slug($request->title, '-'),
                'description'       => $request->description,
                'link'              => $request->link,
                'program_id'                => $request->program_id,
                'home'                => $request->home,
                'fakultas'                => $request->fakultas ?? 0,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/unggulans/' . basename($unggulan->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/unggulans', $image->hashName());

            //update dengan image baru
            $unggulan = unggulan::findOrFail($unggulan->id);
            $unggulan->update([
                'title'             => $request->title,
                'slug'              => Str::slug($request->title, '-'),
                'description'       => $request->description,
                'link'              => $request->link,
                'image'             => $image->hashName(),
                'program_id'                => $request->program_id,
                'home'                => $request->home,
                'fakultas'                => $request->fakultas,

            ]);
        }

        if ($unggulan) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.unggulan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.unggulan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unggulan = Unggulan::findOrFail($id);
        Storage::disk('local')->delete('public/unggulans/' . basename($unggulan->image));
        $unggulan->delete();

        if ($unggulan) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        $unggulans = Unggulan::whereIn('id', $ids)->get();

        foreach ($unggulans as $unggulan) {
            Storage::disk('local')->delete('public/unggulans/' . $unggulan->image);
            $unggulan->delete();
        }

        return response()->json(['status' => 'success']);
    }
}

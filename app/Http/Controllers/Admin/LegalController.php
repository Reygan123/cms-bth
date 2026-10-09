<?php

namespace App\Http\Controllers\Admin;

use App\Models\Legal;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LegalController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $legals = Legal::latest()->get();

        return view('admin.legal.index', compact('legals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.legal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:1500',
            'file'  => 'required|mimes:jpeg,jpg,png,pdf|max:5500',
            'title' => 'required|string|max:255',
        ]);

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/identities', $image->hashName());

        // Upload file
        $file = $request->file('file');
        $file->storeAs('public/files', $file->hashName());

        // Save to DB
        Legal::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $image->hashName(),
            'file'        => $file->hashName(),
        ]);

        return redirect()
            ->route('admin.legal.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $legal
     * @return void
     */
    public function edit(Legal $legal)
    {
        return view('admin.legal.edit', compact('legal'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $legal
     * @return void
     */
    public function update(Request $request, Legal $legal)
    {
        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1500',
            'file'  => 'nullable|mimes:jpeg,jpg,png,pdf|max:5500',
            'title' => 'required',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
        ];

        // handle image jika ada
        if ($request->hasFile('image')) {
            // hapus file lama
            if ($legal->image && Storage::exists('public/identities/' . $legal->image)) {
                Storage::delete('public/identities/' . $legal->image);
            }

            $image = $request->file('image');
            $image->storeAs('public/identities', $image->hashName());
            $data['image'] = $image->hashName();
        }

        // handle file jika ada
        if ($request->hasFile('file')) {
            // hapus file lama
            if ($legal->file && Storage::exists('public/files/' . $legal->file)) {
                Storage::delete('public/files/' . $legal->file);
            }

            $file = $request->file('file');
            $file->storeAs('public/files', $file->hashName());
            $data['file'] = $file->hashName();
        }

        $legal->update($data);

        return redirect()->route('admin.legal.index')
            ->with($legal ? ['success' => 'Data Berhasil Diupdate!'] : ['error' => 'Data Gagal Diupdate!']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $legal = Legal::findOrFail($id);
        Storage::disk('local')->delete('public/identities/'.basename($legal->image));
        $legal->delete();

        if($legal){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

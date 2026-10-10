<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumumans = Pengumuman::latest()->when(request()->q, function ($query) {
            $query->where('title', 'like', '%' . request()->q . '%')
                  ->orWhere('category', 'like', '%' . request()->q . '%');
        })->paginate(15);

        return view('admin.pengumuman.index', compact('pengumumans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:100',
            'start_date' => 'nullable|date',
            'location'   => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'contact'    => 'nullable|string|max:100',
            'file'       => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:10240',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->hashName();
            $file->storeAs('public/files', $fileName);
        }

        $baseSlug = Str::slug($request->title, '-');
        $slug = $baseSlug;
        $counter = 1;
        while (Pengumuman::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $pengumuman = Pengumuman::create([
            'title'      => $request->title,
            'slug'       => $slug,
            'category'   => $request->category ?? 'PMB',
            'start_date' => $request->start_date ?? now()->toDateString(),
            'location'   => $request->location ?? 'STIKes Budi Luhur Cimahi',
            'content'    => $request->content ?? $request->title,
            'contact'    => $request->contact,
            'file'       => $fileName,
            'status'     => $request->has('status') ? (bool)$request->status : true,
        ]);

        if ($pengumuman) {
            return redirect()->route('admin.pengumuman.index')->with(['success' => 'Pengumuman Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.pengumuman.index')->with(['error' => 'Pengumuman Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
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
        $this->validate($request, [
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:100',
            'start_date' => 'nullable|date',
            'location'   => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'contact'    => 'nullable|string|max:100',
            'file'       => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:10240',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        $data = [
            'title'      => $request->title,
            'category'   => $request->category ?? 'PMB',
            'start_date' => $request->start_date ?? $pengumuman->start_date,
            'location'   => $request->location ?? 'STIKes Budi Luhur Cimahi',
            'content'    => $request->content ?? $request->title,
            'contact'    => $request->contact,
            'status'     => $request->has('status') ? (bool)$request->status : true,
        ];

        if ($request->hasFile('file')) {
            if ($pengumuman->file) {
                Storage::disk('local')->delete('public/files/' . basename($pengumuman->file));
            }
            $file = $request->file('file');
            $fileName = $file->hashName();
            $file->storeAs('public/files', $fileName);
            $data['file'] = $fileName;
        }

        $pengumuman->update($data);

        return redirect()->route('admin.pengumuman.index')->with(['success' => 'Pengumuman Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        if ($pengumuman->file) {
            Storage::disk('local')->delete('public/files/' . basename($pengumuman->file));
        }
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')->with(['success' => 'Pengumuman Berhasil Dihapus!']);
    }
}

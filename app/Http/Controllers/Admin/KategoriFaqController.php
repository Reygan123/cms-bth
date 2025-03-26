<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriFaq;

class KategoriFaqController extends Controller
{
    public function index()
    {
        $Kategorifaqs = KategoriFaq::oldest()->when(request()->q, function($Kategorifaq) {
            $Kategorifaq = $Kategorifaq->where('name', 'like', '%'. request()->q . '%');
        })->paginate(15);
        return view('admin.kategori_faq.index', compact('Kategorifaqs'));
    }

    public function create()
    {
        return view('admin.kategori_faq.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'description'  => 'required'
        ]);
        $faq = KategoriFaq::create([
            'title'             => $request->title,
            'description'       => $request->description,
        ]);
 
        if($faq){
            //redirect dengan pesan sukses
            return redirect()->route('admin.kategori_faq.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.kategori_faq.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(KategoriFaq $kategoriFaq)
     {
         return view('admin.kategori_faq.edit', compact('kategoriFaq'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'         => 'required',
        ]); 

        //update data tanpa image
        $kategorifaq = KategoriFaq::findOrfail($id);
        $kategorifaq->update([
            'title'                   => $request->title,
            'description'            => $request->description,

        ]);
        

        if($kategorifaq){
            //redirect dengan pesan sukses
            return redirect()->route('admin.kategori_faq.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.kategori_faq.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $kategorifaq = KategoriFaq::findOrFail($id);
        $kategorifaq->delete();

        if($kategorifaq){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    } 

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        $faqs = KategoriFaq::whereIn('id', $ids)->get();

        foreach ($faqs as $faq) {
            $faq->delete();
        }

        return response()->json(['status' => 'success']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\KategoriFaq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $faqs = Faq::when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('question', 'like', "%$query%")
                                    ->orWhere('answer', 'like', "%$query%");
            })
            ->oldest()
            ->paginate(5)
            ->appends(['q' => $query]); // Menyimpan query search saat pagination

        return view('admin.faq.index', compact('faqs', 'query'));
    }


    public function create()
    {
        $kategorifaqs = KategoriFaq::latest()->get();
        return view('admin.faq.create', compact('kategorifaqs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'description'  => 'required',
            'id_kategori'  => 'required'
        ]);
        $faq = Faq::create([
            'title'             => $request->title,
            'description'       => $request->description,
            'id_kategori'       => $request->id_kategori,
        ]);
 
        if($faq){
            //redirect dengan pesan sukses
            return redirect()->route('admin.faq.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.faq.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit(Faq $faq)
     {
        $kategorifaqs = KategoriFaq::latest()->get();
         return view('admin.faq.edit', compact('faq', 'kategorifaqs'));
     }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'         => 'required',
            'id_kategori'         => 'required',
        ]); 

        //update data tanpa image
        $faq = Faq::findOrfail($id);
        $faq->update([
            'title'                   => $request->title,
            'description'            => $request->description,
            'id_kategori'            => $request->id_kategori,
        ]);
        

        if($faq){
            //redirect dengan pesan sukses
            return redirect()->route('admin.faq.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.faq.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        if($faq){
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

        $faqs = faq::whereIn('id', $ids)->get();

        foreach ($faqs as $faq) {
            $faq->delete();
        }

        return response()->json(['status' => 'success']);
    }

}

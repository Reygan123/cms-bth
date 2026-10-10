<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Akademik;
use App\Models\KategoriFaq;

class AkademikController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $akademiks = Akademik::when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', "%$query%")
                                    ->orWhere('description', 'like', "%$query%");
            })
            ->oldest()
            ->paginate(10)
            ->appends(['q' => $query]); // Menyimpan query search saat pagination

        return view('admin.akademik.index', compact('akademiks', 'query'));
    }


    public function create()
    {
        return view('admin.akademik.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'description'  => 'required',
            'startDate'  => 'required',
            'endDate'  => 'required',
            'color'  => 'required',
        ]);
        $akademik = akademik::create([
            'title'             => $request->title,
            'description'       => $request->description,
            'startDate'       => $request->startDate,
            'endDate'       => $request->endDate,
            'color'       => $request->color,
        ]);
 
        if($akademik){
            //redirect dengan pesan sukses
            return redirect()->route('admin.akademik.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.akademik.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit(Akademik $akademik)
     {
         return view('admin.akademik.edit', compact('akademik'));
     }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'  => 'required',
            'description'  => 'required',
            'startDate'  => 'required',
            'endDate'  => 'required',
            'color'  => 'required',
        ]); 

        //update data tanpa image
        $akademik = Akademik::findOrfail($id);
        $akademik->update([
            'title'             => $request->title,
            'description'       => $request->description,
            'startDate'       => $request->startDate,
            'endDate'       => $request->endDate,
            'color'       => $request->color,
        ]);
        

        if($akademik){
            //redirect dengan pesan sukses
            return redirect()->route('admin.akademik.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.akademik.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $akademik = Akademik::findOrFail($id);
        $akademik->delete();

        if($akademik){
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

        $akademiks = Akademik::whereIn('id', $ids)->get();

        foreach ($akademiks as $akademik) {
            $akademik->delete();
        }

        return response()->json(['status' => 'success']);
    }

}

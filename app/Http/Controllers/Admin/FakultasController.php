<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Ourteam;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::latest()->when(request()->q, function ($fakultas) {
            $fakultas = $fakultas->where('name', 'like', '%' . request()->q . '%');
        })->paginate(20);

        return view('admin.fakultas.index', compact('fakultas'));
    }

    // Tambah halaman pertama//
    public function getHalamanPertama()
    {
        $ourteams = OurTeam::orderBy('name')->get();
        $programs = Program::all();
        return view('admin.fakultas.create_halaman_pertama', compact('ourteams', 'programs'));
    }
    public function postHalamanPertama(Request $request)
    {
        $this->validate($request, [
            'image1' => 'required|image|mimes:jpeg,jpg,png,webp|max:1000',
            'name' => 'required',
        ]);

        $image1 = $request->file('image1');
        $image1->storeAs('public/fakultas', $image1->hashName());

        $fakultasData = [
            'image1'        => $image1->hashName(),
            'name'          => $request->input('name'),
            'slug'          => Str::slug($request->input('name'), '-'),
            'subtitle'      => $request->input('subtitle'),
            'yt_id'         => $request->input('id_yt'),
            'ourteam_id'    => $request->input('ourteam_id'),
            'tt'            => $request->input('tt'),
            'ig'            => $request->input('ig'),
            'fb'            => $request->input('fb'),
            'yt'            => $request->input('id_yt'),
            'linkedin'      => $request->input('linkedin'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'address'       => $request->input('address'),
            'map'           => $request->input('map'),
            'color'           => $request->input('color'),
        ];

        $fakultas = Fakultas::create($fakultasData);

        if ($fakultas) {
            $fakultas->programs()->sync($request->input('program_ids'));
            $request->session()->put('fakultas_id', $fakultas->id);
            return redirect()->route('admin.fakultas.create.halaman-kedua')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //tambah halaman kedua//
    public function getHalamanKedua()
    {
        $fakultas = Fakultas::find(session('fakultas_id'));
        return view('admin.fakultas.create_halaman_kedua', compact('fakultas'));
    }

    public function postHalamanKedua(Request $request)
    {
        $this->validate($request, [
            'image2' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image3' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image4' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        $fakultasData = [];

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2->storeAs('public/fakultas', $image2->hashName());
            $fakultasData['image2'] = $image2->hashName();
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3->storeAs('public/fakultas', $image3->hashName());
            $fakultasData['image3'] = $image3->hashName();
        }

        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $image4->storeAs('public/fakultas', $image4->hashName());
            $fakultasData['image4'] = $image4->hashName();
        }

        $fakultasData['statistik1'] = $request->input('statistik1');
        $fakultasData['statistik2'] = $request->input('statistik2');
        $fakultasData['statistik3'] = $request->input('statistik3');
        $fakultasData['statistik4'] = $request->input('statistik4');
        $fakultasData['title1'] = $request->input('title1');
        $fakultasData['description1'] = $request->input('description1');
        $fakultasData['title2'] = $request->input('title2');
        $fakultasData['description2'] = $request->input('description2');

        $fakultas = Fakultas::find($request->session()->get('fakultas_id'));
        $fakultas->update($fakultasData);

        if ($fakultas) {
            return redirect()->route('admin.fakultas.create.halaman-ketiga')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.fakultas')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //tambah halaman ketiga//
    public function getHalamanKetiga()
    {
        $fakultas = Fakultas::find(session('fakultas_id'));
        return view('admin.fakultas.create_halaman_ketiga', compact('fakultas'));
    }
    public function postHalamanKetiga(Request $request)
    {
        $this->validate($request, [
            'image5' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ]);

        $fakultasData = [];

        if ($request->hasFile('image5')) {
            $image5 = $request->file('image5');
            $image5->storeAs('public/fakultas', $image5->hashName());
            $fakultasData['image5'] = $image5->hashName();
        }

        $fakultasData = [
            'title3'        => $request->input('title3'),
            'description3'  => $request->input('description3'),
            'link_fakultas' => $request->input('link_fakultas'),
            'linkedin' => $request->input('linkedin'),
            'map' => $request->input('map'),
        ];

        $fakultas = Fakultas::find($request->session()->get('fakultas_id'));
        $fakultas->update($fakultasData);

        if ($fakultas) {
            return redirect()->route('admin.fakultas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // Edit halaman pertama//
    public function getEditHalamanPertama(Fakultas $fakultas)
    {
        $ourteams = OurTeam::orderBy('name')->get();
        $programs = Program::all();
        return view('admin.fakultas.edit_halaman_pertama', compact('fakultas', 'ourteams', 'programs'));
    }
    public function updateHalamanPertama(Request $request, Fakultas $fakultas)
    {
        $this->validate($request, [
            'image1' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
            'name' => 'required',
        ]);

        if ($request->hasFile('image1')) {
            $this->validate($request, [
                'image1' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
            ]);

            $image1 = $request->file('image1');
            $image1->storeAs('public/fakultas', $image1->hashName());
            $fakultas->image1 = $image1->hashName();
        }

        // Update other fields for step one
        $fakultas->name = $request->input('name');
        $fakultas->slug = Str::slug($request->input('name'), '-');
        $fakultas->subtitle = $request->input('subtitle');
        $fakultas->yt_id = $request->input('id_yt');
        $fakultas->ourteam_id = $request->input('ourteam_id');
        $fakultas->tt = $request->input('tt');
        $fakultas->ig = $request->input('ig');
        $fakultas->fb = $request->input('fb');
        $fakultas->yt = $request->input('yt');
        $fakultas->linkedin = $request->input('linkedin');
        $fakultas->email = $request->input('email');
        $fakultas->phone = $request->input('phone');
        $fakultas->address = $request->input('address');
        $fakultas->map = $request->input('map');
        $fakultas->color = $request->input('color');

        if ($fakultas->save()) {
            $fakultas->programs()->sync($request->input('program_ids'));
            return redirect()->route('admin.fakultas.edit_halaman-kedua', $fakultas->id)->with(['success' => 'Data Halaman Pertama Berhasil Diupdate!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    // Edit halaman kedua//
    public function getEditHalamanKedua(Fakultas $fakultas)
    {
        return view('admin.fakultas.edit_halaman_kedua', compact('fakultas'));
    }
    public function updateHalamanKedua(Request $request, Fakultas $fakultas)
    {
        $this->validate($request, [
            'image2' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image3' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2->storeAs('public/fakultas', $image2->hashName());
            $fakultas->image2 = $image2->hashName();
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3->storeAs('public/fakultas', $image3->hashName());
            $fakultas->image3 = $image3->hashName();
        }

        $fakultas->statistik1 = $request->input('statistik1');
        $fakultas->statistik2 = $request->input('statistik2');
        $fakultas->statistik3 = $request->input('statistik3');
        $fakultas->statistik4 = $request->input('statistik4');
        $fakultas->title1 = $request->input('title1');
        $fakultas->description1 = $request->input('description1');
        $fakultas->title2 = $request->input('title2');
        $fakultas->description2 = $request->input('description2');

        if ($fakultas->save()) {
            return redirect()->route('admin.fakultas.edit.halaman-ketiga', $fakultas->id)->with(['success' => 'Data Halaman Kedua Berhasil Diupdate!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    // Edit halaman ketiga//
    public function getEditHalamanKetiga(Fakultas $fakultas)
    {
        return view('admin.fakultas.edit_halaman_ketiga', compact('fakultas'));
    }
    public function updateHalamanKetiga(Request $request, Fakultas $fakultas)
    {
        $this->validate($request, [
            'image5' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ]);

        if ($request->hasFile('image5')) {
            $image5 = $request->file('image5');
            $image5->storeAs('public/fakultas', $image5->hashName());
            $fakultas->image5 = $image5->hashName();
        }

        $fakultas->title3 = $request->input('title3');
        $fakultas->description3 = $request->input('description3');
        $fakultas->link_fakultas = $request->input('link_fakultas');
        $fakultas->linkedin = $request->input('linkedin');
        $fakultas->map = $request->input('map');

        if ($fakultas->save()) {
            return redirect()->route('admin.fakultas.index')->with(['success' => 'Data Halaman Ketiga Berhasil Diupdate!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        $fakultasList = Fakultas::whereIn('id', $ids)->get();

        foreach ($fakultasList as $fakultas) {
            // Hapus gambar yang terkait
            Storage::disk('local')->delete('public/fakultas/' . $fakultas->image1);
            Storage::disk('local')->delete('public/fakultas/' . $fakultas->image2);
            Storage::disk('local')->delete('public/fakultas/' . $fakultas->image3);
            Storage::disk('local')->delete('public/fakultas/' . $fakultas->image4);
            Storage::disk('local')->delete('public/fakultas/' . $fakultas->image5);

            // Hapus data fakultas
            $fakultas->delete();
        }

        return response()->json(['status' => 'success']);
    }
}

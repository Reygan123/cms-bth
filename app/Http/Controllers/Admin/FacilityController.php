<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Facility;
use Illuminate\Support\Str;
use App\Models\Program;

class FacilityController extends Controller
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

        // Query fasilitas dengan filter pencarian dan program_id
        $facilities = Facility::oldest()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            })
            ->when($selectedProgramId, function ($query) use ($selectedProgramId) {
                $query->where('program_id', $selectedProgramId);
            })
            ->paginate(20);

        // Kirim data ke view
        return view('admin.facility.index', compact('facilities', 'programs', 'searchQuery', 'selectedProgramId'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::latest()->get();
        return view('admin.facility.create', compact('programs'));
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
            'image'             => 'required|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image1'            => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image2'            => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image3'            => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image4'            => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'title'             => 'required',
            'program_id'        => 'required',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/facilities', $image->hashName());

        // upload image1 jika ada
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1->storeAs('public/facilities', $image1->hashName());
            $image1Name = $image1->hashName();
        } else {
            // Jika image1 tidak ada, set ke null
            $image1Name = null;
        }
        
        // upload image2 jika ada
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2->storeAs('public/facilities', $image2->hashName());
            $image2Name = $image2->hashName();
        } else {
            // Jika image2 tidak ada, set ke null
            $image2Name = null;
        }
        
        // upload image3 jika ada
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3->storeAs('public/facilities', $image3->hashName());
            $image3Name = $image3->hashName();
        } else {
            // Jika image3 tidak ada, set ke null
            $image3Name = null;
        }
        
        // upload image4 jika ada
        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $image4->storeAs('public/facilities', $image4->hashName());
            $image4Name = $image4->hashName();
        } else {
            // Jika image4 tidak ada, set ke null
            $image4Name = null;
        }

        // simpan ke database
        $facility = Facility::create([
            'image'             => $image->hashName(),
            'image1'            => $image1Name,
            'image2'            => $image2Name,
            'image3'            => $image3Name,
            'image4'            => $image4Name,
            'svg_icon'          => $request->svg_icon,
            'program_id'        => $request->program_id,
            'title'             => $request->title,
            'slug'              => Str::slug($request->title, '-'),
            'subtitle'          => $request->subtitle,
            'description'       => $request->description,
            'home'              => $request->home,
            'fakultas_display'              => $request->fakultas_display,
        ]);

        if ($facility) {
            // redirect dengan pesan sukses
            return redirect()->route('admin.facility.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('admin.facility.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(facility $facility)
    {
        $programs = Program::latest()->get();
        return view('admin.facility.edit', compact('facility', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $this->validate($request, [
            'title'   => 'required',
            'program_id'   => 'required',
            'image'   => 'image|mimes:jpeg,jpg,png,webp|max:1000',
            'image1'  => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image2'  => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image3'  => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
            'image4'  => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1000',
        ]);

        // Ambil data yang akan diperbarui
        $facility = Facility::findOrFail($facility->id);

        // Array untuk menyimpan data update
        $data = [
            'program_id'       => $request->program_id,
            'title'       => $request->title,
            'svg_icon'       => $request->svg_icon,
            'slug'        => Str::slug($request->title, '-'),
            'subtitle'    => $request->subtitle,
            'description' => $request->description,
            'home'        => $request->home,
            'fakultas_display'        => $request->fakultas_display,
            'svg_icon'    => $request->svg_icon,
        ];

        // **Update Image (jika ada file baru)**
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            Storage::disk('local')->delete('public/facilities/' . basename($facility->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/facilities', $image->hashName());

            // Tambahkan ke data update
            $data['image'] = $image->hashName();
        }

        // **Update Image1 (jika ada file baru)**
        if ($request->hasFile('image1')) {
            // Hapus image1 lama jika ada
            Storage::disk('local')->delete('public/facilities/' . basename($facility->image1));

            // Upload image1 baru
            $image1 = $request->file('image1');
            $image1->storeAs('public/facilities', $image1->hashName());

            // Tambahkan ke data update
            $data['image1'] = $image1->hashName();
        }

        // **Update image2 (jika ada file baru)**
        if ($request->hasFile('image2')) {
            // Hapus image2 lama jika ada
            Storage::disk('local')->delete('public/facilities/' . basename($facility->image2));

            // Upload image2 baru
            $image2 = $request->file('image2');
            $image2->storeAs('public/facilities', $image2->hashName());

            // Tambahkan ke data update
            $data['image2'] = $image2->hashName();
        }

        // **Update image3 (jika ada file baru)**
        if ($request->hasFile('image3')) {
            // Hapus image3 lama jika ada
            Storage::disk('local')->delete('public/facilities/' . basename($facility->image3));

            // Upload image3 baru
            $image3 = $request->file('image3');
            $image3->storeAs('public/facilities', $image3->hashName());

            // Tambahkan ke data update
            $data['image3'] = $image3->hashName();
        }

        // **Update image4 (jika ada file baru)**
        if ($request->hasFile('image4')) {
            // Hapus image4 lama jika ada
            Storage::disk('local')->delete('public/facilities/' . basename($facility->image4));

            // Upload image4 baru
            $image4 = $request->file('image4');
            $image4->storeAs('public/facilities', $image4->hashName());

            // Tambahkan ke data update
            $data['image4'] = $image4->hashName();
        }

        // **Update Data**
        $facility->update($data);

        // Redirect dengan pesan sukses atau error
        return $facility
            ? redirect()->route('admin.facility.index')->with(['success' => 'Data Berhasil Diupdate!'])
            : redirect()->route('admin.facility.index')->with(['error' => 'Data Gagal Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        Storage::disk('local')->delete('public/facilities/' . basename($facility->image));
        $facility->delete();

        if ($facility) {
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

        $facilities = Facility::whereIn('id', $ids)->get();

        foreach ($facilities as $facility) {
            Storage::disk('local')->delete('public/facilities/' . $facility->image);
            $facility->delete();
        }

        return response()->json(['status' => 'success']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Str;
use App\Models\Program;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::oldest()->when(request()->q, function($registration) {
            $registration = $registration->where('name', 'like', '%'. request()->q . '%');
        })->paginate(15);
        return view('admin.registration.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.registration.create', compact('programs'));
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
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:1000',
            'name' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/registration', $image->hashName());

        $registrationData = [
            'image'        => $image->hashName(),
            'name'          => $request->input('name'),
            'slug'          => Str::slug($request->input('name'), '-'),
            'start_date'           => $request->start_date,
            'end_date'           => $request->end_date,
            'start_time'           => $request->start_time,
            'end_time'           => $request->end_time,
            'description'      => $request->input('description'),
            'content'      => $request->input('content'),
            'cta'      => $request->input('cta'),
            'link'      => $request->input('link'),
            'pricing'      => $request->input('pricing'),
            'status'      => $request->input('status'),
        ];

        $registration = Registration::create($registrationData);

        if ($registration) {
            $registration->programs()->sync($request->input('program_ids'));
            return redirect()->route('admin.registration.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.fakultas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        $programs = Program::all();
        return view('admin.registration.edit', compact('programs', 'registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
            'name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png,webp|max:1000',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/registration', $image->hashName());
            $registration->image = $image->hashName();
        }

        $registration->name = $request->input('name');
        $registration->slug = Str::slug($request->input('name'), '-');
        $registration->start_date = $request->input('start_date');
        $registration->end_date = $request->input('end_date');
        $registration->start_time = $request->input('start_time');
        $registration->end_time = $request->input('end_time');
        $registration->description = $request->input('description');
        $registration->content = $request->input('content');
        $registration->cta = $request->input('cta');
        $registration->link = $request->input('link');
        $registration->pricing = $request->input('pricing');
        $registration->status = $request->input('status');

        if ($registration->save()) {
            $registration->programs()->sync($request->input('program_ids'));
            return redirect()->route('admin.registration.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('admin.registration.index')->with(['error' => 'Data Gagal Diperbarui!']);
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
        //
    }
}

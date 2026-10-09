@extends('layouts.app', ['title' => 'organisasi'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-right">Add</h5>
                    <form action="{{ route('admin.organisasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group mb-4">
                                                <div class="form-group">
                                                    <input type="checkbox" name="home" id="home" value="1" {{ old('home') ? 'checked' : '' }}>
                                                    <label for="home" class="ml-2">Display on Home</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="fakultas_display" id="fakultas_display" value="1" {{ old('fakultas_display') ? 'checked' : '' }}>
                                                    <label for="fakultas_display" class="ml-2">Display on Fakultas</label>
                                                </div>
                                                @error('home')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                                <label class="text-label" for="kategori_id">Kategori Organisasi</label>
                                                <select class="form-control" name="kategori_id">
                                                    @foreach ($kategoris as $kategori)
                                                        <option class="py-1" value="{{ $kategori->id }}">
                                                            {{ $kategori->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                                <label class="text-label" for="program_id">Program Name</label>
                                                <select class="form-control" name="program_id">
                                                    @foreach ($programs as $program)
                                                        <option class="py-1" value="{{ $program->id }}">
                                                            {{ $program->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('program_id')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        <div class="form-group mb-4">
                                            <label class="text-label" for="title">Title</label>
                                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Organisasi">
                                            @error('title')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-label" for="description">Description</label>
                                            <textarea id="editor2" name="description">{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2 mt-4">
                                            <label class="text-gray-700" for="image">Upload Image (Max Size: 750kb)</label>
                                            <input type="file" class="dropify" data-default-file="" id="image" name="image" />
                                            @error('image')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mt-4">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
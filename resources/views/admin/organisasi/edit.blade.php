@extends('layouts.app', ['title' => 'Organisasi'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Edit</h5>
                        <form action="{{ route('admin.organisasi.update', $organisasi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label class="text-label" for="heading">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('description', $organisasi->title) }}">
                                        @error('title')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-label" for="description">Description</label>
                                        <textarea id="editor2" name="description">{{ old('description', $organisasi->description) }}</textarea>
                                        @error('description')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image"
                                                    name="image" />
                                                @error('image')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2 mt-4">
                                                @if ($organisasi->image)
                                                    <img src="{{ asset('storage/organisasi/' . $organisasi->image) }}"
                                                        alt="{{ $organisasi->title }}" class="admin-edit-image">
                                                @else
                                                    <img src="{{ asset('storage/organisasi/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
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
        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

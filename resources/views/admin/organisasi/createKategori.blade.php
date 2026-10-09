@extends('layouts.app', ['title' => 'organisasi'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-right">Add</h5>
                    <form action="{{ route('admin.kategoriOrganisasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <label class="text-label" for="title">Kategori Organisasi</label>
                                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Kategori Organisasi">
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
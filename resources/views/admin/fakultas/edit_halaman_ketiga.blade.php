@extends('layouts.app', ['title' => 'Edit Fakultas'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="flex" style="justify-content: space-between;">
                            <h5>Edit Deskripsi Fakultas</h5>
                        </div>
                        <form action="{{ route('admin.fakultas.edit.halaman-ketiga', $fakultas->id) }}" method="POST" enctype="multipart/form-data" id="edit-form-horizontal" class="edit-form-horizontal">
                            @csrf
                            @method('PUT')
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="title4">Title Section 3</label>
                                                    <input class="form-control" type="text" name="title3" value="{{ old('title3', $fakultas->title3) }}" placeholder="Title Section 3">
                                                    @error('title3')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="description3">Description Section 3</label>
                                                    <textarea id="editor1" name="description3">{{ old('description3', $fakultas->description3) }}</textarea>
                                                    @error('description3')
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
                                                    <label class="text-gray-700" for="image5">Upload Image (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="{{ asset('storage/fakultas/' . $fakultas->image5) }}" id="image5" name="image5" />
                                                    @error('image4')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="link_fakultas">Link Fakultas</label>
                                                    <input class="form-control" type="text" name="link_fakultas" value="{{ old('link_fakultas', $fakultas->link_fakultas) }}" placeholder="Link Call Fakultas">
                                                    @error('link_fakultas')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="linkedin">Linkedin</label>
                                                    <input class="form-control" type="text" name="linkedin" value="{{ old('linkedin', $fakultas->linkedin) }}" placeholder="Link untuk linkedin">
                                                    @error('linkedin')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="linkedin">Maps</label>
                                                    <input class="form-control" type="text" name="map" value="{{ old('map', $fakultas->map) }}" placeholder="Link untuk map">
                                                    @error('map')
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
                            </section>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('admin.fakultas.index') }}" class="btn btn-light btn-rounded">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor.create(document.querySelector('#editor1')).catch(error => console.error(error));
        ClassicEditor.create(document.querySelector('#editor2')).catch(error => console.error(error));
    </script>
@endsection

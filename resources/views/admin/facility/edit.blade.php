@extends('layouts.app', ['title' => 'Facilities'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Edit</h5>
                        <form action="{{ route('admin.facility.update', $facility->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <input type="checkbox" name="home" id="home" value="1"
                                    {{ old('home', $facility->home) ? 'checked' : '' }}>
                                <label for="home"> Display on Homepage</label>
                                @error('home')
                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                        <div class="px-4 py-2">
                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="checkbox" name="fakultas_display" id="fakultas_display" value="1"
                                    {{ old('fakultas_display', $facility->fakultas_display) ? 'checked' : '' }}>
                                <label for="fakultas_display"> Display on Fakultas</label>
                                @error('fakultas_display')
                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                        <div class="px-4 py-2">
                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ old('title', $facility->title) }}">
                                                @error('title')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="program_id">Program Name</label>
                                                <select class="form-control" name="program_id">
                                                    @foreach ($programs as $program)
                                                        <option class="py-1" value="{{ $program->id }}"
                                                            @if ($facility->program_id == $program->id) selected @endif>
                                                            {{ $program->name }}
                                                        </option>
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
                                                <label class="text-label" for="subtitle">Subtitle</label>
                                                <input type="text" class="form-control" name="subtitle"
                                                    value="{{ old('subtitle', $facility->subtitle) }}">
                                                @error('subtitle')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="name">Description</label>
                                                <textarea id="editor1" name="description" rows="15">{{ old('description', $facility->description) }}</textarea>
                                                @error('description')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2 mt-4">
                                                @if ($facility->image)
                                                    <img src="{{ asset('storage/facilities/' . $facility->image) }}"
                                                        alt="{{ $facility->title }}" class="admin-edit-image">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </div>
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
                                            <!-- icons -->

                                            <hr>
                                            <div class="mb-2 mt-4">
                                                @if ($facility->image1)
                                                    <img src="{{ asset('storage/facilities/' . $facility->image1) }}"
                                                        alt="{{ $facility->title }}" class="admin-edit-image1" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image1"
                                                    name="image1" />
                                                @error('image1')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <hr>
                                            <div class="mb-2 mt-4">
                                                @if ($facility->image2)
                                                    <img src="{{ asset('storage/facilities/' . $facility->image2) }}"
                                                        alt="{{ $facility->title }}" class="admin-edit-image2" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image2"
                                                    name="image2" />
                                                @error('image2')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <hr>
                                            <div class="mb-2 mt-4">
                                                @if ($facility->image3)
                                                    <img src="{{ asset('storage/facilities/' . $facility->image3) }}"
                                                        alt="{{ $facility->title }}" class="admin-edit-image3" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image3"
                                                    name="image3" />
                                                @error('image3')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <hr>
                                            <div class="mb-2 mt-4">
                                                @if ($facility->image4)
                                                    <img src="{{ asset('storage/facilities/' . $facility->image4) }}"
                                                        alt="{{ $facility->title }}" class="admin-edit-image4" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image4"
                                                    name="image4" />
                                                @error('image4')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-4">
                                                <iframe id="ytplayer" type="text/html" width="100%" height="300"
                                                    src="https://www.youtube.com/embed/{{ $facility->svg_icon }}" frameborder="0"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">ID Youtube</label>
                                                <input type="text" class="form-control" name="svg_icon"
                                                    value="{{ old('svg_icon', $facility->svg_icon) }}">
                                                @error('svg_icon')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
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
                                <button type="submit" class="btn btn-primary">UPDATE</button>
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
    </script>
@endsection

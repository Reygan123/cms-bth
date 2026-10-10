@extends('layouts.app', ['title' => 'Facilities'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Create</h5>
                        <form action="{{ route('admin.facility.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="form-group">
                                    <input type="checkbox" name="home" id="home" value="1" {{ old('home') ? 'checked' : '' }}>
                                    <label for="home" class="ml-2">Display on Home</label>
                                </div>
                                @error('home')
                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                        <div class="px-4 py-2">
                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <div class="form-group">
                                    <input type="checkbox" name="fakultas_display" id="fakultas_display" value="1" {{ old('fakultas_display') ? 'checked' : '' }}>
                                    <label for="fakultas_display" class="ml-2">Display on Fakultas</label>
                                </div>
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
                                        <div class="col-sm-8">
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ old('title') }}">
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
                                                <label class="text-label" for="subtitle">Subtitle</label>
                                                <input type="text" class="form-control" name="subtitle"
                                                    value="{{ old('subtitle') }}">
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
                                                <textarea id="editor1" name="description" rows="15">{{ old('description') }}</textarea>
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
                                                <label class="text-gray-700" for="image">Image (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" id="image" name="image" />
                                                @error('image')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image1">Image</label>
                                                <input type="file" class="dropify" id="image1" name="image1" />
                                                @error('image1')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image2">Image</label>
                                                <input type="file" class="dropify" id="image2" name="image2" />
                                                @error('image2')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image3">Image</label>
                                                <input type="file" class="dropify" id="image3" name="image3" />
                                                @error('image3')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image4">Image</label>
                                                <input type="file" class="dropify" id="image4" name="image4" />
                                                @error('image4')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <iframe id="ytplayer" type="text/html" width="100%" height="300"
                                                    src="" frameborder="0" allowfullscreen></iframe>
                                            </div>

                                            <div class="form-group">
                                                <label class="text-label" for="svg_icon">ID Video Youtube</label>
                                                <input class="form-control" type="text" name="svg_icon" value="{{ old('svg_icon') }}" placeholder="ID Youtube" oninput="updateYouTubePreview(this.value)">
                                                @error('svg_icon')
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
    </script>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateYouTubePreview(svg_icon) {
            if (svg_icon) {
                $('#ytplayer').attr('src', 'http://www.youtube.com/embed/' + svg_icon); // Updated to embed URL
            } else {
                $('#ytplayer').attr('src', ''); // Clear the iframe if the input is empty
            }
        }
    </script>
@endsection

@extends('layouts.app', ['title' => 'Fakultas'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="flex" style="justify-content: space-between;">
                            <h5>Deskripsi Fakultas</h5>
                            <h5 class="">Add</h5>
                        </div>
                        <form action="{{ route('admin.fakultas.create.halaman-ketiga') }}" method="POST"
                            enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            @csrf
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <div role="application" class="wizard clearfix" id="steps-uid-0">
                                            <div class="steps clearfix">
                                                <ul role="tablist">
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-0" href="#steps-uid-0-h-0"
                                                            aria-controls="steps-uid-0-p-0"><span
                                                                class="current-info audible">current step: </span><span
                                                                class="number">1.</span> Program Description</a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-1" href="#steps-uid-0-h-1"
                                                            aria-controls="steps-uid-0-p-1"><span class="number">2.</span>
                                                            Program Description</a></li>
                                                    <li role="tab" class="third current" aria-disabled="false"
                                                        aria-selected="true"><a id="steps-uid-0-t-2" href="#steps-uid-0-h-2"
                                                            aria-controls="steps-uid-0-p-2"><span class="number">3.</span>
                                                            Program Description</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title4">Title Section 3</label>
                                                        <input class="form-control" type="text" name="title3"
                                                            value="{{ old('title3') }}" placeholder="Title Section 3">
                                                        @error('title4')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description3">Description Section
                                                            3</label>
                                                        <textarea id="editor1" name="description3">{{ old('description3') }}</textarea>
                                                        @error('description3')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-2 mt-4">
                                                        <label class="text-gray-700" for="image5">Upload Image (Max Size:
                                                            750kb)</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image5" name="image5" />
                                                        @error('image5')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <label class="text-label text-center" for="time_table">Time Table</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <textarea id="editor3" name="time_table">{{ old('time_table') }}</textarea>
                                                        @error('time_table')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <textarea id="editor4" name="time_table2">{{ old('time_table2') }}</textarea>
                                                        @error('time_table2')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="link_fakultas">Link Fakultas</label>
                                                        <input class="form-control" type="text" name="link_fakultas"
                                                            value="{{ old('link_fakultas') }}"
                                                            placeholder="Link Call to Action">
                                                        @error('link_fakultas')
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
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
                                                        <input class="form-control" type="text" name="linkedin"
                                                            value="{{ old('linkedin') }}" placeholder="Link untuk linkedin">
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
                                                        <label class="text-label" for="map">Google Map</label>
                                                        <input class="form-control" type="text" name="map"
                                                            value="{{ old('map') }}" placeholder="Link untuk map">
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
                                </div>
                            </section>


                            <div class="flex justify-between mt-4">
                                <a href="{{ route('admin.fakultas.edit_halaman-kedua', $fakultas->id) }}"
                                    class="btn btn-light btn-rounded">Previous</a>
                                <button type="submit" class="btn btn-primary btn-rounded">Save</button>
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
        ClassicEditor
            .create(document.querySelector('#editor4'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

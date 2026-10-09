@extends('layouts.app', ['title' => 'Akademik'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Add</h5>
                        <form action="{{ route('admin.akademik.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="form-group col-sm-12 mb-4">
                                        <label class="text-label" for="title">Title</label>
                                        <input class="form-control" type="text" name="title"
                                            value="{{ old('title') }}" placeholder="Title">
                                        @error('title')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="text-label" for="description">Description</label>
                                        <textarea id="editor1" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-4 mb-4">
                                        <label class="text-label" for="startDate">Start Date</label>
                                        <input class="form-control" type="date" name="startDate"
                                            value="{{ old('startDate') }}" placeholder="Question">
                                        @error('startDate')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-4 mb-4">
                                        <label class="text-label" for="endDate">Start Date</label>
                                        <input class="form-control" type="date" name="endDate"
                                            value="{{ old('endDate') }}" placeholder="Question">
                                        @error('endDate')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-4 mb-4">
                                        <label class="text-label mb-2" for="color">Tags Colors</label>
                                                        <div class="card">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <input
                                                                    id="color"
                                                                    class="form-control form-control-color"
                                                                    type="color"
                                                                    name="color"
                                                                    value="{{ old('color') }}"
                                                                    oninput="document.getElementById('color-preview').textContent = this.value"
                                                                    style="width: 60px; height: 40px; border: none; cursor: pointer;"
                                                                >
                                                                <span id="color-preview" class="text-sm font-mono">
                                                                    {{ old('color', '#4197CB') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                    </div>
                            </div>
                            <div class="flex justify-start mt-4">
                                <button type="submit" class="btn btn-primary">SAVE</button>
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

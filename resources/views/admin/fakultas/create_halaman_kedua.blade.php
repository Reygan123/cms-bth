@extends('layouts.app', ['title' => 'Edit Faculty'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Edit Faculty Details</h5>
                    </div>
                    <form action="{{ route('admin.fakultas.create.halaman-kedua', $fakultas->id) }}" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                        @csrf
                        @method('POST')
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div>Faculty Statistics</div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="statistik1">Student</label>
                                                        <input class="form-control" type="text" name="statistik1" value="{{ old('statistik1', $fakultas->statistik1) }}" placeholder="Total of students">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="statistik2">Graduate</label>
                                                        <input class="form-control" type="text" name="statistik2" value="{{ old('statistik2', $fakultas->statistik2) }}" placeholder="Total of graduates">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="statistik3">Products</label>
                                                        <input class="form-control" type="text" name="statistik3" value="{{ old('statistik3', $fakultas->statistik3) }}" placeholder="Total of products">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="statistik4">Achievements</label>
                                                        <input class="form-control" type="text" name="statistik4" value="{{ old('statistik4', $fakultas->statistik4) }}" placeholder="Total of achievements">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="text-label" for="title1">Title 1</label>
                                                <input class="form-control" type="text" name="title1" value="{{ old('title1', $fakultas->title1) }}" placeholder="Title Section 1">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="description1">Description 1</label>
                                                <textarea id="editor1" name="description1">{{ old('description1', $fakultas->description1) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image2">Upload Image 2 (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="{{ asset('storage/' . $fakultas->image2) }}" id="image2" name="image2" />
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image3">Upload Image 3 (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="{{ asset('storage/' . $fakultas->image3) }}" id="image3" name="image3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-8">
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="title2">Title 2</label>
                                                <input class="form-control" type="text" name="title2" value="{{ old('title2', $fakultas->title2) }}" placeholder="Title Section 2">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="description2">Description 2</label>
                                                <textarea id="editor2" name="description2">{{ old('description2', $fakultas->description2) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image4">Upload Image 4 (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="{{ asset('storage/' . $fakultas->image4) }}" id="image4" name="image4" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="flex justify-between mt-4">
                            <a href="{{ route('admin.fakultas.index') }}" class="btn btn-light btn-rounded">Back</a>
                            <button type="submit" class="btn btn-primary btn-rounded">Save Changes</button>
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

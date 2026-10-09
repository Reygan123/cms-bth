@extends('layouts.app', ['title' => 'Registration'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Registration Path</h5>
                        <h5 class="">Add</h5>
                    </div>
                    <form action="{{ route('admin.registration.store') }}" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="name">Registration Path</label>
                                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name Registration Path">
                                                    @error('name')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="start_date">Start Date</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="start_date" value="{{ old('start_date') }}">
                                                                    @error('start_date')
                                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                        </div>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="start_time">Start Time</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="start_time" value="{{ old('start_time') }}">
                                                                    @error('start_time')
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
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="end_date">Enda Date</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="end_date" value="{{ old('end_date') }}">
                                                                    @error('end_date')
                                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                        </div>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="end_time">End Time</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="end_time" value="{{ old('end_time') }}">
                                                                    @error('end_time')
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
                                                <!-- Checkbox untuk Memilih Fakultas -->
                                                <div class="form-group mb-4">
                                                    <label class="text-label">Choose Departments</label>
                                                    <hr>
                                                    <div class="row scrollable-list">
                                                        @foreach($programs as $program)
                                                        <div class="col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="program_ids[]"
                                                                        value="{{ $program->id }}">
                                                                    &nbsp;{{ $program->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @error('program_ids')
                                                    <div
                                                        class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <!-- End Checkbox untuk Memilih Fakultas -->

                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description">Tagline</label>
                                                        <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Tagline Registration Path">
                                                        @error('description')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description</label>
                                                        <textarea id="editor1" name="content">{{ old('content') }}</textarea>
                                                        @error('content')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title1">Tagline About</label>
                                                        <input class="form-control" type="text" name="title1" value="{{ old('title1') }}" placeholder="Tagline About">
                                                        @error('title1')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description About</label>
                                                        <textarea id="editor2" name="description1">{{ old('description1') }}</textarea>
                                                        @error('description1')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title1">Tagline Mengapa</label>
                                                        <input class="form-control" type="text" name="title2" value="{{ old('title2') }}" placeholder="Tagline Mengapa">
                                                        @error('title2')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description Mengapa</label>
                                                        <textarea id="editor3" name="description2">{{ old('description2') }}</textarea>
                                                        @error('description2')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title1">Tagline Persyaratan</label>
                                                        <input class="form-control" type="text" name="title3" value="{{ old('title3') }}" placeholder="Tagline Persyaratan">
                                                        @error('title3')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description Persyaratan</label>
                                                        <textarea id="editor4" name="description3">{{ old('description3') }}</textarea>
                                                        @error('description3')
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="cta">Call To Action (CTA)</label>
                                                    <input class="form-control" type="text" name="cta" value="{{ old('cta') }}" placeholder="Call To Acction Name">
                                                    @error('cta')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="link">Link CTA</label>
                                                    <input class="form-control" type="text" name="link" value="{{ old('link') }}" placeholder="Link For CTA">
                                                    @error('link')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image">Image Tagline(Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="" id="image" name="image" />
                                                    @error('image')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image1">Image About (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="" id="image1" name="image1" />
                                                    @error('image1')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image2">Image Mengapa (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="" id="image2" name="image2" />
                                                    @error('image2')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image3">Image Persyaratan (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="" id="image3" name="image3" />
                                                    @error('image3')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="pricing">Pricing</label>
                                                    <input class="form-control" type="text" name="pricing" value="{{ old('pricing') }}" placeholder="Rp. ****">
                                                    @error('pricing')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="text-label" for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option class="py-1" value="" selected>Chouise Status</option>
                                                        <option class="py-1" value="Aktif" selected>Aktif</option>
                                                        <option class="py-1" value="Non-Aktif" selected>Non-Aktif</option>
                                                    </select>
                                                    @error('status')
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
                        <div class="flex justify-end mt-4">
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
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor4'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
@extends('layouts.app', ['title' => 'Edit Registration'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Edit Registration Path</h5>
                        <h5 class="">Update</h5>
                    </div>
                    <form action="{{ route('admin.registration.update', $registration->id) }}" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                        @csrf
                        @method('PUT')
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="name">Registration Path</label>
                                                    <input class="form-control" type="text" name="name" value="{{ old('name', $registration->name) }}" placeholder="Name Registration Path">
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
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="start_date" value="{{ old('start_date', $registration->start_date) }}">
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
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="start_time" value="{{ old('start_time', $registration->start_time) }}">
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
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="end_date" value="{{ old('end_date', $registration->end_date) }}">
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
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="end_time" value="{{ old('end_time', $registration->end_time) }}">
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
                                                <div class="form-group mb-4">
                                                    <label class="text-label">Choose Departments</label>
                                                    <hr>
                                                    <div class="row scrollable-list">
                                                        @foreach($programs as $program)
                                                        <div class="col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="program_ids[]" value="{{ $program->id }}" {{ in_array($program->id, $registration->programs->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    &nbsp;{{ $program->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="description">Tagline</label>
                                                    <input class="form-control" type="text" name="description" value="{{ old('description', $registration->description) }}" placeholder="Tagline Registration Path">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="content">Description</label>
                                                    <textarea id="editor1" name="content">{{ old('content', $registration->content) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="cta">Call To Action (CTA)</label>
                                                    <input class="form-control" type="text" name="cta" value="{{ old('cta', $registration->cta) }}" placeholder="Call To Action Name">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="link">Link CTA</label>
                                                    <input class="form-control" type="text" name="link" value="{{ old('link', $registration->link) }}" placeholder="Link For CTA">
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image">Image (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="{{ asset('storage/registration/' . $registration->image) }}" id="image" name="image" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="pricing">Pricing</label>
                                                    <input class="form-control" type="text" name="pricing" value="{{ old('pricing', $registration->pricing) }}" placeholder="Rp. ****">
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="text-label" for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="" {{ old('status', $registration->status) == '' ? 'selected' : '' }}>Choose Status</option>
                                                        <option value="Aktif" {{ old('status', $registration->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="Non-Aktif" {{ old('status', $registration->status) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary btn-rounded">Update</button>
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

@extends('layouts.app', ['title' => 'Faculties'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Faculty Details</h5>
                        <h5 class="">Add</h5>
                    </div>
                    <form action="{{ route('admin.fakultas.create.halaman-pertama') }}" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                                        <div class="steps clearfix">
                                            <ul role="tablist">
                                                <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0"><span class="current-info audible">current step: </span><span class="number">1.</span> Fakultas Description</a></li>
                                                <li role="tab" class="disabled" aria-disabled="tru"><a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1"><span class="number">2.</span> Fakultas Description</a></li>
                                                <li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2"><span class="number">3.</span> Fakultas Description</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="name">Name</label>
                                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name of Faculty">
                                                    @error('name')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="subtitle">Tagline</label>
                                                    <input class="form-control" type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Faculty Tagline">
                                                    @error('subtitle')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
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

                                                <div>Social Media Accounts</div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label" for="fb">Facebook</label>
                                                            <input class="form-control" type="text" name="fb" value="{{ old('fb') }}" placeholder="fbaccounts">
                                                            @error('fb')
                                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label" for="ig">Instagram</label>
                                                            <input class="form-control" type="text" name="ig" value="{{ old('ig') }}" placeholder="@igaccounts">
                                                            @error('ig')
                                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label" for="tt">Tiktok</label>
                                                            <input class="form-control" type="text" name="tt" value="{{ old('tt') }}" placeholder="@tiktokaccounts">
                                                            @error('tt')
                                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label" for="yt">Youtube</label>
                                                            <input class="form-control" type="text" name="yt" value="{{ old('yt') }}" placeholder="@youtubeaccounts">
                                                            @error('yt')
                                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="address">Address</label>
                                                    <textarea id="editor1" name="address">{{ old('address') }}</textarea>
                                                    @error('address')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="phone">Phone</label>
                                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="phone number">
                                                    @error('phone')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="email">Email</label>
                                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="your email account">
                                                    @error('email')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image1">Background Image (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="" id="image1" name="image1" />
                                                    @error('image1')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="id_yt">ID Youtube</label>
                                                    <input class="form-control" type="text" name="id_yt" value="{{ old('id_yt') }}" placeholder="ID Youtube">
                                                    @error('id_yt')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="text-label" for="leader">Faculty Leader</label>
                                                    <select class="form-control" name="ourteam_id">

                                                        @foreach($ourteams as $ourteam)
                                                        <option class="py-1" value="{{ $ourteam->id }}">{{ $ourteam->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ourteam_id')
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
                            <button type="submit" class="btn btn-primary btn-rounded">Next</button>
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
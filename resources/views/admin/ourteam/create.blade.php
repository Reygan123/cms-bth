@extends('layouts.app', ['title' => 'Our Teams'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-right">Add</h5>
                    <form action="{{ route('admin.ourteam.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-8">
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
                                            <label class="text-label" for="name">Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                            @error('name')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-label" for="title">Title</label>
                                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title">
                                            @error('title')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-label" for="email">Email</label>
                                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Ext. someone@domain.com ">
                                            @error('email')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="phone">Phone Number</label>
                                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Ext. 0811-1111-1111 ">
                                                    @error('phone')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="fb">Facebook ID</label>
                                                    <input class="form-control" type="text" name="fb" value="{{ old('fb') }}" placeholder="someone">
                                                    @error('fb')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="ig">Instagram ID</label>
                                                    <input class="form-control" type="text" name="ig" value="{{ old('ig') }}" placeholder="someone">
                                                    @error('ig')
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                        <div class="px-4 py-2">
                                                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                        </div>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="tt">Tiktok ID</label>
                                                    <input class="form-control" type="text" name="tt" value="{{ old('tt') }}" placeholder="@someone">
                                                    @error('tt')
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
                                    <div class="col-sm-4">
                                        <div class="mb-2 mt-4">
                                            <label class="text-gray-700" for="image">Upload Image (Max Size: 750kb)</label>
                                            <input type="file" class="dropify" data-default-file="" id="image" name="image" />
                                            @error('image')
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
@endsection
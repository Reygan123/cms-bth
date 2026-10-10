@extends('layouts.app', ['title' => 'Edit fakultas'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Edit fakultas Details</h5>
                    </div>
                    <form action="{{ route('admin.fakultas.edit.halaman-pertama', $fakultas->id) }}" method="POST" enctype="multipart/form-data" id="edit-form-horizontal" class="step-form-horizontal">
                        @csrf
                        @method('PUT')
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="name">Name</label>
                                                <input class="form-control" type="text" name="name" value="{{ old('name', $fakultas->name) }}" placeholder="Name of fakultas">
                                                @error('name')
                                                <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                    <div class="px-4 py-2">
                                                        <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                        <label class="text-label mb-2" for="color">Color Code Identities</label>
                                                        <div class="card">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <input
                                                                    id="color"
                                                                    class="form-control form-control-color"
                                                                    type="color"
                                                                    name="color"
                                                                    value="{{ old('color', $fakultas->color ?? '#4197CB') }}"
                                                                    oninput="document.getElementById('color-preview').textContent = this.value"
                                                                    style="width: 60px; height: 40px; border: none; cursor: pointer;"
                                                                >
                                                                <span id="color-preview" class="text-sm font-mono">
                                                                    {{ old('color', $fakultas->color ?? '#4197CB') }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                        @error('color')
                                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                                </div>
                                                            </div>
                                                        @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="subtitle">Tagline</label>
                                                <input class="form-control" type="text" name="subtitle" value="{{ old('subtitle', $fakultas->subtitle) }}" placeholder="fakultas Tagline">
                                                @error('subtitle')
                                                <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                    <div class="px-4 py-2">
                                                        <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="text-label">Choose Departments</label>
                                                <hr>
                                                <div class="row scrollable-list">
                                                    @foreach($programs as $program)
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="program_ids[]" value="{{ $program->id }}" {{ in_array($program->id, $fakultas->programs->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                &nbsp;{{ $program->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div>Social Media Accounts</div>
                                            <hr>
                                            <div class="row">
                                                @php
                                                    $socials = ['fb' => 'Facebook', 'ig' => 'Instagram', 'tt' => 'Tiktok', 'yt' => 'Youtube'];
                                                @endphp
                                                @foreach($socials as $key => $label)
                                                <div class="col-md-3">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="{{ $key }}">{{ $label }}</label>
                                                        <input class="form-control" type="text" name="{{ $key }}" value="{{ old($key, $fakultas->$key) }}" placeholder="{{ strtolower($label) }} accounts">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="text-label" for="address">Address</label>
                                                <textarea id="editor1" name="address">{{ old('address', $fakultas->address) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="phone">Phone</label>
                                                <input class="form-control" type="text" name="phone" value="{{ old('phone', $fakultas->phone) }}" placeholder="Phone number">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="email">Email</label>
                                                <input class="form-control" type="email" name="email" value="{{ old('email', $fakultas->email) }}" placeholder="Your email account">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label class="text-gray-700" for="image1">Background Image (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" id="image1" name="image1" data-default-file="{{ asset('storage/fakultas/' . $fakultas->image1) }}" />
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="id_yt">ID Youtube</label>
                                                <input class="form-control" type="text" name="id_yt" value="{{ old('id_yt', $fakultas->yt_id) }}" placeholder="ID Youtube">
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="text-label" for="leader">fakultas Leader</label>
                                                <select class="form-control" name="ourteam_id">
                                                    @foreach($ourteams as $ourteam)
                                                    <option value="{{ $ourteam->id }}" {{ $fakultas->ourteam_id == $ourteam->id ? 'selected' : '' }}>{{ $ourteam->name }}</option>
                                                    @endforeach
                                                </select>
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
    ClassicEditor.create(document.querySelector('#editor1')).catch(error => console.error(error));
</script>
@endsection
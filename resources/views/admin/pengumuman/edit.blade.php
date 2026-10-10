@extends('layouts.app', ['title' => 'Edit Pengumuman'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Edit Pengumuman</h4>
                        <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary btn-sm btn-rounded">
                            <i class="fa fa-arrow-left mr-1"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="title">Judul Pengumuman <span class="text-danger">*</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $pengumuman->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="category">Kategori</label>
                                    <select class="form-control" name="category">
                                        <option value="PMB" {{ old('category', $pengumuman->category) == 'PMB' ? 'selected' : '' }}>PMB</option>
                                        <option value="Akademik" {{ old('category', $pengumuman->category) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                        <option value="Kelulusan" {{ old('category', $pengumuman->category) == 'Kelulusan' ? 'selected' : '' }}>Kelulusan</option>
                                        <option value="Umum" {{ old('category', $pengumuman->category) == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="start_date">Tanggal Pengumuman</label>
                                    <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" value="{{ old('start_date', $pengumuman->start_date) }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="location">Lokasi / Kampus</label>
                                    <input class="form-control" type="text" name="location" value="{{ old('location', $pengumuman->location) }}">
                                    @error('location')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="contact">Kontak / Narahubung</label>
                                    <input class="form-control" type="text" name="contact" value="{{ old('contact', $pengumuman->contact) }}">
                                    @error('contact')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="file">Ganti File Lampiran (Biarkan kosong jika tidak diubah)</label>
                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                    @if ($pengumuman->file)
                                        <div class="mt-2">
                                            <span class="text-muted small">File saat ini:</span>
                                            <a href="{{ asset('storage/files/' . $pengumuman->file) }}" target="_blank" class="badge badge-info ml-1">
                                                <i class="fa fa-file-pdf mr-1"></i> {{ $pengumuman->file }}
                                            </a>
                                        </div>
                                    @endif
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                    <label class="text-label" for="content">Isi / Keterangan Pengumuman</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4">{{ old('content', $pengumuman->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-rounded px-4">
                                <i class="fa fa-save mr-1"></i> Perbarui Pengumuman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

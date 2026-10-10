@extends('layouts.app', ['title' => 'Tambah Pengumuman'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Tambah Pengumuman Baru</h4>
                        <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary btn-sm btn-rounded">
                            <i class="fa fa-arrow-left mr-1"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="title">Judul Pengumuman <span class="text-danger">*</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Pengumuman Kelulusan Jalur Reguler Gelombang I" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="category">Kategori</label>
                                    <select class="form-control" name="category">
                                        <option value="PMB" {{ old('category') == 'PMB' ? 'selected' : '' }}>PMB</option>
                                        <option value="Akademik" {{ old('category') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                        <option value="Kelulusan" {{ old('category') == 'Kelulusan' ? 'selected' : '' }}>Kelulusan</option>
                                        <option value="Umum" {{ old('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="start_date">Tanggal Pengumuman</label>
                                    <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" value="{{ old('start_date', date('Y-m-d')) }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="location">Lokasi / Kampus</label>
                                    <input class="form-control" type="text" name="location" value="{{ old('location', 'STIKes Budi Luhur Cimahi') }}" placeholder="STIKes Budi Luhur Cimahi">
                                    @error('location')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="contact">Kontak / Narahubung</label>
                                    <input class="form-control" type="text" name="contact" value="{{ old('contact', '081234567890') }}" placeholder="08xxxxxxxx">
                                    @error('contact')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="text-label" for="file">File Dokumen / Lampiran (PDF / Gambar / Doc, Max 10MB)</label>
                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                    <small class="text-muted">Format didukung: PDF, DOC, DOCX, JPG, PNG</small>
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                    <label class="text-label" for="content">Isi / Keterangan Pengumuman</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4" placeholder="Keterangan singkat pengumuman...">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-rounded px-4">
                                <i class="fa fa-save mr-1"></i> Simpan Pengumuman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

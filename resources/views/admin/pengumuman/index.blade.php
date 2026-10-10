@extends('layouts.app', ['title' => 'Pengumuman'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary btn-rounded">
                                <span class="btn-icon-left text-primary"><i class="fa-solid fa-plus"></i></span>Tambah Pengumuman
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('admin.pengumuman.index') }}" method="GET" class="d-flex">
                                <input class="form-control input-rounded" type="text" name="q" value="{{ request()->query('q') }}" placeholder="Cari judul atau kategori..." aria-label="Search">
                                <button class="btn btn-primary btn-rounded ml-4" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success mt-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mt-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive mt-4">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Judul & Kategori</th>
                                    <th>Lokasi</th>
                                    <th>File Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengumumans as $item)
                                <tr>
                                    <th>{{ $loop->iteration + ($pengumumans->currentPage() - 1) * $pengumumans->perPage() }}</th>
                                    <td>
                                        <span class="badge badge-info badge-rounded">
                                            {{ $item->start_date ? date('d M Y', strtotime($item->start_date)) : '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <h6 class="font-weight-bold mb-1">{{ $item->title }}</h6>
                                        <span class="badge badge-light">{{ $item->category ?? 'PMB' }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item->location ?? '-' }}</small>
                                    </td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ asset('storage/files/' . $item->file) }}" target="_blank" class="badge badge-secondary badge-rounded">
                                                <i class="fa-solid fa-file-pdf mr-1"></i> Unduh File
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="badge badge-primary mr-2 badge-rounded">Edit</a>
                                            <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge badge-danger badge-rounded border-0 text-white" style="cursor: pointer;">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="alert alert-info mb-0">Belum ada pengumuman tersedia. Silakan klik tombol "Tambah Pengumuman".</div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $pengumumans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

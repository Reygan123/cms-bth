@extends('layouts.app', ['title' => 'Achievements'])

@section('content')

<style>
    /* Membuat Select2 menjadi Rounded */
.select2-container .select2-selection--single {
    border-radius: 50px !important; /* Agar rounded */
    height: 40px !important; /* Sesuaikan tinggi */
    display: flex;
    align-items: center;
    padding: 5px 10px;
    border: 1px solid #ced4da !important;
}

/* Mengatur panah di Select2 agar posisinya bagus */
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 45% !important;
    right: 10px;
    transform: translateY(-50%) !important;
}
</style>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6">
                                <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary btn-rounded">
                                    <span class="btn-icon-left text-primary"><i class="fa-solid fa-pen-to-square"></i></span>
                                    Add Features
                                </a>
                            </div>
                            <div class="col-sm-6">
                            <form action="{{ route('admin.prestasi.index') }}" method="GET" class="d-flex">
                                <select name="program_id" class="js-example-basic-single form-control rounded-pill" onchange="this.form.submit()">
                                    <option value="">Semua Program</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}" {{ request('program_id') == $program->id ? 'selected' : '' }}>
                                            {{ $program->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input class="form-control input-rounded ml-2" type="text" name="q"
                                    value="{{ request()->query('q') }}" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary btn-rounded ml-2" type="submit">Search</button>
                            </form>
                            </div>
                        </div>

                        <div class="default-tab">
                            <div class="pt-4">
                                <table class="table table-responsive-sm">
                                    @foreach ($prestasis as $prestasi)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="prestasis[]" value="{{ $prestasi->id }}">
                                            </td>
                                            <td>
                                                <h6>{{ $prestasi->title }}</h6> 
                                                <div>{{ $prestasi->name }} | {{ $prestasi->categoriprestasi->name }}</div> 
                                                <div class="mt-4">
                                                    <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                                                    class="badge badge-primary mr-2 badge-rounded">Edit</a>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($prestasi->image && file_exists(public_path('storage/prestasis/' . $prestasi->image)))
                                                    <img src="{{ asset('storage/prestasis/' . $prestasi->image) }}"
                                                        alt="{{ $prestasi->title }}" class="admin-index-image">
                                                @else
                                                    <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                                        class="admin-edit-image">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <button id="delete-selected" class="btn btn-danger btn-rounded mx-4">
                                Delete Selected <span class="btn-icon-right"><i class="fa-solid fa-trash-can"></i></span>
                            </button>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $prestasis->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ajax delete selected
        document.getElementById('delete-selected').onclick = function() {
            var selectedprestasis = [];
            var checkboxes = document.getElementsByName('prestasis[]');
            var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

            for (var checkbox of checkboxes) {
                if (checkbox.checked) {
                    selectedprestasis.push(checkbox.value);
                }
            }

            if (selectedprestasis.length > 0) {
                Swal.fire({
                    title: 'APAKAH KAMU YAKIN ?',
                    text: "INGIN MENGHAPUS DATA INI!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'BATAL',
                    confirmButtonText: 'YA, HAPUS!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        jQuery.ajax({
                            url: '{{ route('admin.prestasi.massDestroy') }}',
                            data: {
                                "ids": selectedprestasis,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'BERHASIL!',
                                        text: 'DATA BERHASIL DIHAPUS!',
                                        showConfirmButton: false,
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'GAGAL!',
                                        text: 'DATA GAGAL DIHAPUS!',
                                        showConfirmButton: false,
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }
                })
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'PILIH DATA!',
                    text: 'PILIH DATA YANG INGIN DIHAPUS!',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    </script>

<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Pilih Program Studi',
    });
</script>
@endsection

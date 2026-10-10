@extends('layouts.app', ['title' => 'Unique Selling Proposition'])

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
                                <a href="{{ route('admin.unggulan.create') }}" class="btn btn-primary btn-rounded">
                                    <span class="btn-icon-left text-primary"><i class="fa-solid fa-pen-to-square"></i></span>
                                    Add USP
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{ route('admin.unggulan.index') }}" method="GET" class="d-flex">
                                <select name="program_id" class=" js-example-basic-single form-control rounded-pill" onchange="this.form.submit()" >
                                    <option value="">Semua Program</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}" 
                                                {{ request('program_id') == $program->id ? 'selected' : '' }}>
                                            {{ $program->name }}
                                        </option>
                                    @endforeach
                                </select>

                                    <input class="form-control input-rounded ml-4" type="text" name="q"
                                           value="{{ request()->query('q') }}" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-primary btn-rounded ml-4" type="submit">Search</button>                                   
                                </form>
                            </div>
                        </div>

                        
                        <div class="default-tab">
    <div class="pt-4">
        <table class="table table-responsive-sm">
            @foreach ($unggulans as $unggulan)
                <tr>
                    <td>
                        <input type="checkbox" name="unggulans[]" value="{{ $unggulan->id }}">
                    </td>
                    <td>
                        <h4>{{ $unggulan->title }}</h4>
                        {!! $unggulan->description !!}
                        <div class="mt-4">
                            <a href="{{ route('admin.unggulan.edit', $unggulan->id) }}"
                               class="badge badge-primary mr-2 badge-rounded">Edit</a>
                        </div>
                    </td>
                    <td>
                        @if ($unggulan->image && file_exists(public_path('storage/unggulans/' . $unggulan->image)))
                            <img src="{{ asset('storage/unggulans/' . $unggulan->image) }}"
                                 alt="{{ $unggulan->title }}" class="admin-index-image">
                        @else
                            <img src="{{ asset('storage/identities/no_image.jpg') }}"
                                 class="admin-edit-image">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $unggulans->links() }}
    </div>

    <button id="delete-selected" class="btn btn-danger btn-rounded mx-4">
        Delete Selected <span class="btn-icon-right"><i class="fa-solid fa-trash-can"></i></span>
    </button>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ajax delete selected
        document.getElementById('delete-selected').onclick = function() {
            var selectedunggulans = [];
            var checkboxes = document.getElementsByName('unggulans[]');
            var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

            for (var checkbox of checkboxes) {
                if (checkbox.checked) {
                    selectedunggulans.push(checkbox.value);
                }
            }

            if (selectedunggulans.length > 0) {
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
                            url: '{{ route('admin.unggulan.massDestroy') }}',
                            data: {
                                "ids": selectedunggulans,
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

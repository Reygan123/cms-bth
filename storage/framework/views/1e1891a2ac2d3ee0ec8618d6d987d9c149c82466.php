

<?php $__env->startSection('content'); ?>

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
                                <a href="<?php echo e(route('admin.prestasi.create')); ?>" class="btn btn-primary btn-rounded">
                                    <span class="btn-icon-left text-primary"><i class="fa-solid fa-pen-to-square"></i></span>
                                    Add Features
                                </a>
                            </div>
                            <div class="col-sm-6">
                            <form action="<?php echo e(route('admin.prestasi.index')); ?>" method="GET" class="d-flex">
                                <select name="program_id" class="js-example-basic-single form-control rounded-pill" onchange="this.form.submit()">
                                    <option value="">Semua Program</option>
                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($program->id); ?>" <?php echo e(request('program_id') == $program->id ? 'selected' : ''); ?>>
                                            <?php echo e($program->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input class="form-control input-rounded ml-2" type="text" name="q"
                                    value="<?php echo e(request()->query('q')); ?>" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary btn-rounded ml-2" type="submit">Search</button>
                            </form>
                            </div>
                        </div>

                        <div class="default-tab">
                            <div class="pt-4">
                                <table class="table table-responsive-sm">
                                    <?php $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="prestasis[]" value="<?php echo e($prestasi->id); ?>">
                                            </td>
                                            <td>
                                                <h6><?php echo e($prestasi->title); ?></h6> 
                                                <div><?php echo e($prestasi->name); ?> | <?php echo e($prestasi->categoriprestasi->name); ?></div> 
                                                <div class="mt-4">
                                                    <a href="<?php echo e(route('admin.prestasi.edit', $prestasi->id)); ?>"
                                                    class="badge badge-primary mr-2 badge-rounded">Edit</a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if($prestasi->image && ($prestasi->image && (file_exists(public_path('storage/' . $prestasi->image)) || file_exists(public_path('storage/prestasis/' . $prestasi->image)) || file_exists(public_path('storage/achievements/' . $prestasi->image))))): ?>
                                                    <img src="<?php echo e(asset(Str::startsWith($prestasi->image, ['http://', 'https://']) ? $prestasi->image : (Str::startsWith($prestasi->image, 'storage/') ? $prestasi->image : (Str::startsWith($prestasi->image, ['achievements/', 'prestasis/']) ? 'storage/' . $prestasi->image : 'storage/prestasis/' . $prestasi->image)))); ?>"
                                                        alt="<?php echo e($prestasi->title); ?>" class="admin-index-image">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                        class="admin-edit-image">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <button id="delete-selected" class="btn btn-danger btn-rounded mx-4">
                                Delete Selected <span class="btn-icon-right"><i class="fa-solid fa-trash-can"></i></span>
                            </button>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php echo e($prestasis->links()); ?>

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
                            url: '<?php echo e(route('admin.prestasi.massDestroy')); ?>',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Achievements'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project\pmb-unpas\STIKES PMB\cms-bth\resources\views/admin/prestasi/index.blade.php ENDPATH**/ ?>
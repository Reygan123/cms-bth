<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('admin.agenda.create')); ?>" class="btn btn-primary btn-rounded">
                                <span class="btn-icon-left text-primary"><i class="fa-solid fa-pen-to-square"></i></span>Add agenda
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <form action="<?php echo e(route('admin.agenda.index')); ?>" method="GET" class="d-flex">
                                <input class="form-control input-rounded" type="text" name="q" value="<?php echo e(request()->query('q')); ?>" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary btn-rounded ml-4" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Title & Description</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="agendas[]" value="<?php echo e($agenda->id); ?>">
                                    </th>
                                    <td>
                                        <h5><?php echo e($agenda->title); ?></h5>
                                        <div class="mb-4"><?php echo e(date('H.i A', strtotime($agenda->start_time))); ?>, <?php echo e(date('d M Y', strtotime($agenda->start_date))); ?> &nbsp - &nbsp<?php echo e(date('H.i A', strtotime($agenda->end_time))); ?>, <?php echo e(date('d M Y', strtotime($agenda->end_date))); ?></div>
                                        <div class="flex">
                                            <a href="<?php echo e(route('admin.agenda.edit', $agenda->id)); ?>" class="badge badge-primary mr-2 badge-rounded">Edit</a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($agenda->image && file_exists(public_path('storage/agendas/' . $agenda->image))): ?>
                                                    <img src="<?php echo e(asset('storage/agendas/' . $agenda->image)); ?>"
                                                        alt="<?php echo e($agenda->title); ?>" class="admin-index-image">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                        class="admin-edit-image">
                                                <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="bg-red text-white text-center">
                                    Data Belum Tersedia!
                                </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        
                        <div class="mt-4">
                            <button id="delete-selected" class="btn btn-danger btn-rounded mx-4">
                                Delete Selected <span class="btn-icon-right"><i class="fa-solid fa-trash-can"></i></span>
                            </button>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php echo e($agendas->links()); ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Select all checkboxes
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('agendas[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Ajax delete selected
    document.getElementById('delete-selected').onclick = function() {
        var selectedagendas = [];
        var checkboxes = document.getElementsByName('agendas[]');
        var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                selectedagendas.push(checkbox.value);
            }
        }

        if (selectedagendas.length > 0) {
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
                        url: '<?php echo e(route("admin.agenda.massDestroy")); ?>',
                        data: {
                            "ids": selectedagendas,
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Agenda'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/agenda/index.blade.php ENDPATH**/ ?>
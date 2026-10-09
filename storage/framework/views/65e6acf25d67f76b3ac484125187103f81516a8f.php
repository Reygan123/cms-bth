

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <a href="<?php echo e(route('admin.registration.create')); ?>" class="btn btn-primary btn-rounded">
                                    <span class="btn-icon-left text-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></span>Add Registration
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <form action="<?php echo e(route('admin.registration.index')); ?>" method="GET" class="d-flex">
                                    <input class="form-control input-rounded" type="text" name="q"
                                        value="<?php echo e(request()->query('q')); ?>" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-primary btn-rounded ml-4" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;"><input type="checkbox" id="select-all"></th>
                                        <th>Title & Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="faqs[]" value="<?php echo e($registration->id); ?>">
                                            </th>
                                            <td>
                                                <h6><?php echo e($registration->name); ?> <span class="badge badge-primary"><?php echo e($registration->start_date); ?> <?php echo e($registration->start_time); ?></span> s.d <span class="badge badge-danger"><?php echo e($registration->end_date); ?> <?php echo e($registration->end_time); ?></span> <span class="badge badge-success"><?php echo e($registration->status); ?></span></h6>
                                                <?php echo $registration->description; ?> 
                                                <?php echo $registration->content; ?> 
                                                <div class="flex mt-4">
                                                    <a href="<?php echo e(route('admin.registration.edit', $registration->id)); ?>"
                                                        class="badge badge-primary mr-2 badge-rounded">Edit</a>
                                                    <form action="<?php echo e(route('admin.registration.destroy', $registration->id)); ?>" 
                                                        method="POST" 
                                                        style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" 
                                                                class="badge badge-danger mr-2 badge-rounded border-0"
                                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
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
                                <!-- <button id="delete-selected" class="btn btn-danger btn-rounded mx-4">
                                    Delete Selected <span class="btn-icon-right"><i
                                            class="fa-solid fa-trash-can"></i></span>
                                </button> -->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <?php echo e($registrations->links('pagination::bootstrap-5')); ?>

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
            var checkboxes = document.getElementsByName('faqs[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }

        // Ajax delete selected
        document.getElementById('delete-selected').onclick = function() {
            var selectedfaqs = [];
            var checkboxes = document.getElementsByName('faqs[]');
            var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

            for (var checkbox of checkboxes) {
                if (checkbox.checked) {
                    selectedfaqs.push(checkbox.value);
                }
            }

            if (selectedfaqs.length > 0) {
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
                            url: '<?php echo e(route('admin.registration.massDestroy')); ?>',
                            data: {
                                "ids": selectedfaqs,
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
<?php echo $__env->make('layouts.app', ['title' => 'Registration'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/registration/index.blade.php ENDPATH**/ ?>
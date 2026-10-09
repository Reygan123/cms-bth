

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="flex" style="justify-content: space-between;">
                            <h5>Deskripsi Program</h5>
                            <h5 class="">Add</h5>
                        </div>
                        <form action="<?php echo e(route('admin.program.edit.halaman-kedua', $program->id)); ?>" method="POST"
                            enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <div role="application" class="wizard clearfix" id="steps-uid-0">
                                            <div class="steps clearfix">
                                                <ul role="tablist">
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-0" href="#steps-uid-0-h-0"
                                                            aria-controls="steps-uid-0-p-0"><span
                                                                class="current-info audible">current step: </span><span
                                                                class="number">1.</span> Program Description</a></li>
                                                    <li role="tab" class="first current" aria-disabled="false"
                                                        aria-selected="true"><a id="steps-uid-0-t-1" href="#steps-uid-0-h-1"
                                                            aria-controls="steps-uid-0-p-1"><span class="number">2.</span>
                                                            Program Description</a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-2" href="#steps-uid-0-h-2"
                                                            aria-controls="steps-uid-0-p-2"><span class="number">3.</span>
                                                            Program Description</a></li>
                                                </ul>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-9">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label">Supporting By</label>
                                                        <div class="row mt-2">
                                                            <?php $__currentLoopData = $dukungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dukungan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-sm-6">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="dukungan_ids[]"
                                                                               value="<?php echo e($dukungan->id); ?>"
                                                                               <?php echo e(in_array($dukungan->id, old('dukungan_ids', $program->dukungans->pluck('id')->toArray())) ? 'checked' : ''); ?>>
                                                                        <?php echo e($dukungan->title); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <?php $__errorArgs = ['dukungan_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                            <div class="px-4 py-2">
                                                                <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                            </div>
                                                        </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title2">Title Visi Misi</label>
                                                        <input class="form-control" type="text" name="title2"
                                                            value="<?php echo e(old('title2', $program->title2)); ?>"
                                                            placeholder="Title Section 2">
                                                        <?php $__errorArgs = ['title2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description2">Description Visi Misi</label>
                                                        <textarea id="editor1" name="description2"><?php echo e(old('description2', $program->description2)); ?></textarea>
                                                        <?php $__errorArgs = ['description2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="text-label" for="image2">Image 2</label>
                                                    <div class="form-group">
                                                        <?php if($program->image2 && file_exists(public_path('storage/programs/' . $program->image2))): ?>
                                                            <img src="<?php echo e(asset('storage/programs/' . $program->image2)); ?>"
                                                                alt="<?php echo e($program->name); ?>" class="admin-edit-image">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                                class="admin-edit-image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="mb-2 mt-4">
                                                        <label class="text-gray-700" for="image2">Upload Image 2 (Max
                                                            Size: 750kb)</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image2" name="image2" />
                                                        <?php $__errorArgs = ['image2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-9">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title3">Title Section 3</label>
                                                        <input class="form-control" type="text" name="title3"
                                                            value="<?php echo e(old('title3', $program->title3)); ?>"
                                                            placeholder="Title Section 3">
                                                        <?php $__errorArgs = ['title3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description3">Description Section
                                                            3</label>
                                                        <textarea id="editor2" name="description3"><?php echo e(old('description3', $program->description3)); ?></textarea>
                                                        <?php $__errorArgs = ['description3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="text-label" for="image3">Image 3</label>
                                                    <div class="form-group">
                                                        <?php if($program->image3 && file_exists(public_path('storage/programs/' . $program->image3))): ?>
                                                            <img src="<?php echo e(asset('storage/programs/' . $program->image3)); ?>"
                                                                alt="<?php echo e($program->name); ?>" class="admin-edit-image">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                                class="admin-edit-image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="mb-2 mt-4">
                                                        <label class="text-gray-700" for="image3">Upload Image 3 (Max
                                                            Size: 750kb)</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image3" name="image3" />
                                                        <?php $__errorArgs = ['image3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div
                                                                class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                <div class="px-4 py-2">
                                                                    <p class="text-gray-600 text-sm"><?php echo e($message); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>


                            <div class="flex justify-between mt-4">
                                <a href="<?php echo e(route('admin.program.edit.halaman-pertama', $program->id)); ?>"
                                    class="btn btn-light btn-rounded">Previous</a>
                                <button type="submit" class="btn btn-primary btn-rounded">Next</button>
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

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Departement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/program/edit_halaman_kedua.blade.php ENDPATH**/ ?>
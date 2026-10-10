

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
                        <form action="<?php echo e(route('admin.program.edit.halaman-ketiga', $program->id)); ?>" method="POST"
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
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-1" href="#steps-uid-0-h-1"
                                                            aria-controls="steps-uid-0-p-1"><span class="number">2.</span>
                                                            Program Description</a></li>
                                                    <li role="tab" class="third current" aria-disabled="false"
                                                        aria-selected="true"><a id="steps-uid-0-t-2" href="#steps-uid-0-h-2"
                                                            aria-controls="steps-uid-0-p-2"><span class="number">3.</span>
                                                            Program Description</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="title4">Title Section 4</label>
                                                        <input class="form-control" type="text" name="title4"
                                                            value="<?php echo e(old('title4', $program->title4)); ?>"
                                                            placeholder="Title Section 4">
                                                        <?php $__errorArgs = ['title4'];
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
                                                        <label class="text-label" for="description4">Description Section 4</label>
                                                        <textarea id="editor1" name="description4"><?php echo e(old('description4', $program->description4)); ?></textarea>
                                                        <?php $__errorArgs = ['description4'];
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
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="text-label" for="image4">Image Section 4</label>
                                                    <div class="form-group">
                                                        <?php if($program->image4 && file_exists(public_path('storage/programs/' . $program->image4))): ?>
                                                        <img src="<?php echo e(asset('storage/programs/' . $program->image4)); ?>"
                                                            alt="<?php echo e($program->name); ?>" class="admin-edit-image">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                            class="admin-edit-image">
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="mb-2 mt-4">
                                                        <label class="text-gray-700" for="image4">Upload Image (Max
                                                            Size: 750kb)</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image4" name="image4" />
                                                        <?php $__errorArgs = ['image4'];
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
                                            
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="content">CTA Description</label>
                                                <textarea id="editor2" name="content"><?php echo e(old('content', $program->content)); ?></textarea>
                                                <?php $__errorArgs = ['content'];
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
                                                <label class="text-label" for="cta">CTA Button Text</label>
                                                <input class="form-control" type="text" name="cta"
                                                    value="<?php echo e(old('cta', $program->cta)); ?>" placeholder="Call to Action">
                                                <?php $__errorArgs = ['cta'];
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="link_program">Link CTA</label>
                                                        <input class="form-control" type="text" name="link_program"
                                                            value="<?php echo e(old('link_program', $program->link_program)); ?>"
                                                            placeholder="Link Call to Action">
                                                        <?php $__errorArgs = ['link_program'];
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
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="brosur">Link Brochure</label>
                                                        <input class="form-control" type="text" name="brosur"
                                                            value="<?php echo e(old('brosur', $program->brosur)); ?>"
                                                            placeholder="Link untuk brosur">
                                                        <?php $__errorArgs = ['brosur'];
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
                                <a href="<?php echo e(route('admin.program.edit.halaman-kedua', $program->id)); ?>"
                                    class="btn btn-light btn-rounded">Previous</a>
                                <button type="submit" class="btn btn-primary btn-rounded">Save</button>
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
            ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#editor4'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Departement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/program/edit_halaman_ketiga.blade.php ENDPATH**/ ?>
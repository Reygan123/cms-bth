

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="flex" style="justify-content: space-between;">
                            <h5>Deskripsi Program</h5>
                            <h5 class="">Edit</h5>
                        </div>
                        <form action="<?php echo e(route('admin.program.edit.halaman-pertama', $program->id)); ?>" method="POST"
                            enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <div role="application" class="wizard clearfix" id="steps-uid-0">
                                            <div class="steps clearfix">
                                                <ul role="tablist">
                                                    <li role="tab" class="first current" aria-disabled="false"
                                                        aria-selected="true"><a id="steps-uid-0-t-0" href="#steps-uid-0-h-0"
                                                            aria-controls="steps-uid-0-p-0"><span
                                                                class="current-info audible">current step: </span><span
                                                                class="number">1.</span> Program Description</a></li>
                                                    <li role="tab" class="disabled" aria-disabled="tru"><a
                                                            id="steps-uid-0-t-1" href="#steps-uid-0-h-1"
                                                            aria-controls="steps-uid-0-p-1"><span class="number">2.</span>
                                                            Program Description</a></li>
                                                    <li role="tab" class="disabled" aria-disabled="true"><a
                                                            id="steps-uid-0-t-2" href="#steps-uid-0-h-2"
                                                            aria-controls="steps-uid-0-p-2"><span class="number">3.</span>
                                                            Program Description</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="name">Program Studi</label>
                                                        <input class="form-control" type="text" name="name"
                                                            value="<?php echo e(old('name', $program->name)); ?>"
                                                            placeholder="Name of Program">
                                                        <?php $__errorArgs = ['name'];
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
                                                        <label class="text-label mb-2" for="color">Color Code Identities</label>
                                                        <div class="card">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <input
                                                                    id="color"
                                                                    class="form-control form-control-color"
                                                                    type="color"
                                                                    name="color"
                                                                    value="<?php echo e(old('color', $program->color ?? '#4197CB')); ?>"
                                                                    oninput="document.getElementById('color-preview').textContent = this.value"
                                                                    style="width: 60px; height: 40px; border: none; cursor: pointer;"
                                                                >
                                                                <span id="color-preview" class="text-sm font-mono">
                                                                    <?php echo e(old('color', $program->color ?? '#4197CB')); ?>

                                                                </span>
                                                            </div>
                                                        </div>

                                                        <?php $__errorArgs = ['color'];
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
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label class="text-label" for="age">Mahasiswa</label>
                                                                <input class="form-control" type="text" name="age"
                                                                    value="<?php echo e(old('age', $program->age)); ?>"
                                                                    placeholder="Student age range">
                                                                <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div
                                                                        class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm"><?php echo e($message); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label class="text-label" for="weekly">Lulusan</label>
                                                                <input class="form-control" type="text" name="weekly"
                                                                    value="<?php echo e(old('weekly', $program->weekly)); ?>"
                                                                    placeholder="Number of weekly meets">
                                                                <?php $__errorArgs = ['weekly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div
                                                                        class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm">
                                                                                <?php echo e($message); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label class="text-label" for="periode">Karya</label>
                                                                <input class="form-control" type="text" name="periode"
                                                                    value="<?php echo e(old('periode', $program->periode)); ?>"
                                                                    placeholder="Meeting duration in a day ">
                                                                <?php $__errorArgs = ['periode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div
                                                                        class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm">
                                                                                <?php echo e($message); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label class="text-label" for="class_size">Prestasi</label>
                                                                <input class="form-control" type="text"
                                                                    name="class_size"
                                                                    value="<?php echo e(old('class_size', $program->class_size)); ?>"
                                                                    placeholder="Number of student in a class">
                                                                <?php $__errorArgs = ['class_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div
                                                                        class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                                        <div class="px-4 py-2">
                                                                            <p class="text-gray-600 text-sm">
                                                                                <?php echo e($message); ?></p>
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
                                                        <label class="text-label" for="title1">Headline</label>
                                                        <input class="form-control" type="text" name="title1"
                                                            value="<?php echo e(old('title1', $program->title1)); ?>"
                                                            placeholder="Title Section 1">
                                                        <?php $__errorArgs = ['title1'];
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
                                                        <label class="text-label" for="description1">Sub Headline
                                                            1</label>
                                                        <textarea id="editor1" name="description1"><?php echo e(old('description1', $program->description1)); ?></textarea>
                                                        <?php $__errorArgs = ['description1'];
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
                                                    <div class="form-group">
                                                        <label class="text-label" for="name">Program's Leader</label>
                                                        <select class="js-example-basic-single form-control" name="ourteam_id">

                                                            <?php $__currentLoopData = $ourteams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ourteam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option class="py-1" value="<?php echo e($ourteam->id); ?>"
                                                                    <?php if($program->ourteam_id == $ourteam->id): ?> selected <?php endif; ?>>
                                                                    <?php echo e($ourteam->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php $__errorArgs = ['ourteam_id'];
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
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <?php if($program->image_head && file_exists(public_path('storage/programs/' . $program->image_head))): ?>
                                                            <img src="<?php echo e(asset('storage/programs/' . $program->image_head)); ?>"
                                                                alt="<?php echo e($program->name); ?>" class="admin-edit-image">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                                class="admin-edit-image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="mb-4 mt-4">
                                                        <label class="text-gray-700" for="image_head">Cover Headline</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image_head" name="image_head" />
                                                        <?php $__errorArgs = ['image_head'];
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
                                                    <div class="form-group">
                                                        <?php if($program->image1 && file_exists(public_path('storage/programs/' . $program->image1))): ?>
                                                            <img src="<?php echo e(asset('storage/programs/' . $program->image1)); ?>"
                                                                alt="<?php echo e($program->name); ?>" class="admin-edit-image">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                                class="admin-edit-image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="mb-4 mt-4">
                                                        <label class="text-gray-700" for="image1">Upload Image (Max
                                                            Size: 750kb)</label>
                                                        <input type="file" class="dropify" data-default-file=""
                                                            id="image1" name="image1" />
                                                        <?php $__errorArgs = ['image1'];
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
                                                        <?php if($program->id_yt !== null): ?>
                                                            <iframe width="100%" height="250"
                                                                src="https://www.youtube.com/embed/<?php echo e($program->id_yt); ?>?autoplay=1&mute=1">
                                                            </iframe>
                                                        <?php endif; ?>

                                                        <label class="text-label" for="id_yt">ID Youtube</label>
                                                        <input class="form-control" type="text" name="id_yt"
                                                            value="<?php echo e(old('id_yt', $program->id_yt)); ?>"
                                                            placeholder="ID Youtube">
                                                        <?php $__errorArgs = ['id_yt'];
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

                            <div class="flex justify-end mt-4">
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
    </script>
    <script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an option',
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Departement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/program/edit_halaman_pertama.blade.php ENDPATH**/ ?>
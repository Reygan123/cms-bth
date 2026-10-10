

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex" style="justify-content: space-between;">
                        <h5>Edit Registration Path</h5>
                        <h5 class="">Update</h5>
                    </div>
                    <form action="<?php echo e(route('admin.registration.update', $registration->id)); ?>" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="name">Registration Path</label>
                                                    <input class="form-control" type="text" name="name" value="<?php echo e(old('name', $registration->name)); ?>" placeholder="Name Registration Path">
                                                    <?php $__errorArgs = ['name'];
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
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="start_date">Start Date</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="start_date" value="<?php echo e(old('start_date', $registration->start_date)); ?>">
                                                                    <?php $__errorArgs = ['start_date'];
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
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="start_time">Start Time</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="start_time" value="<?php echo e(old('start_time', $registration->start_time)); ?>">
                                                                    <?php $__errorArgs = ['start_time'];
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
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="end_date">Enda Date</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="date" name="end_date" value="<?php echo e(old('end_date', $registration->end_date)); ?>">
                                                                    <?php $__errorArgs = ['end_date'];
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
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="text-label" for="end_time">End Time</label>
                                                                    <input class="form-control" placeholder="2017-06-04" type="time" name="end_time" value="<?php echo e(old('end_time', $registration->end_time)); ?>">
                                                                    <?php $__errorArgs = ['end_time'];
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label">Choose Departments</label>
                                                    <hr>
                                                    <div class="row scrollable-list">
                                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="program_ids[]" value="<?php echo e($program->id); ?>" <?php echo e(in_array($program->id, $registration->programs->pluck('id')->toArray()) ? 'checked' : ''); ?>>
                                                                    &nbsp;<?php echo e($program->name); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description">Tagline</label>
                                                        <input class="form-control" type="text" name="description" value="<?php echo e(old('description', $registration->description)); ?>" placeholder="Tagline Registration Path">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description</label>
                                                        <textarea id="editor1" name="content"><?php echo e(old('content', $registration->content)); ?></textarea>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description">Tagline About</label>
                                                        <input class="form-control" type="text" name="title1" value="<?php echo e(old('description', $registration->title1)); ?>" placeholder="Tagline About">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description About</label>
                                                        <textarea id="editor2" name="description1"><?php echo e(old('content', $registration->description1)); ?></textarea>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description">Tagline Mengapa</label>
                                                        <input class="form-control" type="text" name="title2" value="<?php echo e(old('description', $registration->title2)); ?>" placeholder="Tagline Mengapa">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description Mengapa</label>
                                                        <textarea id="editor3" name="description2"><?php echo e(old('content', $registration->description2)); ?></textarea>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="description">Tagline Persyaratan</label>
                                                        <input class="form-control" type="text" name="title3" value="<?php echo e(old('description', $registration->title3)); ?>" placeholder="Tagline Persyaratan">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="text-label" for="content">Description Persyaratan</label>
                                                        <textarea id="editor4" name="description3"><?php echo e(old('content', $registration->description3)); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="cta">Call To Action (CTA)</label>
                                                    <input class="form-control" type="text" name="cta" value="<?php echo e(old('cta', $registration->cta)); ?>" placeholder="Call To Action Name">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="link">Link CTA</label>
                                                    <input class="form-control" type="text" name="link" value="<?php echo e(old('link', $registration->link)); ?>" placeholder="Link For CTA">
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image">Image Tagline (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="<?php echo e(asset('storage/registration/' . $registration->image)); ?>" id="image" name="image" />
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image1">Image About (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="<?php echo e(asset('storage/registration/' . $registration->image1)); ?>" id="image" name="image1" />
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image2">Image Mengapa (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="<?php echo e(asset('storage/registration/' . $registration->image2)); ?>" id="image" name="image2" />
                                                </div>
                                                <div class="mb-4 mt-4">
                                                    <label class="text-gray-700" for="image3">Image Persyaratan (Max Size: 750kb)</label>
                                                    <input type="file" class="dropify" data-default-file="<?php echo e(asset('storage/registration/' . $registration->image3)); ?>" id="image" name="image3" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="text-label" for="pricing">Pricing</label>
                                                    <input class="form-control" type="text" name="pricing" value="<?php echo e(old('pricing', $registration->pricing)); ?>" placeholder="Rp. ****">
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="text-label" for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="" <?php echo e(old('status', $registration->status) == '' ? 'selected' : ''); ?>>Choose Status</option>
                                                        <option value="Aktif" <?php echo e(old('status', $registration->status) == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                                                        <option value="Non-Aktif" <?php echo e(old('status', $registration->status) == 'Non-Aktif' ? 'selected' : ''); ?>>Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary btn-rounded">Update</button>
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
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor4'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Edit Registration'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/registration/edit.blade.php ENDPATH**/ ?>
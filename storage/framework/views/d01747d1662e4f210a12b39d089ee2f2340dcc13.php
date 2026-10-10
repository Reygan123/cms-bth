<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-right">Edit</h4>
                    <form action="<?php echo e(route('admin.legal.update', $legal->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="text-label" for="title">Legal's Title</label>
                                            <input class="form-control" type="text" name="title" value="<?php echo e(old('title', $legal->title)); ?>" placeholder="Judul Legal">
                                            <?php $__errorArgs = ['title'];
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
                                            <label class="text-label" for="name">Description</label>
                                            <textarea id="editor1" name="description" rows="15"><?php echo e(old('description', $legal->description)); ?></textarea>
                                            <?php $__errorArgs = ['description'];
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
                                        <div class="form-group">
                                            <label class="text-label" for="file">File</label>
                                            <input class="form-control" type="file" name="file" value="<?php echo e(old('file', $legal->file)); ?>" placeholder="Judul Legal">
                                            <?php $__errorArgs = ['file'];
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
                                        <?php if($legal->file): ?>
                                            <?php if(Str::endsWith($legal->file, ['jpg', 'jpeg', 'png', 'webp'])): ?>
                                                <img src="<?php echo e(asset('storage/files/' . $legal->file)); ?>" alt="File" width="200">
                                            <?php else: ?>
                                                <a href="<?php echo e(asset('storage/files/' . $legal->file)); ?>" target="_blank" class="btn btn-primary">
                                                    Lihat / Download File
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-4">
                                            <?php if($legal->image): ?>
                                            <img src="<?php echo e(asset('storage/identities/' . $legal->image)); ?>" alt="<?php echo e($legal->title); ?>" class="admin-edit-image">
                                            <?php else: ?>
                                            <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>" class="admin-edit-image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4">
                                            <label class="text-gray-700" for="image">Upload Image (Max Size: 750kb)</label>
                                            <input type="file" class="dropify" data-default-file="" id="image" name="image" />
                                            <?php $__errorArgs = ['image'];
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

                        <div class="flex justify-start mt-4">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'Legal Certificates'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/legal/edit.blade.php ENDPATH**/ ?>
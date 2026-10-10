<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Edit</h5>
                        <form action="<?php echo e(route('admin.slider.update', $slider->id)); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-4">
                                                <input type="checkbox" name="home" id="home" value="1" <?php echo e(old('home', $slider->home) ? 'checked' : ''); ?>>
                                                <label for="home"> Display on Homepage</label>
                                            </div>
                                            <?php $__errorArgs = ['home'];
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
                                            <div class="form-group">
                                                <label class="text-label" for="program_id">Program Name</label>
                                                <select class="form-control" name="program_id">

                                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option class="py-1" value="<?php echo e($program->id); ?>"
                                                            <?php if($slider->program_id == $program->id): ?> selected <?php endif; ?>>
                                                            <?php echo e($program->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['program_id'];
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
                                                <label class="text-label" for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="<?php echo e(old('title', $slider->title)); ?>">
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden">
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
                                                <label class="text-label" for="description">Subtitle</label>
                                                <textarea id="editor1" name="description" rows="5"><?php echo e(old('description', $slider->description)); ?></textarea>
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
                                            <div class="form-group mb-4">
                                                <label class="text-label" for="button">Button Text</label>
                                                <input class="form-control" type="text" name="button"
                                                    value="<?php echo e(old('button', $slider->button)); ?>" placeholder="Button Text">
                                                <?php $__errorArgs = ['button'];
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
                                                <label class="text-label" for="link">URL Link</label>
                                                <input class="form-control" type="text" name="link"
                                                    value="<?php echo e(old('link', $slider->link)); ?>" placeholder="Url">
                                                <?php $__errorArgs = ['link'];
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
                                            <div class="mb-2 mt-4">
                                                <?php if($slider->image): ?>
                                                    <img src="<?php echo e(asset('storage/sliders/' . $slider->image)); ?>"
                                                        alt="<?php echo e($slider->title); ?>" class="admin-edit-image">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                        class="admin-edit-image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar Dekstop Slider (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image"
                                                    name="image" />
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
                                            <div class="mb-2 mt-4">
                                                <?php if($slider->image2): ?>
                                                    <img src="<?php echo e(asset('storage/sliders/' . $slider->image2)); ?>"
                                                        alt="<?php echo e($slider->title); ?>" class="admin-edit-image">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/identities/no_image.jpg')); ?>"
                                                        class="admin-edit-image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-gray-700" for="image">Gambar Mobile Slider (Max Size: 750kb)</label>
                                                <input type="file" class="dropify" data-default-file="" id="image"
                                                    name="image2" />
                                                <?php $__errorArgs = ['image2'];
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
                                            <div class="mb-2 mt-4">
                                                <?php if($slider->yt_id): ?>
                                                    <div class="mb-2 mt-4">
                                                        <iframe width="100%" height="315"
                                                            src="https://www.youtube.com/embed/<?php echo e($slider->yt_id); ?>"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                            <div class="mb-2 mt-4">
                                                <label class="text-label" for="yt_id">Youtube ID</label>
                                                <input class="form-control" type="text" name="yt_id"
                                                    value="<?php echo e(old('yt_id', $slider->yt_id)); ?>" maxlength="11">
                                                <?php $__errorArgs = ['yt_id'];
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
                    </div>

                    <div class="flex justify-start mt-4">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
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

<?php echo $__env->make('layouts.app', ['title' => 'Sliders'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms.pmb.universitas-bth.ac.id/resources/views/admin/slider/edit.blade.php ENDPATH**/ ?>
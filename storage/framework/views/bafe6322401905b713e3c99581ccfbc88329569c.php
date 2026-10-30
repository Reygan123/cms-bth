


<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Navigation</li>
            <li><a href="<?php echo e(route('admin.dashboard.index')); ?>"><i class="mdi mdi-home"></i><span
                        class="nav-text">Home</span></a></li>


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="mdi mdi-file-document-box"></i><span class="nav-text">Blog & Pengumuman</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.post.index')); ?>">Posts</a></li>
                    <li><a href="<?php echo e(route('admin.agenda.index')); ?>">Agenda</a></li>
                    <li><a href="<?php echo e(route('admin.pengumuman.index')); ?>">Pengumuman</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                        class="nav-text">Services</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.fakultas.index')); ?>">Faculties</a></li>
                    <li><a href="<?php echo e(route('admin.program.index')); ?>">Departements</a></li>
                    <li><a href="<?php echo e(route('admin.registration.index')); ?>">Registrations</a></li>
                    <li><a href="<?php echo e(route('admin.unggulan.index')); ?>">USP</a></li>
                    <li><a href="<?php echo e(route('admin.facility.index')); ?>">Facilities</a></li>
                    <li><a href="<?php echo e(route('admin.prestasi.index')); ?>">Achivments</a></li>
                    
                    
                    <li><a href="<?php echo e(route('admin.organisasi.index')); ?>">Student Activties</a></li>
                    <li><a href="<?php echo e(route('admin.testimony.index')); ?>">Testimonies</a></li>
                    <li><a href="<?php echo e(route('admin.portofolio.index')); ?>">Portofolios</a></li>
                    <li><a href="<?php echo e(route('admin.dukungan.index')); ?>">Supports</a></li>
                    <li><a href="<?php echo e(route('admin.akademik.index')); ?>">Kalender Akademik</a></li>
                    <li><a href="<?php echo e(route('admin.faq.index')); ?>">FAQs</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                        class="nav-text">Profil</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.about.index')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(route('admin.ourteam.index')); ?>">Our Teams</a></li>
                    <li><a href="<?php echo e(route('admin.svg.edit', 1)); ?>">Data</a></li>
                    <li><a href="<?php echo e(route('admin.legal.index')); ?>">Legals Document</a></li>
                    <li><a href="<?php echo e(route('admin.partner.index')); ?>">Partners</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="mdi mdi-power-plug"></i><span class="nav-text">Setting</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.identity.edit', 1)); ?>">Identity</a></li>
                    <li><a href="<?php echo e(route('admin.header.index')); ?>">Header</a></li>
                    <li><a href="<?php echo e(route('admin.sidebanner.edit', 1)); ?>">Side Banner</a></li>
                    <li><a href="<?php echo e(route('admin.slider.index')); ?>">Slider</a></li>
                    <li><a href="<?php echo e(route('admin.pixel.edit', 1)); ?>">Meta Pixel</a></li>
                    <li><a href="<?php echo e(route('admin.ganalytics.edit', 1)); ?>">Google Analytics</a></li>
                    <li><a href="<?php echo e(route('admin.welcomechat.edit', 1)); ?>">Welcome Chat</a></li>
                    <li><a href="<?php echo e(route('admin.profile.index')); ?>">User</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\Project\pmb-unpas\STIKES PMB\cms-bth\resources\views/layouts/nav.blade.php ENDPATH**/ ?>
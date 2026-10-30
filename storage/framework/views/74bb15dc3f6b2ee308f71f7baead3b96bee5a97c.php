

<?php $__env->startSection('content'); ?>

<!-- Bootstrap 5 dan Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container mt-5">
  <div class="row g-4">

    <!-- Fakultas -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
          <div class="bg-light p-3 rounded-circle me-3">
            <i class="bi bi-building fs-3 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-1 text-muted">Total Fakultas</h6>
            <h4 class="mb-0 fw-semibold"><?php echo e($fakultasCount); ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Departemen -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
          <div class="bg-light p-3 rounded-circle me-3">
            <i class="bi bi-diagram-3 fs-3 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-1 text-muted">Total Departemen</h6>
            <h4 class="mb-0 fw-semibold"><?php echo e($programCount); ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Registrasi -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
          <div class="bg-light p-3 rounded-circle me-3">
            <i class="bi bi-journal-check fs-3 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-1 text-muted">Registration Path</h6>
            <h4 class="mb-0 fw-semibold"><?php echo e($registrationCount); ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Fasilitas -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
          <div class="bg-light p-3 rounded-circle me-3">
            <i class="bi bi-hospital fs-3 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-1 text-muted">Fasilitas</h6>
            <h4 class="mb-0 fw-semibold"><?php echo e($facilityCount); ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Partners -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
          <div class="bg-light p-3 rounded-circle me-3">
            <i class="bi bi-people fs-3 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-1 text-muted">Partners</h6>
            <h4 class="mb-0 fw-semibold"><?php echo e($partnerCount); ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Aktivitas Organisasi -->
<div class="col-md-4">
  <div class="card border-0 shadow-sm">
    <div class="card-body d-flex align-items-center">
      <div class="bg-light p-3 rounded-circle me-3">
        <i class="bi bi-calendar-event fs-3 text-primary"></i>
      </div>
      <div>
        <h6 class="mb-1 text-muted">USP</h6>
        <h4 class="mb-0 fw-semibold"><?php echo e($unggulanCount); ?></h4>
      </div>
    </div>
  </div>
</div>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project\pmb-unpas\STIKES PMB\cms-bth\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>
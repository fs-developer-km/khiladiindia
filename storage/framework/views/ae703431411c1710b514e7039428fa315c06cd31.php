<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(!empty($pageHeading) ? $pageHeading->job_page_title : __('Job Listings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_jobs); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_jobs); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Add top spacing to prevent overlap with fixed header -->
<div class="listing-map-area" style="padding-top: 120px;">
  <div class="container">
    <div class="row">

   
      <!-- Job Listings -->
      <div class="col-xl-9" data-aos="fade-up">

        <!-- Sorting Options -->
        <div class="product-sort-area pb-15">
          <div class="row align-items-center">
            <div class="col-4 d-xl-none">
              <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#widgetOffcanvas" aria-controls="widgetOffcanvas">
                Filter <i class="fal fa-filter"></i>
              </button>
            </div>
            <div class="col-sm-8 col-xl-12">
              <div class="sort-item d-flex align-items-center justify-content-sm-end mb-20">
                <form>
                  <label class="color-dark me-2"><?php echo e(__('Sort By')); ?>:</label>
                  <select name="select_sort" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option <?php echo e(request()->input('sort') == 'new' ? 'selected' : ''); ?> value="new">Newest</option>
                    <option <?php echo e(request()->input('sort') == 'old' ? 'selected' : ''); ?> value="old">Oldest</option>
                    <option <?php echo e(request()->input('sort') == 'salary_low' ? 'selected' : ''); ?> value="salary_low">Salary: Low to High</option>
                    <option <?php echo e(request()->input('sort') == 'salary_high' ? 'selected' : ''); ?> value="salary_high">Salary: High to Low</option>
                  </select>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Job Grid -->
        <div class="search-container">
          <?php if($jobs->count() < 1): ?>
            <div class="p-4 text-center bg-light rounded">
              <h3 class="mb-0"><?php echo e(__('No Jobs Found')); ?></h3>
            </div>
          <?php else: ?>
            <div class="row g-4">
              <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                  <div class="card h-100 border shadow-sm rounded">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title mb-2">
                        <a href="<?php echo e(route('frontend.jobs.show', $job->id)); ?>" class="text-decoration-none"><?php echo e($job->title); ?></a>
                      </h5>
                      <p class="card-text mb-1"><?php echo e(Str::limit($job->description, 100)); ?></p>
                      <p class="mb-1"><strong><?php echo e(__('Location')); ?>:</strong> <?php echo e($job->location); ?></p>
                      <?php if($job->salary): ?>
                        <p class="mb-1"><strong><?php echo e(__('Salary')); ?>:</strong> <?php echo e($job->salary); ?></p>
                      <?php endif; ?>
                      <p class="mb-1"><strong><?php echo e(__('Deadline')); ?>:</strong> <?php echo e($job->deadline ? $job->deadline->format('d M, Y') : __('N/A')); ?></p>

                      <?php $user_id = Auth::check() ? Auth::id() : null; ?>
                      <a href="<?php echo e($user_id ? ($job->wishlistedByUser($user_id) ? route('remove.jobwishlist', $job->id) : route('addto.jobwishlist', $job->id)) : '#'); ?>"
                         class="btn btn-outline-primary btn-sm mt-auto">
                        <i class="fal fa-heart me-1"></i> <?php echo e($user_id && $job->wishlistedByUser($user_id) ? __('Saved') : __('Save Job')); ?>

                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper mt-4">
              <?php echo e($jobs->links()); ?>

            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/jobs/index.blade.php ENDPATH**/ ?>
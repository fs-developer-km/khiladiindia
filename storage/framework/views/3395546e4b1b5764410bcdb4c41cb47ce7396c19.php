<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->blog_page_title); ?>

  <?php else: ?>
    <?php echo e(__('Posts')); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_blog); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_blog); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page title start-->
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->blog_page_title : __('Blog'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->blog_page_title : __('Blog'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Page title end-->
  <!-- Blog-area start -->
  <section class="blog-area ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <?php if(count($blogs) == 0): ?>
              <h3 class="text-center"><?php echo e(__('NO POST FOUND') . '!'); ?></h3>
            <?php else: ?>
              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                  <article class="card mb-25">
                    <div class="card-img radius-md">
                      <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>"
                        class="lazy-container ratio ratio-16-10">
                        <img class="lazyload" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/blogs/' . $blog->image)); ?>" alt="Blog Image">
                      </a>
                    </div>
                    <div class="content">
                      <h3 class="card-title">
                        <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>">
                          <?php echo e(@$blog->title); ?>

                        </a>
                      </h3>
                      <p class="card-text">
                        <?php echo e(strlen(strip_tags(convertUtf8($blog->content))) > 100 ? substr(strip_tags(convertUtf8($blog->content)), 0, 100) . '...' : strip_tags(convertUtf8($blog->content))); ?>

                      </p>
                      <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>"
                        class="card-btn"><?php echo e(__('Read More')); ?></a>
                    </div>
                  </article>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="pagination mt-20 justify-content-center" data-aos="fade-up">
        <?php echo e($blogs->links()); ?>

      </div>
    </div>
    <?php if(!empty(showAd(3))): ?>
      <div class="text-center mt-40">
        <?php echo showAd(3); ?>

      </div>
    <?php endif; ?>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/journal/blog.blade.php ENDPATH**/ ?>
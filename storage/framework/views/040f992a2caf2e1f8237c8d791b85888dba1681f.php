<?php
  $title = strlen($details->title) > 40 ? mb_substr($details->title, 0, 40, 'UTF-8') . '...' : $details->title;
?>
<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($title)): ?>
    <?php echo e($title ? $title : $pageHeading->blog_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php echo e($details->meta_keywords); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php echo e($details->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page title start-->
  <?php if ($__env->exists('frontend.partials.details-breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'heading' => @$details->title,
      'title' => !empty($pageHeading) ? $pageHeading->blog_page_title : 'Blog',
  ])) echo $__env->make('frontend.partials.details-breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'heading' => @$details->title,
      'title' => !empty($pageHeading) ? $pageHeading->blog_page_title : 'Blog',
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Page title end-->

  <!-- Blog-details-area start -->
  <div class="blog-details-area pt-100 pb-60">
    <div class="container">
      <div class="row justify-content-center gx-xl-5">
        <div class="col-lg-8">
          <div class="blog-description mb-40">
            <article class="item-single">
              <div class="image radius-md">
                <div class="lazy-container ratio ratio-16-9">
                  <img class="lazyload" src="assets/images/placeholder.png"
                    data-src="<?php echo e(asset('assets/img/blogs/' . $details->image)); ?>" alt="Blog Image">
                </div>
                <a href="#" class="btn btn-md btn-primary"data-bs-toggle="modal"
                  data-bs-target="#socialMediaModal"><i class="fas fa-share-alt"></i><?php echo e(__('Share Now')); ?></a>
              </div>
              <div class="content">
                <ul class="info-list">

                  <li><i class="fal fa-user"></i><?php echo e(__('Admin')); ?></li>
                  <li><i class="fal fa-calendar"></i><?php echo e(date_format($details->created_at, 'M d, Y')); ?></li>
                  <li><i class="fal fa-tag"></i><?php echo e($details->categoryName); ?></li>

                </ul>
                <h3 class="title">
                  <?php echo e($details->title); ?>

                </h3>
                <p>
                  <?php echo replaceBaseUrl($details->content, 'summernote'); ?>


                </p>
              </div>
            </article>
          </div>

        </div>
        <div class="col-lg-4">
          <aside class="widget-area mb-10">
            <div class="widget widget-search radius-md bg-light mb-30">
              <h4 class="title mb-15"><?php echo e(__('Search Posts')); ?></h4>
              <form class="search-form radius-md" action="<?php echo e(route('blog')); ?>" method="GET">
                <input type="search" class="search-input"placeholder="<?php echo e(__('Search By Title')); ?>" name="title"
                  value="<?php echo e(!empty(request()->input('title')) ? request()->input('title') : ''); ?>">

                <?php if(!empty(request()->input('category'))): ?>
                  <input type="hidden" name="category" value="<?php echo e(request()->input('category')); ?>">
                <?php endif; ?>
                <button class="btn-search" type="submit">
                  <i class="far fa-search"></i>
                </button>
              </form>
            </div>
            <div class="widget widget-blog-categories radius-md mb-30">
              <h3 class="title mb-15"><?php echo e(__('Categories')); ?></h3>
              <ul class="list-unstyled m-0">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="d-flex align-items-center justify-content-between">
                    <a href="<?php echo e(route('blog', ['category' => $category->slug])); ?>"><i class="fal fa-folder"></i>
                      <?php echo e($category->name); ?></a>
                    <span class="tqy">(<?php echo e($category->blogCount); ?>)</span>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            <div class="widget widget-post radius-md mb-30">
              <h4 class="title mb-15"><?php echo e(__('Recent Posts')); ?></h4>

              <?php $__currentLoopData = $recent_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="article-item mb-30">
                  <div class="image">
                    <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>"
                      class="lazy-container ratio ratio-1-1">
                      <img class="lazyload" src="<?php echo e(asset('assets/front/images/placeholder.png')); ?>"
                        data-src="<?php echo e(asset('assets/img/blogs/' . $blog->image)); ?>" alt="Blog Image">
                    </a>
                  </div>
                  <div class="content">
                    <h6>
                      <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>">
                        <?php echo e(strlen($blog->title) > 40 ? mb_substr($blog->title, 0, 40, 'UTF-8') . '...' : $blog->title); ?>

                      </a>
                    </h6>
                    <ul class="info-list">
                      <li><i class="fal fa-user"></i><?php echo e(__('Admin')); ?></li>
                      <li><i class="fal fa-calendar"></i><?php echo e(date_format($details->created_at, 'M d, Y')); ?></li>
                    </ul>
                  </div>
                </article>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if(!empty(showAd(2))): ?>
              <div class="text-center mt-40">
                <?php echo showAd(2); ?>

              </div>
            <?php endif; ?>
            <?php if(!empty(showAd(1))): ?>
              <div class="text-center mt-40">
                <?php echo showAd(1); ?>

              </div>
            <?php endif; ?>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- Blog-details-area end -->
  <?php echo $__env->make('frontend.journal.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/journal/blog-details.blade.php ENDPATH**/ ?>
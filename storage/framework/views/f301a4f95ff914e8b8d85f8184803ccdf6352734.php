<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Menu Builder')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Menu Builder')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title"><?php echo e(__('Menu Builder')); ?></div>
            </div>

            <div class="col-lg-2">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white"><?php echo e(__('Built-In Menus')); ?></div>

                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <?php echo e(__('Home')); ?> <a href="" data-text="<?php echo e(__('Home')); ?>" data-type="home"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>


                    <li class="list-group-item">
                      <?php echo e(__('Listings')); ?> <a href="" data-text="<?php echo e(__('Listings')); ?>" data-type="listings"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>
                    <li class="list-group-item">
                      <?php echo e(__('Pricing')); ?> <a href="" data-text="<?php echo e(__('Pricing')); ?>" data-type="pricing"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('Vendors')); ?> <a href="" data-text="<?php echo e(__('Vendors')); ?>" data-type="vendors"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('Shop')); ?> <a href="" data-text="<?php echo e(__('Shop')); ?>" data-type="shop"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('Cart')); ?> <a href="" data-text="<?php echo e(__('Cart')); ?>" data-type="cart"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>
                    <li class="list-group-item">
                      <?php echo e(__('Checkout')); ?> <a href="" data-text="<?php echo e(__('Checkout')); ?>" data-type="checkout"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('Blog')); ?> <a href="" data-text="<?php echo e(__('Blog')); ?>" data-type="blog"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('FAQ')); ?> <a href="" data-text="<?php echo e(__('FAQ')); ?>" data-type="faq"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('Contact')); ?> <a href="" data-text="<?php echo e(__('Contact')); ?>" data-type="contact"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <li class="list-group-item">
                      <?php echo e(__('About Us')); ?> <a href="" data-text="<?php echo e(__('About Us')); ?>" data-type="about-us"
                        class="addToMenus btn btn-primary btn-sm float-right"><?php echo e(__('Add To Menus')); ?></a>
                    </li>

                    <?php $__currentLoopData = $customPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="list-group-item">
                        <?php echo e($customPage->title); ?> <span class="badge badge-warning ml-1"><?php echo e(__('Custom Page')); ?></span>
                        <a href="" data-text="<?php echo e($customPage->title); ?>" data-type="<?php echo e($customPage->slug); ?>"
                          data-custom="yes"
                          class="addToMenus btn btn-primary btn-sm float-right mt-3 mt-md-0"><?php echo e(__('Add To Menus')); ?></a>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white"><?php echo e(__('Add') . '/' . __('Edit Menu')); ?></div>

                <div class="card-body">
                  <form id="menu-builder-form" class="form-horizontal">
                    <input type="hidden" class="item-menu" name="type">

                    <div id="withUrl">
                      <div class="form-group">
                        <label for="text"><?php echo e(__('Text')); ?></label>
                        <input type="text" class="form-control item-menu" name="text"
                          placeholder="Enter Menu Name">
                      </div>

                      <div class="form-group">
                        <label for="href"><?php echo e(__('URL')); ?></label>
                        <input type="url" class="form-control item-menu ltr" name="href"
                          placeholder="Enter Menu URL">
                      </div>

                      <div class="form-group">
                        <label for="target"><?php echo e(__('Target')); ?></label>
                        <select name="target" id="target" class="form-control item-menu">
                          <option value="_self"><?php echo e(__('Self')); ?></option>
                          <option value="_blank"><?php echo e(__('Blank')); ?></option>
                          <option value="_top"><?php echo e(__('Top')); ?></option>
                        </select>
                      </div>
                    </div>

                    <div id="withoutUrl" class="dis-none">
                      <div class="form-group">
                        <label for="text"><?php echo e(__('Text')); ?></label>
                        <input type="text" class="form-control item-menu" name="text"
                          placeholder="Enter Menu Name">
                      </div>

                      <div class="form-group">
                        <label for="target"><?php echo e(__('Target')); ?></label>
                        <select name="target" class="form-control item-menu">
                          <option value="_self"><?php echo e(__('Self')); ?></option>
                          <option value="_blank"><?php echo e(__('Blank')); ?></option>
                          <option value="_top"><?php echo e(__('Top')); ?></option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="card-footer">
                  <button type="button" id="btn-add" class="btn btn-primary btn-sm mr-2"><i
                      class="fas fa-plus"></i> <?php echo e(__('Add')); ?></button>
                  <button type="button" id="btn-update" class="btn btn-success btn-sm" disabled><i
                      class="fas fa-sync-alt"></i> <?php echo e(__('Update')); ?></button>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white"><?php echo e(__('Website Menus')); ?></div>

                <div class="card-body">
                  <ul id="myMenuEditor" class="sortableLists list-group"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button id="btn-menu-update" class="btn btn-success">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/jquery-menu-editor.min.js')); ?>"></script>

  <script>
    'use strict';
    let allMenus = <?php echo json_encode($menuData); ?>;
    let langId = <?php echo e($language->id); ?>;
    const menuBuilderUrl = "<?php echo e(secure_url(route('admin.menu_builder.update_menus'))); ?>";
  </script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/menu-builder.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/menu-builder.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Products')); ?></h4>
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
        <a href="#"><?php echo e(__('Shop Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Manage Products')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Products')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Products')); ?></div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-sm-6 col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <div class="text-right">
                <a href="<?php echo e(route('admin.shop_management.select_product_type')); ?>" class="btn btn-primary btn-sm"><i
                    class="fas fa-plus"></i> <?php echo e(__('Add Product')); ?></a>

                <button class="btn btn-danger btn-sm ml-2 d-none bulk-delete"
                  data-href="<?php echo e(route('admin.shop_management.bulk_delete_product')); ?>">
                  <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($products) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO PRODUCT FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Featured Image')); ?></th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <th scope="col"><?php echo e(__('Category')); ?></th>
                        <th scope="col"><?php echo e(__('Product Type')); ?></th>
                        <th scope="col">
                          <?php $currencyText = $currencyInfo->base_currency_text; ?>

                          <?php echo e(__('Price') . ' (' . $currencyText . ')'); ?>

                        </th>

                        <?php if($themeInfo->theme_version == 2): ?>
                          <th scope="col"><?php echo e(__('Featured')); ?></th>
                        <?php endif; ?>

                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($product->id); ?>">
                          </td>
                          <td>
                            <img src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                              alt="product image" width="40">
                          </td>
                          <td>
                            <?php echo e(strlen($product->title) > 50 ? mb_substr($product->title, 0, 50, 'UTF-8') . '...' : $product->title); ?>

                          </td>
                          <td><?php echo e($product->categoryName); ?></td>
                          <td class="text-capitalize"><?php echo e($product->product_type); ?></td>
                          <td><?php echo e($product->current_price); ?></td>

                          <?php if($themeInfo->theme_version == 2): ?>
                            <td>
                              <form id="featuredForm-<?php echo e($product->id); ?>" class="d-inline-block"
                                action="<?php echo e(route('admin.shop_management.product.update_featured_status', ['id' => $product->id])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <select
                                  class="form-control form-control-sm <?php if($product->is_featured == 'yes'): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>"
                                  name="is_featured"
                                  onchange="document.getElementById('featuredForm-<?php echo e($product->id); ?>').submit()">
                                  <option value="yes" <?php echo e($product->is_featured == 'yes' ? 'selected' : ''); ?>>
                                    <?php echo e(__('Yes')); ?>

                                  </option>
                                  <option value="no" <?php echo e($product->is_featured == 'no' ? 'selected' : ''); ?>>
                                    <?php echo e(__('No')); ?>

                                  </option>
                                </select>
                              </form>
                            </td>
                          <?php endif; ?>
                          <td>
                            <a class="btn btn-secondary mt-1 btn-sm mr-1"
                              href="<?php echo e(route('admin.shop_management.edit_product', ['id' => $product->id, 'type' => $product->product_type])); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>
                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.shop_management.delete_product', ['id' => $product->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger mt-1 btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/shop/product/index.blade.php ENDPATH**/ ?>
<div class="sidebar sidebar-style-2"
  data-background-color="<?php echo e($settings->admin_theme_version == 'light' ? 'white' : 'dark2'); ?>">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <?php if(Auth::guard('admin')->user()->image != null): ?>
            <img src="<?php echo e(asset('assets/img/admins/' . Auth::guard('admin')->user()->image)); ?>" alt="Admin Image"
              class="avatar-img rounded-circle">
          <?php else: ?>
            <img src="<?php echo e(asset('assets/img/blank_user.jpg')); ?>" alt="" class="avatar-img rounded-circle">
          <?php endif; ?>
        </div>

        <div class="info">
          <a data-toggle="collapse" href="#adminProfileMenu" aria-expanded="true">
            <span>
              <?php echo e(Auth::guard('admin')->user()->first_name); ?>


              <?php if(is_null($roleInfo)): ?>
                <span class="user-level"><?php echo e(__('Super Admin')); ?></span>
              <?php else: ?>
                <span class="user-level"><?php echo e($roleInfo->name); ?></span>
              <?php endif; ?>

              <span class="caret"></span>
            </span>
          </a>

          <div class="clearfix"></div>

          <div class="collapse in" id="adminProfileMenu">
            <ul class="nav">
              <li>
                <a href="<?php echo e(route('admin.edit_profile')); ?>">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>

              <li>
                <a href="<?php echo e(route('admin.change_password')); ?>">
                  <span class="link-collapse">Change Password</span>
                </a>
              </li>

              <li>
                <a href="<?php echo e(route('admin.logout')); ?>">
                  <span class="link-collapse">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <?php
        if (!is_null($roleInfo)) {
            $rolePermissions = json_decode($roleInfo->permissions);
        }
      ?>

      <ul class="nav nav-primary">
        
        <div class="row mb-3">
          <div class="col-12">
            <form action="">
              <div class="form-group py-0">
                <input name="term" type="text" class="form-control sidebar-search ltr"
                  placeholder="Search Menu Here...">
              </div>
            </form>
          </div>
        </div>

        
        <li class="nav-item <?php if(request()->routeIs('admin.dashboard')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="la flaticon-paint-palette"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Listing Specifications', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.listing_specification.categories')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_specification.location.city')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_specification.aminites')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_specification.location.states')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_specification.location.countries')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#listingSpecification">
              <i class="far fa-file-alt"></i>
              <p>Listing Specifications</p>
              <span class="caret"></span>
            </a>

            <div id="listingSpecification"
              class="collapse 
              <?php if(request()->routeIs('admin.listing_specification.categories')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_specification.aminites')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_specification.location.states')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_specification.location.city')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_specification.location.countries')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.listing_specification.categories') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.listing_specification.categories', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Categories</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.listing_specification.aminites') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.listing_specification.aminites', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Aminites</span>
                  </a>
                </li>
                <li class="submenu">
                  <a data-toggle="collapse"
                    href="#set-location"aria-expanded="<?php echo e(request()->routeIs('admin.listing_specification.location.countries') || request()->routeIs('admin.listing_specification.location.city') || request()->routeIs('admin.listing_specification.location.states') ? 'true' : 'false'); ?>">
                    <span class="sub-item">Location</span>
                    <span class="caret"></span>
                  </a>

                  <div id="set-location"
                    class="collapse 
                    <?php if(request()->routeIs('admin.listing_specification.location.countries')): ?> show 
                    <?php elseif(request()->routeIs('admin.listing_specification.location.city')): ?> show
                    <?php elseif(request()->routeIs('admin.listing_specification.location.states')): ?> show <?php endif; ?>">
                    <ul class="nav nav-collapse subnav">
                      <li
                        class="<?php echo e(request()->routeIs('admin.listing_specification.location.countries') ? 'active' : ''); ?>">
                        <a
                          href="<?php echo e(route('admin.listing_specification.location.countries', ['language' => $defaultLang->code])); ?>">
                          <span class="sub-item">Countries</span>
                        </a>
                      </li>

                      <li
                        class="<?php echo e(request()->routeIs('admin.listing_specification.location.states') ? 'active' : ''); ?>">
                        <a
                          href="<?php echo e(route('admin.listing_specification.location.states', ['language' => $defaultLang->code])); ?>">
                          <span class="sub-item">States</span>
                        </a>
                      </li>

                      <li
                        class="<?php echo e(request()->routeIs('admin.listing_specification.location.city') ? 'active' : ''); ?>">
                        <a
                          href="<?php echo e(route('admin.listing_specification.location.city', ['language' => $defaultLang->code])); ?>">
                          <span class="sub-item">Cities</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Listings Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.listing_management.listing')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.select_vendor')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.listing.products')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.listing.faq')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.listing.business_hours')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.listing.plugins')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.listing.select_vendor')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.create_Product')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.settings')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.manage_social_link')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.manage_additional_specification_link')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.create_listing')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.edit_product')): ?> active 
            <?php elseif(request()->routeIs('admin.listing_management.edit_listing')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#listingManagement">
              <i class="fas fa-building"></i>
              <p>Listings Management</p>
              <span class="caret"></span>
            </a>

            <div id="listingManagement"
              class="collapse 
              <?php if(request()->routeIs('admin.listing_management.listing')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.select_vendor')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.listing.products')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.listing.faq')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.create_listing')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.listing.business_hours')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.listing.plugins')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.create_Product')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.select_vendor')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.manage_social_link')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.manage_additional_specification_link')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.edit_product')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.settings')): ?> show 
              <?php elseif(request()->routeIs('admin.listing_management.edit_listing')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li class=" <?php if(request()->routeIs('admin.listing_management.settings')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.listing_management.settings')); ?>">
                    <span class="sub-item">Settings</span>
                  </a>
                </li>
                <li
                  class=" <?php if(request()->routeIs('admin.listing_management.select_vendor')): ?> active
                   <?php elseif(request()->routeIs('admin.listing_management.create_listing')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.listing_management.select_vendor', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Add Listing</span>
                  </a>
                </li>
                <li
                  class=" <?php if(request()->routeIs('admin.listing_management.listing')): ?> active
                   <?php elseif(request()->routeIs('admin.listing_management.edit_listing')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.listing.products')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.manage_social_link')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.manage_additional_specification_link')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.listing.business_hours')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.listing.faq')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.listing.plugins')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.create_Product')): ?> active 
                   <?php elseif(request()->routeIs('admin.listing_management.edit_product')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.listing_management.listing', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Manage Listings</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Featured Listings', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.featured_listing.all_request')): ?> active 
            <?php elseif(request()->routeIs('admin.featured_listing.pending_request')): ?> active 
            <?php elseif(request()->routeIs('admin.featured_listing.approved_request')): ?> active  
            <?php elseif(request()->routeIs('admin.featured_listing.charge')): ?> active  
            <?php elseif(request()->routeIs('admin.featured_listing.rejected_request')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#featured-listing">
              <i class="fas fa-money-bill"></i>
              <p>Featured Listings</p>
              <span class="caret"></span>
            </a>

            <div id="featured-listing"
              class="collapse 
              <?php if(request()->routeIs('admin.featured_listing.all_request')): ?> show 
              <?php elseif(request()->routeIs('admin.featured_listing.pending_request')): ?> show 
              <?php elseif(request()->routeIs('admin.featured_listing.approved_request')): ?> show 
              <?php elseif(request()->routeIs('admin.featured_listing.charge')): ?> show 
              <?php elseif(request()->routeIs('admin.featured_listing.rejected_request')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li class="<?php echo e(request()->routeIs('admin.featured_listing.charge') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.featured_listing.charge')); ?>">
                    <span class="sub-item">Charges</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.featured_listing.all_request') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.featured_listing.all_request', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">All Requests</span>
                  </a>
                </li>
                <li class="<?php echo e(request()->routeIs('admin.featured_listing.pending_request') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.featured_listing.pending_request', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Pending Requests</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.featured_listing.approved_request') ? 'active' : ''); ?>">
                  <a
                    href="<?php echo e(route('admin.featured_listing.approved_request', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Aproved Requests</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.featured_listing.rejected_request') ? 'active' : ''); ?>">
                  <a
                    href="<?php echo e(route('admin.featured_listing.rejected_request', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Rejected Requests</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Messages', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.listing.messages')): ?> active 
            <?php elseif(request()->routeIs('admin.product.messages')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#messages">
              <i class="fas fa-comment"></i>
              <p>Messages</p>
              <span class="caret"></span>
            </a>

            <div id="messages"
              class="collapse 
              <?php if(request()->routeIs('admin.listing.messages')): ?> show 
              <?php elseif(request()->routeIs('admin.product.messages')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li class="<?php echo e(request()->routeIs('admin.listing.messages') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.listing.messages', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Listing Messages</span>
                  </a>
                </li>
                <li class=" <?php if(request()->routeIs('admin.product.messages')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.product.messages', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Product Messages</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>



        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Package Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.package.settings')): ?> active 
            <?php elseif(request()->routeIs('admin.package.index')): ?> active 
            <?php elseif(request()->routeIs('admin.package.edit')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#packageManagement">
              <i class="fal fa-receipt"></i>
              <p>Package Management</p>
              <span class="caret"></span>
            </a>

            <div id="packageManagement"
              class="collapse 
              <?php if(request()->routeIs('admin.package.settings')): ?> show 
              <?php elseif(request()->routeIs('admin.package.index')): ?> show 
              <?php elseif(request()->routeIs('admin.package.edit')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li class="<?php echo e(request()->routeIs('admin.package.settings') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.package.settings', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Settings</span>
                  </a>
                </li>
                <li
                  class=" <?php if(request()->routeIs('admin.package.index')): ?> active 
            <?php elseif(request()->routeIs('admin.package.edit')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.package.index', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Packages</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Menu Builder', $rolePermissions))): ?>
          <li class="nav-item <?php if(request()->routeIs('admin.menu_builder')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.menu_builder', ['language' => $defaultLang->code])); ?>">
              <i class="fal fa-bars"></i>
              <p>Menu Builder</p>
            </a>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Subscription Log', $rolePermissions))): ?>
          <li class="nav-item <?php if(request()->routeIs('admin.payment-log.index')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.payment-log.index')); ?>">
              <i class="fas fa-list-ol"></i>
              <p>Subscription Log</p>
            </a>
          </li>
        <?php endif; ?>



        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Shop Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.shop_management.tax_amount')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.shipping_charges')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.coupons')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.product.categories')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.products')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.select_product_type')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.create_product')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.edit_product')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.orders')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.order.details')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.settings')): ?> active 
            <?php elseif(request()->routeIs('admin.shop_management.report')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#shop">
              <i class="fal fa-store-alt"></i>
              <p>Shop Management</p>
              <span class="caret"></span>
            </a>

            <div id="shop"
              class="collapse 
              <?php if(request()->routeIs('admin.shop_management.tax_amount')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.shipping_charges')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.coupons')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.product.categories')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.products')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.select_product_type')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.create_product')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.edit_product')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.orders')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.order.details')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.settings')): ?> show 
              <?php elseif(request()->routeIs('admin.shop_management.report')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.shop_management.settings') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.shop_management.settings')); ?>">
                    <span class="sub-item">Settings</span>
                  </a>
                </li>
                <li class="<?php echo e(request()->routeIs('admin.shop_management.tax_amount') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.shop_management.tax_amount')); ?>">
                    <span class="sub-item">Tax Amount</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.shop_management.shipping_charges') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.shop_management.shipping_charges', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Shipping Charges</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.shop_management.coupons') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.shop_management.coupons')); ?>">
                    <span class="sub-item">Coupons</span>
                  </a>
                </li>

                <li class="submenu">
                  <a data-toggle="collapse" href="#product"
                    aria-expanded="<?php echo e(request()->routeIs('admin.shop_management.product.categories') || request()->routeIs('admin.shop_management.products') || request()->routeIs('admin.shop_management.select_product_type') || request()->routeIs('admin.shop_management.create_product') || request()->routeIs('admin.shop_management.edit_product') ? 'true' : 'false'); ?>">
                    <span class="sub-item">Manage Products</span>
                    <span class="caret"></span>
                  </a>

                  <div id="product"
                    class="collapse 
                    <?php if(request()->routeIs('admin.shop_management.product.categories')): ?> show 
                    <?php elseif(request()->routeIs('admin.shop_management.products')): ?> show 
                    <?php elseif(request()->routeIs('admin.shop_management.select_product_type')): ?> show 
                    <?php elseif(request()->routeIs('admin.shop_management.create_product')): ?> show 
                    <?php elseif(request()->routeIs('admin.shop_management.edit_product')): ?> show <?php endif; ?>">
                    <ul class="nav nav-collapse subnav">
                      <li
                        class="<?php echo e(request()->routeIs('admin.shop_management.product.categories') ? 'active' : ''); ?>">
                        <a
                          href="<?php echo e(route('admin.shop_management.product.categories', ['language' => $defaultLang->code])); ?>">
                          <span class="sub-item">Categories</span>
                        </a>
                      </li>

                      <li
                        class="<?php if(request()->routeIs('admin.shop_management.products')): ?> active 
                        <?php elseif(request()->routeIs('admin.shop_management.select_product_type')): ?> active 
                        <?php elseif(request()->routeIs('admin.shop_management.create_product')): ?> active 
                        <?php elseif(request()->routeIs('admin.shop_management.edit_product')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.shop_management.products', ['language' => $defaultLang->code])); ?>">
                          <span class="sub-item">Products</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li
                  class="<?php if(request()->routeIs('admin.shop_management.orders')): ?> active 
                  <?php elseif(request()->routeIs('admin.shop_management.order.details')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.shop_management.orders')); ?>">
                    <span class="sub-item">Orders</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.shop_management.report') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.shop_management.report')); ?>">
                    <span class="sub-item">Report</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('User Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.user_management.registered_users')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.registered_user.create')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.registered_user.edit')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.user.change_password')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.subscribers')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.mail_for_subscribers')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.push_notification.settings')): ?> active 
            <?php elseif(request()->routeIs('admin.user_management.push_notification.notification_for_visitors')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#user">
              <i class="la flaticon-users"></i>
              <p>Users Management</p>
              <span class="caret"></span>
            </a>

            <div id="user"
              class="collapse 
              <?php if(request()->routeIs('admin.user_management.registered_users')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.registered_user.create')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.registered_user.edit')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.user.change_password')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.subscribers')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.mail_for_subscribers')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.push_notification.settings')): ?> show 
              <?php elseif(request()->routeIs('admin.user_management.push_notification.notification_for_visitors')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li
                  class="<?php if(request()->routeIs('admin.user_management.registered_users')): ?> active 
                  <?php elseif(request()->routeIs('admin.user_management.user.change_password')): ?> active
<?php elseif(request()->routeIs('admin.user_management.registered_user.edit')): ?>
active <?php endif; ?>
                  ">
                  <a href="<?php echo e(route('admin.user_management.registered_users')); ?>">
                    <span class="sub-item">Registered Users</span>
                  </a>
                </li>

                <li class="<?php if(request()->routeIs('admin.user_management.registered_user.create')): ?> active <?php endif; ?>
                  ">
                  <a href="<?php echo e(route('admin.user_management.registered_user.create')); ?>">
                    <span class="sub-item">Add User</span>
                  </a>
                </li>

                <li
                  class="<?php if(request()->routeIs('admin.user_management.subscribers')): ?> active 
                  <?php elseif(request()->routeIs('admin.user_management.mail_for_subscribers')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.user_management.subscribers')); ?>">
                    <span class="sub-item">Subscribers</span>
                  </a>
                </li>

                <li class="submenu">
                  <a data-toggle="collapse" href="#push_notification">
                    <span class="sub-item">Push Notification</span>
                    <span class="caret"></span>
                  </a>

                  <div id="push_notification"
                    class="collapse 
                    <?php if(request()->routeIs('admin.user_management.push_notification.settings')): ?> show 
                    <?php elseif(request()->routeIs('admin.user_management.push_notification.notification_for_visitors')): ?> show <?php endif; ?>">
                    <ul class="nav nav-collapse subnav">
                      <li
                        class="<?php echo e(request()->routeIs('admin.user_management.push_notification.settings') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.user_management.push_notification.settings')); ?>">
                          <span class="sub-item">Settings</span>
                        </a>
                      </li>

                      <li
                        class="<?php echo e(request()->routeIs('admin.user_management.push_notification.notification_for_visitors') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.user_management.push_notification.notification_for_visitors')); ?>">
                          <span class="sub-item">Send Notification</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Vendors Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.vendor_management.registered_vendor')): ?> active
            <?php elseif(request()->routeIs('admin.vendor_management.add_vendor')): ?> active
            <?php elseif(request()->routeIs('admin.vendor_management.vendor_details')): ?> active
            <?php elseif(request()->routeIs('admin.edit_management.vendor_edit')): ?> active
            <?php elseif(request()->routeIs('admin.vendor_management.settings')): ?> active
            <?php elseif(request()->routeIs('admin.vendor_management.vendor.change_password')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#vendor">
              <i class="la flaticon-users"></i>
              <p>Vendors Management</p>
              <span class="caret"></span>
            </a>

            <div id="vendor"
              class="collapse
              <?php if(request()->routeIs('admin.vendor_management.registered_vendor')): ?> show
              <?php elseif(request()->routeIs('admin.vendor_management.vendor_details')): ?> show
              <?php elseif(request()->routeIs('admin.edit_management.vendor_edit')): ?> show
              <?php elseif(request()->routeIs('admin.vendor_management.add_vendor')): ?> show
              <?php elseif(request()->routeIs('admin.vendor_management.settings')): ?> show
              <?php elseif(request()->routeIs('admin.vendor_management.vendor.change_password')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php if(request()->routeIs('admin.vendor_management.settings')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.vendor_management.settings')); ?>">
                    <span class="sub-item">Settings</span>
                  </a>
                </li>
                <li
                  class="<?php if(request()->routeIs('admin.vendor_management.registered_vendor')): ?> active
                  <?php elseif(request()->routeIs('admin.vendor_management.vendor_details')): ?> active
                  <?php elseif(request()->routeIs('admin.edit_management.vendor_edit')): ?> active
                  <?php elseif(request()->routeIs('admin.vendor_management.vendor.change_password')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.vendor_management.registered_vendor')); ?>">
                    <span class="sub-item">Registered vendors</span>
                  </a>
                </li>
                <li class="<?php if(request()->routeIs('admin.vendor_management.add_vendor')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.vendor_management.add_vendor')); ?>">
                    <span class="sub-item">Add vendor</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Support Tickets', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.support_ticket.setting')): ?> active
            <?php elseif(request()->routeIs('admin.support_tickets')): ?> active
            <?php elseif(request()->routeIs('admin.support_tickets.message')): ?> active active
            <?php elseif(request()->routeIs('admin.user_management.push_notification.notification_for_visitors')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#support_ticket">
              <i class="la flaticon-web-1"></i>
              <p>Support Tickets</p>
              <span class="caret"></span>
            </a>

            <div id="support_ticket"
              class="collapse
              <?php if(request()->routeIs('admin.support_ticket.setting')): ?> show
              <?php elseif(request()->routeIs('admin.support_tickets')): ?> show
              <?php elseif(request()->routeIs('admin.support_tickets.message')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php if(request()->routeIs('admin.support_ticket.setting')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.support_ticket.setting')); ?>">
                    <span class="sub-item">Setting</span>
                  </a>
                </li>
                <li
                  class="<?php echo e(request()->routeIs('admin.support_tickets') && empty(request()->input('status')) ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.support_tickets')); ?>">
                    <span class="sub-item">All Tickets</span>
                  </a>
                </li>
                <li
                  class="<?php echo e(request()->routeIs('admin.support_tickets') && request()->input('status') == 1 ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.support_tickets', ['status' => 1])); ?>">
                    <span class="sub-item">Pending Tickets</span>
                  </a>
                </li>
                <li
                  class="<?php echo e(request()->routeIs('admin.support_tickets') && request()->input('status') == 2 ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.support_tickets', ['status' => 2])); ?>">
                    <span class="sub-item">Open Tickets</span>
                  </a>
                </li>
                <li
                  class="<?php echo e(request()->routeIs('admin.support_tickets') && request()->input('status') == 3 ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.support_tickets', ['status' => 3])); ?>">
                    <span class="sub-item">Closed Tickets</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Home Page', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.home_page.hero_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.location_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.about_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.category_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.listing_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.video_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.package_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.banners')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.work_process_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.feature_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.counter_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.testimonial_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.product_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.call_to_action_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.blog_section')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.section_customization')): ?> active 
            <?php elseif(request()->routeIs('admin.home_page.partners')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#home_page">
              <i class="fal fa-layer-group"></i>
              <p>Home Page</p>
              <span class="caret"></span>
            </a>

            <div id="home_page"
              class="collapse 
              <?php if(request()->routeIs('admin.home_page.hero_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.location_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.about_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.banners')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.category_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.listing_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.video_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.package_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.work_process_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.feature_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.counter_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.testimonial_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.product_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.call_to_action_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.blog_section')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.section_customization')): ?> show 
              <?php elseif(request()->routeIs('admin.home_page.partners')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li class="<?php echo e(request()->routeIs('admin.home_page.hero_section') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.hero_section', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Hero Section</span>
                  </a>
                </li>
                <?php if($settings->theme_version == 3): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.location_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.location_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Location Section</span>
                    </a>
                  </li>
                <?php endif; ?>

                <li class="<?php echo e(request()->routeIs('admin.home_page.category_section') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.category_section', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Category Section</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.home_page.listing_section') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.listing_section', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Featured Listing Section</span>
                  </a>
                </li>

                <?php if($settings->theme_version == 2 || $settings->theme_version == 4): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.video_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.video_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Video Section</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($settings->theme_version == 2 || $settings->theme_version == 3): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.testimonial_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.testimonial_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Testimonial Section</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if($settings->theme_version == 1 || $settings->theme_version == 4): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.work_process_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.work_process_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Work Process Section</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($settings->theme_version == 1 || $settings->theme_version == 3): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.counter_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.counter_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Counter Section</span>
                    </a>
                  </li>
                <?php endif; ?>

                <li class="<?php echo e(request()->routeIs('admin.home_page.package_section') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.package_section', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Package Section</span>
                  </a>
                </li>

                <?php if($settings->theme_version == 1 || $settings->theme_version == 4): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.call_to_action_section') ? 'active' : ''); ?>">
                    <a
                      href="<?php echo e(route('admin.home_page.call_to_action_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Call To Action Section</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($settings->theme_version == 2): ?>
                  <li class="<?php echo e(request()->routeIs('admin.home_page.feature_section') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.home_page.feature_section', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Latest Listing Section</span>
                    </a>
                  </li>
                <?php endif; ?>


                <li class="<?php echo e(request()->routeIs('admin.home_page.blog_section') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.blog_section', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Blog Section</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.home_page.section_customization') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.home_page.section_customization')); ?>">
                    <span class="sub-item">Section Show/Hide</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>



        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Footer', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.footer.logo_and_image')): ?> active 
            <?php elseif(request()->routeIs('admin.footer.content')): ?> active 
            <?php elseif(request()->routeIs('admin.footer.quick_links')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#footer">
              <i class="fal fa-shoe-prints"></i>
              <p>Footer</p>
              <span class="caret"></span>
            </a>

            <div id="footer"
              class="collapse <?php if(request()->routeIs('admin.footer.logo_and_image')): ?> show 
              <?php elseif(request()->routeIs('admin.footer.content')): ?> show 
              <?php elseif(request()->routeIs('admin.footer.quick_links')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.footer.logo_and_image') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.footer.logo_and_image')); ?>">
                    <span class="sub-item">Logo & Image</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.footer.content') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.footer.content', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Content</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.footer.quick_links') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.footer.quick_links', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Quick Links</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Custom Pages', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.custom_pages')): ?> active 
            <?php elseif(request()->routeIs('admin.custom_pages.create_page')): ?> active 
            <?php elseif(request()->routeIs('admin.custom_pages.edit_page')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.custom_pages', ['language' => $defaultLang->code])); ?>">
              <i class="la flaticon-file"></i>
              <p>Custom Pages</p>
            </a>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Blog Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.blog_management.categories')): ?> active 
            <?php elseif(request()->routeIs('admin.blog_management.blogs')): ?> active 
            <?php elseif(request()->routeIs('admin.blog_management.create_blog')): ?> active 
            <?php elseif(request()->routeIs('admin.blog_management.edit_blog')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#blog">
              <i class="fal fa-blog"></i>
              <p>Blog Management</p>
              <span class="caret"></span>
            </a>

            <div id="blog"
              class="collapse 
              <?php if(request()->routeIs('admin.blog_management.categories')): ?> show 
              <?php elseif(request()->routeIs('admin.blog_management.blogs')): ?> show 
              <?php elseif(request()->routeIs('admin.blog_management.create_blog')): ?> show 
              <?php elseif(request()->routeIs('admin.blog_management.edit_blog')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.blog_management.categories') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.blog_management.categories', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Categories</span>
                  </a>
                </li>

                <li
                  class="<?php if(request()->routeIs('admin.blog_management.blogs')): ?> active 
                  <?php elseif(request()->routeIs('admin.blog_management.create_blog')): ?> active 
                  <?php elseif(request()->routeIs('admin.blog_management.edit_blog')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.blog_management.blogs', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Posts</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('FAQ Management', $rolePermissions))): ?>
          <li class="nav-item <?php echo e(request()->routeIs('admin.faq_management') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.faq_management', ['language' => $defaultLang->code])); ?>">
              <i class="la flaticon-round"></i>
              <p>FAQ Management</p>
            </a>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Advertisements', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.advertise.settings')): ?> active 
            <?php elseif(request()->routeIs('admin.advertise.all_advertisement')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#customid">
              <i class="fab fa-buysellads"></i>
              <p>Advertisements</p>
              <span class="caret"></span>
            </a>

            <div id="customid"
              class="collapse <?php if(request()->routeIs('admin.advertise.settings')): ?> show 
              <?php elseif(request()->routeIs('admin.advertise.all_advertisement')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.advertise.settings') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.advertise.settings')); ?>">
                    <span class="sub-item">Settings</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.advertise.all_advertisement') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.advertise.all_advertisement')); ?>">
                    <span class="sub-item">All Advertisements</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Announcement Popups', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.announcement_popups')): ?> active 
            <?php elseif(request()->routeIs('admin.announcement_popups.select_popup_type')): ?> active 
            <?php elseif(request()->routeIs('admin.announcement_popups.create_popup')): ?> active 
            <?php elseif(request()->routeIs('admin.announcement_popups.edit_popup')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.announcement_popups', ['language' => $defaultLang->code])); ?>">
              <i class="fal fa-bullhorn"></i>
              <p>Announcement Popups</p>
            </a>
          </li>
        <?php endif; ?>


        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Basic Settings', $rolePermissions))): ?>
          <li
            class="nav-item 
            <?php if(request()->routeIs('admin.basic_settings.contact_page')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.mail_from_admin')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.mail_to_admin')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.mail_templates')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.edit_mail_template')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.breadcrumb')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.page_headings')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.plugins')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.seo')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.theme_and_home')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.maintenance_mode')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.general_settings')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.cookie_alert')): ?> active
            <?php elseif(request()->routeIs('admin.basic_settings.social_medias')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#basic_settings">
              <i class="la flaticon-settings"></i>
              <p>Basic Settings</p>
              <span class="caret"></span>
            </a>

            <div id="basic_settings"
              class="collapse 
              <?php if(request()->routeIs('admin.basic_settings.contact_page')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.mail_from_admin')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.mail_to_admin')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.mail_templates')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.edit_mail_template')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.breadcrumb')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.page_headings')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.plugins')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.seo')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.theme_and_home')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.maintenance_mode')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.cookie_alert')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.general_settings')): ?> show
              <?php elseif(request()->routeIs('admin.basic_settings.social_medias')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.basic_settings.general_settings') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.general_settings')); ?>">
                    <span class="sub-item">General Settings</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.contact_page') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.contact_page')); ?>">
                    <span class="sub-item">Contact Page</span>
                  </a>
                </li>


                <li class="submenu">
                  <a data-toggle="collapse" href="#mail-settings"
                    aria-expanded="<?php echo e(request()->routeIs('admin.basic_settings.mail_from_admin') || request()->routeIs('admin.basic_settings.mail_to_admin') || request()->routeIs('admin.basic_settings.mail_templates') || request()->routeIs('admin.basic_settings.edit_mail_template') ? 'true' : 'false'); ?>">
                    <span class="sub-item">Email Settings</span>
                    <span class="caret"></span>
                  </a>

                  <div id="mail-settings"
                    class="collapse 
                    <?php if(request()->routeIs('admin.basic_settings.mail_from_admin')): ?> show 
                    <?php elseif(request()->routeIs('admin.basic_settings.mail_to_admin')): ?> show
                    <?php elseif(request()->routeIs('admin.basic_settings.mail_templates')): ?> show
                    <?php elseif(request()->routeIs('admin.basic_settings.edit_mail_template')): ?> show <?php endif; ?>">
                    <ul class="nav nav-collapse subnav">
                      <li class="<?php echo e(request()->routeIs('admin.basic_settings.mail_from_admin') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.basic_settings.mail_from_admin')); ?>">
                          <span class="sub-item">Mail From Admin</span>
                        </a>
                      </li>

                      <li class="<?php echo e(request()->routeIs('admin.basic_settings.mail_to_admin') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.basic_settings.mail_to_admin')); ?>">
                          <span class="sub-item">Mail To Admin</span>
                        </a>
                      </li>

                      <li
                        class="<?php if(request()->routeIs('admin.basic_settings.mail_templates')): ?> active 
                        <?php elseif(request()->routeIs('admin.basic_settings.edit_mail_template')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.basic_settings.mail_templates')); ?>">
                          <span class="sub-item">Mail Templates</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.breadcrumb') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.breadcrumb')); ?>">
                    <span class="sub-item">Breadcrumb</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.theme_and_home') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.theme_and_home')); ?>">
                    <span class="sub-item">Theme & Home</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.page_headings') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.page_headings', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Page Headings</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.plugins') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.plugins')); ?>">
                    <span class="sub-item">Plugins</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.seo') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.seo', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">SEO Informations</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.maintenance_mode') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.maintenance_mode')); ?>">
                    <span class="sub-item">Maintenance Mode</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.cookie_alert') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.cookie_alert', ['language' => $defaultLang->code])); ?>">
                    <span class="sub-item">Cookie Alert</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.basic_settings.social_medias') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.basic_settings.social_medias')); ?>">
                    <span class="sub-item">Social Medias</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Payment Gateways', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.payment_gateways.online_gateways')): ?> active 
            <?php elseif(request()->routeIs('admin.payment_gateways.offline_gateways')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#payment_gateways">
              <i class="la flaticon-paypal"></i>
              <p>Payment Gateways</p>
              <span class="caret"></span>
            </a>

            <div id="payment_gateways"
              class="collapse 
              <?php if(request()->routeIs('admin.payment_gateways.online_gateways')): ?> show 
              <?php elseif(request()->routeIs('admin.payment_gateways.offline_gateways')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li class="<?php echo e(request()->routeIs('admin.payment_gateways.online_gateways') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.payment_gateways.online_gateways')); ?>">
                    <span class="sub-item">Online Gateways</span>
                  </a>
                </li>

                <li class="<?php echo e(request()->routeIs('admin.payment_gateways.offline_gateways') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.payment_gateways.offline_gateways')); ?>">
                    <span class="sub-item">Offline Gateways</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>
 <li
            class="nav-item <?php if(request()->routeIs('admin.admin_management.role_permissions')): ?> active 
            <?php elseif(request()->routeIs('admin.admin_management.role.permissions')): ?> active 
            <?php elseif(request()->routeIs('admin.admin_management.registered_admins')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#admin">
              <i class="fal fa-users-cog"></i>
              <p>Frontend</p>
              <span class="caret"></span>
            </a>

            <div id="admin"
              class="collapse 
              <?php if(request()->routeIs('admin.admin_management.role_permissions')): ?> show 
              <?php elseif(request()->routeIs('admin.admin_management.role.permissions')): ?> show 
              <?php elseif(request()->routeIs('admin.admin_management.registered_admins')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
           <li class="<?php echo e(request()->routeIs('category_icons.*') ? 'active' : ''); ?>">
  <a href="<?php echo e(route('category_icons.index')); ?>">
    <span class="sub-item">Category Icons</span>
  </a>
</li>



              <li class="<?php echo e(request()->routeIs('admin.trending_categories.*') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('trending_categories.index')); ?>">
        <span class="sub-item">Trending Categories</span>
    </a>
</li>

                  <li class="<?php echo e(request()->routeIs('admin.admin_management.registered_admins') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.admin_management.registered_admins')); ?>">
                    <span class="sub-item">Sports Gameplay</span>
                  </a>
                </li>
                  <li class="<?php echo e(request()->routeIs('admin.admin_management.registered_admins') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.admin_management.registered_admins')); ?>">
                    <span class="sub-item">Logo Advertisement</span>
                  </a>
                </li>
                  <li class="<?php echo e(request()->routeIs('admin.admin_management.registered_admins') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.admin_management.registered_admins')); ?>">
                    <span class="sub-item">Slider Ad Banner</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>


        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Admin Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.admin_management.role_permissions')): ?> active 
            <?php elseif(request()->routeIs('admin.admin_management.role.permissions')): ?> active 
            <?php elseif(request()->routeIs('admin.admin_management.registered_admins')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#admin">
              <i class="fal fa-users-cog"></i>
              <p>Admin Management</p>
              <span class="caret"></span>
            </a>

            <div id="admin"
              class="collapse 
              <?php if(request()->routeIs('admin.admin_management.role_permissions')): ?> show 
              <?php elseif(request()->routeIs('admin.admin_management.role.permissions')): ?> show 
              <?php elseif(request()->routeIs('admin.admin_management.registered_admins')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <li
                  class="<?php if(request()->routeIs('admin.admin_management.role_permissions')): ?> active 
                  <?php elseif(request()->routeIs('admin.admin_management.role.permissions')): ?> active <?php endif; ?>">
                  <a href="<?php echo e(route('admin.admin_management.role_permissions')); ?>">
                    <span class="sub-item">Role & Permissions</span>
                  </a>
                </li>
                <li class="<?php echo e(request()->routeIs('admin.admin_management.registered_admins') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('admin.admin_management.registered_admins')); ?>">
                    <span class="sub-item">Admins</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>

        
        <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Language Management', $rolePermissions))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('admin.language_management')): ?> active 
            <?php elseif(request()->routeIs('admin.language_management.edit_keyword')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.language_management')); ?>">
              <i class="fal fa-language"></i>
              <p>Language Management</p>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/partials/side-navbar.blade.php ENDPATH**/ ?>
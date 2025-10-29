<div class="sidebar sidebar-style-2"
  data-background-color="<?php echo e(Session::get('vendor_theme_version') == 'light' ? 'white' : 'dark2'); ?>">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <?php if(Auth::guard('vendor')->user()->photo != null): ?>
            <img src="<?php echo e(asset('assets/admin/img/vendor-photo/' . Auth::guard('vendor')->user()->photo)); ?>"
              alt="Vendor Image" class="avatar-img rounded-circle">
          <?php else: ?>
            <img src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="" class="avatar-img rounded-circle">
          <?php endif; ?>
        </div>

        <div class="info">
          <a data-toggle="collapse" href="#adminProfileMenu" aria-expanded="true">
            <span>
              <?php echo e(Auth::guard('vendor')->user()->username); ?>

              <span class="user-level"><?php echo e(__('Vendor')); ?></span>
              <span class="caret"></span>
            </span>
          </a>

          <div class="clearfix"></div>

          <div class="collapse in" id="adminProfileMenu">
            <ul class="nav">
              <li>
                <a href="<?php echo e(route('vendor.edit.profile')); ?>">
                  <span class="link-collapse"><?php echo e(__('Edit Profile')); ?></span>
                </a>
              </li>

              <li>
                <a href="<?php echo e(route('vendor.change_password')); ?>">
                  <span class="link-collapse"><?php echo e(__('Change Password')); ?></span>
                </a>
              </li>

              <li>
                <a href="<?php echo e(route('vendor.logout')); ?>">
                  <span class="link-collapse"><?php echo e(__('Logout')); ?></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <ul class="nav nav-primary">
        
        <div class="row mb-3">
          <div class="col-12">
            <form>
              <div class="form-group py-0">
                <input name="term" type="text" class="form-control sidebar-search ltr"
                  placeholder="Search Menu Here...">
              </div>
            </form>
          </div>
        </div>

        
        <li class="nav-item <?php if(request()->routeIs('vendor.dashboard')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.dashboard')); ?>">
            <i class="la flaticon-paint-palette"></i>
            <p><?php echo e(__('Dashboard')); ?></p>
          </a>
        </li>

        

       
<li
  class="nav-item <?php if(
      request()->routeIs('vendor.listing_management.listing') ||
      request()->routeIs('vendor.listing_management.create_listing') ||
      request()->routeIs('vendor.listing_management.listing.products') ||
      request()->routeIs('vendor.listing_management.listing.faq') ||
      request()->routeIs('vendor.listing_management.listing.business_hours') ||
      request()->routeIs('vendor.listing_management.listing.plugins') ||
      request()->routeIs('vendor.listing_management.manage_additional_specifications') ||
      request()->routeIs('vendor.listing_management.manage_social_link') ||
      request()->routeIs('vendor.listing_management.create_Product') ||
      request()->routeIs('vendor.listing_management.edit_product') ||
      request()->routeIs('vendor.listing_management.edit_listing') ||
      request()->routeIs('vendor.job_posting.create') ||
      request()->routeIs('vendor.job_posting.listing')  
  ): ?> active <?php endif; ?>">
  <a data-toggle="collapse" href="#listingManagement">
    <i class="fas fa-building"></i>
    <p>Listing Managements</p>
    <span class="caret"></span>
  </a>

  <div id="listingManagement"
       class="collapse <?php if(
          request()->routeIs('vendor.listing_management.listing') ||
          request()->routeIs('vendor.listing_management.create_listing') ||
          request()->routeIs('vendor.listing_management.listing.products') ||
          request()->routeIs('vendor.listing_management.listing.faq') ||
          request()->routeIs('vendor.listing_management.listing.business_hours') ||
          request()->routeIs('vendor.listing_management.listing.plugins') ||
          request()->routeIs('vendor.listing_management.create_Product') ||
          request()->routeIs('vendor.listing_management.manage_social_link') ||
          request()->routeIs('vendor.listing_management.manage_additional_specifications') ||
          request()->routeIs('vendor.listing_management.edit_product') ||
          request()->routeIs('vendor.listing_management.edit_listing') ||
          request()->routeIs('vendor.job_posting.create') ||
          request()->routeIs('vendor.job_posting.listing')
       ): ?> show <?php endif; ?>">
    <ul class="nav nav-collapse">

      <li class="<?php echo e(request()->routeIs('vendor.listing_management.create_listing') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('vendor.listing_management.create_listing', ['language' => $defaultLang->code])); ?>">
          <span class="sub-item">Add Listing</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('vendor.listing_management.listing') || request()->routeIs('vendor.listing_management.edit_listing') || request()->routeIs('vendor.listing_management.listing.products') || request()->routeIs('vendor.listing_management.listing.business_hours') || request()->routeIs('vendor.listing_management.listing.faq') || request()->routeIs('vendor.listing_management.listing.plugins') || request()->routeIs('vendor.listing_management.create_Product') || request()->routeIs('vendor.listing_management.manage_social_link') || request()->routeIs('vendor.listing_management.manage_additional_specifications') || request()->routeIs('vendor.listing_management.edit_product') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('vendor.listing_management.listing', ['language' => $defaultLang->code])); ?>">
          <span class="sub-item">Manage Listings</span>
        </a>
      </li>

      
      <li class="<?php echo e(request()->routeIs('vendor.job_posting.create') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('vendor.job_posting.create', ['language' => $defaultLang->code])); ?>">
          <span class="sub-item">Add Job Posting</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('vendor.job_posting.listing') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('vendor.job_posting.listing', ['language' => $defaultLang->code])); ?>">
          <span class="sub-item">Manage Job Postings</span>
        </a>
      </li>

    </ul>
  </div>
</li>

        

        <?php
          $vendorId = Auth::guard('vendor')->user()->id;

          if ($vendorId) {
              $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

              if ($current_package != '[]') {
                  $numberoffImages = $current_package->number_of_images_per_listing;
              } else {
                  $numberoffImages = 0;
              }
              if (!empty($current_package) && !empty($current_package->features)) {
                  $permissions = json_decode($current_package->features, true);
              } else {
                  $permissions = null;
              }
          } else {
              $permissions = null;
          }
        ?>
        <?php if(
            (is_array($permissions) && in_array('Listing Enquiry Form', $permissions)) ||
                (is_array($permissions) &&
                    in_array('Product Enquiry Form', $permissions) &&
                    (is_array($permissions) && in_array('Products', $permissions)))): ?>
          <li
            class="nav-item <?php if(request()->routeIs('vendor.listing.messages')): ?> active 
            <?php elseif(request()->routeIs('vendor.product.messages')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#messages">
              <i class="fas fa-comment"></i>
              <p>Messages</p>
              <span class="caret"></span>
            </a>

            <div id="messages"
              class="collapse 
              <?php if(request()->routeIs('vendor.listing.messages')): ?> show 
              <?php elseif(request()->routeIs('vendor.product.messages')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">
                <?php if(is_array($permissions) && in_array('Listing Enquiry Form', $permissions)): ?>
                  <li class="<?php echo e(request()->routeIs('vendor.listing.messages') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('vendor.listing.messages', ['language' => $defaultLang->code])); ?>">
                      <span class="sub-item">Listing Messages</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                  <?php if(is_array($permissions) && in_array('Product Enquiry Form', $permissions)): ?>
                    <li class=" <?php if(request()->routeIs('vendor.product.messages')): ?> active <?php endif; ?>">
                      <a href="<?php echo e(route('vendor.product.messages', ['language' => $defaultLang->code])); ?>">
                        <span class="sub-item">Product Messages</span>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>
              </ul>
            </div>
          </li>
        <?php endif; ?>


        <?php
          $support_status = DB::table('support_ticket_statuses')->first();
        ?>
        <?php if($support_status->support_ticket_status == 'active'): ?>
          
          <li
            class="nav-item <?php if(request()->routeIs('vendor.support_tickets')): ?> active
            <?php elseif(request()->routeIs('vendor.support_tickets.message')): ?> active
            <?php elseif(request()->routeIs('vendor.support_ticket.create')): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#support_ticket">
              <i class="la flaticon-web-1"></i>
              <p><?php echo e(__('Support Tickets')); ?></p>
              <span class="caret"></span>
            </a>

            <div id="support_ticket"
              class="collapse
              <?php if(request()->routeIs('vendor.support_tickets')): ?> show
              <?php elseif(request()->routeIs('vendor.support_tickets.message')): ?> show
              <?php elseif(request()->routeIs('vendor.support_ticket.create')): ?> show <?php endif; ?>">
              <ul class="nav nav-collapse">

                <li
                  class="<?php echo e(request()->routeIs('vendor.support_tickets') && empty(request()->input('status')) ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('vendor.support_tickets')); ?>">
                    <span class="sub-item"><?php echo e(__('All Tickets')); ?></span>
                  </a>
                </li>
                <li class="<?php echo e(request()->routeIs('vendor.support_ticket.create') ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('vendor.support_ticket.create')); ?>">
                    <span class="sub-item"><?php echo e(__('Add a Ticket')); ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif; ?>
        
        <li
          class="nav-item 
        <?php if(request()->routeIs('vendor.plan.extend.index')): ?> active 
        <?php elseif(request()->routeIs('vendor.plan.extend.checkout')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.plan.extend.index')); ?>">
            <i class="fal fa-lightbulb-dollar"></i>
            <p><?php echo e(__('Buy Plan')); ?></p>
          </a>
        </li>

        <li class="nav-item <?php if(request()->routeIs('vendor.payment_log')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.payment_log')); ?>">
            <i class="fas fa-list-ol"></i>
            <p><?php echo e(__('Payment Logs')); ?></p>
          </a>
        </li>
        <li class="nav-item <?php if(request()->routeIs('vendor.edit.profile')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.edit.profile')); ?>">
            <i class="fal fa-user-edit"></i>
            <p><?php echo e(__('Edit Profile')); ?></p>
          </a>
        </li>
        <li class="nav-item  <?php if(request()->routeIs('vendor.email_setting.mail_to_admin')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.email_setting.mail_to_admin')); ?>">
            <i class="far fa-envelope"></i>
            <p><?php echo e(__('Recipient mail')); ?></p>
          </a>
        </li>
        <li class="nav-item <?php if(request()->routeIs('vendor.change_password')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.change_password')); ?>">
            <i class="fal fa-key"></i>
            <p><?php echo e(__('Change Password')); ?></p>
          </a>
        </li>

        <li class="nav-item <?php if(request()->routeIs('vendor.logout')): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('vendor.logout')); ?>">
            <i class="fal fa-sign-out"></i>
            <p><?php echo e(__('Logout')); ?></p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/partials/side-navbar.blade.php ENDPATH**/ ?>
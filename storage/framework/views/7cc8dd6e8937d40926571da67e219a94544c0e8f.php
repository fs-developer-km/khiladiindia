 <?php
   $vendorId = Auth::guard('vendor')->user()->id;
   $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);
   if (!empty($current_package) && !empty($current_package->features)) {
       $permissions = json_decode($current_package->features, true);
   } else {
       $permissions = null;
   }

 ?>
 <?php if($current_package != '[]'): ?>

   <div class="modal fade" id="checkLimitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title card-title" id="exampleModalLabel">
             <?php echo e(__('All Limit')); ?></h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <?php
             $listingCanAdd = packageTotalListing($vendorId) - vendorTotalListing($vendorId);
           ?>
           <div class="alert alert-warning">
             <span
               class="text-warning"><?php echo e(__('If any feature has crossed its current subscription package\'s limit, then you won\'t be able to add/edit any other feature.')); ?></span>
           </div>
           <ul class="list-group list-group-bordered">

             <li class="list-group-item">
               <div class="d-flex  justify-content-between">
                 <span class="text-focus">
                   <?php if($listingCanAdd < 0): ?>
                     <i class="fas fa-exclamation-circle text-danger"></i>
                   <?php endif; ?>
                   <?php echo e(__('Listings Left')); ?> :
                 </span>

                 <span class="badge badge-primary badge-sm">
                   <?php echo e($current_package->number_of_listing - vendorTotalListing($vendorId) >= 999999 ? 'Unlimited' : ($current_package->number_of_listing - vendorTotalListing($vendorId) < 0 ? 0 : $current_package->number_of_listing - vendorTotalListing($vendorId))); ?>

                 </span>
               </div>

               <?php if(vendorTotalListing($vendorId) > $current_package->number_of_listing): ?>
                 <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete')); ?>

                   <?php echo e(abs($current_package->number_of_listing - vendorTotalListing($vendorId))); ?>

                   <?php echo e(abs($current_package->number_of_listing - vendorTotalListing($vendorId)) == 1 ? 'listing' : 'listings'); ?>

                 </p>
               <?php endif; ?>
               <?php if(vendorTotalListing($vendorId) == $current_package->number_of_listing): ?>
                 <p class="text-info m-0"><?php echo e(__('You reach your limit')); ?>

                 </p>
               <?php endif; ?>
             </li>
             <li class="list-group-item ">
               <div class="d-flex  justify-content-between">
                 <span class="text-focus">
                   <?php if($listingImgDown): ?>
                     <i class="fas fa-exclamation-circle text-danger"></i>
                   <?php endif; ?>
                   <?php echo e(__('Listing Images (Per Listing)')); ?> :
                 </span>
                 <?php if($listingImgDown): ?>
                   <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                     data-target="#listingImgDownModal">
                     <?php echo e(__('Remove')); ?>

                   </button>
                 <?php else: ?>
                   <span class="badge badge-primary badge-sm">
                     <?php echo e($current_package->number_of_images_per_listing); ?>

                   </span>
                 <?php endif; ?>
               </div>
               <?php if($listingImgDown): ?>
                 <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete')); ?>

                   <?php echo e(__('gallery images')); ?>

                 </p>
               <?php endif; ?>
             </li>
             <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($listingProductDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Products (Per Listing)')); ?> :
                   </span>
                   <?php if($listingProductDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingProductDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_products); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($listingProductDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete,products')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>
             <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($listingFaqDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Faqs (Per Listing)')); ?> :
                   </span>
                   <?php if($listingFaqDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingFaqDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_faq); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($listingFaqDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete faqs')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>

             <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($featureDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Features  (Per Listing)')); ?> :
                   </span>
                   <?php if($featureDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingFeatureDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_additional_specification); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($featureDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete Specifications')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>

             <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>

               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($socialLinkDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Socail Links (Per Listing)')); ?> :
                   </span>
                   <?php if($socialLinkDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingSocialDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_social_links); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($socialLinkDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete Social Links')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>

             <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($amenitieDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Amenities (Per Listing)')); ?> :
                   </span>
                   <?php if($amenitieDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingamenitiesDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_amenities_per_listing); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($amenitieDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete Amenities')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>

             <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
               <li class="list-group-item ">
                 <div class="d-flex  justify-content-between">
                   <span class="text-focus">
                     <?php if($listingProductImgDown): ?>
                       <i class="fas fa-exclamation-circle text-danger"></i>
                     <?php endif; ?>
                     <?php echo e(__('Product Images (Per Product.)')); ?> :
                   </span>
                   <?php if($listingProductImgDown): ?>
                     <button type="button" class="btn  btn-danger mr-2  btn-sm btn-round" data-toggle="modal"
                       data-target="#listingProductImgDownModal">
                       <?php echo e(__('Remove')); ?>

                     </button>
                   <?php else: ?>
                     <span class="badge badge-primary badge-sm">
                       <?php echo e($current_package->number_of_images_per_products); ?>

                     </span>
                   <?php endif; ?>
                 </div>
                 <?php if($listingProductImgDown): ?>
                   <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, you have to delete')); ?>

                     <?php echo e(__('gallery images')); ?>

                   </p>
                 <?php endif; ?>
               </li>
             <?php endif; ?>

           </ul>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary"
             data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>

         </div>
       </div>
     </div>
   </div>
   <div class="modal fade" id="listingImgDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title card-title" id="exampleModalLabel">
             <?php echo e(__('Remove Image from the below listings')); ?></h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <ul class="list-group list-group-bordered">
             <?php $__currentLoopData = $listingImgListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li class="list-group-item p-0">
                 <a href="<?php echo e(route('vendor.listing_management.edit_listing', ['id' => $listing->id])); ?>"
                   class="dropdown-item">
                   <div class="d-flex">
                     <span>
                       <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                     </span>
                     <span>
                       <i class="far fa-link"></i>
                     </span>
                   </div>
                 </a>
               </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </ul>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary"
             data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
         </div>
       </div>
     </div>
   </div>
   <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
     <div class="modal fade" id="listingProductImgDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove Images from the below products')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $ProductImgContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.edit_product', ['id' => $product->id])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$product->title) > 50 ? mb_substr(@$product->title, 0, 50, 'utf-8') . '.....' : @$product->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
   <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
     <div class="modal fade" id="listingProductDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove products from the below listings')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $listingProductListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.listing.products', ['id' => $listing->id, 'language' => $defaultLang->code])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
   <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
     <div class="modal fade" id="listingFaqDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove faqs from the below listings')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $listingFaqListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.listing.faq', ['id' => $listing->id, 'language' => $defaultLang->code])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
   <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
     <div class="modal fade" id="listingFeatureDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove feature from the below listings')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $listingFeaturesListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.manage_additional_specifications', ['id' => $listing->id])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
   <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
     <div class="modal fade" id="listingSocialDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove socail link from the below listings')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $socialListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.manage_social_link', ['id' => $listing->id])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
   <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
     <div class="modal fade" id="listingamenitiesDownModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h3 class="modal-title card-title" id="exampleModalLabel">
               <?php echo e(__('Remove amenities from the below listings')); ?></h3>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <ul class="list-group list-group-bordered">
               <?php $__currentLoopData = $amenitieListingContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="list-group-item p-0">
                   <a href="<?php echo e(route('vendor.listing_management.edit_listing', ['id' => $listing->id])); ?>"
                     class="dropdown-item">
                     <div class="d-flex">
                       <span>
                         <?php echo e(strlen(@$listing->title) > 50 ? mb_substr(@$listing->title, 0, 50, 'utf-8') . '.....' : @$listing->title); ?>

                       </span>
                       <span>
                         <i class="far fa-link"></i>
                       </span>
                     </div>
                   </a>
                 </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
               data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
           </div>
         </div>
       </div>
     </div>
   <?php endif; ?>
 <?php endif; ?>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/check-limit.blade.php ENDPATH**/ ?>
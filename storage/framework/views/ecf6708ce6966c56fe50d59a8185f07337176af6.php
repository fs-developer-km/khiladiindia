 <div class="modal fade" id="createModal" tabindex="-1" role="dialog" arititletotala-labelledby="exampleModalCenterTitle"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Package')); ?></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

         <form id="ajaxForm" enctype="multipart/form-data" class="modal-form"
           action="<?php echo e(route('admin.package.store')); ?>" method="POST">
           <?php echo csrf_field(); ?>
           <div class="form-group">
             <label for="title"><?php echo e(__('Package title')); ?>*</label>
             <input id="title" type="text" class="form-control" name="title"
               placeholder="<?php echo e(__('Enter Package title')); ?>" value="">
             <p id="err_title" class="mt-2 mb-0 text-danger em"></p>
           </div>
           <div class="form-group">
             <label for="price"><?php echo e(__('Price')); ?> (<?php echo e($settings->base_currency_text); ?>)*</label>
             <input id="price" type="number" class="form-control" name="price"
               placeholder="<?php echo e(__('Enter Package price')); ?>" value="">
             <p class="text-warning">
               <small><?php echo e(__('If price is 0 , than it will appear as free')); ?></small>
             </p>
             <p id="err_price" class="mt-2 mb-0 text-danger em"></p>
           </div>

           <div class="form-group">
             <label for=""><?php echo e(__('Icon')); ?>*</label>
             <div class="btn-group d-block">
               <button type="button" class="btn btn-primary iconpicker-component">
                 <i class="fas fa-gift"></i>
               </button>
               <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car"
                 data-toggle="dropdown"></button>
               <div class="dropdown-menu"></div>
             </div>
             <input type="hidden" id="inputIcon" name="icon">
             <p id="err_icon" class="mt-2 mb-0 text-danger em"></p>
           </div>

           <div class="form-group">
             <label for="term"><?php echo e(__('Package term')); ?>*</label>
             <select id="term" name="term" class="form-control" required>
               <option value="" selected disabled><?php echo e(__('Choose a Package term')); ?></option>
               <option value="monthly"><?php echo e(__('Monthly')); ?></option>
               <option value="yearly"><?php echo e(__('Yearly')); ?></option>
               <option value="lifetime"><?php echo e(__('Lifetime')); ?></option>
             </select>
             <p id="err_term" class="mb-0 text-danger em"></p>
           </div>


           <div class="form-group">
             <label class="form-label"><?php echo e(__('Package Features')); ?></label>
             <div class="selectgroup selectgroup-pills">
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Listing Enquiry Form" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Listing Enquiry Form')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Video" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Video')); ?></span>
               </label>

               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Amenities" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Amenities')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Feature" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Features')); ?></span>
               </label>

               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Social Links" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Social Links')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="FAQ" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('FAQ')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Business Hours" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Business Hours')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Products" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Products')); ?></span>
               </label>
               <label class="selectgroup-item" id="productEnquiryFormLabel">
                 <input type="checkbox" name="features[]" value="Product Enquiry Form" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Product Enquiry Form')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Messenger" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Messenger')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="WhatsApp" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('WhatsApp')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Telegram" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Telegram')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="checkbox" name="features[]" value="Tawk.To" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Tawk.To')); ?></span>
               </label>

             </div>
             <p id="err_features" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group">
             <label class="form-label"><?php echo e(__('Number of Listings')); ?> *</label>
             <input type="number" class="form-control" name="number_of_listing"
               placeholder="<?php echo e(__('Enter Number of Listings')); ?>">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_listing" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group">
             <label class="form-label"><?php echo e(__('Number of image per Listing')); ?> *</label>
             <input type="number" class="form-control" name="number_of_images_per_listing"
               placeholder="<?php echo e(__('Enter Number of image per Listing')); ?>">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_images_per_listing" class="mb-0 text-danger em"></p>
           </div>

           <div class="form-group amenities-box">
             <label for=""><?php echo e(__('Number of Amenities')); ?> * </label>
             <input type="number" class="form-control" name="number_of_amenities_per_listing" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_amenities_per_listing" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group additional-specification-box">
             <label for=""><?php echo e(__('Number of Features')); ?> * </label>
             <input type="number" class="form-control" name="number_of_additional_specification" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_additional_specification" class="mb-0 text-danger em"></p>
           </div>

           <div class="form-group social-links-box vcrd-none">
             <label for=""><?php echo e(__('Number of Social Links')); ?> * </label>
             <input type="number" class="form-control" name="number_of_social_links" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_social_links" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group FAQ-box">
             <label for=""><?php echo e(__('Number of FAQ ')); ?> * </label>
             <input type="number" class="form-control" name="number_of_faq" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_faq" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group Products-box">
             <label for=""><?php echo e(__('Number of Products ')); ?> * </label>
             <input type="number" class="form-control" name="number_of_products" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_products" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group image-product-box">
             <label for=""><?php echo e(__('Number of Imager per Product ')); ?> * </label>
             <input type="number" class="form-control" name="number_of_images_per_products" value="">
             <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
             <p id="err_number_of_images_per_products" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group">
             <label for="status"><?php echo e(__('Status')); ?>*</label>
             <select id="status" class="form-control ltr" name="status">
               <option value="" selected disabled><?php echo e(__('Select a status')); ?></option>
               <option value="1"><?php echo e(__('Active')); ?></option>
               <option value="0"><?php echo e(__('Deactive')); ?></option>
             </select>
             <p id="err_status" class="mb-0 text-danger em"></p>
           </div>
           <div class="form-group">
             <label class="form-label"><?php echo e(__('Popular')); ?></label>
             <div class="selectgroup w-100">
               <label class="selectgroup-item">
                 <input type="radio" name="recommended" value="1" class="selectgroup-input">
                 <span class="selectgroup-button"><?php echo e(__('Yes')); ?></span>
               </label>
               <label class="selectgroup-item">
                 <input type="radio" name="recommended" value="0" class="selectgroup-input" checked>
                 <span class="selectgroup-button"><?php echo e(__('No')); ?></span>
               </label>
             </div>
           </div>


           <div class="form-group">
             <label><?php echo e(__('Custom Features')); ?></label>
             <textarea class="form-control" name="custom_features" rows="5" placeholder="Enter Custom Features"></textarea>
             <p class="text-warning">
               <small><?php echo e(__('Enter new line to seperate features')); ?></small>
             </p>
           </div>


         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
         <button id="submitBtn" type="button" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
       </div>
     </div>
   </div>
 </div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/packages/create.blade.php ENDPATH**/ ?>
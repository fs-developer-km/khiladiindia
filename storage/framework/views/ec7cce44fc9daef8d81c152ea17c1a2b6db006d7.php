<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_home); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_home); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Home-area start-->
  
  
  <!--login popup start code-->
  

  <!-- Include Popup -->
 <?php echo $__env->make('frontend.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <!--login popup end code-->




    <!--signup popup end-->

<style>
  .highlight {
    color: #ffcc00;
    font-weight: bold;
    /*position: relative;*/
    display: inline-block;
    overflow: hidden;
    height: 1.2em; /* Yeh text jitna height lega utna hi dikhayega */
  }

  .word-slider {
    display: block;
    animation: slideWords 6s infinite;
  }

  .word-slider span {
    display: block;
    position: absolute;
    opacity: 0;
    transform: translateY(100%);
    animation: fadeUp 6s infinite;
  }

  .word-slider span:nth-child(1) {
    animation-delay: 0s;
  }
  .word-slider span:nth-child(2) {
    animation-delay: 2s;
  }
  .word-slider span:nth-child(3) {
    animation-delay: 4s;
  }

  @keyframes fadeUp {
    0% { opacity: 0; transform: translateY(100%); }
    10% { opacity: 1; transform: translateY(0); }
    30% { opacity: 1; transform: translateY(0); }
    40% { opacity: 0; transform: translateY(-100%); }
    100% { opacity: 0; }
  }
</style>
  
  <section class="hero-banner hero-banner-2 <?php if(count($cities) < 1): ?> no-city <?php endif; ?>">
    <!-- Background Image -->

    <?php if($heroSectionImage): ?>
      <img class="lazyload blur-up bg-img" alt="Bg-img" src="<?php echo e(asset('assets/img/hero-section/' . $heroSectionImage)); ?>">
    <?php else: ?>
      <img class="lazyload blur-up bg-img" alt="Bg-img" data-src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="Banner">
    <?php endif; ?>

    <div class="overlay opacity-80"></div>
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-8 col-lg-10">
            
            
          <!--<div class="content text-center">-->
          <!--  <h1 class="title mb-10 color-white" data-aos="fade-up">-->
          <!--    <?php echo e(!empty($heroSection->title) ? $heroSection->title : 'Are You Looking For A business?'); ?>-->
          <!--  </h1>-->
          <!--  <p class="text color-light mb-30 mx-auto" data-aos="fade-up" data-aos-delay="100">-->
          <!--    <?php echo e(!empty($heroSection->text) ? $heroSection->text : ''); ?>-->
          <!--  </p>-->
          <!--</div>-->
          
                <div class="content text-center">
                  <h2 class="title mb-10 color-white d-flex text-center justify-content-start" data-aos="fade-up">
                    Looking for sports
                    &nbsp;
                    <span class="highlight word-slider">
                      <span>Business?</span>
                      <span>Job?</span>
                      <span>Trainer?</span>
                      
                    </span>
                  </h2>
                  <p class="text color-light mb-30 mx-auto" data-aos="fade-up" data-aos-delay="100">
                    We help you find the best opportunities to grow.
                  </p>
                  <!--<button class="btn btn-primary">Looking for job</button>-->
                </div>





          <div class="banner-filter-form" data-aos="fade-up" data-aos-delay="150">
            <div class="form-wrapper radius-xl">
              <form action="<?php echo e(route('frontend.listings')); ?>" id="searchForm2" method="GET">
                <div class="row align-items-center gx-xl-3">
                  <div class="col-lg-4 col-md-6">
                    <div class="input-group border-end">
                      <label for="search"><i class="ico-shopping-mall"></i></label>
                      <input type="text" name="title" id="title" class="form-control"
                        placeholder="<?php echo e(__('I’m Looking for')); ?>">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-6">
                    <div class="input-group border-end">
                      <label for="category"><i class="ico-category"></i></label>
                      <select aria-label="categories" id="category_id" name="category_id"
                        class="select2 js-example-basic-single1">
                        <option value=""><?php echo e(__('All')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-group">
                      <label for="location"><i class="ico-location-pin"></i></label>
                      <input type="text" name="location" id="location" class="form-control"
                        placeholder="<?php echo e(__('Location')); ?>">
                    </div>
                  </div>
                  
                   
                  <div class="col-lg-2 col-md-6">
                    <button type="button" id="searchBtn2" class="btn btn-lg btn-primary rounded-pill icon-start w-100">
                      <i class="fal fa-search"></i>
                      <span class="d-lg-none">
                        <?php echo e(__('Search Now')); ?>

                      </span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  


  <!-- Home-area end -->

  <?php if($secInfo->location_section_status == 1): ?>
    <!-- City-area start -->
    <div class="city-area spacer-negative <?php if(count($cities) < 1): ?> mt-0 pt-100 <?php endif; ?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">

            <div class="swiper px-3" id="city-slider-1" data-aos="fade-up">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide">
                    <div class="card radius-0">
                      <a href="<?php echo e(route('frontend.listings', ['city' => $city->id])); ?>">
                        <div class="card-img">
                          <div class="lazy-container ratio ratio-1-3">
                            <img class="lazyload"
                              data-src="<?php echo e(asset('assets/img/location/city/' . $city->feature_image)); ?>"
                              alt="<?php echo e($city->name); ?>">
                          </div>
                        </div>
                        <div class="card-text text-center">
                          <h5 class="card-title color-white mb-1"><?php echo e($city->name); ?></h5>
                          <span class="font-sm"><?php echo e($city->listing_city_count); ?>

                            <?php echo e(__('Listing')); ?></span>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
              <!-- Slider navigation buttons -->
              <div class="slider-navigation">
                <button type="button" title="Slide prev" class="slider-btn btn-outline rounded-pill"
                  id="city-slider-btn-prev">
                  <i class="fal fa-angle-left"></i>
                </button>
                <button type="button" title="Slide next" class="slider-btn btn-outline rounded-pill"
                  id="city-slider-btn-next">
                  <i class="fal fa-angle-right"></i>
                </button>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- City-area end -->
    
    <style>
        /* Mobile View (Max Width 768px) */
@media (max-width: 768px) {
  /* Adjust the slider size */
  #city-slider-1 {
    max-width: 90%;
    margin: 0 auto;
  }

  /* Adjust the card size */
  .swiper-slide .card {
    width: 80%; /* Reduce width */
    height: auto; /* Adjust height dynamically */
    margin: 0 auto;
  }

  /* Adjust the image inside the card */
  .card-img img {
    height: 100px; /* Reduce height */
    object-fit: cover;
  }

  /* Text size adjustment */
  .card-text h5 {
    font-size: 14px;
  }

  .card-text span {
    font-size: 12px;
  }
}

    </style>
    

    
    
  <?php endif; ?>
  
  
  
                    <!--category menu for position-static start-->
                    
                    
              <style>
         .beauty-spa {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #111;
        }   
        
        
        .category-box {
            text-align: center;
            padding: 5px;
            transition: 0.3s;
            background: transparent;
        }

        .category-box .image-container {
            border: .5px solid #ccc;
            border-radius: 14px;
            padding: 15px;
            display: inline-block;
            background: #fff;
        }

        .category-box img {
            width: 50px;
            height: 50px;
        }

        .category-box h6 {
            font-size: 12px;
            margin-top: 6px;
            color: #111;
        }

        .category-container {
            max-width: 1400px;
            margin: auto;
        }

        .row {
            justify-content: center;
            --bs-gutter-x: 5px;
            --bs-gutter-y: 5px;
            /*grid-gap:25px 25px;*/
        }
        
        .image-container:hover {
            /*box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;*/
            border: .5px solid orange;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }
        

@media (max-width: 576px) {  /* Mobile View */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .col-6 {
        flex: 0 0 33.33%; /* 3 items per row */
        max-width: 27.33%;
    }
}

@media (max-width: 992px) and (min-width: 577px) {  /* Tablet View */
    .col-6 {
        flex: 0 0 25%; /* 4 items per row */
        max-width: 25%;
    }
}



        
   
    </style>
    
              
       <div class="container my-4 category-container">
        <div class="row g-1" style="grid-gap:25px 25px;">
            <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://akam.cdn.jdmagicbox.com/images/icons/newwap/newhotkey/gym_2023.svg?w=48&q=75%20download" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Gym</h6>
                </div>
            </div>
           <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/4982/4982019.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Foot Ball</h6>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/3705/3705282.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Skiing</h6>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/4163/4163684.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Basket Ball</h6>
                </div>
            </div>
           <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/10552/10552607.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Badminton</h6>
                </div>
            </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/10552/10552567.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Baseball</h6>
                </div>
            </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/4786/4786938.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Hockey</h6>
                </div>
            </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/6169/6169218.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Twister</h6>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/6169/6169078.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Board Game</h6>
                </div>
            </div>
             <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/4721/4721050.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Running</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/2917/2917805.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Yoga Free</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/3085/3085411.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Car Racing</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/4721/4721069.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Swimming</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/15888/15888479.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Endurance</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/4049/4049078.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Soccer</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/3775/3775236.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Bicycle</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="	https://cdn-icons-png.flaticon.com/512/1259/1259792.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Stadium</h6>
                </div>
            </div>
               <div class="col-6 col-sm-4 col-md-3 col-lg-1">
                <div class="category-box">
                    <div class="image-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/4424/4424792.png" alt="Restaurants">
                    </div>
                    <h6  class="beauty-spa" style="font-size:15px">Live Streaming</h6>
                </div>
            </div>
        </div>
    </div>

                
            
             <!--category menu for position-static end-->
             
             
             
    <!--category real from khiladi india start-->

    <style>
    .sports-gallery {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .sports-gallery {
            border: none;
            padding: 0px;
        }
    }

    .sports-gallery > div:first-child {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .gallery-container {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        gap: 20px;
        padding: 10px;
        scroll-behavior: smooth;
    }

    .gallery-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 150px;
        flex-shrink: 0;
    }

    .gallery-item img {
        width: 100%;
        height: 120px;
        border-radius: 8px;
        object-fit: cover;
    }

    .gallery-item p {
        margin-top: 5px;
        font-size: 14px;
        color: black;
        font-weight: bold;
    }

    /* Hide scrollbar for cleaner look */
    .gallery-container::-webkit-scrollbar {
        display: none;
    }
</style>


<div class="custom-container sports-gallery">
    <div style="color:black">Trending Category near you </div>
    <div class="gallery-container">
        <div class="gallery-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY0JczecGcf2lxLgsWdj5oMflnTPqupvUlnCY9gDst4JoyGexRwP56aBDbr3bx2-mFx9A&usqp=CAU" alt="Soccer Celebration">
            <p>Sports Academy</p>
        </div>
         <div class="gallery-item">
            <img src="https://pimwp.s3-accelerate.amazonaws.com/2024/12/Untitled-design-2024-12-17T185804.996.jpg" alt="Soccer Celebration">
            <p>Sports Infrastructure</p>
        </div>
          <div class="gallery-item">
            <img src="https://media.assettype.com/nationalherald%2F2025-01-07%2F4eearvfq%2FColaco.jpg?rect=0%2C0%2C800%2C450&auto=format%2Ccompress&fmt=webp&w=1200" alt="Soccer Celebration">
            <p>Sports Coach</p>
        </div>
          <div class="gallery-item">
            <img src="https://i.ytimg.com/vi/SELKbVOlL24/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCd1ELoq3Mu6mUOYG5C-3kguxXFSw" alt="Volleyball Spike">
            <p>Sports NGO</p>
        </div>
          <div class="gallery-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT60MQMZ2FV_SRGce98eRoIc6YlsCdmwM9_vA&s" alt="Soccer Celebration">
            <p>Fitness Trainer</p>
        </div>
        <div class="gallery-item">
            <img src="https://dss.dsu.ac.in/images/DSS_Gallery/about-4.jpeg" alt="Soccer Team Win">
            <p>Sports School</p>
        </div>
          <div class="gallery-item">
            <img src="https://www.murphylawoffice.net/wp-content/uploads/cosgarea-patient.jpg" alt="Volleyball Spike">
            <p>Injured Doctor</p>
        </div>
        <div class="gallery-item">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/22/Major_Dhyan_Chand_Sports_College%2C_Saifai.jpeg" alt="Women Playing Soccer">
            <p>Sports College</p>
        </div>
        <div class="gallery-item">
            <img src="https://www.fitking.in/BlogImage/5142.jpg" alt="Soccer Celebration">
            <p>Persoal Trainer</p>
        </div>
        <div class="gallery-item">
            <img src="https://vidyanchalschool.com/wp-content/uploads/2022/12/Why-sports-activities-should-be-promoted-in-the-formal-education-system.webp" alt="Kabaddi Match">
            <p>Sports Education</p>
        </div>
        <div class="gallery-item">
            <img src="https://m.media-amazon.com/images/I/81FDZtC3WcL.jpg" alt="Basketball Shot">
            <p>Sports Equipments</p>
        </div>
      
        <div class="gallery-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlwjp_wrlnWfwsVIl_YvmQV4jcksCSm8Wkjw&s" alt="Soccer Celebration">
            <p>Federations</p>
        </div>
        <div class="gallery-item">
            <img src="https://currentaffairs.adda247.com/wp-content/uploads/multisite/sites/5/2024/10/23182522/Complete-List-of-Major-Sports-Events-in-India-for-2024.png" alt="Soccer Team Win">
            <p>Sports Events</p>
        </div>
        <div class="gallery-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVwbpDU9CrYGPV0aDsEgCObJS4YwfdKb_EEpHgyqrWe7yZuUkU0rKVH0IJCj6e4Xlv6Ps&usqp=CAU" alt="Kabaddi Match">
            <p>Sports Services</p>
        </div>
        <div class="gallery-item">
            <img src="https://www.anytimefitness.com/wp-content/uploads/2024/05/AF_Blog_HERO_FitnessCoachVSPersonalTrainer-1024x683.jpg" alt="Kabaddi Match">
            <p>Physical Coach</p>
        </div>
         <div class="gallery-item">
            <img src="https://neevnutrition.in/wp-content/uploads/2022/06/Sports-Nutrition-1024x576.png" alt="Kabaddi Match">
            <p>Sports Nutrition</p>
        </div>
    </div>
</div>


    <!--popular job category start-->
        
<style>
    .container-custom {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .card-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 12px 23px; /* Default padding for desktop */
        margin-bottom: 20px; /* Default margin for desktop */
        text-align: center;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: 100%; /* Ensure consistent height */
    }
    .card-box:hover {
        transform: translateY(-5px);
    }
    .card-box .icon-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px; /* Default margin for desktop */
    }
    .card-box h2 {
        font-size: 16px; /* Default font size for desktop */
        margin-bottom: 0;
        display: flex;
        align-items: center;
    }
    .card-box p {
        font-size: 14px; /* Default font size for desktop */
        color: #555;
        margin-bottom: 0;
    }
    .view-all-jobs {
        text-align: right;
        margin-top: 0;
    }
    .view-all-jobs a {
        font-size: 17px; /* Default font size for desktop */
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        background-color: transparent;
        border: 1px solid #007bff;
        padding: 12px 23px; /* Default padding for desktop */
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .view-all-jobs a:hover {
        background-color: #007bff;
        color: #fff;
    }
    .popular-category-heading {
        font-size: 24px; /* Default font size for desktop */
        text-align: left;
        margin-bottom: 20px; /* Default margin for desktop */
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .row {
        margin-bottom: 20px; /* Default margin for desktop */
    }
    /* Custom gap between cards */
    .col-md-3, .col-sm-6 {
        padding: 10px; /* Default padding for desktop */
    }

    /* Mobile-specific adjustments */
    @media (max-width: 767.98px) {
        .card-box {
            padding: 10px 15px; /* Reduced padding for mobile */
            margin-bottom: 10px; /* Reduced margin for mobile */
        }
        .card-box .icon-container {
            margin-right: 10px; /* Reduced margin for mobile */
        }
        .card-box h2 {
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            color: #18191c;
            margin-bottom: 4px;
            transition: all .4s;
        }
        .card-box p {
            font-size: 12px; /* Reduced font size for mobile */
        }
        .view-all-jobs a {
            font-size: 14px; /* Reduced font size for mobile */
            padding: 8px 15px; /* Reduced padding for mobile */
        }
        .popular-category-heading {
            font-size: 18px; /* Reduced font size for mobile */
            margin-bottom: 15px; /* Reduced margin for mobile */
        }
        .row {
            margin-bottom: 15px; /* Reduced margin for mobile */
        }
        .col-md-3, .col-sm-6 {
            padding: 5px; /* Reduced padding for mobile */
        }
        .popular-category-heading {
            flex-direction: column; /* Stack heading and button vertically */
            align-items: flex-start; /* Align items to the start */
        }
        .view-all-jobs {
            margin-top: 10px; /* Add spacing between heading and button */
            text-align: left; /* Align button to the left */
        }
    }
</style>

<div class="container-custom mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="popular-category-heading">
                <h5>Popular Job Category</h5>
                <div class="view-all-jobs">
                    <a href="#">View All Jobs →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="card-box sports-job">
                <div class="icon-container">
                    <i class="fas fa-passport" style="color:#0A65CC; font-size:26px;"></i> <!-- Default icon size -->
                </div>
                <div>
                    <h2>Sports Job Demo</h2>
                    <p>1 Open Positions</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-box nutritionist">
                <div class="icon-container">
                    <i class="fas fa-apple-alt" style="color:#0A65CC; font-size:26px;"></i> <!-- Default icon size -->
                </div>
                <div>
                    <h2>Nutritionist</h2>
                    <p>0 Open Positions</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-box coach">
                <div class="icon-container">
                    <i class="fas fa-whistle" style="color:#0A65CC; font-size:26px;"></i> <!-- Default icon size -->
                </div>
                <div>
                    <h2>Coach</h2>
                    <p>0 Open Positions</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-box sports-reporter">
                <div class="icon-container">
                    <i class="fas fa-microphone" style="color:#0A65CC; font-size:26px;"></i> <!-- Default icon size -->
                </div>
                <div>
                    <h2>Sports Reporter</h2>
                    <p>0 Open Positions</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-box athletic-trainer">
                <div class="icon-container">
                    <i class="fas fa-dumbbell" style="color:#0A65CC; font-size:26px;"></i> <!-- Default icon size -->
                </div>
                <div>
                    <h2>Athletic Trainer</h2>
                    <p>0 Open Positions</p>
                </div>
            </div>
        </div>
    </div>
</div>

        
        
    <!--popular job catefory end-->
    
    <!--end category real-->
             
             
    <!--banner image slide start-->
    
        <style>
            .custom-container {
                max-width: 90%; 
                margin: auto;
            }
            .banner-container {
                height: 350px; /* Default height for desktop */
                overflow: hidden; 
                border-radius: 10px;
            }
            .banner-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        
            /* Mobile View: Reduce height */
            @media (max-width: 768px) {
                .banner-container {
                    height: 180px; /* Reduce height for mobile */
                }
            }
        </style>
        
        <div class="custom-container my-4">
            <div class="banner-container">
                <img src="https://plus.unsplash.com/premium_photo-1676634832558-6654a134e920?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Banner Image">
            </div>
        </div>

    
    
    
    <!--banner image slide end-->
             
             
             
    <!--down category item start-->

   
        <div class="custom-container design-content">
            <div style="color:black">Sports Game Play</div>
            <div class="image-containerr">
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/2161667642/photo/female-soccer-players-celebrating-victory-on-soccer-field.jpg?s=1024x1024&w=is&k=20&c=3mvON3kZ321gfPA3meUZo_psyubAeVndGQ_G5FuQsV8=" alt="Soccer Celebration">
                    <p>Soccer Celebration</p>
                </div>
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/954392486/photo/excited-female-soccer-team-celebrating-they-just-won-a-game.jpg?s=1024x1024&w=is&k=20&c=neOAYJ0_wjM3A82PlD6lbpYPrMpUU_YnZxB9PyMk5xY=" alt="Soccer Team Win">
                    <p>Soccer Team Win</p>
                </div>
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/1378294895/photo/mujeres-jugando-futbol-soccer.jpg?s=1024x1024&w=is&k=20&c=iGk86GHi5511-0ySm7oZzD3FP7hH8sv77pZJxjbli4Y=" alt="Women Playing Soccer">
                    <p>Women Playing Soccer</p>
                </div>
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/994269704/photo/kabaddi-at-shoolini-fair-in-thodo-ground-solan-himachal-pradesh.jpg?s=1024x1024&w=is&k=20&c=gTque5cRevggkK9GXbR6IHtzSmGmjzHKu0wiKzyshmY=" alt="Kabaddi Match">
                    <p>Kabaddi Match</p>
                </div>
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/1646446701/photo/throwing-the-winning-ball.jpg?s=1024x1024&w=is&k=20&c=RD_VEpc7KC4adHyFyZxvEvNoiu3xv4nrd22IsiuAZZ0=" alt="Basketball Shot">
                    <p>Cricket</p>
                </div>
                <div class="image-box">
                    <img src="https://media.istockphoto.com/id/1454027606/photo/female-volleyball-player-spiking-the-ball-during-game-at-sports-court.webp?s=1024x1024&w=is&k=20&c=uptPK2xI0yAHo3c1vxYWpDM8zvAK-jP82xjkjnW9Hz0=" alt="Volleyball Spike">
                    <p>Volleyball Spike</p>
                </div>
                   <div class="image-box">
                    <img src="https://media.istockphoto.com/id/2161667642/photo/female-soccer-players-celebrating-victory-on-soccer-field.jpg?s=1024x1024&w=is&k=20&c=3mvON3kZ321gfPA3meUZo_psyubAeVndGQ_G5FuQsV8=" alt="Soccer Celebration">
                    <p>Soccer Celebration</p>
                </div>
                 <div class="image-box">
                    <img src="https://media.istockphoto.com/id/954392486/photo/excited-female-soccer-team-celebrating-they-just-won-a-game.jpg?s=1024x1024&w=is&k=20&c=neOAYJ0_wjM3A82PlD6lbpYPrMpUU_YnZxB9PyMk5xY=" alt="Soccer Team Win">
                    <p>Soccer Team Win</p>
                </div>
                 <div class="image-box">
                    <img src="https://media.istockphoto.com/id/994269704/photo/kabaddi-at-shoolini-fair-in-thodo-ground-solan-himachal-pradesh.jpg?s=1024x1024&w=is&k=20&c=gTque5cRevggkK9GXbR6IHtzSmGmjzHKu0wiKzyshmY=" alt="Kabaddi Match">
                    <p>Kabaddi Match</p>
                </div>
             
            </div>
</div>
        
        <hr>
        
        <style>
        
            .design-content{
                border:1px solid #ccc; border-radius:10px; padding:20px;
            }
        
            @media (max-width: 768px) {
                .design-content {
                    border: none;
                    padding: 0px;
                }
            }
          .custom-container > div:first-child {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
   
        
        .image-containerr {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            gap: 20px;
            padding: 10px;
            scroll-behavior: smooth;
        }
        
        .image-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 190px; 
            flex-shrink: 0; 
        }
        
        .image-box img {
            width: 100%; 
            height: 120px; 
            border-radius: 8px;
            object-fit: 
        }
        
        .image-box p {
            margin-top: 5px;
            font-size: 14px;
            color: black;
            font-weight: bold;
        }
        
        /* Hide scrollbar for cleaner look */
        .image-containerr::-webkit-scrollbar {
            display: none;
        }
        
        </style>

    <!--down category iten end-->
    
    
    <!--small iten start //////////////////////////////////////-->
<style>
   .custom-containerrr {
    max-width: 90%;
    margin: auto;
    overflow-x: auto; /* Horizontal scroll enable */
    white-space: nowrap; /* Row me ek line me rakhne ke liye */
    padding: 10px 0;
}

.category-container {
    display: flex;
    flex-wrap: nowrap; /* Ek line me rakhne ke liye */
    gap: 10px; /* Kam gap */
    overflow-x: auto; /* Horizontal scrolling */
    scrollbar-width: thin; /* Firefox ke liye */
    scrollbar-color: #ccc transparent;
}

.category-container::-webkit-scrollbar {
    height: 5px;
}

.category-container::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 10px;
}

.category-box {
    min-width: 100px; /* Box width */
    text-align: center;
}

.image-container {
    width: 80px; /* Box ko square rakhne ke liye */
    height: 80px;
    border-radius: 10px; /* Box ka border-radius */
    overflow: hidden; /* Ensure ki image box ke bahar na nikle */
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure karega ki image box ke andar properly fit ho */
    border-radius: 10px; /* Image ke edges bhi rounded ho */
}

</style>

<div class="custom-containerrr">
    <p style="color:black; margin-top:10px;font-size:20px; font-weight:bold">Logo Advertisement</p>
    <div class="category-container">
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://img.freepik.com/premium-vector/sports-store-logo-design-vector-editable-template_648761-247.jpg?semt=ais_hybrid" alt="Gym">
            </div>
            <h6 style="font-size:15px">Gym</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQALbwHjn4wMeXnX8e6ky2utOWSh4Rmp2ZeJNuRxfCUO8UbroxQSzmlurzJGe2PREx1JIA&usqp=CAU" alt="Football">
            </div>
            <h6 style="font-size:15px">Football</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqt-O2ExX_1Zl2mBItGhLpmcM66zTuDxXvfwSYM7CnD-SL9Vz0PS7Dge10wL843s8bD6I&usqp=CAU" alt="Skiing">
            </div>
            <h6 style="font-size:15px">Skiing</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhQ3csquiAzyfRSwMfVKlDRm-Gk6AImv9ZmzFDMryiGSelWf6g5hAsz1QLq04MJ5qmx-E&usqp=CAU" alt="Basket Ball">
            </div>
            <h6 style="font-size:15px">Basket Ball</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaMy-f62ritBeZG_RQ_tseMlHGsRqeRKS7PHfp4ph1Ih0d_SMbcrpfcrmeSQZs5h62Vbs&usqp=CAU" alt="Badminton">
            </div>
            <h6 style="font-size:15px">Badminton</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBahAgn_Exn9JEsF9CZbZlj3sx7yq8osmjaantqerYnIFkFeeVpw7RVFNww3VAxKAlKoI&usqp=CAU" alt="Baseball">
            </div>
            <h6 style="font-size:15px">Baseball</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8FmpmwqeoLGGdxr4N-k3Wj1GYi5j92C2d4w&s" alt="Hockey">
            </div>
            <h6 style="font-size:15px">Hockey</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5dotMQWe9Dw32jjujNpoha3Jh6slQ6W_moA&s" alt="Twister">
            </div>
            <h6 style="font-size:15px">Twister</h6>
        </div>
        <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5Q7O1eHec_g3u9V9CuhKwfooaIJtpcNP3Gg&s" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXnRfSfHaFIHkTXJ8ReL1QbDdCiuZtnxMDMPqJd-oED2B2MoiugFSN9jTSK69uO8tMm24&usqp=CAU" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2oXOs1lrXMoqHfOT1zrkdgXwPyPxDV3I54ZhjzLLXJeiwcmukorJXhHOkx_wbEsrDUkw&usqp=CAU" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://img.pikbest.com/origin/09/19/25/11apIkbEsTiEm.png!w700wp" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8Ji5KvRXlg-ag1yH9-cc_ZKqsUffu3iu6KE8Lh8mq4uB907cJxwLGJzwWuA1fGa0KUhQ&usqp=CAU" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQs9GkLVRTJ7aeyd4uv20HAZ2dGDsts6G8yIJIIPL-a1NRFOk95cY_HyiFQ3iNEqxlts&usqp=CAU" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJsxhJd5ITCw4Vo0XQ1hX8j1504xZUMbrxrSOsgZjnfr-51upRuNo-d-Hg0zyXO0W1hrM&usqp=CAU" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
          <div class="category-box">
            <div class="image-container" style="padding:0px">
                <img src="https://thumbs.dreamstime.com/z/cricket-ball-crossed-clubs-center-golden-wreath-shield-sport-logo-any-team-white-cricket-ball-135886828.jpg" alt="Board Game">
            </div>
            <h6 style="font-size:15px">Board Game</h6>
        </div>
    </div>
</div>

    
    <!--small iten end-->
    
    
    
    <!--just dial slider and card main page start-->
    
<style>

@media (max-width: 992px) {
    .slider-container {
        height: 180px; /* Mobile view me height choti kar di */
    }

    .slider img {
        height: 180px; /* Slider image bhi small ho jayegi */
    }

    .card {
        height: 150px; /* Chhoti cards ki height adjust */
    }

    .card img {
        height: 100%; /* Image stretch na ho */
    }
}


    .custom-container {
        width: 90%;
        margin: auto;
    }
    .main-container {
        display: flex;
        gap: 20px;
    }
 .slider-container {
    flex: 0 0 45%;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    width: 100%;
    height: 232px;
    display: flex;
    align-items: center; /* Image ko vertically center karne ke liye */
}

.slider {
    display: flex;
    width: 300%;
    transition: transform 0.5s ease-in-out;
}

.slider img {
    width: 100%;
    height: 100%; /* Yeh ensure karega ki image pura card fill kare */
    object-fit: cover; /* Image zoom ya crop nahi hogi, pura card cover karegi */
    flex-shrink: 0;
}

    .cards-container {
        flex: 0 0 57%;
        display: flex;
        gap: 20px;
    }
    .card {
        flex: 1;
        height: 232px;
        border-radius: 10px;
        overflow: hidden;
    }
    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .slider img{
         object-fit: contain; /* Zoom hata diya, pura fit ho jayega */
    }
    /* Mobile Responsive */
    @media (max-width: 992px) {
        .main-container {
            flex-direction: column;
        }
        .slider-container, .cards-container {
            flex: 0 0 100%;
        }
        .cards-container {
            flex-wrap: nowrap;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            white-space: nowrap;
        }
        .card {
            min-width: 80%;
            scroll-snap-align: start;
        }
    }
</style>

<div class="custom-container mt-4">
    <div class="main-container">
        <!-- Slider Section -->
        <div class="slider-container">
            <div class="slider">
                <img src="https://www.shutterstock.com/shutterstock/photos/2492106221/display_1500/stock-vector-badminton-sports-background-vector-international-sports-day-illustration-graphic-design-for-the-2492106221.jpg" alt="Slide 1">
                <img src="https://www.shutterstock.com/shutterstock/photos/2223707959/display_1500/stock-vector-soccer-template-design-football-banner-sport-layout-design-red-theme-vector-2223707959.jpg" alt="Slide 2">
                <img src="https://www.shutterstock.com/shutterstock/photos/2508420495/display_1500/stock-vector-soccer-player-of-team-a-and-team-b-banner-design-vector-team-a-vs-team-b-football-player-in-action-2508420495.jpg" alt="Slide 3">
            </div>
        </div>

        <!-- Cards Section -->
        <div class="cards-container">
            <div class="card">
                <img src="https://www.shutterstock.com/shutterstock/photos/52081696/display_1500/stock-vector-soccer-ball-on-green-background-vector-abstract-classical-football-poster-for-design-beautiful-52081696.jpg" alt="Card 1">
            </div>
            <div class="card">
                <img src="https://www.shutterstock.com/shutterstock/photos/2169475279/display_1500/stock-vector-whey-protein-powder-ad-poster-d-illustration-of-a-whey-protein-jar-with-powder-explosion-effect-2169475279.jpg" alt="Card 2">
            </div>
            <div class="card">
                <img src="https://www.shutterstock.com/shutterstock/photos/2574675189/display_1500/stock-vector-vector-illustration-of-bowling-night-poster-banner-template-design-2574675189.jpg" alt="Card 3">
            </div>
            <div class="card">
                <img src="https://www.shutterstock.com/shutterstock/photos/1146564353/display_1500/stock-vector-organic-bottle-milk-ads-with-splashing-liquid-on-grassland-in-d-illustration-1146564353.jpg" alt="Card 4">
            </div>
        </div>
    </div>
</div>



<script>
    let index = 0;
    function autoSlide() {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slider img');
        index = (index + 1) % slides.length;
        slider.style.transform = `translateX(-${index * 100}%)`;
    }
    setInterval(autoSlide, 2000); // Fast slide (2 sec)
</script>






    
    
    <!--end slider-->
    
    

  <!-- Category-area start -->
  <?php if($secInfo->category_section_status == 1): ?>
    <section class="category-area category-2 pt-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-inline mb-20" data-aos="fade-up">
              <h2 class="title mb-20"><?php echo e($catgorySecInfo ? $catgorySecInfo->title : 'CATEGORIES'); ?></h2>
            </div>
          </div>
          <div class="col-12">
            <?php if(count($categories) < 1): ?>
              <div class="text-center">
                <h3 class="mb-0"><?php echo e(__('NO CATEGORY FOUND') . '!'); ?></h3>
              </div>
            <?php else: ?>
              <div class="swiper" id="category-slider-1" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                      <a href="<?php echo e(route('frontend.listings', ['category_id' => $category->slug])); ?>">
                        <div class="category-item border radius-md text-center">
                          <div class="category-icon">
                            <i class="<?php echo e($category->icon); ?>"></i>
                          </div>
                          <h3 class="category-title mb-0"><?php echo e($category->name); ?></h3>
                          <span class="category-qty"><?php echo e($category->listing_contents_count); ?></span>
                        </div>
                      </a>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Slider Pagination -->
                <div class="swiper-pagination position-static mt-40" id="category-slider-1-pagination">
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-9.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-10.svg')); ?>" alt="Shape">
      </div>
    </section>
  <?php endif; ?>
  <!-- Category-area end -->

  <!--Featured Product-area start -->
  <?php if($secInfo->featured_listing_section_status == 1): ?>
    <section class="product-area pt-100 pb-60">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3">
            <div class="content-title mb-40" data-aos="fade-up">
              <h2 class="title mb-15"><?php echo e($listingSecInfo ? $listingSecInfo->title : 'LISTINGS'); ?></h2>
              <p class="text mb-20">
                <?php echo e(@$listingSecInfo->subtitle); ?>

              </p>
              <?php if(count($total_listing_contents) > count($listing_contents)): ?>
                <a href="<?php echo e(route('frontend.listings')); ?>"
                  class="btn btn-lg btn-primary rounded-pill"><?php echo e($listingSecInfo ? $listingSecInfo->button_text : 'More'); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-9">
            <?php if(count($listing_contents) < 1): ?>
              <h3 class="text-center mt-2"><?php echo e(__('NO LISTING FOUND')); ?></h3>
            <?php else: ?>
              <div class="swiper mb-40" id="product-slider-1">
                <div class="swiper-wrapper">

                  <?php $__currentLoopData = $listing_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide" data-aos="fade-up">
                      <div class="product-default border radius-md mb-25">
                        <figure class="product-img">
                          <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"
                            class="lazy-container ratio ratio-2-3">
                            <img class="lazyload"
                              data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
                              alt="<?php echo e(optional($listing_content)->title); ?>">
                          </a>
                          <?php if(Auth::guard('web')->check()): ?>
                            <?php
                              $user_id = Auth::guard('web')->user()->id;
                              $checkWishList = checkWishList($listing_content->id, $user_id);
                            ?>
                          <?php else: ?>
                            <?php
                              $checkWishList = false;
                            ?>
                          <?php endif; ?>
                          <a href="<?php echo e($checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id)); ?>"
                            class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>"
                            data-tooltip="tooltip" data-bs-placement="top"
                            title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
                            <i class="fal fa-heart"></i>
                          </a>
                        </figure>
                        <div class="product-details">
                          <div class="product-top mb-10">
                            <?php
                              if ($listing_content->vendor_id == 0) {
                                  $vendorInfo = App\Models\Admin::first();
                                  $userName = 'admin';
                              } else {
                                  $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                                  $userName = $vendorInfo->username;
                              }
                            ?>

                            <div class="author">
                              <a class="color-medium"
                                href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>" target="_self"
                                title=<?php echo e($vendorInfo->username); ?>>

                                <?php if($listing_content->vendor_id == 0): ?>
                                  <img class="lazyload" src="assets/images/placeholder.png"
                                    data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                                <?php else: ?>
                                  <?php if($vendorInfo->photo != null): ?>
                                    <img class="blur-up lazyload"
                                      data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>"
                                      alt="Image">
                                  <?php else: ?>
                                    <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>"
                                      alt="Image">
                                  <?php endif; ?>
                                <?php endif; ?>
                                <span><?php echo e(__('By')); ?>

                                  <?php echo e($vendorInfo->username); ?>

                                </span>
                              </a>
                            </div>
                            <?php
                              $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                            ?>

                            <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                              title="Link" class="product-category font-sm icon-start">
                              <i class="<?php echo e($listing_content->icon); ?>"></i><?php echo e($listing_content->category_name); ?>

                            </a>
                          </div>
                          <h5 class="product-title mb-10"><a
                              href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>">
                              <?php echo e(optional($listing_content)->title); ?></a></h5>

                          <div class="product-ratings mb-10">
                            <div class="ratings">
                              <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                                <div class="rating-icon"
                                  style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing_content->average_rating * 20 . '%;'); ?>">
                                </div>
                              </div>
                              <span class="ratings-total font-sm">(<?php echo e($listing_content->average_rating); ?>)</span>
                              <span
                                class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

                                <?php echo e(__('Reviews')); ?></span>
                            </div>
                          </div>
                          <?php
                            $city = null;
                            $State = null;
                            $country = null;

                            if ($listing_content->city_id) {
                                $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()->name;
                            }
                            if ($listing_content->state_id) {
                                $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                    ->name;
                            }
                            if ($listing_content->country_id) {
                                $country = App\Models\Location\Country::Where(
                                    'id',
                                    $listing_content->country_id,
                                )->first()->name;
                            }

                          ?>
                          <span class="product-location icon-start font-sm"><i
                              class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?>

                            <?php if(@$State): ?>
                              ,<?php echo e($State); ?>

                              <?php endif; ?> <?php if(@$country): ?>
                                ,<?php echo e(@$country); ?>

                              <?php endif; ?>
                          </span>

                          <?php if($listing_content->max_price && $listing_content->min_price): ?>
                            <div class="product-price mt-10 pt-10 border-top">
                              <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                              <h6 class="price mb-0 lh-1">
                                <?php echo e(symbolPrice($listing_content->min_price)); ?> -
                                <?php echo e(symbolPrice($listing_content->max_price)); ?>

                              </h6>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div><!-- product-default -->
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <!-- Slider pagination -->
                <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-11.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-12.svg')); ?>" alt="Shape">
      </div>
    </section>
  <?php endif; ?>
  <!-- Product-area end -->

  <!-- Video banner start -->
  <?php if($secInfo->video_section == 1): ?>
    <section class="video-banner pt-100 pb-60">
      <!-- Background Image -->
      <img class="lazyload bg-img blur-up" src="<?php echo e(asset('assets/img/' . $videoSectionImage)); ?>" alt="Bg-img">
      <div class="overlay opacity-75"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="content-title mb-40" data-aos="fade-up">
              <h2 class="title color-white mb-10"><?php echo e(@$videoSecInfo->title); ?></h2>
              <p class="color-light mb-20 w-75 w-sm-100"><?php echo e(@$videoSecInfo->subtitle); ?></p>
              <?php if(@$videoSecInfo->button_url && @$videoSecInfo->button_name): ?>
                <a href="<?php echo e(@$videoSecInfo->button_url); ?>" class="btn btn-lg btn-primary rounded-pill"
                  target="_blank"><?php echo e(@$videoSecInfo->button_name); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <?php if(@$videoSecInfo->video_url): ?>
            <div class="col-lg-7 py-4 py-lg-0">
              <div class="h-100 position-relative mb-40" data-aos="fade-up">
                <a href="<?php echo e(@$videoSecInfo->video_url); ?>"
                  class="video-btn youtube-popup position-absolute top-50 start-50 translate-middle">
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Video banner end -->

  <!--Latest Product-area start -->
  <?php if($secInfo->latest_listing_section_status == 1): ?>
    <section class="product-area pt-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-center" data-aos="fade-up">
              <h2 class="title mb-30"><?php echo e($featuredSecInfo ? $featuredSecInfo->title : 'LISTINGS'); ?> </h2>
            </div>
          </div>
          <div class="col-12">
            <div class="tab-content">
              <div class="tab-pane fade active show">
                <div class="row">
                  <?php if(count($latest_listing_contents) < 1): ?>
                    <h3 class="text-center mt-2"><?php echo e(__('NO LISTING FOUND')); ?></h3>
                  <?php else: ?>
                    <?php $__currentLoopData = $latest_listing_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                        <div class="product-default border radius-md mb-25">
                          <figure class="product-img">
                            <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"
                              class="lazy-container ratio ratio-2-3">
                              <img class="lazyload"
                                data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
                                alt="<?php echo e(optional($listing_content)->title); ?>">
                            </a>
                            <?php if(Auth::guard('web')->check()): ?>
                              <?php
                                $user_id = Auth::guard('web')->user()->id;
                                $checkWishList = checkWishList($listing_content->id, $user_id);
                              ?>
                            <?php else: ?>
                              <?php
                                $checkWishList = false;
                              ?>
                            <?php endif; ?>
                            <a href="<?php echo e($checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id)); ?>"
                              class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>"
                              data-tooltip="tooltip" data-bs-placement="top"
                              title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
                              <i class="fal fa-heart"></i>
                            </a>
                          </figure>
                          <div class="product-details">
                            <div class="product-top mb-10">
                              <?php
                                if ($listing_content->vendor_id == 0) {
                                    $vendorInfo = App\Models\Admin::first();
                                    $userName = 'admin';
                                } else {
                                    $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                                    $userName = $vendorInfo->username;
                                }
                              ?>

                              <div class="author">
                                <a class="color-medium"
                                  href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>"
                                  target="_self" title=<?php echo e($vendorInfo->username); ?>>

                                  <?php if($listing_content->vendor_id == 0): ?>
                                    <img class="lazyload" src="assets/images/placeholder.png"
                                      data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                                  <?php else: ?>
                                    <?php if($vendorInfo->photo != null): ?>
                                      <img class="blur-up lazyload"
                                        data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>"
                                        alt="Image">
                                    <?php else: ?>
                                      <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>"
                                        alt="Image">
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <span><?php echo e(__('By')); ?>

                                    <?php echo e($vendorInfo->username); ?>

                                  </span>
                                </a>
                              </div>
                              <?php
                                $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                              ?>

                              <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                                title="Link" class="product-category font-sm icon-start">
                                <i class="<?php echo e($listing_content->icon); ?>"></i><?php echo e($listing_content->category_name); ?>

                              </a>
                            </div>
                            <h5 class="product-title mb-10"><a
                                href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"><?php echo e(optional($listing_content)->title); ?></a>
                            </h5>

                            <div class="product-ratings mb-10">
                              <div class="ratings">
                                <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                                  <div class="rating-icon"
                                    style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing_content->average_rating * 20 . '%;'); ?>">
                                  </div>
                                </div>
                                <span class="ratings-total font-sm">(<?php echo e($listing_content->average_rating); ?>)</span>
                                <span
                                  class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

                                  <?php echo e(__('Reviews')); ?></span>
                              </div>
                            </div>
                            <?php
                              $city = null;
                              $State = null;
                              $country = null;

                              if ($listing_content->city_id) {
                                  $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()
                                      ->name;
                              }
                              if ($listing_content->state_id) {
                                  $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                      ->name;
                              }
                              if ($listing_content->country_id) {
                                  $country = App\Models\Location\Country::Where(
                                      'id',
                                      $listing_content->country_id,
                                  )->first()->name;
                              }

                            ?>
                            <span class="product-location icon-start font-sm"><i
                                class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?>

                              <?php if(@$State): ?>
                                ,<?php echo e($State); ?>

                                <?php endif; ?> <?php if(@$country): ?>
                                  ,<?php echo e(@$country); ?>

                                <?php endif; ?>
                            </span>
                            <?php if($listing_content->max_price && $listing_content->min_price): ?>
                              <div class="product-price mt-10 pt-10 border-top">
                                <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                                <h6 class="price mb-0 lh-1">
                                  <?php echo e(symbolPrice($listing_content->min_price)); ?> -
                                  <?php echo e(symbolPrice($listing_content->max_price)); ?>

                                </h6>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div><!-- product-default -->
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php if(count($latest_listing_content_total) > count($listing_contents)): ?>
              <div class="text-center mt-20">
                <a href="<?php echo e(route('frontend.listings')); ?>"
                  class="btn btn-lg btn-primary rounded-pill"><?php echo e($featuredSecInfo ? $featuredSecInfo->button_text : 'More'); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-13.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-16.svg')); ?>" alt="Shape">
        <img class="shape-3" src="<?php echo e(asset('assets/front/images/shape/shape-15.svg')); ?>" alt="Shape">
        <img class="shape-4" src="<?php echo e(asset('assets/front/images/shape/shape-14.svg')); ?>" alt="Shape">
      </div>

    </section>
  <?php endif; ?>
  <!-- Product-area end -->

  <!-- Pricing-area start -->
  <?php if($secInfo->package_section_status == 1): ?>
    <section class="pricing-area pt-100 pb-75">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-center mb-40" data-aos="fade-up">
              <h2 class="title"><?php echo e($packageSecInfo ? $packageSecInfo->title : 'Most Affordable Package'); ?>

              </h2>
            </div>
            <div class="tabs-navigation tabs-navigation-2 text-center mb-40" data-aos="fade-up">
              <ul class="nav nav-tabs rounded-pill" data-hover="fancyHover">
                <?php
                  $totalTerms = count($terms);
                  $middleTerm = intdiv($totalTerms, 2);
                ?>
                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="nav-item <?php echo e($index == $middleTerm ? 'active' : ''); ?>">
                    <button class="nav-link hover-effect rounded-pill <?php echo e($index == $middleTerm ? 'active' : ''); ?>"
                      data-bs-toggle="tab" data-bs-target="#<?php echo e(strtolower($term)); ?>" type="button">
                      <?php echo e(__($term)); ?>

                    </button>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
          <div class="col-12">
            <div class="tab-content">
              <?php if(count($terms) < 1): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO PACKAGE FOUND')); ?></h3>
              <?php else: ?>
                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="tab-pane fade <?php echo e($index == $middleTerm ? 'show active' : ''); ?>"
                    id="<?php echo e(strtolower($term)); ?>">
                    <div class="row justify-content-center">
                      <?php
                        $packages = \App\Models\Package::where('status', '1')->where('term', strtolower($term))->get();
                        $totalItems = count($packages);
                        $middleIndex = intdiv($totalItems, 2);
                      ?>
                      <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $permissions = $package->features;
                          if (!empty($package->features)) {
                              $permissions = json_decode($permissions, true);
                          }
                        ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                          <div class="pricing-item radius-lg <?php echo e($package->recommended ? 'active' : ''); ?> mb-30">
                            <div class="d-flex align-items-center">
                              <div class="icon"><i class="<?php echo e($package->icon); ?>"></i></div>
                              <div class="label">
                                <h3> <?php echo e(__($package->title)); ?></h3>
                                <?php if($package->recommended == '1'): ?>
                                  <span><?php echo e(__('Popular')); ?></span>
                                <?php endif; ?>

                              </div>
                            </div>
                            <p class="text"></p>
                            <div class="d-flex align-items-center">
                              <span class="price"><?php echo e(symbolPrice($package->price)); ?></span>
                              <?php if($package->term == 'monthly'): ?>
                                <span class="period">/ <?php echo e(__('Monthly')); ?></span>
                              <?php elseif($package->term == 'yearly'): ?>
                                <span class="period">/ <?php echo e(__('Yearly')); ?></span>
                              <?php elseif($package->term == 'lifetime'): ?>
                                <span class="period">/ <?php echo e(__('Lifetime')); ?></span>
                              <?php endif; ?>
                            </div>
                            <h5><?php echo e(__('What\'s Included')); ?></h5>
                            <ul class="item-list list-unstyled p-0 pricing-list">

                              <li><i class="fal fa-check"></i>
                                <?php if($package->number_of_listing == 999999): ?>
                                  <?php echo e(__('Listing (Unlimited)')); ?>

                                <?php elseif($package->number_of_listing == 1): ?>
                                  <?php echo e(__('Listing')); ?> (<?php echo e($package->number_of_listing); ?>)
                                <?php else: ?>
                                  <?php echo e(__('Listings')); ?> (<?php echo e($package->number_of_listing); ?>)
                                <?php endif; ?>
                              </li>

                              <li><i class="fal fa-check"></i>
                                <?php if($package->number_of_images_per_listing == 999999): ?>
                                  <?php echo e(__('Images Per Listing (Unlimited)')); ?>

                                <?php elseif($package->number_of_images_per_listing == 1): ?>
                                  <?php echo e(__('Image Per Listing')); ?> (<?php echo e($package->number_of_images_per_listing); ?>)
                                <?php else: ?>
                                  <?php echo e(__('Images Per Listings')); ?> (<?php echo e($package->number_of_images_per_listing); ?>)
                                <?php endif; ?>
                              </li>
                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('Listing Enquiry Form', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Enquiry Form')); ?>

                              </li>

                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('Video', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Video')); ?>

                              </li>

                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                                <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
                                  <?php if($package->number_of_amenities_per_listing == 999999): ?>
                                    <?php echo e(__('Amenities Per Listing(Unlimited)')); ?>

                                  <?php elseif($package->number_of_amenities_per_listing == 1): ?>
                                    <?php echo e(__('Amenitie Per Listing')); ?> (<?php echo e($package->number_of_amenities_per_listing); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('Amenities Per Listing')); ?>

                                    (<?php echo e($package->number_of_amenities_per_listing); ?>)
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php echo e(__('Amenities Per Listing')); ?>

                                <?php endif; ?>
                              </li>

                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                                <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                                  <?php if($package->number_of_additional_specification == 999999): ?>
                                    <?php echo e(__('Feature Per Listing (Unlimited)')); ?>

                                  <?php elseif($package->number_of_additional_specification == 1): ?>
                                    <?php echo e(__('Feature Per Listing')); ?>

                                    (<?php echo e($package->number_of_additional_specification); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('Features Per Listing')); ?>

                                    (<?php echo e($package->number_of_additional_specification); ?>)
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php echo e(__('Feature Per Listing')); ?>

                                <?php endif; ?>
                              </li>
                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                                <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                                  <?php if($package->number_of_social_links == 999999): ?>
                                    <?php echo e(__('Social Links Per Listing(Unlimited)')); ?>

                                  <?php elseif($package->number_of_social_links == 1): ?>
                                    <?php echo e(__('Social Link Per Listing')); ?> (<?php echo e($package->number_of_social_links); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('Social Links Per Listing')); ?> (<?php echo e($package->number_of_social_links); ?>)
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php echo e(__('Social Link Per Listing')); ?>

                                <?php endif; ?>
                              </li>
                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
                                  <?php if($package->number_of_faq == 999999): ?>
                                    <?php echo e(__('FAQ Per Listing(Unlimited)')); ?>

                                  <?php elseif($package->number_of_faq == 1): ?>
                                    <?php echo e(__('FAQ Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('FAQs Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php echo e(__('FAQ Per Listing')); ?>

                                <?php endif; ?>
                              </li>

                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('Business Hours', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Business Hours')); ?>

                              </li>
                              <li><i
                                  class=" <?php if(is_array($permissions) && in_array('Products', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                                  <?php if($package->number_of_products == 999999): ?>
                                    <?php echo e(__('Products Per Listing (Unlimited)')); ?>

                                  <?php elseif($package->number_of_products == 1): ?>
                                    <?php echo e(__('Product Per Listing')); ?> (<?php echo e($package->number_of_products); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('Products Per Listing')); ?> (<?php echo e($package->number_of_products); ?>)
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php echo e(__('Products Per Listing')); ?>

                                <?php endif; ?>
                              </li>

                              <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                                <li><i class="fal fa-check"></i>
                                  <?php if($package->number_of_images_per_products == 999999): ?>
                                    <?php echo e(__('Product Image Per Product (Unlimited)')); ?>

                                  <?php elseif($package->number_of_images_per_products == 1): ?>
                                    <?php echo e(__('Product Image Per Product')); ?>

                                    (<?php echo e($package->number_of_images_per_products); ?>)
                                  <?php else: ?>
                                    <?php echo e(__('Product Images Per Product')); ?>

                                    (<?php echo e($package->number_of_images_per_products); ?>)
                                  <?php endif; ?>

                                </li>
                              <?php else: ?>
                                <li><i class="fal fa-times not-active"></i>
                                  <?php echo e(__('Product Image Per Product')); ?></li>
                              <?php endif; ?>


                              <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                                <li><i
                                    class=" <?php if(is_array($permissions) && in_array('Product Enquiry Form', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                  <?php echo e(__('Product Enquiry Form')); ?> </li>
                              <?php else: ?>
                                <li><i class="fal fa-times not-active"></i>
                                  <?php echo e(__('Product Enquiry Form')); ?></li>
                              <?php endif; ?>
                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('Messenger', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Messenger')); ?>

                              </li>
                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('WhatsApp', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('WhatsApp')); ?>

                              </li>
                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('Telegram', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Telegram')); ?>

                              </li>
                              <li>
                                <i
                                  class=" <?php if(is_array($permissions) && in_array('Tawk.To', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                                <?php echo e(__('Tawk.To')); ?>

                              </li>


                              <?php if(!is_null($package->custom_features)): ?>
                                <?php
                                  $features = explode("\n", $package->custom_features);
                                ?>
                                <?php if(count($features) > 0): ?>
                                  <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="fal fa-check"></i><?php echo e(__($value)); ?>

                                    </li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              <?php endif; ?>

                            </ul>
                            <?php if(auth()->guard('vendor')->check()): ?>
                              <a href="<?php echo e(route('vendor.plan.extend.checkout', $package->id)); ?>"
                                class="btn btn-outline btn-lg" title="Purchase" target="_self"><?php echo e(__('Purchase')); ?></a>
                            <?php endif; ?>
                            <?php if(auth()->guard('vendor')->guest()): ?>
                              <a href="<?php echo e(route('vendor.login', ['redirectPath' => 'buy_plan', 'package' => $package->id])); ?>"
                                class="btn btn-outline btn-lg" title="Purchase" target="_self"><?php echo e(__('Purchase')); ?></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-3.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-6.svg')); ?>" alt="Shape">
        <img class="shape-3" src="<?php echo e(asset('assets/front/images/shape/shape-5.svg')); ?>" alt="Shape">
        <img class="shape-4" src="<?php echo e(asset('assets/front/images/shape/shape-2.svg')); ?>" alt="Shape">
      </div>
    </section>
  <?php endif; ?>
  <!-- Pricing-area end -->

  <!-- Testimonial-area start -->
  <?php if($secInfo->testimonial_section_status == 1): ?>
    <section class="testimonial-area testimonial-1 pb-60">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="content w-75" data-aos="fade-up">
              <div class="content-title">
                <h2 class="title mb-15">
                  <?php echo e(!empty($testimonialSecInfo->title) ? $testimonialSecInfo->title : ''); ?>

                </h2>
              </div>
              <p class="text mb-20 w-75">
                <?php echo e(!empty($testimonialSecInfo->subtitle) ? $testimonialSecInfo->subtitle : ''); ?>

              </p>
              <!-- Slider navigation buttons -->
              <div class="slider-navigation">
                <button type="button" title="Slide prev" class="slider-btn btn-outline rounded-pill"
                  id="testimonial-slider-btn-prev">
                  <i class="fal fa-angle-left"></i>
                </button>
                <button type="button" title="Slide next" class="slider-btn btn-outline rounded-pill"
                  id="testimonial-slider-btn-next">
                  <i class="fal fa-angle-right"></i>
                </button>
              </div>
            </div>
            <div class="swiper pt-30 mb-15" id="testimonial-slider-1">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide pb-25" data-aos="fade-up">
                    <div class="slider-item radius-md">
                      <div class="quote">
                        <span class="icon"><i class="fas fa-quote-left"></i></span>
                        <p class="text mb-0">
                          <?php echo e($testimonial->comment); ?>

                        </p>
                      </div>
                      <div class="client-info d-flex align-items-center">
                        <div class="client-img">
                          <div class="lazy-container rounded-pill ratio ratio-1-1">
                            <img class="lazyload" data-src="<?php echo e(asset('assets/img/clients/' . $testimonial->image)); ?>"
                              alt="Person Image">
                          </div>
                        </div>
                        <div class="content">
                          <h6 class="name"><?php echo e($testimonial->name); ?></h6>
                          <span class="designation"><?php echo e($testimonial->occupation); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="img-content mb-40" data-aos="fade-left">
              <div class="img">
                <img class="lazyload blur-up" data-src="<?php echo e(asset('assets/img/' . $testimonialSecImage)); ?>"
                  alt="Image">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-15.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-14.svg')); ?>" alt="Shape">
        <img class="shape-3" src="<?php echo e(asset('assets/front/images/shape/shape-13.svg')); ?>" alt="Shape">
        <img class="shape-4" src="<?php echo e(asset('assets/front/images/shape/shape-16.svg')); ?>" alt="Shape">
      </div>
    </section>
  <?php endif; ?>
  <!-- Testimonial-area end -->

  <!-- Blog-area start -->
  <?php if($secInfo->blog_section_status == 1): ?>
    <section class="blog-area blog-2 pb-75">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-inline mb-30" data-aos="fade-up">
              <h2 class="title mb-20">
                <?php echo e(!empty($blogSecInfo->title) ? $blogSecInfo->title : 'Read Our Latest Blog'); ?>

              </h2>
              <?php if(count($blog_count) > count($blogs)): ?>
                <a href="<?php echo e(route('blog')); ?>" class="btn btn-lg btn-primary mb-20">
                  <?php echo e($blogSecInfo ? $blogSecInfo->button_text : 'More'); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-12">
            <div class="row justify-content-center">
              <?php if(count($blogs) < 1): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO POST FOUND') . '!'); ?></h3>
              <?php else: ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <article class="card radius-md mb-25">
                      <div class="card-img">
                        <a href="<?php echo e(route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id])); ?>"
                          class="lazy-container radius-md ratio ratio-16-10">
                          <img class="lazyload" data-src="<?php echo e(asset('assets/img/blogs/' . $blog->image)); ?>"
                            alt="Blog Image">
                        </a>
                      </div>
                      <div class="content border">
                        <h3 class="card-title mt-1">
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
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-20.svg')); ?>" alt="Shape">
        <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-18.svg')); ?>" alt="Shape">
        <img class="shape-3" src="<?php echo e(asset('assets/front/images/shape/shape-19.svg')); ?>" alt="Shape">
      </div>
    </section>
  <?php endif; ?>
  <!-- Blog-area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/front/js/search-home.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/home/index-v2.blade.php ENDPATH**/ ?>
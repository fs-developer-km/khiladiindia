@extends('frontend.layout')

@section('pageHeading')
  {{ __('Home') }}
@endsection
@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keyword_home }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_home }}
  @endif
@endsection

@section('content')
  <!-- Home-area start-->
  
  
  <!--login popup start code-->
  

  <!-- Include Popup -->
 @include('frontend.login_popup')
  
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
  
  <section class="hero-banner hero-banner-2 @if (count($cities) < 1) no-city @endif">
    <!-- Background Image -->

    @if ($heroSectionImage)
      <img class="lazyload blur-up bg-img" alt="Bg-img" src="{{ asset('assets/img/hero-section/' . $heroSectionImage) }}">
    @else
      <img class="lazyload blur-up bg-img" alt="Bg-img" data-src="{{ asset('assets/img/noimage.jpg') }}" alt="Banner">
    @endif

    <div class="overlay opacity-80"></div>
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-8 col-lg-10">
            
            
          <!--<div class="content text-center">-->
          <!--  <h1 class="title mb-10 color-white" data-aos="fade-up">-->
          <!--    {{ !empty($heroSection->title) ? $heroSection->title : 'Are You Looking For A business?' }}-->
          <!--  </h1>-->
          <!--  <p class="text color-light mb-30 mx-auto" data-aos="fade-up" data-aos-delay="100">-->
          <!--    {{ !empty($heroSection->text) ? $heroSection->text : '' }}-->
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
              <form action="{{ route('frontend.listings') }}" id="searchForm2" method="GET">
                <div class="row align-items-center gx-xl-3">
                  <div class="col-lg-4 col-md-6">
                    <div class="input-group border-end">
                      <label for="search"><i class="ico-shopping-mall"></i></label>
                      <input type="text" name="title" id="title" class="form-control"
                        placeholder="{{ __('I’m Looking for') }}">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-6">
                    <div class="input-group border-end">
                      <label for="category"><i class="ico-category"></i></label>
                      <select aria-label="categories" id="category_id" name="category_id"
                        class="select2 js-example-basic-single1">
                        <option value="">{{ __('All') }}</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->slug }}">{{ $category->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-group">
                      <label for="location"><i class="ico-location-pin"></i></label>
                      <input type="text" name="location" id="location" class="form-control"
                        placeholder="{{ __('Location') }}">
                    </div>
                  </div>
                  
                   
                  <div class="col-lg-2 col-md-6">
                    <button type="button" id="searchBtn2" class="btn btn-lg btn-primary rounded-pill icon-start w-100">
                      <i class="fal fa-search"></i>
                      <span class="d-lg-none">
                        {{ __('Search Now') }}
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

  @if ($secInfo->location_section_status == 1)
    <!-- City-area start -->
    <div class="city-area spacer-negative @if (count($cities) < 1) mt-0 pt-100 @endif">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">

            <div class="swiper px-3" id="city-slider-1" data-aos="fade-up">
              <div class="swiper-wrapper">
                @foreach ($cities as $city)
                  <div class="swiper-slide">
                    <div class="card radius-0">
                      <a href="{{ route('frontend.listings', ['city' => $city->id]) }}">
                        <div class="card-img">
                          <div class="lazy-container ratio ratio-1-3">
                            <img class="lazyload"
                              data-src="{{ asset('assets/img/location/city/' . $city->feature_image) }}"
                              alt="{{ $city->name }}">
                          </div>
                        </div>
                        <div class="card-text text-center">
                          <h5 class="card-title color-white mb-1">{{ $city->name }}</h5>
                          <span class="font-sm">{{ $city->listing_city_count }}
                            {{ __('Listing') }}</span>
                        </div>
                      </a>
                    </div>
                  </div>
                @endforeach

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
    

    
    
  @endif
  
  
  
                    <!--category menu for position-static start-->
                    
      <style>
/* General Category Styles */
.category-area {
    padding-top: 100px;
    padding-bottom: 50px;
}

.section-title.title-inline {
    text-align: center; /* Center heading */
    margin-bottom: 40px;
}

.category-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 20px; /* Space between items */
    max-width: 1400px;
    margin: auto;
}

.category-box {
    background: #fff;
    border-radius: 14px;
    padding: 15px 10px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s, border 0.3s;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

.category-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    border: 1px solid orange;
}

.category-box .image-container {
    background: #f9f9f9;
    border-radius: 50%;
    width: 70px;
    height: 70px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.category-box .image-container i {
    font-size: 28px;
    color: #ff7a00;
}

.category-box h6 {
    font-size: 14px;
    font-weight: 500;
    color: #111;
    margin-top: 8px;
}

.category-box .category-qty {
    font-size: 12px;
    color: #777;
    margin-top: 4px;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 576px) {
    .category-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 577px) and (max-width: 768px) {
    .category-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 769px) and (max-width: 992px) {
    .category-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (min-width: 993px) and (max-width: 1200px) {
    .category-container {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media (min-width: 1201px) {
    .category-container {
        grid-template-columns: repeat(6, 1fr);
    }
}
</style>

@if ($secInfo->category_section_status == 1)
<section class="category-area category-2">
  <div class="container">
    <div class="row mb-4">
      <div class="col-12">
        <div class="section-title title-inline" data-aos="fade-up">
          <h2 class="title mb-20">{{ $catgorySecInfo ? $catgorySecInfo->title : 'CATEGORIES' }}</h2>
        </div>
      </div>
    </div>

    @if (count($categories) < 1)
      <div class="text-center">
        <h3 class="mb-0">{{ __('NO CATEGORY FOUND') . '!' }}</h3>
      </div>
    @else
      <div class="category-container" data-aos="fade-up">
        @foreach($categories as $category)
          <a href="{{ route('frontend.listings', ['category_id' => $category->slug]) }}">
            <div class="category-box">
              <div class="image-container mb-2">
                <i class="{{ $category->icon }}"></i>
              </div>
              <h6 class="category-title mb-1">{{ $category->name }}</h6>
              <span class="category-qty">{{ $category->listing_contents_count }} Listings</span>
            </div>
          </a>
        @endforeach
      </div>
    @endif
  </div>

  <!-- Bg Shape -->
  <div class="shape">
    <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-9.svg') }}" alt="Shape">
    <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-10.svg') }}" alt="Shape">
  </div>
</section>
@endif


                
            
             <!--category menu for position-static end-->
             
             
             
    <!--category real from khiladi india start-->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<style>
.custom-products-slider {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .custom-products-slider {
        border: none;
        padding: 0px;
    }
}

.custom-products-slider-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: black;
}

.custom-swiper-container {
    padding: 20px 0;
}

.custom-swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 150px;
    position: relative;
}

.custom-swiper-slide img {
    width: 100%;
    height: 120px;
    border-radius: 8px;
    object-fit: cover;
}

.custom-swiper-slide p {
    margin-top: 5px;
    font-size: 14px;
    color: black;
    font-weight: bold;
}

/* Product overlay */
.custom-product-overlay, .custom-stock-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 8px;
}

.custom-swiper-slide:hover .custom-product-overlay {
    opacity: 1;
}

.custom-product-overlay .custom-icon, .custom-stock-overlay span {
    color: #fff;
    font-size: 16px;
}
</style>

<div class="custom-container custom-products-slider">
    <div class="custom-products-slider-title">Trending Products</div>

    <div class="swiper custom-swiper-container">
        <div class="swiper-wrapper">
            @foreach($products as $product)
                <div class="swiper-slide custom-swiper-slide">
                    <a href="{{ route('shop.product_details', ['slug' => $product->slug]) }}">
                        <img class="lazyload" src="{{ asset('assets/admin/front/images/placeholder.png') }}"
                             data-src="{{ asset('assets/img/products/featured-images/' . $product->featured_image) }}"
                             alt="{{ $product->title }}">
                    </a>

                    @if ($product->product_type == 'digital')
                        <span class="badge">{{ $product->product_type }}</span>
                    @endif

                    @if ($product->product_type == 'physical')
                        @if ($product->stock == 0)
                            <div class="custom-stock-overlay">
                                <span>Stock Out</span>
                            </div>
                        @else
                            <div class="custom-product-overlay">
                                <a href="{{ route('shop.product_details', ['slug' => $product->slug]) }}" class="custom-icon"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('shop.product.add_to_cart', ['id' => $product->id, 'quantity' => 1]) }}" class="custom-icon cart-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        @endif
                    @endif

                    @if ($product->product_type == 'digital')
                        <div class="custom-product-overlay">
                            <a href="{{ route('shop.product_details', ['slug' => $product->slug]) }}" class="custom-icon"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('shop.product.add_to_cart', ['id' => $product->id, 'quantity' => 1]) }}" class="custom-icon cart-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    @endif

                    <p>{{ $product->title }}</p>
                </div>
            @endforeach
        </div>

        <!-- Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.custom-swiper-container', {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            480: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        },
    });
});
</script>


<br>

<style>
.custom-jobs-slider {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .custom-jobs-slider {
        border: none;
        padding: 0px;
    }
}

.custom-jobs-slider-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: black;
}

.custom-jobs-swiper-container {
    padding: 20px 0;
}

.custom-jobs-swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 200px;
    flex-shrink: 0;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.custom-jobs-swiper-slide:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.custom-jobs-swiper-slide img {
    width: 100%;
    height: 120px;
    border-radius: 6px;
    object-fit: cover;
}

.custom-jobs-swiper-slide p {
    margin: 4px 0;
    font-size: 13px;
    color: #555;
}

.custom-jobs-swiper-slide p a {
    color: #000;
    font-weight: 600;
    text-decoration: none;
}

/* Hide scrollbar for clean look */
.custom-jobs-swiper-container::-webkit-scrollbar {
    display: none;
}
</style>

<div class="custom-container custom-jobs-slider">
    <div class="custom-jobs-slider-title">Trending Jobs Near You</div>

    <div class="swiper custom-jobs-swiper-container">
        <div class="swiper-wrapper">
            @forelse ($jobs as $job)
                <div class="swiper-slide custom-jobs-swiper-slide">
                    <img src="{{ $job->image ?? 'https://khiladi.electride.taxi/assets/img/67fcb9e0d51a1.png' }}" 
                         alt="{{ $job->title }}">
                    <p>
                        <a href="{{ route('frontend.jobs.show', $job->id) }}">
                            {{ Str::limit($job->title, 40) }}
                        </a>
                    </p>
                    <p>{{ Str::limit($job->description, 60) }}</p>
                    <p><strong>{{ __('Location') }}:</strong> {{ $job->location }}</p>
                </div>
            @empty
                <div class="p-4 text-center bg-light rounded">
                    <h3 class="mb-0">{{ __('No Jobs Found') }}</h3>
                </div>
            @endforelse
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jobsSwiper = new Swiper('.custom-jobs-swiper-container', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            480: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        },
    });
});
</script>





        
        
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
  <!--@if ($secInfo->category_section_status == 1)-->
  <!--  <section class="category-area category-2 pt-100">-->
  <!--    <div class="container">-->
  <!--      <div class="row">-->
  <!--        <div class="col-12">-->
  <!--          <div class="section-title title-inline mb-20" data-aos="fade-up">-->
  <!--            <h2 class="title mb-20">{{ $catgorySecInfo ? $catgorySecInfo->title : 'CATEGORIES' }}</h2>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--        <div class="col-12">-->
  <!--          @if (count($categories) < 1)-->
  <!--            <div class="text-center">-->
  <!--              <h3 class="mb-0">{{ __('NO CATEGORY FOUND') . '!' }}</h3>-->
  <!--            </div>-->
  <!--          @else-->
  <!--            <div class="swiper" id="category-slider-1" data-aos="fade-up" data-aos-delay="100">-->
  <!--              <div class="swiper-wrapper">-->
  <!--                @foreach ($categories as $category)-->
  <!--                  <div class="swiper-slide">-->
  <!--                    <a href="{{ route('frontend.listings', ['category_id' => $category->slug]) }}">-->
  <!--                      <div class="category-item border radius-md text-center">-->
  <!--                        <div class="category-icon">-->
  <!--                          <i class="{{ $category->icon }}"></i>-->
  <!--                        </div>-->
  <!--                        <h3 class="category-title mb-0">{{ $category->name }}</h3>-->
  <!--                        <span class="category-qty">{{ $category->listing_contents_count }}</span>-->
  <!--                      </div>-->
  <!--                    </a>-->
  <!--                  </div>-->
  <!--                @endforeach-->
  <!--              </div>-->
                <!-- Slider Pagination -->
  <!--              <div class="swiper-pagination position-static mt-40" id="category-slider-1-pagination">-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          @endif-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
      <!-- Bg Shape -->
  <!--    <div class="shape">-->
  <!--      <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-9.svg') }}" alt="Shape">-->
  <!--      <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-10.svg') }}" alt="Shape">-->
  <!--    </div>-->
  <!--  </section>-->
  <!--@endif-->
  <!-- Category-area end -->

  <!--Featured Product-area start -->
  @if ($secInfo->featured_listing_section_status == 1)
    <section class="product-area pt-100 pb-60">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3">
            <div class="content-title mb-40" data-aos="fade-up">
              <h2 class="title mb-15">{{ $listingSecInfo ? $listingSecInfo->title : 'LISTINGS' }}</h2>
              <p class="text mb-20">
                {{ @$listingSecInfo->subtitle }}
              </p>
              @if (count($total_listing_contents) > count($listing_contents))
                <a href="{{ route('frontend.listings') }}"
                  class="btn btn-lg btn-primary rounded-pill">{{ $listingSecInfo ? $listingSecInfo->button_text : 'More' }}</a>
              @endif
            </div>
          </div>
          <div class="col-lg-9">
            @if (count($listing_contents) < 1)
              <h3 class="text-center mt-2">{{ __('NO LISTING FOUND') }}</h3>
            @else
              <div class="swiper mb-40" id="product-slider-1">
                <div class="swiper-wrapper">

                  @foreach ($listing_contents as $listing_content)
                    <div class="swiper-slide" data-aos="fade-up">
                      <div class="product-default border radius-md mb-25">
                        <figure class="product-img">
                          <a href="{{ route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id]) }}"
                            class="lazy-container ratio ratio-2-3">
                            <img class="lazyload"
                              data-src="{{ asset('assets/img/listing/' . $listing_content->feature_image) }}"
                              alt="{{ optional($listing_content)->title }}">
                          </a>
                          @if (Auth::guard('web')->check())
                            @php
                              $user_id = Auth::guard('web')->user()->id;
                              $checkWishList = checkWishList($listing_content->id, $user_id);
                            @endphp
                          @else
                            @php
                              $checkWishList = false;
                            @endphp
                          @endif
                          <a href="{{ $checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id) }}"
                            class="btn-icon {{ $checkWishList == false ? '' : 'wishlist-active' }}"
                            data-tooltip="tooltip" data-bs-placement="top"
                            title="{{ $checkWishList == false ? __('Save to Wishlist') : __('Saved') }}">
                            <i class="fal fa-heart"></i>
                          </a>
                        </figure>
                        <div class="product-details">
                          <div class="product-top mb-10">
                            @php
                              if ($listing_content->vendor_id == 0) {
                                  $vendorInfo = App\Models\Admin::first();
                                  $userName = 'admin';
                              } else {
                                  $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                                  $userName = $vendorInfo->username;
                              }
                            @endphp

                            <div class="author">
                              <a class="color-medium"
                                href="{{ route('frontend.vendor.details', ['username' => $userName]) }}" target="_self"
                                title={{ $vendorInfo->username }}>

                                @if ($listing_content->vendor_id == 0)
                                  <img class="lazyload" src="assets/images/placeholder.png"
                                    data-src="{{ asset('assets/img/admins/' . $vendorInfo->image) }}" alt="Vendor">
                                @else
                                  @if ($vendorInfo->photo != null)
                                    <img class="blur-up lazyload"
                                      data-src="{{ asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo) }}"
                                      alt="Image">
                                  @else
                                    <img class="blur-up lazyload" data-src="{{ asset('assets/img/blank-user.jpg') }}"
                                      alt="Image">
                                  @endif
                                @endif
                                <span>{{ __('By') }}
                                  {{ $vendorInfo->username }}
                                </span>
                              </a>
                            </div>
                            @php
                              $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                            @endphp

                            <a href="{{ route('frontend.listings', ['category_id' => $categorySlug->slug]) }}"
                              title="Link" class="product-category font-sm icon-start">
                              <i class="{{ $listing_content->icon }}"></i>{{ $listing_content->category_name }}
                            </a>
                          </div>
                          <h5 class="product-title mb-10"><a
                              href="{{ route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id]) }}">
                              {{ optional($listing_content)->title }}</a></h5>

                          <div class="product-ratings mb-10">
                            <div class="ratings">
                              <div class="rate" style="background-image:url('{{ asset($rateStar) }}')">
                                <div class="rating-icon"
                                  style="background-image:url('{{ asset($rateStar) }}'); width: {{ $listing_content->average_rating * 20 . '%;' }}">
                                </div>
                              </div>
                              <span class="ratings-total font-sm">({{ $listing_content->average_rating }})</span>
                              <span
                                class="ratings-total color-medium ms-1 font-sm">{{ totalListingReview($listing_content->id) }}
                                {{ __('Reviews') }}</span>
                            </div>
                          </div>
                          @php
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

                          @endphp
                          <span class="product-location icon-start font-sm"><i
                              class="fal fa-map-marker-alt"></i>{{ @$city }}
                            @if (@$State)
                              ,{{ $State }}
                              @endif @if (@$country)
                                ,{{ @$country }}
                              @endif
                          </span>

                          @if ($listing_content->max_price && $listing_content->min_price)
                            <div class="product-price mt-10 pt-10 border-top">
                              <span class="color-medium me-2">{{ __('From') }}</span>
                              <h6 class="price mb-0 lh-1">
                                {{ symbolPrice($listing_content->min_price) }} -
                                {{ symbolPrice($listing_content->max_price) }}
                              </h6>
                            </div>
                          @endif
                        </div>
                      </div><!-- product-default -->
                    </div>
                  @endforeach

                </div>
                <!-- Slider pagination -->
                <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
              </div>
            @endif
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-11.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-12.svg') }}" alt="Shape">
      </div>
    </section>
  @endif
  <!-- Product-area end -->

  <!-- Video banner start -->
  @if ($secInfo->video_section == 1)
    <section class="video-banner pt-100 pb-60">
      <!-- Background Image -->
      <img class="lazyload bg-img blur-up" src="{{ asset('assets/img/' . $videoSectionImage) }}" alt="Bg-img">
      <div class="overlay opacity-75"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="content-title mb-40" data-aos="fade-up">
              <h2 class="title color-white mb-10">{{ @$videoSecInfo->title }}</h2>
              <p class="color-light mb-20 w-75 w-sm-100">{{ @$videoSecInfo->subtitle }}</p>
              @if (@$videoSecInfo->button_url && @$videoSecInfo->button_name)
                <a href="{{ @$videoSecInfo->button_url }}" class="btn btn-lg btn-primary rounded-pill"
                  target="_blank">{{ @$videoSecInfo->button_name }}</a>
              @endif
            </div>
          </div>
          @if (@$videoSecInfo->video_url)
            <div class="col-lg-7 py-4 py-lg-0">
              <div class="h-100 position-relative mb-40" data-aos="fade-up">
                <a href="{{ @$videoSecInfo->video_url }}"
                  class="video-btn youtube-popup position-absolute top-50 start-50 translate-middle">
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>
  @endif
  <!-- Video banner end -->

  <!--Latest Product-area start -->
  @if ($secInfo->latest_listing_section_status == 1)
    <section class="product-area pt-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-center" data-aos="fade-up">
              <h2 class="title mb-30">{{ $featuredSecInfo ? $featuredSecInfo->title : 'LISTINGS' }} </h2>
            </div>
          </div>
          <div class="col-12">
            <div class="tab-content">
              <div class="tab-pane fade active show">
                <div class="row">
                  @if (count($latest_listing_contents) < 1)
                    <h3 class="text-center mt-2">{{ __('NO LISTING FOUND') }}</h3>
                  @else
                    @foreach ($latest_listing_contents as $listing_content)
                      <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                        <div class="product-default border radius-md mb-25">
                          <figure class="product-img">
                            <a href="{{ route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id]) }}"
                              class="lazy-container ratio ratio-2-3">
                              <img class="lazyload"
                                data-src="{{ asset('assets/img/listing/' . $listing_content->feature_image) }}"
                                alt="{{ optional($listing_content)->title }}">
                            </a>
                            @if (Auth::guard('web')->check())
                              @php
                                $user_id = Auth::guard('web')->user()->id;
                                $checkWishList = checkWishList($listing_content->id, $user_id);
                              @endphp
                            @else
                              @php
                                $checkWishList = false;
                              @endphp
                            @endif
                            <a href="{{ $checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id) }}"
                              class="btn-icon {{ $checkWishList == false ? '' : 'wishlist-active' }}"
                              data-tooltip="tooltip" data-bs-placement="top"
                              title="{{ $checkWishList == false ? __('Save to Wishlist') : __('Saved') }}">
                              <i class="fal fa-heart"></i>
                            </a>
                          </figure>
                          <div class="product-details">
                            <div class="product-top mb-10">
                              @php
                                if ($listing_content->vendor_id == 0) {
                                    $vendorInfo = App\Models\Admin::first();
                                    $userName = 'admin';
                                } else {
                                    $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                                    $userName = $vendorInfo->username;
                                }
                              @endphp

                              <div class="author">
                                <a class="color-medium"
                                  href="{{ route('frontend.vendor.details', ['username' => $userName]) }}"
                                  target="_self" title={{ $vendorInfo->username }}>

                                  @if ($listing_content->vendor_id == 0)
                                    <img class="lazyload" src="assets/images/placeholder.png"
                                      data-src="{{ asset('assets/img/admins/' . $vendorInfo->image) }}" alt="Vendor">
                                  @else
                                    @if ($vendorInfo->photo != null)
                                      <img class="blur-up lazyload"
                                        data-src="{{ asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo) }}"
                                        alt="Image">
                                    @else
                                      <img class="blur-up lazyload" data-src="{{ asset('assets/img/blank-user.jpg') }}"
                                        alt="Image">
                                    @endif
                                  @endif
                                  <span>{{ __('By') }}
                                    {{ $vendorInfo->username }}
                                  </span>
                                </a>
                              </div>
                              @php
                                $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                              @endphp

                              <a href="{{ route('frontend.listings', ['category_id' => $categorySlug->slug]) }}"
                                title="Link" class="product-category font-sm icon-start">
                                <i class="{{ $listing_content->icon }}"></i>{{ $listing_content->category_name }}
                              </a>
                            </div>
                            <h5 class="product-title mb-10"><a
                                href="{{ route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id]) }}">{{ optional($listing_content)->title }}</a>
                            </h5>

                            <div class="product-ratings mb-10">
                              <div class="ratings">
                                <div class="rate" style="background-image:url('{{ asset($rateStar) }}')">
                                  <div class="rating-icon"
                                    style="background-image:url('{{ asset($rateStar) }}'); width: {{ $listing_content->average_rating * 20 . '%;' }}">
                                  </div>
                                </div>
                                <span class="ratings-total font-sm">({{ $listing_content->average_rating }})</span>
                                <span
                                  class="ratings-total color-medium ms-1 font-sm">{{ totalListingReview($listing_content->id) }}
                                  {{ __('Reviews') }}</span>
                              </div>
                            </div>
                            @php
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

                            @endphp
                            <span class="product-location icon-start font-sm"><i
                                class="fal fa-map-marker-alt"></i>{{ @$city }}
                              @if (@$State)
                                ,{{ $State }}
                                @endif @if (@$country)
                                  ,{{ @$country }}
                                @endif
                            </span>
                            @if ($listing_content->max_price && $listing_content->min_price)
                              <div class="product-price mt-10 pt-10 border-top">
                                <span class="color-medium me-2">{{ __('From') }}</span>
                                <h6 class="price mb-0 lh-1">
                                  {{ symbolPrice($listing_content->min_price) }} -
                                  {{ symbolPrice($listing_content->max_price) }}
                                </h6>
                              </div>
                            @endif
                          </div>
                        </div><!-- product-default -->
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
            @if (count($latest_listing_content_total) > count($listing_contents))
              <div class="text-center mt-20">
                <a href="{{ route('frontend.listings') }}"
                  class="btn btn-lg btn-primary rounded-pill">{{ $featuredSecInfo ? $featuredSecInfo->button_text : 'More' }}</a>
              </div>
            @endif
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-13.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-16.svg') }}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/images/shape/shape-15.svg') }}" alt="Shape">
        <img class="shape-4" src="{{ asset('assets/front/images/shape/shape-14.svg') }}" alt="Shape">
      </div>

    </section>
  @endif
  <!-- Product-area end -->

  <!-- Pricing-area start -->
  @if ($secInfo->package_section_status == 1)
    <section class="pricing-area pt-100 pb-75">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-center mb-40" data-aos="fade-up">
              <h2 class="title">{{ $packageSecInfo ? $packageSecInfo->title : 'Most Affordable Package' }}
              </h2>
            </div>
            <div class="tabs-navigation tabs-navigation-2 text-center mb-40" data-aos="fade-up">
              <ul class="nav nav-tabs rounded-pill" data-hover="fancyHover">
                @php
                  $totalTerms = count($terms);
                  $middleTerm = intdiv($totalTerms, 2);
                @endphp
                @foreach ($terms as $index => $term)
                  <li class="nav-item {{ $index == $middleTerm ? 'active' : '' }}">
                    <button class="nav-link hover-effect rounded-pill {{ $index == $middleTerm ? 'active' : '' }}"
                      data-bs-toggle="tab" data-bs-target="#{{ strtolower($term) }}" type="button">
                      {{ __($term) }}
                    </button>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-12">
            <div class="tab-content">
              @if (count($terms) < 1)
                <h3 class="text-center mt-2">{{ __('NO PACKAGE FOUND') }}</h3>
              @else
                @foreach ($terms as $index => $term)
                  <div class="tab-pane fade {{ $index == $middleTerm ? 'show active' : '' }}"
                    id="{{ strtolower($term) }}">
                    <div class="row justify-content-center">
                      @php
                        $packages = \App\Models\Package::where('status', '1')->where('term', strtolower($term))->get();
                        $totalItems = count($packages);
                        $middleIndex = intdiv($totalItems, 2);
                      @endphp
                      @foreach ($packages as $index => $package)
                        @php
                          $permissions = $package->features;
                          if (!empty($package->features)) {
                              $permissions = json_decode($permissions, true);
                          }
                        @endphp
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                          <div class="pricing-item radius-lg {{ $package->recommended ? 'active' : '' }} mb-30">
                            <div class="d-flex align-items-center">
                              <div class="icon"><i class="{{ $package->icon }}"></i></div>
                              <div class="label">
                                <h3> {{ __($package->title) }}</h3>
                                @if ($package->recommended == '1')
                                  <span>{{ __('Popular') }}</span>
                                @endif

                              </div>
                            </div>
                            <p class="text"></p>
                            <div class="d-flex align-items-center">
                              <span class="price">{{ symbolPrice($package->price) }}</span>
                              @if ($package->term == 'monthly')
                                <span class="period">/ {{ __('Monthly') }}</span>
                              @elseif($package->term == 'yearly')
                                <span class="period">/ {{ __('Yearly') }}</span>
                              @elseif($package->term == 'lifetime')
                                <span class="period">/ {{ __('Lifetime') }}</span>
                              @endif
                            </div>
                            <h5>{{ __('What\'s Included') }}</h5>
                            <ul class="item-list list-unstyled p-0 pricing-list">

                              <li><i class="fal fa-check"></i>
                                @if ($package->number_of_listing == 999999)
                                  {{ __('Listing (Unlimited)') }}
                                @elseif($package->number_of_listing == 1)
                                  {{ __('Listing') }} ({{ $package->number_of_listing }})
                                @else
                                  {{ __('Listings') }} ({{ $package->number_of_listing }})
                                @endif
                              </li>

                              <li><i class="fal fa-check"></i>
                                @if ($package->number_of_images_per_listing == 999999)
                                  {{ __('Images Per Listing (Unlimited)') }}
                                @elseif($package->number_of_images_per_listing == 1)
                                  {{ __('Image Per Listing') }} ({{ $package->number_of_images_per_listing }})
                                @else
                                  {{ __('Images Per Listings') }} ({{ $package->number_of_images_per_listing }})
                                @endif
                              </li>
                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('Listing Enquiry Form', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Enquiry Form') }}
                              </li>

                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('Video', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Video') }}
                              </li>

                              <li><i
                                  class=" @if (is_array($permissions) && in_array('Amenities', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>

                                @if (is_array($permissions) && in_array('Amenities', $permissions))
                                  @if ($package->number_of_amenities_per_listing == 999999)
                                    {{ __('Amenities Per Listing(Unlimited)') }}
                                  @elseif($package->number_of_amenities_per_listing == 1)
                                    {{ __('Amenitie Per Listing') }} ({{ $package->number_of_amenities_per_listing }})
                                  @else
                                    {{ __('Amenities Per Listing') }}
                                    ({{ $package->number_of_amenities_per_listing }})
                                  @endif
                                @else
                                  {{ __('Amenities Per Listing') }}
                                @endif
                              </li>

                              <li><i
                                  class=" @if (is_array($permissions) && in_array('Feature', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>

                                @if (is_array($permissions) && in_array('Feature', $permissions))
                                  @if ($package->number_of_additional_specification == 999999)
                                    {{ __('Feature Per Listing (Unlimited)') }}
                                  @elseif($package->number_of_additional_specification == 1)
                                    {{ __('Feature Per Listing') }}
                                    ({{ $package->number_of_additional_specification }})
                                  @else
                                    {{ __('Features Per Listing') }}
                                    ({{ $package->number_of_additional_specification }})
                                  @endif
                                @else
                                  {{ __('Feature Per Listing') }}
                                @endif
                              </li>
                              <li><i
                                  class=" @if (is_array($permissions) && in_array('Social Links', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>

                                @if (is_array($permissions) && in_array('Social Links', $permissions))
                                  @if ($package->number_of_social_links == 999999)
                                    {{ __('Social Links Per Listing(Unlimited)') }}
                                  @elseif($package->number_of_social_links == 1)
                                    {{ __('Social Link Per Listing') }} ({{ $package->number_of_social_links }})
                                  @else
                                    {{ __('Social Links Per Listing') }} ({{ $package->number_of_social_links }})
                                  @endif
                                @else
                                  {{ __('Social Link Per Listing') }}
                                @endif
                              </li>
                              <li><i
                                  class=" @if (is_array($permissions) && in_array('FAQ', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                @if (is_array($permissions) && in_array('FAQ', $permissions))
                                  @if ($package->number_of_faq == 999999)
                                    {{ __('FAQ Per Listing(Unlimited)') }}
                                  @elseif($package->number_of_faq == 1)
                                    {{ __('FAQ Per Listing') }} ({{ $package->number_of_faq }})
                                  @else
                                    {{ __('FAQs Per Listing') }} ({{ $package->number_of_faq }})
                                  @endif
                                @else
                                  {{ __('FAQ Per Listing') }}
                                @endif
                              </li>

                              <li><i
                                  class=" @if (is_array($permissions) && in_array('Business Hours', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Business Hours') }}
                              </li>
                              <li><i
                                  class=" @if (is_array($permissions) && in_array('Products', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                @if (is_array($permissions) && in_array('Products', $permissions))
                                  @if ($package->number_of_products == 999999)
                                    {{ __('Products Per Listing (Unlimited)') }}
                                  @elseif($package->number_of_products == 1)
                                    {{ __('Product Per Listing') }} ({{ $package->number_of_products }})
                                  @else
                                    {{ __('Products Per Listing') }} ({{ $package->number_of_products }})
                                  @endif
                                @else
                                  {{ __('Products Per Listing') }}
                                @endif
                              </li>

                              @if (is_array($permissions) && in_array('Products', $permissions))
                                <li><i class="fal fa-check"></i>
                                  @if ($package->number_of_images_per_products == 999999)
                                    {{ __('Product Image Per Product (Unlimited)') }}
                                  @elseif($package->number_of_images_per_products == 1)
                                    {{ __('Product Image Per Product') }}
                                    ({{ $package->number_of_images_per_products }})
                                  @else
                                    {{ __('Product Images Per Product') }}
                                    ({{ $package->number_of_images_per_products }})
                                  @endif

                                </li>
                              @else
                                <li><i class="fal fa-times not-active"></i>
                                  {{ __('Product Image Per Product') }}</li>
                              @endif


                              @if (is_array($permissions) && in_array('Products', $permissions))
                                <li><i
                                    class=" @if (is_array($permissions) && in_array('Product Enquiry Form', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                  {{ __('Product Enquiry Form') }} </li>
                              @else
                                <li><i class="fal fa-times not-active"></i>
                                  {{ __('Product Enquiry Form') }}</li>
                              @endif
                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('Messenger', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Messenger') }}
                              </li>
                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('WhatsApp', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('WhatsApp') }}
                              </li>
                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('Telegram', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Telegram') }}
                              </li>
                              <li>
                                <i
                                  class=" @if (is_array($permissions) && in_array('Tawk.To', $permissions)) fal fa-check @else fal fa-times not-active @endif"></i>
                                {{ __('Tawk.To') }}
                              </li>


                              @if (!is_null($package->custom_features))
                                @php
                                  $features = explode("\n", $package->custom_features);
                                @endphp
                                @if (count($features) > 0)
                                  @foreach ($features as $key => $value)
                                    <li><i class="fal fa-check"></i>{{ __($value) }}
                                    </li>
                                  @endforeach
                                @endif
                              @endif

                            </ul>
                            @auth('vendor')
                              <a href="{{ route('vendor.plan.extend.checkout', $package->id) }}"
                                class="btn btn-outline btn-lg" title="Purchase" target="_self">{{ __('Purchase') }}</a>
                            @endauth
                            @guest('vendor')
                              <a href="{{ route('vendor.login', ['redirectPath' => 'buy_plan', 'package' => $package->id]) }}"
                                class="btn btn-outline btn-lg" title="Purchase" target="_self">{{ __('Purchase') }}</a>
                            @endguest
                          </div>
                        </div>
                      @endforeach

                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-3.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-6.svg') }}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/images/shape/shape-5.svg') }}" alt="Shape">
        <img class="shape-4" src="{{ asset('assets/front/images/shape/shape-2.svg') }}" alt="Shape">
      </div>
    </section>
  @endif
  <!-- Pricing-area end -->

  <!-- Testimonial-area start -->
  @if ($secInfo->testimonial_section_status == 1)
    <section class="testimonial-area testimonial-1 pb-60">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="content w-75" data-aos="fade-up">
              <div class="content-title">
                <h2 class="title mb-15">
                  {{ !empty($testimonialSecInfo->title) ? $testimonialSecInfo->title : '' }}
                </h2>
              </div>
              <p class="text mb-20 w-75">
                {{ !empty($testimonialSecInfo->subtitle) ? $testimonialSecInfo->subtitle : '' }}
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
                @foreach ($testimonials as $testimonial)
                  <div class="swiper-slide pb-25" data-aos="fade-up">
                    <div class="slider-item radius-md">
                      <div class="quote">
                        <span class="icon"><i class="fas fa-quote-left"></i></span>
                        <p class="text mb-0">
                          {{ $testimonial->comment }}
                        </p>
                      </div>
                      <div class="client-info d-flex align-items-center">
                        <div class="client-img">
                          <div class="lazy-container rounded-pill ratio ratio-1-1">
                            <img class="lazyload" data-src="{{ asset('assets/img/clients/' . $testimonial->image) }}"
                              alt="Person Image">
                          </div>
                        </div>
                        <div class="content">
                          <h6 class="name">{{ $testimonial->name }}</h6>
                          <span class="designation">{{ $testimonial->occupation }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="img-content mb-40" data-aos="fade-left">
              <div class="img">
                <img class="lazyload blur-up" data-src="{{ asset('assets/img/' . $testimonialSecImage) }}"
                  alt="Image">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-15.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-14.svg') }}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/images/shape/shape-13.svg') }}" alt="Shape">
        <img class="shape-4" src="{{ asset('assets/front/images/shape/shape-16.svg') }}" alt="Shape">
      </div>
    </section>
  @endif
  <!-- Testimonial-area end -->

  <!-- Blog-area start -->
  @if ($secInfo->blog_section_status == 1)
    <section class="blog-area blog-2 pb-75">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title title-inline mb-30" data-aos="fade-up">
              <h2 class="title mb-20">
                {{ !empty($blogSecInfo->title) ? $blogSecInfo->title : 'Read Our Latest Blog' }}
              </h2>
              @if (count($blog_count) > count($blogs))
                <a href="{{ route('blog') }}" class="btn btn-lg btn-primary mb-20">
                  {{ $blogSecInfo ? $blogSecInfo->button_text : 'More' }}</a>
              @endif
            </div>
          </div>
          <div class="col-12">
            <div class="row justify-content-center">
              @if (count($blogs) < 1)
                <h3 class="text-center mt-2">{{ __('NO POST FOUND') . '!' }}</h3>
              @else
                @foreach ($blogs as $blog)
                  <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <article class="card radius-md mb-25">
                      <div class="card-img">
                        <a href="{{ route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id]) }}"
                          class="lazy-container radius-md ratio ratio-16-10">
                          <img class="lazyload" data-src="{{ asset('assets/img/blogs/' . $blog->image) }}"
                            alt="Blog Image">
                        </a>
                      </div>
                      <div class="content border">
                        <h3 class="card-title mt-1">
                          <a href="{{ route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id]) }}">
                            {{ @$blog->title }}
                          </a>
                        </h3>
                        <p class="card-text">
                          {{ strlen(strip_tags(convertUtf8($blog->content))) > 100 ? substr(strip_tags(convertUtf8($blog->content)), 0, 100) . '...' : strip_tags(convertUtf8($blog->content)) }}
                        </p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug, 'id' => $blog->id]) }}"
                          class="card-btn">{{ __('Read More') }}</a>
                      </div>
                    </article>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- Bg Shape -->
      <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/images/shape/shape-20.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/images/shape/shape-18.svg') }}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/images/shape/shape-19.svg') }}" alt="Shape">
      </div>
    </section>
  @endif
  <!-- Blog-area end -->
@endsection
@section('script')
  <script src="{{ asset('assets/front/js/search-home.js') }}"></script>
@endsection

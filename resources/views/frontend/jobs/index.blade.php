@extends('frontend.layout')

@section('pageHeading')
  {{ !empty($pageHeading) ? $pageHeading->job_page_title : __('Job Listings') }}
@endsection

@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keyword_jobs }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_jobs }}
  @endif
@endsection

@section('content')

<!-- Add top spacing to prevent overlap with fixed header -->
<div class="listing-map-area" style="padding-top: 120px;">
  <div class="container">
    <div class="row">

   
      <!-- Job Listings -->
      <div class="col-xl-9" data-aos="fade-up">

        <!-- Sorting Options -->
        <div class="product-sort-area pb-15">
          <div class="row align-items-center">
            <div class="col-4 d-xl-none">
              <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#widgetOffcanvas" aria-controls="widgetOffcanvas">
                Filter <i class="fal fa-filter"></i>
              </button>
            </div>
            <div class="col-sm-8 col-xl-12">
              <div class="sort-item d-flex align-items-center justify-content-sm-end mb-20">
                <form>
                  <label class="color-dark me-2">{{ __('Sort By') }}:</label>
                  <select name="select_sort" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option {{ request()->input('sort') == 'new' ? 'selected' : '' }} value="new">Newest</option>
                    <option {{ request()->input('sort') == 'old' ? 'selected' : '' }} value="old">Oldest</option>
                    <option {{ request()->input('sort') == 'salary_low' ? 'selected' : '' }} value="salary_low">Salary: Low to High</option>
                    <option {{ request()->input('sort') == 'salary_high' ? 'selected' : '' }} value="salary_high">Salary: High to Low</option>
                  </select>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Job Grid -->
        <div class="search-container">
          @if ($jobs->count() < 1)
            <div class="p-4 text-center bg-light rounded">
              <h3 class="mb-0">{{ __('No Jobs Found') }}</h3>
            </div>
          @else
            <div class="row g-4">
              @foreach ($jobs as $job)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                  <div class="card h-100 border shadow-sm rounded">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title mb-2">
                        <a href="{{ route('frontend.jobs.show', $job->id) }}" class="text-decoration-none">{{ $job->title }}</a>
                      </h5>
                      <p class="card-text mb-1">{{ Str::limit($job->description, 100) }}</p>
                      <p class="mb-1"><strong>{{ __('Location') }}:</strong> {{ $job->location }}</p>
                      @if($job->salary)
                        <p class="mb-1"><strong>{{ __('Salary') }}:</strong> {{ $job->salary }}</p>
                      @endif
                      <p class="mb-1"><strong>{{ __('Deadline') }}:</strong> {{ $job->deadline ? $job->deadline->format('d M, Y') : __('N/A') }}</p>

                      @php $user_id = Auth::check() ? Auth::id() : null; @endphp
                      <a href="{{ $user_id ? ($job->wishlistedByUser($user_id) ? route('remove.jobwishlist', $job->id) : route('addto.jobwishlist', $job->id)) : '#' }}"
                         class="btn btn-outline-primary btn-sm mt-auto">
                        <i class="fal fa-heart me-1"></i> {{ $user_id && $job->wishlistedByUser($user_id) ? __('Saved') : __('Save Job') }}
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper mt-4">
              {{ $jobs->links() }}
            </div>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>

@endsection

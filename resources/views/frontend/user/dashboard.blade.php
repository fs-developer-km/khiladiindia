@extends('frontend.layout')

@section('pageHeading')
  {{ __('Dashboard') }}
@endsection

@section('content')
  @includeIf('frontend.partials.breadcrumb', [
      'breadcrumb' => !empty($bgImg) ? $bgImg->breadcrumb : '',
      'title' => !empty($pageHeading) ? $pageHeading->dashboard_page_title : __('Dashboard'),
  ])
  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60" style="background-color: #0c0b2d;">
    <div class="container">
      <div class="row gx-xl-5">
        @includeIf('frontend.user.side-navbar')
        
        <div class="col-lg-9">
            
  <div class="user-profile-details mb-30">
  <!-- Google Font (Poppins) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <div class="card shadow-lg border-0 rounded-4 p-4" style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex align-items-center mb-4">
      <div class="me-3">
        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
          <i class="fas fa-user-circle fa-2x"></i>
        </div>
      </div>
      <div>
        <h4 class="mb-0 text-dark">{{ __('Account Information') }}</h4>
        <small class="text-muted">{{ __('Your basic profile details') }}</small>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      @php
        $info = [
          ['label' => 'Name', 'icon' => 'user', 'value' => $authUser->name],
          ['label' => 'Username', 'icon' => 'user-tag', 'value' => $authUser->username],
          ['label' => 'Email', 'icon' => 'envelope', 'value' => $authUser->email],
          ['label' => 'Phone', 'icon' => 'phone', 'value' => $authUser->phone],
          ['label' => 'City', 'icon' => 'city', 'value' => $authUser->city],
          ['label' => 'Country', 'icon' => 'globe', 'value' => $authUser->country],
          ['label' => 'State', 'icon' => 'map-marker-alt', 'value' => $authUser->state],
          ['label' => 'Zip Code', 'icon' => 'mail-bulk', 'value' => $authUser->zip_code],
        ];
      @endphp

      @foreach ($info as $item)
        <div class="col">
          <div class="d-flex align-items-center p-3 bg-light rounded h-100">
            <div class="me-3">
              <div class="bg-white text-primary shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-{{ $item['icon'] }}"></i>
              </div>
            </div>
            <div>
              <div class="text-muted small">{{ __($item['label']) }}</div>
              <div class="fw-semibold">{{ $item['value'] }}</div>
            </div>
          </div>
        </div>
      @endforeach

      <!-- Address (Full Width) -->
      <div class="col-12">
        <div class="d-flex align-items-start p-3 bg-light rounded">
          <div class="me-3">
            <div class="bg-white text-primary shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
              <i class="fas fa-map"></i>
            </div>
          </div>
          <div>
            <div class="text-muted small">{{ __('Address') }}</div>
            <div class="fw-semibold">{{ $authUser->address }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



          <div class="row">
            <div class="col-md-6">
              <a href="{{ route('user.wishlist') }}">
                <div class="card card-box radius-md mb-30 color-1">
                  <div class="card-icon mb-15">
                    <i class="ico-grid"></i>
                  </div>
                  <div class="card-info">
                    <h3 class="mb-0">{{ count($wishlists) }}</h3>
                    <p class="mb-0">{{ __('Wishlist Items') }}</p>
                  </div>
                </div>
              </a>
            </div>
            @if ($basicInfo->shop_status == 1)
              <div class="col-md-6">
                <a href="{{ route('user.order.index') }}">
                  <div class="card card-box radius-md mb-30 color-2">
                    <div class="card-icon mb-15">
                      <i class="ico-grid"></i>
                    </div>
                    <div class="card-info">
                      <h3 class="mb-0">{{ count($orders) }}</h3>
                      <p class="mb-0">{{ __('Total Orders') }}</p>
                    </div>
                  </div>
                </a>
              </div>
            @endif
          </div>
          

          <div class="account-info radius-md mb-40">
            <div class="title">
              <h4>{{ __('Wishlists') }}</h4>
            </div>
            <div class="main-info">
              @if (count($wishlists) == 0)
                <h3 class="text-center">{{ __('NO WISHLIST ITEM FOUND') . '!' }}</h3>
              @else
                <div class="main-table">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped w-100">
                      <thead>
                        <tr>
                          <th>{{ __('Serial') }}</th>
                          <th>{{ __('Listing title') }}</th>
                          <th>{{ __('Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $i = 1;
                        @endphp
                        @foreach ($wishlists as $item)
                          @php
                            $content = DB::table('listing_contents')
                                ->where([['listing_id', $item->listing_id], ['language_id', $language->id]])
                                ->select('title', 'slug')
                                ->first();
                          @endphp
                          @if (!is_null($content))
                            <tr>
                              <td>#{{ $loop->iteration }}</td>
                              <td>
                                <a href="{{ route('frontend.listing.details', ['slug' => $content->slug, 'id' => $item->listing_id]) }}"
                                  target="_blank">
                                  {{ strlen(@$content->title) > 50 ? mb_substr(@$content->title, 0, 50, 'utf-8') . '...' : @$content->title }}
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('frontend.listing.details', [$content->slug, $item->listing_id]) }}"
                                  class="btn"target="_blank"><i class="fas fa-eye"></i> {{ __('View') }}</a>
                                <a href="{{ route('remove.wishlist', $item->listing_id) }}" class="btn btn-danger"><i
                                    class="fas fa-times"></i>{{ __('Remove') }}</a>
                              </td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              @endif
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
  <!--====== End Dashboard Section ======-->
@endsection

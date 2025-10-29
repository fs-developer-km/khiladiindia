@extends('frontend.layout')

@section('pageHeading')
  {{ $job->title }}
@endsection

@section('content')
<div class="container" style="padding-top: 120px;"> {{-- adjust to match fixed header height --}}
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm border rounded mb-5">
        <div class="card-body">
          <h2 class="card-title mb-3">{{ $job->title }}</h2>

          <p class="card-text mb-3">{{ $job->description }}</p>

          <ul class="list-unstyled mb-3">
            <li><strong>{{ __('Location') }}:</strong> {{ $job->location }}</li>
            @if($job->salary)
              <li><strong>{{ __('Salary') }}:</strong> {{ $job->salary }}</li>
            @endif
            <li><strong>{{ __('Deadline') }}:</strong> {{ $job->deadline ? $job->deadline->format('d M, Y') : __('N/A') }}</li>
            <li><strong>{{ __('Posted By') }}:</strong> {{ $job->vendor ? $job->vendor->username : 'Admin' }}</li>
          </ul>

          @php $user_id = Auth::check() ? Auth::id() : null; @endphp
          <a href="{{ $user_id ? ($job->wishlistedByUser($user_id) ? route('remove.jobwishlist', $job->id) : route('addto.jobwishlist', $job->id)) : '#' }}"
             class="btn btn-outline-primary">
            <i class="fal fa-heart me-1"></i> {{ $user_id && $job->wishlistedByUser($user_id) ? __('Saved') : __('Save Job') }}
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

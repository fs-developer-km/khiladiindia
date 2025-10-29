@extends('vendors.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Add Job Posting') }}</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{ route('vendor.dashboard') }}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ __('Job Postings') }}</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ __('Add Job Posting') }}</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('vendor.job_posting.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label>{{ __('Job Title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Location') }}</label>
                        <input type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Salary') }}</label>
                        <input type="text" class="form-control" name="salary" value="{{ old('salary') }}">
                        @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Deadline') }}</label>
                        <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}">
                        @error('deadline') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Add Job Posting') }}</button>
                    <a href="{{ route('vendor.job_posting.listing') }}" class="btn btn-secondary">{{ __('Back to Listings') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

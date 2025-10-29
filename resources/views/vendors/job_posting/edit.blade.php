@extends('vendors.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Edit Job Posting') }}</h4>
</div>

<div class="row">
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('vendor.job_posting.update', $job->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label>{{ __('Job Title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $job->title) }}" required>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description" rows="5" required>{{ old('description', $job->description) }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Location') }}</label>
                        <input type="text" class="form-control" name="location" value="{{ old('location', $job->location) }}" required>
                        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Salary') }}</label>
                        <input type="text" class="form-control" name="salary" value="{{ old('salary', $job->salary) }}">
                        @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Deadline') }}</label>
                        <input type="date" class="form-control" name="deadline" value="{{ old('deadline', $job->deadline) }}">
                        @error('deadline') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('Status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $job->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$job->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Update Job Posting') }}</button>
                    <a href="{{ route('vendor.job_posting.listing') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

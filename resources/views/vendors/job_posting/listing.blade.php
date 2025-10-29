@extends('vendors.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Job Postings') }}</h4>
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
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <a href="{{ route('vendor.job_posting.create') }}" class="btn btn-primary mb-3">{{ __('Add Job Posting') }}</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Location') }}</th>
                            <th>{{ __('Salary') }}</th>
                            <th>{{ __('Deadline') }}</th>
                            <th>{{ __('Status') }}</th>
                              <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->salary ?? '-' }}</td>
                                <td>{{ $job->deadline ?? '-' }}</td>
                                <td>{{ $job->status ? 'Active' : 'Inactive' }}</td>
                                <td>
    <a href="{{ route('vendor.job_posting.edit', $job->id) }}" class="btn btn-sm btn-warning">Edit</a>

    <form action="{{ route('vendor.job_posting.delete', $job->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">{{ __('No Job Postings found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

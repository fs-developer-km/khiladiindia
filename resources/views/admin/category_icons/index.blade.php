@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Category Icons</h4>
    <a href="{{ route('category_icons.create') }}" class="btn btn-primary mb-3">+ Add Category Icon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($icons as $icon)
            <tr>
                <td>{{ $icon->id }}</td>
                <td>{{ $icon->name }}</td>
              <td>
    @if($icon->icon)
        <img src="{{ asset('storage/' . $icon->icon) }}" 
             alt="{{ $icon->name }}" 
             width="40" height="40" 
             style="object-fit: contain;">
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>

                <td>{{ $icon->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('category_icons.edit',$icon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('category_icons.destroy',$icon->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this item?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">No icons found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Edit Category Icon</h4>
    <form action="{{ route('admin.category_icons.update',$icon->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" value="{{ $icon->name }}" class="form-control" required>
            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label>Icon (FontAwesome class) *</label>
            <input type="text" name="icon" value="{{ $icon->icon }}" class="form-control" required>
            @error('icon') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label>Status *</label>
            <select name="status" class="form-control">
                <option value="1" {{ $icon->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$icon->status ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.category_icons.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Add Category Icon</h4>
   <form action="{{ route('category_icons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Name *</label>
        <input type="text" name="name" class="form-control" required>
        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="form-group">
        <label>Icon (Upload Image) *</label>
        <input type="file" name="icon" class="form-control" accept="image/*" required>
        @error('icon') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="form-group">
        <label>Status *</label>
        <select name="status" class="form-control">
            <option value="1" selected>Active</option>
            <option value="0">Inactive</option>
        </select>
        @error('status') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('category_icons.index') }}" class="btn btn-secondary">Back</a>
</form>

</div>
@endsection

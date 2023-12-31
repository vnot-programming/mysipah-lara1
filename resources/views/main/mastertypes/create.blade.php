@extends('admin.admin_dashboard')
@section('admin')
@include('sweetalert::alert')

<div class="page-content">
    <div class="row profile-body">
        <div class="card rounded">
            <div class="card-body">
                <h6 class="card-title">Add New Types</h6>
                <form method="POST" action="{{ route('store.types') }}" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="type_name" class="form-label">Type Name</label>
                            <input type="text" class="form-control
                                @error('type_name') is-invalid
                                @enderror " value="{{ old('type_name', '')}}"
                                id="type_name" name="type_name" autocomplete="off"
                                placeholder="Leave Blank If Not Add New">
                            @error('type_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="save"></i>
                        SAVE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

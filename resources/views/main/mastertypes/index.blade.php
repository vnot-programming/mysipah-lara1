@extends('admin.admin_dashboard')
@section('admin')
@include('sweetalert::alert')
<div class="page-content">
    <nav class="page-breadcrumb">
        <div class="breadcrumb d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lists of Types</li>
            </ol>
            <button type="button" class="btn btn-primary btn-icon-text"
                data-bs-toggle="modal" data-bs-target="#modalNewTypes"
                data-bs-whatever="@getbootstrap">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Types</button>

                <div class="modal fade" id="modalNewTypes"
                    tabindex="-1" aria-labelledby="modalNewTypesLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalNewTypesLabel">Add New Types</h5>
                          <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <form method="POST" action="{{ url('/all/types/add') }}"
                        class="forms-sample"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
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
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<div class="modal fade" id="modalEditTypes"
tabindex="-1" aria-labelledby="modalEditTypesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTypesLabel">Edit Types</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="POST" action="{{ url('/all/types/edit') }}" class="forms-sample"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
            <input type="hidden" class="form-control" id="type_id" name="type_id">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit_type_name" class="form-label">Type Name</label>
                    <input type="text" class="form-control @error('edit_type_name') is-invalid
                    @enderror " id="edit_type_name"
                    name="edit_type_name" placeholder="Enter Type Name" value="" required>
                    @error('edit_type_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTableExample" class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Types</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($listTypes as $key => $item)
                  <tr class="align-middle">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="text-start">
                        <form onsubmit="return confirm('Are you sure ?');"
                            action="{{ route('delete.types', $item->id) }}" method="POST">
                            <a href="javascript:void(0)" data-toggle="tooltip"
                                data-id="{{ $item->id }}" data-original-title="Edit"
                                class="btn btn-primary btn-sm editPost fa-regular fa-pen-to-square"></a>
                        @csrf
                        @method('POST')
                            <button type="submit" class="btn btn-sm btn-danger fa-regular fa-trash-can">
                                <i value="{{ $item->id }}" class="btn-icon-prepend"></i>
                            </button>
                        </form>
                    </td>
                  </tr>
                  @empty
                    <div class="alert alert-danger">
                        No Data Available.
                    </div>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $source->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  {{-- @include('components.modal-edit-sources') --}}
@endsection

@push('js')
    <script type="text/javascript">
    //button create source event
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.editPost', function () {
        var type_id = $(this).data('id');
        //fetch detail source with ajax
        // alert(source_id);
        // $('#modalEditSources').modal('show');

        $.ajax({
            url: `/all/types/edit/${type_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                //fill data to form
                console.log(response.data.nama);
                console.log(response);
                //open modal
                $('#type_id').val(response.data.id);
                $('#edit_type_name').val(response.data.nama);
                $('#savedata').val("edit-user");
                // $('#id').val(response.data.id);
                // $('#name').val(response.data.name);
                $('#modalEditTypes').modal('show');
            }
        });
    });
</script>
@endpush

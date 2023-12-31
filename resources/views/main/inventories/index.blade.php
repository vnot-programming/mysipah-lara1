@extends('admin.admin_dashboard')
@section('admin')
@include('sweetalert::alert')

<div class="page-content">
    <nav class="page-breadcrumb">
        <div class="breadcrumb d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
            </ol>
        </div>
    </nav>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" 
                        data-bs-toggle="tab" data-bs-target="#all" 
                        role="tab" aria-controls="all" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="in-tab" 
                        data-bs-toggle="tab" data-bs-target="#in" 
                        role="tab" aria-controls="in" aria-selected="false">Incoming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="out-tab" 
                        data-bs-toggle="tab" data-bs-target="#out" 
                        role="tab" aria-controls="out" aria-selected="false">Out / Take</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link disabled" id="process-tab"  --}}
                    <a class="nav-link" id="process-tab" 
                        data-bs-toggle="tab" data-bs-target="#process" 
                        {{-- role="tab" aria-controls="disabled"  --}}
                        role="tab" aria-controls="process" 
                        aria-selected="false">Processing</a>
                </li>
                </ul>
                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                    {{-- All Tab --}}
                    <div class="tab-pane fade show active" 
                        id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>Product</th> --}}
                                <th>Type</th>
                                {{-- <th>Location</th> --}}
                                <th>Vol (kg)</th>
                                <th>Size (cm)</th>
                                <th>Amount (qty)</th>
                                <th>Photo</th>
                                {{-- <th>Last Update</th> --}}
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($listProcessingsAll as $key => $item)
                            <tr class="align-middle">
                                <td>{{ $key+1 }}</td>
                                {{-- <td>{{ $item->nasabahs->user->name }} <br>
                                    {{ Str::mask($item->nasabahs->nokartu, '*',-20, 7) }}</td> --}}
                                <td>{{ $item->types->nama }}</td>
                                {{-- <td>{{ $item->location_id }}</td> --}}
                                <td>{{ $item->volume }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ $item->jumlah_produk }}</td>
                                <td>{{ $item->photo }}</td>
                                {{-- <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td> --}}
                                <td class="text-start">
                                @if ($item->remark == 'warehouse')
                                    <span class="badge rounded-pill bg-primary">Warehouse</span>
                                @elseif ($item->remark == 'in')
                                    <span class="badge rounded-pill bg-success">Incoming</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">Outcoming</span>
                                @endif
                                    {{-- <img src="{{ url('/upload/images/'.$item->remark.'.png') }}"
                                            style="height: 50px;width:50px;" > --}}
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No Data Available.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                    {{-- Incoming Tab --}}
                    <div class="tab-pane fade" 
                        id="in" role="tabpanel" aria-labelledby="out-tab">
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>Product</th> --}}
                                <th>Type</th>
                                {{-- <th>Location</th> --}}
                                <th>Vol (kg)</th>
                                <th>Size (cm)</th>
                                <th>Amount (qty)</th>
                                <th>Photo</th>
                                {{-- <th>Last Update</th> --}}
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($listProcessingsIn as $key => $item)
                            <tr class="align-middle">
                                <td>{{ $key+1 }}</td>
                                {{-- <td>{{ $item->nasabahs->user->name }} <br>
                                    {{ Str::mask($item->nasabahs->nokartu, '*',-20, 7) }}</td> --}}
                                <td>{{ $item->types->nama }}</td>
                                {{-- <td>{{ $item->location_id }}</td> --}}
                                <td>{{ $item->volume }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ $item->jumlah_produk }}</td>
                                <td>{{ $item->photo }}</td>
                                {{-- <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td> --}}
                                <td class="text-start">
                                    @if ($item->remark == 'warehouse')
                                        <span class="badge rounded-pill bg-primary">Warehouse</span>
                                    @elseif ($item->remark == 'in')
                                        <span class="badge rounded-pill bg-success">Incoming</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning">Outcoming</span>
                                    @endif
                                    {{-- <img src="{{ url('/upload/images/'.$item->remark.'.png') }}"
                                            style="height: 50px;width:50px;" > --}}
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No Data Available.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        </div>    
                    </div>
                    <div class="tab-pane fade" 
                        id="out" role="tabpanel" aria-labelledby="out-tab">
                        {{-- OUTCOMING Tab --}}
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>Product</th> --}}
                                <th>Type</th>
                                <th>Vol (kg)</th>
                                <th>Size (cm)</th>
                                <th>Amount (qty)</th>
                                <th>Photo</th>
                                {{-- <th>Last Update</th> --}}
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($listProcessingsOut as $key => $item)
                            <tr class="align-middle">
                                <td>{{ $key+1 }}</td>
                                {{-- <td>{{ $item->nasabahs->user->name }} <br>
                                    {{ Str::mask($item->nasabahs->nokartu, '*',-20, 7) }}</td> --}}
                                <td>{{ $item->types->nama }}</td>
                                {{-- <td>{{ $item->location_id }}</td> --}}
                                <td>{{ $item->volume }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ $item->jumlah_produk }}</td>
                                <td class="text-start">
                                    @if(!empty($item->photo))
                                        <img src="{{ url('/upload/images/products/'.$item->photo.'.png') }}">
                                    @else
                                        <img src="{{ url('/upload/images/products/no_image.jpg') }}">
                                    @endif
                                    {{-- <img src="{{ url('/upload/images/products/'.$item->photo.'.png') }}"
                                            style="height: 50px;width:50px;" > --}}
                                </td>
                                {{-- <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td> --}}
                                <td class="text-start">
                                    @if ($item->remark == 'warehouse')
                                        <span class="badge rounded-pill bg-primary">Warehouse</span>
                                    @elseif ($item->remark == 'in')
                                        <span class="badge rounded-pill bg-success">Incoming</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning">Outcoming</span>
                                    @endif
                                    {{-- <img src="{{ url('/upload/images/'.$item->remark.'.png') }}"
                                            style="height: 50px;width:50px;" > --}}
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No Data Available.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        </div> 
                    </div>
                    <div class="tab-pane fade" 
                        id="process" role="tabpanel" aria-labelledby="process-tab">
                        {{-- PROCESSING Tab --}}
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Type</th>
                                {{-- <th>Location</th> --}}
                                <th>Vol (kg)</th>
                                <th>Size (cm)</th>
                                <th>Amount (qty)</th>
                                <th>Photo</th>
                                {{-- <th>Last Update</th> --}}
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($listProcessingsStatus as $key => $item)
                            <tr class="align-middle">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->products->nama }} <br>
                                <td>{{ $item->processings->types->nama }}</td>
                                {{-- <td>{{ $item->location_id }}</td> --}}
                                <td>{{ $item->volume }}</td>
                                <td>{{ $item->processings->ukuran }}</td>
                                <td>{{ $item->processings->jumlah_produk }}</td>
                                {{-- <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td> --}}
                                <td class="text-start">
                                    @if(!empty($item->photo))
                                        <img src="{{ url('/upload/images/products/'.$item->processings->photo.'.png') }}">
                                    @else
                                        <img src="{{ url('/upload/images/products/no_image.jpg') }}">
                                    @endif
                                    {{-- <img src="{{ url('/upload/images/products'.$item->processings->photo.'.png') }}"
                                            style="height: 50px;width:50px;" > --}}
                                </td>
                                <td class="text-start">
                                    <div class="d-grid gap-2">
                                    @if ($item->status == 0)
                                        <button type="button" class="btn btn-danger" 
                                            data-bs-dismiss="modal" data-bs-toggle="tooltip" 
                                            data-bs-placement="top" data-bs-title="Click to Change Status Finish">
                                            On Process</button>
                                        
                                    @else
                                        <button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal" data-bs-toggle="tooltip" 
                                            data-bs-placement="top" data-bs-title="Click to Change Status"
                                            disabled>Finish</button>
                                        
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No Data Available.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        </div> 
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
</div>
  
<script type="text/javascript">
    $(document).ready(function(){
        var self = $(this),
        nokartu = self.data('nokartu');
        id = self.data('id');
        setInterval(function(){
            $.ajax({
                type:"GET",
                url:"/incomingwaste/scan",
                data: {
                    nokartu: nokartu,
                    id: id
                },
                dataType: 'json',
                success:function(data)
                {
                    $('#rfid').val(data.nokartu);
                }
            });
        },1000);

        $('#type_id').on('change',function(){
            var typeName = $(this).children('option:selected').data('nama');
            $('#type_name').val(typeName);
        });
    });

</script>

@endsection
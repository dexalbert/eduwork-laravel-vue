@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ route('catalogs.create') }}"> Create New Catalog</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="dttables" class="table table-bordered table-head-fixed table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $key => $catalog)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="text-center">{{ $catalog->name }}</td>
                            <td class="text-center">{{ convert_date($catalog->created_at) }}</td>
                            <td class="text-center">{{ convert_date($catalog->updated_at) }}</td>
                            <td class="text-center">{{ count($catalog->books)}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('catalogs.edit',$catalog->id) }}">Edit</a>
                                <form action="{{ route('catalogs.destroy',$catalog->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are You Sure?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@endsection

{{-- @section('js')
<!-- Datatables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
    var actionUrl = '{{url ('catalogs') }}';
    var apiUrl = '{{url ('api/catalogs') }}';

    var columns = [
        {data: 'id', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'created_at', class: 'text-center', orderable: true},
        {data: 'updated_at', class: 'text-center', orderable: true},
        {data: 'updated_at', class: 'text-center', orderable: true}
        {render: function(index, row, data, meta){
            console.log(meta.row);
            return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                Edit
            </a>
            <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                Delete
            </a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection --}}
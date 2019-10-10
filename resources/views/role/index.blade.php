@extends('layouts.app')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/responsive.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/sweetalert2/sweetalert2.css') }}">
@endpush

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>{{ $title }}</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-primary" href="{{ route('admin.role.create') }}">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
        </div>
        <div class="row">
            <table id="userTable" class="data-table table-striped" width="100%">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Nama Role</th>
                        <th>Keterangan</th>
                        <th class="datatable-nosort" width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('src/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/media/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/media/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/media/js/responsive.bootstrap4.js') }}"></script>
<!-- Sweet Alert -->
<script type="text/javascript" src="{{ asset('src/plugins/sweetalert2/sweetalert.min.js') }}"></script>
<script>
    var table = null

    table = $('#userTable').DataTable({
        "serverSide": true,
        "processing": true,
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Cari"
        },
        ajax: {
            "url": "{!! url('admin/role/allData') !!}",
            "type": "get",
            "dataType": "json",
            "contentType": 'application/json; charset=utf-8',
            "data": {
                _token: "{{ csrf_token() }}"
            }
        },
        columns: [
            { data: 'nama_role', name: 'nama_role' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'aksi', name: 'aksi' }
        ]

    })

    var hapusData = function (id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        }).then((willDelete) => {
            console.log(willDelete)
            if (willDelete) {
                $.ajax({
                    url: "{{ url('admin/role/destroy/') }}/" + id,
                    type: "POST",
                    data : {
                        _token : "{{ csrf_token() }}",
                        _method : "delete",
                    },
                    success : function (response) {
                        if (response.error == 0) {
                            swal('Deleted!', response.pesan, 'success')
                        } else {
                            swal("Error!", response.pesan, "error")
                        }

                        table.ajax.reload();
                    }
                })
                
            } else {
                swal("Tidak jadi untuk dihapus")
            }
        })
    }
</script>
@endpush

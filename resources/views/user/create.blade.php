@extends('layouts.app')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/select2/dist/css/select2.min.css') }}">
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
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card box-shadow mb-30">
        <form action="{{ route('admin.user.store') }}" method="post">
        {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="email" name="email">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Pegawai</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="pegawai">
                            <option selected="">Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Role</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="select2 custom-select col-12" name="role">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>
                    <button type="button" class="btn btn-warning">
                        Kembali
                    </button>
                </span>
                <span>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </span>
            </div>
        </form
 >   </div>
</div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('src/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2({
                allowClear: false,
                width:"100%",
                placeholder: 'Pilih Roles',
                ajax: {
                    url: "{{ url('admin/roles') }}",
                    dataType: "json",
                    delay: 250,
                    processResults: function (data) {
                        var rData = [];
                        data.items.forEach( function(e) {
                            rData.push({
                                'id': e['id'], //value
                                'text': e['nama_role'] //text
                            });
                        });

                        return {
                            results: rData
                        };
                    }
                }
            });
        })
    </script>
@endpush
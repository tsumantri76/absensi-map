@extends('layouts.app')

@push('style')
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
        <form action="{{ route('admin.role.update', ['id' => $role->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Role</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="nama" value="{{ $role->nama_role }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="keterangan" value="{{ $role->keterangan }}">
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
        </form>
    </div>
</div>
@endsection

@push('script')
    
@endpush
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
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Get Location</label>
                    <div class="col-sm-12 col-md-10">
                        <button onclick="getLocation()" class="btn btn-primary">
                            <i class="fa fa-map-marker"></i> Get Location
                        </button>
                    </div>
                </div>
                <hr>

        <form action="{{ route('admin.absen.store') }}" method="post">
        {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Pilih Map</label>
                    <div class="col-sm-12 col-md-10">
                        <select name="map_id" class="form-control" id="map_id">
                            @foreach($map as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_tempat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Latitude</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="latitude" id="latitude" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Longitude</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="longitude" id="longitude" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>
                    <a href="{{ route('admin.absen.index') }}" class="btn btn-warning">
                        Kembali
                    </a>
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
<script>
    function getLocation() {
        $.ajax({
            url: "{{ route('admin.absen.getIp') }}",
            type: "GET",
            data: "",
            dataType: "json",
            success : function(response){
                if (response.error == 0) {
                    $("input[name=latitude]").val(response.data.lat)
                    $("input[name=longitude]").val(response.data.lon)
                }
            }
        })
    }
</script>
@endpush
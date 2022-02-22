@extends('layouts.dashboard.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Add <strong>Paket Internet</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('admin.package.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" value="{{ old('title') }}">Nama Paket</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Masukkan nama paket" class="form-control"><small class="help-block form-text">Registrasi nama paket internet baru</small></div>
                            </div>
                            <div class="row form-group pt-3">
                                <div class="col col-md-3"><label for="location-input" class=" form-control-label">Lokasi</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="location" name="location" placeholder="Masukkan Lokasi Paket Aktif" class="form-control" value="{{ old('location') }}" ></div>
                            </div>
                            <div class="row form-group pt-3">
                                <div class="col col-md-3"><label for="price-input" class=" form-control-label">Harga paket</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="price" name="price" placeholder="Masukkan Harga Paket" class="form-control" value="{{ old('title') }}"></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>


</div><!-- .animated -->
</div><!-- .content -->


@endsection

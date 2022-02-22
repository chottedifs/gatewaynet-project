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
                        Edit Data <strong>{{ $user->name }}</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('admin.user-config.update', $user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="ont-input" class=" form-control-label">PON ONT</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="ont" name="ont" placeholder="PON ONT ID" class="form-control" value="{{ $user->ont }}"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="name-input" class=" form-control-label">Nama Pelanggan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Masukkan nama pengeluaran" class="form-control" value="{{ $user->name }}"></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control" value="{{ $user->email }}" disabled></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="phone-input" class=" form-control-label">No. Handphone</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Masukkan No Hanphone" class="form-control" value="{{ $user->phone }}"></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="address-input" class=" form-control-label">Alamat</label></div>
                                <div class="col-12 col-md-9"><textarea type="text" id="address" rows="8" name="address" placeholder="Alamat" class="form-control">{{ $user->address }}</textarea></div>
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

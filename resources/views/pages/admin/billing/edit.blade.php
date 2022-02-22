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
                        Edit <strong>Paket Internet {{ $transactions->title }}</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('admin.billing.update', $transactions->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Paket</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="name" id="name" class="form-control" disabled>
                                        @foreach ($users as $user)
                                            <option value="{{ $transactions->id }}">{{ $transactions->User->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Paket</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="package" id="package" class="form-control">
                                        <option value="{{ $transactions->id }}">{{ $transactions->Package->title }} | Sudah Terdaftar</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Masa Tenggang</label></div>
                                <div class="col-12 col-md-9"><input type="month" id="period_month" name="period_month" class="form-control"></div>
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

@extends('layouts.dashboard.app')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Buat <strong>Tagihan Paket</strong>
                    </div>

                    <div class="card-body card-block">
                        <form action="{{ route('admin.billing.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Nama Pelanggan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="name" id="name" data-placeholder="Pilih Pelanggan..." class="standardSelect form-control" tabindex="1">
                                        <option value="" label="default"></option>
                                        @foreach ($users as $user)
                                            @if (!$user->is_admin)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                        <p class="text-danger mt-2 mb-2">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class="form-control-label {{ $errors->has('name') ? 'is-invalid' : '' }}">Nama Paket</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="package" id="package" class="form-control">
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->title }} (Rp {{ number_format($package ->price,0) }}) </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                        <p class="text-danger mt-2 mb-2">{{ $errors->first('package') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Masa Tenggang</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="month" id="period_month" name="period_month" placeholder="Masa Tenggang Paket" class="form-control {{ $errors->has('period_month') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('name'))
                                        <p class="text-danger mt-2 mb-2">{{ $errors->first('package') }}</p>
                                    @endif
                                </div>
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

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
                        Edit Pengeluran <strong>{{ $item->name }}</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('admin.spend.update', $item->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="name-input" class=" form-control-label">Pengeluaran</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Masukkan nama pengeluaran" class="form-control" value="{{ $item->name }}"></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="qty-input" class=" form-control-label">Jumlah</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="qty" name="qty" placeholder="Jumlah" class="form-control" value="{{ $item->qty }}" ></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="price-input" class=" form-control-label">Harga paket</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="price" name="price" placeholder="Masukkan Nominal Pengeluaran" class="form-control" value="{{ $item->price }}"></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="pic-input" class=" form-control-label">PIC</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="pic" name="pic" placeholder="Masukkan nama pengeluaran" class="form-control" value="{{ $item->pic }}"></div>
                            </div>
                            <div class="row form-group pt-2">
                                <div class="col col-md-3"><label for="note-input" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><textarea type="text" id="note" rows="8" name="note" placeholder="keterangan" class="form-control">{{ $item->note }}</textarea></div>
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

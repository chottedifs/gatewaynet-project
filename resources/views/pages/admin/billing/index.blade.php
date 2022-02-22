@extends('layouts.dashboard.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 16px;">Daftar <strong class="card-title">Tagihan Bulanan</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.billing.create') }}"><i class="fa fa-plus-square-o pr-2"></i>Buat Tagihan</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
    <div class="breadcrumbs">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" style="font-weight: 700; font-size: 14px;"><i class="fa fa-table pr-3"></i>Download Excel</a>
                        </div>
                        <div class="table-responsive-sm card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-weight: 400; font-size: 14px">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Paket Aktif</th>
                                        <th>Lokasi Rumah</th>
                                        <th>Harga Paket</th>
                                        <th>Periode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td style="font-weight: 400;">{{ $transaction->User->name }}</td>
                                            <td class="text-center" style="font-weight: 400;">{{ $transaction->Package->location }}</td>
                                            <td class="text-center" style="font-weight: 400;">{{ $transaction->Package->title }} </td>
                                            <td class="text-center" style="font-weight: 400;">Rp {{ number_format($transaction->Package->price, 0) }}</td>
                                            <td class="text-center" style="font-weight: 400;">{{ date('M Y', strtotime($transaction->period_month)) }}</td>
                                            <td class="text-center" style="font-weight: 400;">
                                                <a class="btn" href="{{ route('admin.billing.edit', $transaction->id) }}"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">Data tagihan belum dibuat</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

@extends('layouts.dashboard.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 16px;">Histori <strong class="card-title">Tagihan Pelanggan</strong></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                        <th class="text-center">Paket Aktif</th>
                                        <th class="text-center">Harga Paket</th>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Status Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td style="font-weight: 400;">{{ $transaction->User->name }}</td>
                                            <td class="text-center" style="font-weight: 400;">{{ $transaction->Package->title }}</td>
                                            <td class="text-center" style="font-weight: 400;">Rp {{ number_format($transaction->Package->price, 0) }}</td>
                                            <td class="text-center" style="font-weight: 400;">{{ date('M Y', strtotime($transaction->period_month)) }}</td>
                                            <td class="text-center" style="font-weight: 400;">
                                                    @if ($transaction->payment_status == 'failed')
                                                        <span class="badge badge-danger">Pembayaran Gagal</span>
                                                    @elseif ($transaction->payment_status == 'waiting')
                                                        <span class="badge badge-warning text-dark">Menunggu Pembayaran</span>
                                                    @elseif ($transaction->payment_status == 'pending')
                                                        <span class="badge badge-warning text-dark">Menunggu Pembayaran</span>
                                                    @else
                                                        <span class="badge badge-success">Pembayaran Berhasil</span>
                                                    @endif
                                            </td>
                                            <td class="text-center" style="font-weight: 400;">
                                                @if ($transaction->payment_status == 'success')
                                                    <i class="fa fa-check-square-o mr-2 text-success">
                                                @else
                                                    <a class="btn"
                                                        href="https://api.whatsapp.com/send?phone=+{{ $transaction->User->phone }}&text=Hi, {{$transaction->User->name}}...%0ATagihan paket internet *{{$transaction->Package->title}}* mu periode *{{date('M Y', strtotime($transaction->period_month))}}* belum dibayar.%0ASegera lunasi pembayarannya segera ya.%0A%0ATerima kasih."
                                                        target="_blank" style="font-size: 12px"><i class="fa fa-whatsapp-square"></i>Whatsapp Customer
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="serial text-center" colspan="6">Data Tagihan Kosong</td>
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

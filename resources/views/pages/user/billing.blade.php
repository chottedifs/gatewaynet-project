@extends('layouts.dashboard.app')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Tagihan <strong class="card-title">Bulanan Paket Internet</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-weight: 400; font-size: 14px">
                                <thead>
                                    <tr class="text-center">
                                        <th>Kode Transaksi</th>
                                        <th>Nama Paket</th>
                                        <th>Lokasi</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Periode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $item)
                                        <tr class="text-center">
                                            <td style="font-weight: 400;">{{ $item->midtrans_booking_code }}</td>
                                            <td style="font-weight: 400;">{{ $item->Package->title }}</td>
                                            <td style="font-weight: 400;">{{ $item->Package->location }}</td>
                                            <td style="font-weight: 400;">Rp {{ number_format($item->Package->price, 0) }}</span></td>
                                            <td style="font-weight: 400;">
                                                <span class="product">
                                                    @if ($item->payment_status == 'failed')
                                                        <span class="badge badge-danger">Pembayaran Gagal</span>
                                                    @elseif ($item->payment_status == 'pending')
                                                        <span class="badge badge-warning text-dark">Menunggu Pembayaran</span>
                                                    @elseif ($item->payment_status == 'waiting')
                                                        <span class="badge badge-warning text-dark">Menunggu Pembayaran</span>
                                                    @else
                                                        <span class="badge badge-success">Pembayaran Berhasil</span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td style="font-weight: 400;">{{ date('M Y', strtotime($item->period_month)) }}</td>
                                            <td class="text-center" style="font-weight: 400;">
                                                @if ($item->payment_status == 'waiting')
                                                    <a href="{{$item->midtrans_url}}" class="btn" style="font-size: 12px;">Bayar Sekarang</a>
                                                @elseif ($item->payment_status == 'failed')
                                                    <a href="{{$item->midtrans_url}}" class="btn" style="font-size: 12px;">Hubungi Admin</a>
                                                @else
                                                    <i class="fa fa-check-square-o mr-2 text-success">
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Anda belum mempunyai tagihan</td>
                                            </tr>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection

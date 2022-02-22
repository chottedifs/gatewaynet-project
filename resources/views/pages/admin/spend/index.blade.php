@extends('layouts.dashboard.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 16px;">Pengeluaran <strong class="card-title">Uang Kas</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.spend.create') }}"><i class="fa fa-plus-square-o pr-2"></i>Add Spend</a></li>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-weight: 400; font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th>Nama Pengeluaran</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>PIC</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td style="font-weight: 400;">{{ $item->name }}</td>
                                                <td style="font-weight: 400;">{{ $item->qty }}</span> </td>
                                                <td style="font-weight: 400;">Rp {{ number_format($item->price, 0) }}</span> </td>
                                                <td style="font-weight: 400;">{{ $item->pic }}</span></td>
                                                <td style="font-weight: 400;">{{ $item->note }}</span></td>
                                                <td style="font-weight: 400;">
                                                    <a class="btn" href="{{ route('admin.spend.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Belum ada pengeluaran kas</td>
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

@extends('layouts.dashboard.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 16px;">Daftar <strong class="card-title">Pelanggan Gatewaynet</strong></h1>
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
                            <a href="{{ route('admin.export-user') }}" style="font-weight: 700; font-size: 14px;"><i class="fa fa-table pr-3"></i>Download Excel</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-weight: 400; font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th>ONT Pelanggan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Handphone</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $item)
                                            <tr>
                                                <td> {{ $item->ont }} </td>
                                                <td> {{ $item->name }} </td>
                                                <td style="text-transform: none;"> {{ $item->email }} </td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>
                                                    <a class="btn" href="{{ route('admin.user-config.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
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

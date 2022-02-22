@extends('layouts.dashboard.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 16px;">Daftar <strong class="card-title">Paket Internet Gatewaynet</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.package.create') }}"><i class="fa fa-plus-square-o pr-2"></i>Add Package</a></li>
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
                                            <th>No.</th>
                                            <th>Nama Paket</th>
                                            {{-- <th>Slug</th> --}}
                                            <th>Lokasi</th>
                                            <th>Harga Paket</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }} </td>
                                                {{-- <td>{{ $item->slug }}</td> --}}
                                                <td>{{ $item->location }}</td>
                                                <td>Rp {{ number_format($item->price, 0) }}</td>
                                                <td>
                                                    <a class="btn" href="{{ route('admin.package.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Paket internet belum dibuat</td>
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

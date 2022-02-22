@extends('layouts.dashboard.app')

@section('content')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets Name  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Hallo, {{ Auth::user()->name  }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
@endsection

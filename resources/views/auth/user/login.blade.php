@extends('layouts.app')

@section('content')
<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img src="{{ asset('gatewaynet/assets/images/login-hero.png') }}" alt="" class="img-hero-login">
            </div>
            <div class="col sm-12 col-md-12 col-lg-6 align-self-center justify-content-center">
                <h3 class="title-login">
                    <b>Daftar Sekarang</b> juga, <br>
                    dan <b>Nikmati kecepatan internet</b> yang super cepat.
                </h3>
                <a href="{{ route('user.login.google') }}" class="btn btn-google-account">
                    <img src="{{ asset('gatewaynet/assets/images/icons/icon-google.png') }}" alt=""> Daftar Via Google Account
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

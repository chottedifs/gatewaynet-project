@extends('layouts.app')

@section('content')
<section class="contact" id="contact">
    <div class="container">
        <div class="row justify-content-center text-center">
            <h3 class="title-contact">
                Hubungi <span>Kami</span>
            </h3>
            <p class="lead-contact">
                Ada kendala ? Hubungi team kami yang siap membantu anda.
            </p>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <a href="#">
                    <img src="{{ asset('gatewaynet/assets/images/icons/ico-whatsapp.png') }}" alt="whatsapp">
                </a>
                <p class="lead-items-contact">Whatsapp</p>
                <p class="lead-content-contact"><b>0896 3758 4962</b></p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <a href="#">
                    <img src="{{ asset('gatewaynet/assets/images/icons/ico-email.png') }}" alt="whatsapp">
                </a>
                <p class="lead-items-contact">Email Service</p>
                <p class="lead-content-contact"><b>mywork.husadif@gmail.com</b></p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <a href="#">
                    <img src="{{ asset('gatewaynet/assets/images/icons/ico-cust.png') }}" alt="whatsapp">
                </a>
                <p class="lead-items-contact">Customer Service</p>
                <p class="lead-content-contact"><b>3771 880</b></p>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('content')
<section class="header">
    <svg viewBox="0 0 100 100" preserveAspectRatio="none">
      <polygon points="0,100 100,0 100,100" />
    </svg>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 align-self-center">
        <h3 class="title-header">
          <span>Internet</span> Terbaik
          <br>
          Untuk <span>Keluarga</span>
        </h3>
        <p class="lead-title">
          Internet berkualitas dan terbaik untuk keluarga dengan harga terjangkau.
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="{{ asset('gatewaynet/assets/images/hero-header.png') }}" alt="hero-header" class="img-header">
      </div>
    </div>
  </div>
</section>

<section class="products" id="products">
  <div class="container">
    <h3 class="title-products">
      Paket Internet <span>Fiber Cepat</span>
    </h3>
    <p class="lead-products">
      Nikmati paket internet terbaik untuk anda
    </p>
    <div class="row justify-content-center text-center">
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card shadow-sm">
          <img src="{{ asset('gatewaynet/assets/images/paket/10mbps.svg') }}" class="card-img-products" alt="...">
          <div class="card-body">
            <h5 class="title-item-products">WiFi Santai</h5>
            <hr>
            <p class="lead-item-products">Unlimited Quota 24 Jam</p>
            <hr>
            <p class="lead-price-products"><span>Rp 160.000</span> / Bulan</p>
            <p class="lead-note-products"><small class="text-muted">*Harga NET Normal</small></p>
            <a href="#" class="btn btn-regist">Saya Mau Ini</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card shadow-sm">
          <img src="{{ asset('gatewaynet/assets/images/paket/15mbps.svg') }}" class="card-img-products" alt="...">
          <div class="card-body">
            <h5 class="title-item-products">WiFi Hemat</h5>
            <hr>
            <p class="lead-item-products">Unlimited Quota 24 Jam</p>
            <hr>
            <p class="lead-price-products"><span>Rp 220.000</span> / Bulan</p>
            <p class="lead-note-products"><small class="text-muted">*Harga NET Normal</small></p>
            <a href="#" class="btn btn-regist">Saya Mau Ini</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card shadow-sm">
          <img src="{{ asset('gatewaynet/assets/images/paket/20mbps.svg') }}" class="card-img-products" alt="...">
          <div class="card-body">
            <h5 class="title-item-products">WiFi Mantap</h5>
            <hr>
            <p class="lead-item-products">Unlimited Quota 24 Jam</p>
            <hr>
            <p class="lead-price-products"><span>Rp 260.000</span> / Bulan</p>
            <p class="lead-note-products"><small class="text-muted">*Harga NET Normal</small></p>
            <a href="#" class="btn btn-regist">Saya Mau Ini</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card shadow-sm">
          <img src="{{ asset('gatewaynet/assets/images/paket/25mbps.svg') }}" class="card-img-products" alt="...">
          <div class="card-body">
            <h5 class="title-item-products">WiFi Gacor</h5>
            <hr>
            <p class="lead-item-products">Unlimited Quota 24 Jam</p>
            <hr>
            <p class="lead-price-products"><span>Rp 320.000</span> / Bulan</p>
            <p class="lead-note-products"><small class="text-muted">*Harga NET Normal</small></p>
            <a href="#" class="btn btn-regist">Saya Mau Ini</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <p class="lead-products-desc text-center">
        Untuk info berlangganan paket Roket Internet + TV mohon hubungi <a href="tel:+6289637584962" class="lead-products-desc">0896 3758 4962</a>
      </p>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item shadow-sm">
          <a class="btn btn-accordion-products collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Syarat & Ketentuan
          </a>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                <ul class="item-collapse-accordion">
                    <li class="item-collapse">Biaya aktivasi perangkat Rp. 150.000.</li>
                    <li class="item-collapse">Untuk instalasi TV (STB) Pre-order 1 Minggu.</li>
                    <li class="item-collapse">Semua perangkat dipinjamkan</li>
                    <li class="item-collapse">Pembayaran internet dilakukan setelah internet sudah aktif.</li>
                </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

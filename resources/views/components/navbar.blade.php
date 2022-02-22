<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a href="{{ route('home') }}">
        <img src="{{ asset('gatewaynet/assets/images/logo.png') }}" class="navbar-brand" alt="gatewaynet">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#products">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Hubungi Kami</a>
          </li>
          @auth
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="btn btn-sign-up">
               My Dashboard
            </a>
          </li>
          @else
          <li class="nav-item">
              <a href="{{ route('login') }}" class="btn btn-sign-up">Daftar Sekarang</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>

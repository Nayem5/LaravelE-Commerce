<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <!-- Check if the current page is 'home', if yes, add the 'active' class to highlight it -->
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          @auth
            <li class="nav-item">
              <!-- Check if the current page is 'our-products', if yes, add the 'active' class to highlight it -->
              <a class="nav-link {{ request()->is('product') ? 'active' : '' }}" href={{ route('product') }}>Our Products</a>
            </li>
            <li class="nav-item">
              <!-- Check if the current page is 'logout', if yes, add the 'active' class to highlight it -->
              <a class="nav-link {{ request()->is('logout') ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a>
            </li>
          @else
            <li class="nav-item">
              <!-- Check if the current page is 'login', if yes, add the 'active' class to highlight it -->
              <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <!-- Check if the current page is 'registration', if yes, add the 'active' class to highlight it -->
              <a class="nav-link {{ request()->is('registration') ? 'active' : '' }}" href="{{ route('registration') }}">Registration</a>
            </li>
          @endauth
        </ul>
        @auth
          <span class="navbar-text">
            @auth {{ auth()->user()->name }} @endauth
          </span>
        @else
          <span class="navbar-text">
            Welcome
          </span>
        @endauth
      </div>
    </div>
  </nav>
  
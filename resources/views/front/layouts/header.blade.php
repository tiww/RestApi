<div class="container d-flex align-items-center justify-content-between">
    <h1 class="logo"><a href="{{ url('/') }}">Project B</a></h1>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="{{ '/' }}">Home</a></li>
        <li><a class="nav-link scrollto" href="{{ '/'.'#about' }}">About</a></li>
        <li><a class="nav-link scrollto" href="{{ '/'.'#services' }}">Services</a></li>
        <li><a class="nav-link scrollto" href="{{ '/'.'#product' }}">Product</a></li>
        <li><a class="nav-link scrollto" href="{{ '/'.'#faq' }}">FAQ</a></li>
        <li><a class="nav-link scrollto" href="{{ '/'.'#contact' }}">Contact</a></li>
        <li>
            <a href="{{ url('/cart') }}"><i class='bx bxs-cart-add bx-sm'></i></a>
        </li>
        
        <span class="clearfix" id="basket">
            <span class="basket-item-count mx-3">
                <span class="badge badge-pill red"></span>
            </span>
        </span>
        
        <!-- Dropdown Profile -->
        <ul class="nav-link scrollto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link getstarted scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li>
                </ul>
            </li>
            @endguest
        </ul>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
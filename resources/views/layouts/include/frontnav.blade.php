<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="search-bar">
      <form method="POST" action="{{url('serch-product')}}">
        @csrf
        <div class="input-group">
          <input type="text" class="form-control" required name="product-name" id="search" placeholder="Search Product here..">
          <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('cart') }}">Cart
            <span class="badge badge-pill bg-primary cart-count">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('wishlist') }}">Whishlist
            <span class="badge badge-pill bg-success wishlist-count">0</span>
          </a>
        </li>
        
        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/') }}">My Profile</a>
              <a class="dropdown-item" href="{{ url('my-order') }}">My Order</a>     
                
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </div>
            </li>
          @endguest
          
      </ul>
    </div>
  </div>
</nav>

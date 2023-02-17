<!-- Navigation-->

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #800000" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('assets/img/book-icon.png') }}" width="40">E-Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('book') }}">Book</a>
          </li>
        </ul>
        @guest
            <form class="d-flex">
                <div class="d-grid gap-2 d-md-block collapse navbar-collapse" id="navbarSupportedContent">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalSignin">Login</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSignup">Sign-up</button>
                    {{-- <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button> --}}
                </div>
            </form>
            @else
            <div class="d-grid gap-2 d-md-block">

                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <button class="btn btn-outline-light" style="text-decoration: none !important" type="submit">
                    <a href="{{ route('getBasket', auth()->user()->id) }}"> <i class="fa fa-shopping-basket me-1"></i>
                    <span class="badge bg-warning text-white ms-1 rounded-pill">{{ App\Models\Basket::where('userID', auth()->user()->id)->sum('quantity'); }}</span> </a>
                </button>
                
            </div>
            
            @endguest
      </div>
    </div>
  </nav>
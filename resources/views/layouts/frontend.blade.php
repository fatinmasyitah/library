<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/book-icon.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/shop.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

</head>
<body>

    {{-- Navbar--}}
        
    @include('partials.frontnavbar')

    <!-- Sweetalert included -->
	@include('sweetalert::alert')

  {{-- <!-- Header-->
  <header class="bg-dark py-5">
      <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
              <h1 class="display-4 fw-bolder">Shop in style</h1>
              <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
          </div>
      </div>
  </header> --}}

  @yield('content')

  <!-- Login Modal -->
  <div class="modal modal-signin py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="text-center mb-4">
          
          <img class="mb-3 fs-2" style="margin-top: 20px" src="{{ url('assets/img/book-icon.png') }}" alt="logo.png" width="72" height="72">
            <button type="button" class="btn-close closecustom" data-bs-dismiss="modal" aria-label="Close"></button>
          
          <h1 class="fw-bold text-center">E-Library</h1>
          <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
        </div>
  
  
        <div class="modal-body p-5 pt-0">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
              @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary button-custom" style="background-color: #800000 !important" type="submit">Sign In</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal modal-signin py-5" tabindex="-1" role="dialog" id="modalSignup">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="text-center mb-4">
          
          <img class="mb-3 fs-2" style="margin-top: 20px" src="{{ url('assets/img/book-icon.png') }}" alt="logo.png" width="72" height="72">
            <button type="button" class="btn-close closecustom" data-bs-dismiss="modal" aria-label="Close"></button>
          
          <h1 class="fw-bold text-center">E-Library</h1>
          <h1 class="h3 mb-3 font-weight-normal">Please register here!</h1>
        </div>
  
        <div class="modal-body p-5 pt-0">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Fatin Masyitah">
              <label for="floatingInput">Name</label>
              @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
              @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="password_confirmation" name="password_confirmation" placeholder="Password">
              <label for="floatingPassword">Confirm Password</label>
              @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary button-custom" style="background-color: #800000 !important" type="submit">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>


	


  <!-- Footer-->
  <footer class="py-5" style="background-color: #800000">
      <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Library Management System By&nbsp;<a href="https://www.linkedin.com/in/nur-fatin-masyitah-mesle-78b7b0229/" target="_blank">Nur Fatin Masyitah binti Mesle</a></p></div>
  </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/010898741b.js"></script>
  
    <!-- Page Specific JS File -->

    @yield('scripts')
    
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  </body>

</html>

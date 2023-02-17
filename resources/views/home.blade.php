@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
    <!-- Carousel -->
      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="{{ url('assets/img/bg-2.jpg') }}" class="d-block w-100 c-img" alt="bg-1">
            <div class="carousel-caption text-start">
              @guest
              <h1>Welcome to E-Library!</h1>
              <p>Libraries were full of ideas —perhaps the most dangerous and powerful of all weapons.</p>
              <p><a class="btn btn-lg button-custom text-white" data-bs-toggle="modal" data-bs-target="#modalSignup">Sign up today</a></p>
              @else
              <h1>Hi, {{ auth()->user()->name }} ! </h1>
              <p>Welcome to E-Library!</p>
              @endguest
            </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{ url('assets/img/bg-3.jpg') }}"class="d-block w-100 c-img" alt="Slide 2">
            <div class="carousel-caption">
              <h1>More books to explore!</h1>
              <p>Powerful books that will open your mind, expand your knowledge & transform the way you live</p>
              <p><a class="btn btn-lg button-custom text-white" href="{{ route('book') }}">Browse book</a></p>
            </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{ url('assets/img/bg-1.jpg') }}" class="d-block w-100 c-img" alt="Slide 3">
            <div class="carousel-caption text-end">
              <h1>How can we help?</h1>
              <p>Talk with our team.</p>
              <p><a class="btn btn-lg button-custom text-white" href="#">Contact Us</a></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if (!empty($books))

                  @foreach ($books as $book)

                    <div class="col mb-5">
                        <div class="card h-100">
                          <!-- Sale badge-->
                          <div class="badge {{ $book->status == 1 ? 'bg-success':'bg-danger' }} position-absolute" style="top: 0.5rem; right: 0.5rem">{{ $book->status == 1 ? 'Available':'Issued' }}</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $book->bookimage }}" alt="{{ $book->booktitle }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $book->booktitle }}</h5>
                                    <!-- Product price-->
                                    {{ $book->author->authorname }}
                                </div>
                            </div>
                            @guest
                             
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center">
                            <button type="button" class="btn btn-outline-warning fa fa-shopping-basket" data-bs-toggle="modal" data-bs-target="#modalSignin">&nbsp;Add to basket</button>
                             </div>
                            </div>

                              @else

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center"><a class="btn btn-outline-warning mt-auto" href="{{ route('basket.add', [$book->id, auth()->user()->id]) }}"><i class="fa fa-shopping-basket"></i>&nbsp;Add to basket</a></div>
                            </div>
                            @endguest
                            
                        </div>
                    </div>
                      
                  @endforeach
                    
                @endif

            </div>
        </div>
    </section>
@endsection

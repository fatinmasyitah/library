@extends('layouts.frontend')
@section('title', 'Book')
@section('content')

       @include('partials.header')
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
                              <a href="{{ route('get.book', $book->id) }}"><img class="card-img-top"src="{{ $book->bookimage }}" alt="{{ $book->booktitle }}" /></a>
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
                                <div class="text-center">
                                  <a class="btn btn-outline-warning mt-auto" href="{{ route('basket.add', [$book->id, auth()->user()->id]) }}"><i class="fa fa-shopping-basket">&nbsp;Add to basket</i></a>
                                </div>
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
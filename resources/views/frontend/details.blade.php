@extends('layouts.frontend')

@section('content')
<!-- Header-->
<header class="bg-dark bg-header py-5" style="background: url('{{ url('assets/img/book-bg.jpg') }}')">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Book</h1>
            <p class="lead fw-normal text-white-50 mb-0">“Books are a uniquely portable magic.”</p>
        </div>
    </div>
</header>
 <!-- Product section-->
 <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 text-center w-75" src="{{ asset($book->bookimage) }}" alt="{{ $book->booktitle }}" /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{ $book->category->categoryname }}</div>
                <h1 class="display-5 fw-bolder">{{ $book->booktitle }}</h1>
                <div class="fs-5 mb-5">
                    <span><strong>Author:</strong><em>&nbsp;{{ $book->author->authorname }}</em></span><br>
                    <span><strong>Publisher:</strong><em>&nbsp;{{ $book->publisher->publishername }}</em></span><br>
                    <span><strong>Weight:</strong><em>&nbsp;{{ $book->bookweight }}&nbsp;g</em></span>
                </div>
                <p><strong>Description: </strong></p>
                <p>{{!! $book->description !!}}</p>
                <div class="d-flex">
                    <input type="button" class="text-center btn btn-secondary me-3" value="Back" onclick="history.back()" />
                    <button class="btn btn-outline-warning flex-shrink-0" type="button">
                        <i class="fa fa-shopping-basket">&nbsp;Add to basket</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
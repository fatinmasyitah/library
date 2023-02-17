@extends('layouts.backend')
@section('title', 'Book Edit')
@section('content')

<div class="section-header">
  <h1>{{ $page_title }}</h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('book.index') }}">Book List</a></div>
      <div class="breadcrumb-item">Edit Book</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ route('book.update', $book->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="card-header">
                    <h4>{{ $sub_title }}</h4>
                </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="booktitle" value="{{ $book->booktitle }}">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Type</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="0"
                                    {{ $book->type == 0 ? 'checked':'' }}>
                                    <label class="form-check-label" for="fiction">
                                        Fiction
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="1" {{ $book->type == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="nonfiction">
                                        Non-fiction
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row mb-4" id="fictionsub">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="categoryID" class="form-control selectric">
                                @foreach ($categories as $item)
                                @if ($item->id == $book->categoryID)
                                <option selected value="{{ $item->id }}">{{ $item->categoryname }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->categoryname }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="authorID" class="form-control selectric">
                                @foreach ($authors as $item)
                                @if ($item->id == $book->authorID)
                                <option selected value="{{ $item->id }}">{{ $item->authorname }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->authorname }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="publisherID" class="form-control selectric">
                                @foreach ($publishers as $item)
                                @if ($item->id == $book->publisherID)
                                <option selected value="{{ $item->id }}">{{ $item->publishername }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->publishername }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Weight</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="bookweight" value=" {{$book->bookweight}} ">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="description" class="summernote-simple">{{ $book->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div style="background-image: url({{ asset($book->bookimage) }});background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="bookimage" id="image-upload" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="status">
                                <option {{ $book->status == 1 ? 'checked':'' }} value="1">Available</option>
                                <option {{ $book->status == 0 ? 'checked':'' }} value="0">Issued</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="button" class="btn btn-secondary" value="Back" onclick="history.back()">
                      <button class="btn btn-primary">Update</button>
                    </div>
                  </div>     
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection

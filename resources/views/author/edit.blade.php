@extends('layouts.backend')
@section('title', 'Author Edit')
@section('content')

<div class="section-header">
  <h1>{{ $page_title }}</h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('author.index') }}">Author List</a></div>
      <div class="breadcrumb-item">Edit Author</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ route('author.update', $author->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="card-header">
                    <h4>{{ $sub_title }}</h4>
                </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="authorname" value="{{ $author->authorname }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="publisherID" class="form-control selectric">
                                @foreach ($publishers as $item)
                                @if ($item->id == $author->publisherID)
                                <option selected value="{{ $item->id }}">{{ $item->publishername }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->publishername }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div style="background-image: url({{ asset($author->authorimage) }});background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="authorimage" id="image-upload" />
                            </div>
                        </div>
                    </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                      <input type="button" class="btn btn-secondary" value="Back" onclick="history.back()">
                    <button type="submit" class="btn btn-primary">Update</button>
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

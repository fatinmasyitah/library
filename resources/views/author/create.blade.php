@extends('layouts.backend')
@section('title', 'Author Create')
@section('content')

<div class="section-header">
  <h1>{{ $page_title }}</h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Create Author</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>{{ $sub_title }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="authorname">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="publisherID" class="form-control selectric">
                                @foreach ($publishers as $item)
                                <option value="{{ $item->id }}">{{ $item->publishername }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div style="background-image: url();" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="authorimage" id="image-upload" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                      <input type="reset" class="btn btn-secondary" value="Reset">
                    <button class="btn btn-primary">Create Author</button>
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

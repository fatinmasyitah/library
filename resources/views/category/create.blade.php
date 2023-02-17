@extends('layouts.backend')
@section('title', 'Category Create')
@section('content')

<div class="section-header">
  <h1>{{ $page_title }}</h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Create Category</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>{{ $sub_title }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="categoryname" id="categoryname">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Type</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="fiction" value="0"
                                        checked>
                                    <label class="form-check-label" for="fiction">
                                        Fiction
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="nonfiction" value="1">
                                    <label class="form-check-label" for="nonfiction">
                                        Non-fiction
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                      <input type="reset" class="btn btn-secondary" value="Reset">
                    <button class="btn btn-primary">Create Category</button>
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

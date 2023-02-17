@extends('layouts.backend')
@section('title', 'Publisher Edit')
@section('content')

<div class="section-header">
  <h1>{{ $page_title }}</h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('publisher.index') }}">Publisher List</a></div>
      <div class="breadcrumb-item">Edit Publisher</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ route('publisher.update', $publisher->id) }}"  method="POST">
                @csrf

                @method('PUT')

                <div class="card-header">
                    <h4>{{ $sub_title }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="publishername" value="{{ $publisher->publishername }}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="publisheremail" value="{{ $publisher->publisheremail }}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Address</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="publisheraddress">{{ $publisher->publisheraddress }}</textarea>
                    </div>
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

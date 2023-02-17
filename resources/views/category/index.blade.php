@extends('layouts.backend')
@section('title', 'Category')
@section('content')
    
<div class="section-header">
    <h1>{{ $page_title }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Category list</a></div>
    </div>
</div>
        <div class="section-body"> 
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>{{ $sub_title }}</h4>
                          <div class="card-header-form">
                            <form action="" id="searchList" method="GET">
                              <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-height="40"  name="search" onkeypress="document.getElementById('searchList')">
                              </div>          
                          </div>
                        </div>
                                                         
                 <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->categoryname }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('category.edit', $item->id) }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger delete" type="button" id="{{ $item->id }}" class="btn btn-primary"
                                            data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach                  
                        </tbody>                    
                    </table>
                    </form>
                  </div>
            </div>
        </div>
        
    </div>
    
</div>

{{-- <div class="page-center page-item">
     {{ $categories->links() }}
</div> --}}

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" >
    <div class="modal-dialog">
        <form id="deleteModal" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
     
@endsection

@section('scripts')
    <script>
        $('.delete').on('click', function () {
            const id = this.id;
            $('#deleteModal').attr('action', "{{ route('category.destroy', '') }}" + '/' + id);
        });
    </script>

    <script>
        $('.modal').click(function(event){
        $(event.target).modal('hide');
     });
    </script>
@endsection
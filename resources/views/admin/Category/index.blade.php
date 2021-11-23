@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Category')

@section('content')
  <div class="row">
    <div class="col">
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success')}}
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @elseif(session('failed'))
        <div class="alert alert-danger">
          {{ session('failed')}}
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Categories</h4>
          <div class="card-tools">
            <a href="{{url('/admin/category/create')}}" class="btn btn-tool">
              <i class="fas fa-plus"></i>
              Add
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col" style="width: 100px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->status }}</td>
                  <td>
                    <form action="{{ url('/admin/category/'.$category->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <div class="btn-group">
                        <a href="{{ url('/admin/category/'.$category->id) }}" class="btn btn-info">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ url('/admin/category/'.$category->id).'/edit' }}" class="btn btn-success">
                          <i class="fas fa-pen"></i>
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
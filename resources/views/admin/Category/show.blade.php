@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Show Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">Show Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Add Category')

@section('content')
  <div class="row">
    <div class="col">
      <form action="{{ url('admin/category') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Show Category</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" disabled>
            </div>
            <div class="form-group">
              <label for="status">Category Status</label>
              <select name="status" id="status" class="form-control" disabled>
                <option value="">-- select status --</option>
                <option value="active" @if( $category->status =='active') selected @endif>active</option>
                <option value="inactive" @if( $category->status =='inactive') selected @endif>inactive</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ url('/admin/category') }}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"></i> Back</a>
            {{-- <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Add Category</button> --}}
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
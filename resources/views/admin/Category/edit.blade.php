@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Edit Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">Edit Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Edit Category')

@section('content')
  <div class="row">
    <div class="col">
      <form action="{{ url('admin/category/'.$datakategori->id) }}" method="post">
        @csrf
        @method('put')
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $datakategori->name }}" placeholder="Enter name...">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Category Status</label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">-- select status --</option>
                <option value="active" @if($datakategori->status =='active') selected @endif>active</option>
                <option value="inactive" @if($datakategori->status =='inactive') selected @endif>inactive</option>
              </select>
              @error('status')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ url('/admin/category') }}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Edit Category</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
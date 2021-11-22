@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

          @section('title','Dashboard')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Sales Graph</h4>
        </div>
        <div class="card-body">
          Sales graph here
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Latest Transaction</h4>
        </div>
        <div class="card-body">
          Latest transaction here
        </div>
      </div>
    </div>
  </div>
@endsection
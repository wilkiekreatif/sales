@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Show Product</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Show Product</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Show Product')

@section('content')
  <div class="row">
    <div class="col">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Show Product</h4>
          </div>
          <div class="card-body">
            <div class="row">
              @if(!empty($product->image))
                <div class="col">
                  <div class="form-group">
                    {{-- {{ Form::label('image','Image')}} --}}
                    <img src="{{asset('storage/product/'.$product->image)}}" width="400">
                  </div>
                </div>
              @endif
              <div class="col">
                <div class="form-group">
                  {{-- form label atribut yang pertama samakan dengan nama form komponen dibawahnya agar tergabung --}}
                  {{-- kedua baru isikan text yang ingin ditampilkan --}}
                  {{ Form::label('category_id','Category')}}
                  
                  {{-- urutan atribut select: nama, value (bisa menggunakan array assosiatif), Default Value, attribut HTML (menggunakan array Assosiatif) --}}
                  {{ Form::text('category_id', $product->categoryonetomany->name, ['class' => 'form-control', 'placeholder' => 'Choose Category', 'disabled'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('name','Name')}}
                  {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Enter name', 'maxlength' => '10', 'disabled'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('price','Price')}}
                  {{ Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Enter price', 'maxlength' => '10','id'=>'price', 'disabled'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('sku','SKU')}}
                  {{ Form::text('sku', $product->sku, ['class' => 'form-control', 'placeholder' => 'Enter sku', 'maxlength' => '10', 'disabled'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('status','Status')}}
                  {{ Form::text('status', $product->status, ['class' => 'form-control', 'placeholder' => 'Choose Status', 'disabled'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('description','Description')}}
                  {{ Form::text('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Choose Status', 'disabled'])}}
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('product.index') }}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"></i> Back</a>
            {{-- <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Show Product</button> --}}
          </div>
        </div>
    </div>
  </div>
@endsection
@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Edit Product</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Edit Product</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Edit Product')

@section('content')
  <div class="row">
    <div class="col">
      {{-- penulisan Form dibawah menggunakan Laravel Collective Plugin --}}
      {{Form::open([
        'route' => ['product.update',$product->id],
        'method' => 'put',
        'files' => true
      ])}}
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Product</h4>
          </div>
          <div class="card-body">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            @endif

            @if(!empty($product->image))
              <img src="{{asset('storage/product/'.$product->image)}}" width="100">
            @endif
            <div class="row">
              <div class="col">
                {{-- {{Form::open(['route'=> ['product.update',$product->id],'method'=> 'post', 'files'=> true])}} --}}
                <div class="form-group">
                  {{-- form label atribut yang pertama samakan dengan nama form komponen dibawahnya agar tergabung --}}
                  {{-- kedua baru isikan text yang ingin ditampilkan --}}
                  {{ Form::label('category_id','Category')}}
                  
                  {{-- urutan atribut select: nama, value (bisa menggunakan array assosiatif), Default Value, attribut HTML (menggunakan array Assosiatif) --}}
                  {{ Form::select('category_id',$categories, $product->category_id, ['class' => 'form-control', 'placeholder' => 'Choose Category'])}}
                  @error('category_id')
                    <div class="small text-danger">{{ $message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="form-group">
                    {{ Form::label('name','Name')}}
                    {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Enter name', 'maxlength' => '10'])}}
                  </div>
                  {{ Form::label('price','Price')}}
                  {{ Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Enter price', 'maxlength' => '10','id'=>'price'])}}
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  {{ Form::label('sku','SKU')}}
                  {{ Form::text('sku', $product->sku, ['class' => 'form-control', 'placeholder' => 'Enter sku', 'maxlength' => '10'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('status','Status')}}
                  {{ Form::select('status',['active' => 'Active', 'inactive' => 'Inactive'], $product->status, ['class' => 'form-control', 'placeholder' => 'Choose Status'])}}
                </div>
                <div class="form-group">
                  {{ Form::label('image','Image')}}
                  <div class="custom-file">
                    {{ Form::label('image','Choose Image', ['class' => 'custom-file-label']) }}
                    {{ Form::file('image',['class' => 'custom-file-input']) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('description','Description')}}
              {{ Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Choose Status','rows' => '3'])}}
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('product.index') }}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Edit Product</button>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
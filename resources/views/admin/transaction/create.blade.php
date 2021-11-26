@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Import Transaction</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">Import Transaction</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Import Transaction')

@section('content')
  <div class="row">
    <div class="col">
      {{-- penulisan Form dibawah menggunakan Laravel Collective Plugin --}}
      {{Form::open([
        'route' => 'transaction.import',
        'method' => 'post',
        'files' => true
      ])}}
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Import Transaction</h4>
          </div>
          <div class="card-body">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            @endif
            
            <div class="form-group">
                  {{ Form::label('import','Import')}}
                  <div class="custom-file">
                    {{ Form::label('import','Choose file', ['class' => 'custom-file-label']) }}
                    {{ Form::file('import',['class' => 'custom-file-input']) }}
                  </div>
                </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('transaction')}}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Import Transaction</button>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
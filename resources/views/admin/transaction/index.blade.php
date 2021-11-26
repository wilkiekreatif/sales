@extends('admin.admin')

@section('content-header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Transactions</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Transactions</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('title','Transactions')

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
          <h4 class="card-title">Transaction</h4>
          <div class="card-tools">
            <a href="{{route('transaction.create')}}" class="btn btn-tool">
              <i class="fas fa-plus"></i>
              Add
            </a>
            <a href="{{route('transaction.export')}}" class="btn btn-tool">
              <i class="fas fa-Download"></i>
              Export
            </a>
          </div>
        </div>
        <div class="card-body">
          {{-- {{ Form::open(['route'=> 'product.index','method'=>'get']) }} --}}
          <div class="row">
            {{-- <div class="col">
              <div class="form-group">
                {{ Form::label('category_id','Category') }}
                {{ Form::select('category_id',$categories, request('category_id'), ['class'=> 'form-control', 'placeholder' => 'Search Category']) }}
              </div>
            </div>
            <div class="col">
                {{ Form::label('search','Search') }}
                {{ Form::text('search', request('search'), ['class' => 'form-control', 'placeholder' => 'Search Transactions']) }}
            </div> --}}
          </div>
          {{-- {{ Form::close() }} --}}
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                {{-- <th scope="col">Category</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Trx Date</th>
                <th scope="col">Price</th>
                {{-- <th scope="col">Image</th> --}}
                {{-- <th scope="col">Status</th> --}}
                {{-- <th scope="col" style="width: 100px">Action</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $loop->iteration }}</td> 
                  {{-- variable $loop->iteration sudah otomatis membuatkan no urut --}}
                  {{-- pengisian categoryonetomany berdasarkan pada Model Transactions dengan nama function categoryonetomany --}}
                  <td>{{ $transaction->productonetomany->name }}</td>
                  <td>{{ $transaction->trx_date }}</td>
                  <td>{{ 'Rp. '.$transaction->price.' ,-' }}</td>
                  {{-- <td>{{ $product->sku }}</td> --}}
                  {{-- <td align="center">
                    @if(!empty($product->image))
                      <img src="{{asset('storage/product/'.$product->image)}}" width="100">
                    @endif
                  </td> --}}
                  {{-- <td>{{ $product->status }}</td> --}}
                  {{-- <td>
                    {{ Form::open(['route' => ['product.destroy',$transaction->id], 'method' => 'delete'])}}
                      <div class="btn-group">
                        <a href="{{ route('product.show',['product' => $transaction->id]) }}" class="btn btn-info">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('product.edit',['product' => $transaction->id]) }}" class="btn btn-success">
                          <i class="fas fa-pen"></i>
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    {{ Form:: close() }}
                  </td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{-- berfungsi untuk menampilkan pagination bawaan Laravel dan Bootstrap --}}
          {{ $transactions->appends($_GET)->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    //function untuk mengganti URL / Refresh URL
    var filter = function(){
      //mengambil value dari komponen dengan id category_id dan search
      var category_id = $('#category_id').val();
      var search = $('#search').val();

      window.location.replace("{{ route('product.index')}}?category_id="+category_id+"&search="+search);
    }
    // berfungsi uagar setiap komponen dengan id #category_id berubah akan melakukan function filter
    $('#category_id').on('change',function (){
      filter();
    })

    $('search').keypress(function (e){
      if(e.keycode == 13){
        filter();
      }
    })

  </script>
@endsection
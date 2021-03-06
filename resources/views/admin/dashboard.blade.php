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
          <canvas id="sales-chart" height="230"></canvas>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Latest Transaction</h4>
        </div>
        <div class="card-body">
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
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
  const ctx = document.getElementById('sales-chart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          // jika tampilan bulan yang tampil hanya bulan yang ada datanya
          {{-- labels: {!! json_encode($bulan) !!}, --}} 
          
          // jika tampilan bulan ingin tampil seluruhnya
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
          datasets: [{
              label: 'Overall Sales',
              data: {!! json_encode($totals) !!},
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>
@endsection
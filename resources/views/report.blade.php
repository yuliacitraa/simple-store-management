@extends('layout')

@section('title')
    Transaction
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>Report</h2>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
          </ol>
        </div>
    </section>

    <div class="card m-4">
      <div class="card-body">
        <div class="table-responsive tabel py-5 px-3">
          <table class="table table-hover scroll-horizontal-vertical pb-3 w-100" id="crudTable">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Purchase Price</th>
                <th>Sale Price</th>
                <th>Total Sales</th>
                <th>Total Profit</th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->purchase_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->total_sales }}</td>
                        <td>{{ $product->total_profit }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('addon-script')
  <script>
    let table = new DataTable('#crudTable', {
      "columnDefs": [
        { "searchable": false, "targets": 0 } //dissable search by row number
      ]
    });
  </script>
@endpush
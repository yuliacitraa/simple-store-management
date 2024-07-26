@extends('layout')

@section('title')
    Purchased products
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>Purchased Products</h2>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Purchased Products</li>
          </ol>
        </div>
    </section>

    <div class="card m-4">
      <div class="card-body">
        <div class="mt-4 mx-3">
          <a href="{{ route('purchase.create') }}" class="btn btn-primary mb-3 p-2 px-3 text-decoration-none">
            Add Stock
          </a>
        </div>
        <div class="table-responsive tabel py-5 px-3">
          <table class="table table-hover scroll-horizontal-vertical pb-3 w-100" id="crudTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Transaction Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->transaction_date }}</td>
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
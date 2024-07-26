@extends('layout')

@section('title')
    Products
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>Products</h2>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
    </section>

    <div class="card m-4">
        <div class="mt-4 mx-3">
          <a href="{{ route('product.create') }}" class="btn btn-primary mb-3 p-2 px-3 text-decoration-none">
            Add New product
          </a>
        </div>
        <div class="py-5 px-3">
          <table class="table table-hover scroll-horizontal-vertical pb-3 w-100" id="crudTable">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Product Name</th>
                <th rowspan="2">Purchase Price</th>
                <th rowspan="2">Sale Price</th>
                <th rowspan="2">Stock</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->purchase_price }}</td>
                    <td>{{ $item->sale_price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                      <a class="" href="{{ route('product.edit', $item->id) }}">
                          <svg class="mr-1"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                              <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                          </svg>
                      </a>
                    </td>
                    <td>
                      <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-danger" onclick="return confirm('Are you sure want to delete this data?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
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
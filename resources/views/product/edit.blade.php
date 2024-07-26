@extends('layout')

@section('title')
    Edit Product
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>Edit Product</h2>
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </div>
    </section>

            <div class="card m-4">
              <div class="card-body">
                <form action="{{ route('product.update', $data->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="row p-3 ">
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $data->product_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="">Purchase Price</label>
                            <input type="number" name="purchase_price" class="form-control" value="{{ $data->purchase_price }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="">Sale Price</label>
                            <input type="number" name="sale_price" class="form-control" value="{{ $data->sale_price }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ $data->stock }}" required>
                        </div>
                    </div>
                  </div>
                  <div class="row pr-3 py-2">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success mb-3 p-2 px-4 border border-0">
                        Save
                        </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

    <!-- /.content -->
  </div>

@endsection

@push('addon-script')

@endpush
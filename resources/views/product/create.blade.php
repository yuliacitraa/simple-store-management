@extends('layout')

@section('title')
    Add Product
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>New product</h2>
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
          <li class="breadcrumb-item active">Add New Product</li>
        </ol>
      </div>
    </section>

    <div class="card m-4">
      <div class="card-body">
        <form action="{{ route('product.store') }}" method="post" >
          @csrf
          @method('POST')
          <div class="row p-3">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Purchase Price</label>
                <input type="number" name="purchase_price" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Sale Price</label>
                <input type="number" name="sale_price" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row pr-3">
            <div class="col text-right ">
              <button type="submit" class="btn btn-success mb-3 p-2 px-4 border border-0">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@push('addon-script')

@endpush
@extends('layout')

@section('title')
    New Transaction
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>New Transaction</h2>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Transaction</a></li>
            <li class="breadcrumb-item active">New Transaction</li>
          </ol>
        </div>
    </section>

    <div class="card m-4">
      <div class="card-body">
        <form action="{{ route('sale.store') }}" method="post">
          @csrf
          <div class="row p-3">
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="select_product">Product Name</label>
                <select name="id_product" id="select_product" class="select2 form-control" data-placeholder="Select Product" required onchange="calculateTotalPrice()">
                  <option value="">Select Product</option>
                  @foreach ($product as $pr)
                      <option value="{{ $pr->id }}" data-price="{{ $pr->sale_price }}">{{ $pr->product_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required onchange="calculateTotalPrice()">
              </div>
            </div>
            <div class="col-md-12 py-2">
              <div class="form-group">
                <label for="total_price">Price</label>
                <input type="number" name="price"  id="total_price" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-12 py-2">
              <div class="form-group">
                <label for="transaction_date">Transaction Date</label>
                <input type="date" name="transaction_date" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row pr-3">
            <div class="col text-right">
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
  <script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            height: '100%',
        });
    });

    function calculateTotalPrice() {
        var selectedProduct = document.getElementById("select_product");
        var quantity = document.getElementById("quantity").value;
        var price = selectedProduct.options[selectedProduct.selectedIndex].getAttribute("data-price");
        var totalPrice = price * quantity;
        document.getElementById("total_price").value = totalPrice ? totalPrice : 0;
    }
  </script>
@endpush
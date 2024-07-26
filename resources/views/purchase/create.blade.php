@extends('layout')

@section('title')
    Add Stock
@endsection

@section('content')

  <div class="main_content">
    <section class="m-4">
      <h2>Purchase Stock</h2>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Purchased Stock</a></li>
              <li class="breadcrumb-item active">Purchase Stock</li>
          </ol>
        </div>
    </section>

    <div class="card m-4">
      <div class="card-body">
        <form action="{{ route('purchase.store') }}" method="post" >
          @csrf
          @method('POST')
          <div class="row p-3">
            <div class="col-md-12 py-2">
                <div class="form-group">
                <label for="">Product Name</label>
                <select name="id_product" id="select2" class="form-control" data-placeholder="Select Product" required>
                    <option value="null">Select Product</option>
                    @foreach ($product as $pr)
                        <option value="{{ $pr->id }}">{{ $pr->product_name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
                
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group py-2">
                <label for="">Transaction Date</label>
                <input type="date" name="transaction_date" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row pr-3">
            <div class="col text-right">
              <button type="submit" class="btn btn-success mb-2 p-2 px-4 border border-0">
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
        $('#select2').select2({
            width: '100%', // Need to override the changed default
            height: '100%', // Need to override the changed default
        });
    });
  </script>
@endpush
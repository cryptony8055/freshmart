@extends('layout.main')
@section('admincontent')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Product</h5>
            <form method="POST" action="{{route('product.store')}}">
              @csrf
              <div class="row card-body">
                <div class="col-6 mb-3">
                  <label for="inputProductName" class="form-label">Product Name</label>
                  <input type="text" name="inputProductName" class="form-control" id="inputProductName" >
                </div>
                <div class="col-6 mb-3">
                  <label for="inputProductPrice" class="form-label">Enter Price</label>
                  <input type="number" name="inputProductPrice" class="form-control" id="inputProductPrice">
                </div>
                <div class="col-12 mb-3">
                  <label for="inputProductDescription" class="form-label">Enter Description</label>
                  <textarea name="inputProductDescription" class="form-control" id="inputProductDescription"></textarea>
                </div>
                <div class="col-1">
                  <input type="submit"class="btn btn-success form-control" value="Add">
                </div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
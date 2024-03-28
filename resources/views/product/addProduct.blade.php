@extends('layout.main')
@section('admincontent')
  <div class="container-fluid">
    <div class="card">
      <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body row">
          <h5 class="fw-semibold mx-auto">Add Product</h5>
          <div class="card card-body col-12 p-2">
            <div class="row card-body">
                  <div class="col-4 mb-3">
                    <label for="inputProductName" class="form-label">Product Name</label>
                    <input type="text" name="inputProductName" class="form-control" id="inputProductName" >
                  </div>
                  <div class="col-4 mb-3">
                    <label for="inputProductPrice" class="form-label">Enter Price</label>
                    <input type="number" name="inputProductPrice" class="form-control" id="inputProductPrice">
                  </div>
                  <div class="col-4 mb-3">
                    <label for="category" class="form-label">Select Category</label>
                      <select name="selectCategoryId" id="category" class="form-select">
                        <option selected class="text-danger">select categories*</option>
                        @if($categories)
                        @foreach ($categories as $items)
                        <option value="{{$items->id}}">&nbsp;{{$items->name}}</option>
                        @endforeach
                        @else
                        <option value="Na">Na</option>
                        @endif
                      </select>
                  </div>
                  <div class="col-12 mb-3">
                    <label for="inputProductDescription" class="form-label">Enter Description</label>
                    <textarea name="inputProductDescription" class="form-control" id="inputProductDescription"></textarea>
                  </div>
            </div>
          </div>
          <div class="card card-body col-12 p-2">
            <label for="uploadImage" class="form-label">Upload Image</label>
            <div id="imageContent">
              <div class="card-body mb-1 row pg">
                <div class="col-10">
                    <input type="file" name="uploadImage[]" class="form-control" name="image" id="uploadImage" multiple></input>
                </div>
                <div class="col-2 change">
                    <button type="button" class="btn btn-success form-control" onclick="addImage()">Add more</button>
                </div>
              </div>
            </div>
            <div id="imageAppend"></div>
            <input type="hidden" value="0" id="addMoreCount" >
          </div>
          <div class="card-body col-12 p-4">
            <div class="col-1">
              <input type="submit"class="btn btn-success form-control" value="Save">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
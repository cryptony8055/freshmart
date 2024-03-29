@extends('layout.main')
@section('admincontent')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
            <form method="POST" action="{{route('product.update',['id'=>$data->id])}}">
              @csrf
              @method('PUT')
              <div class="row card-body">
                <div class="col-4 mb-3">
                  <label for="inputProductName" class="form-label">Product Name</label>
                  <input type="text" name="inputProductName" class="form-control" id="inputProductName" value="{{$data->product_name}}">
                </div>
                <div class="col-4 mb-3">
                  <label for="inputProductPrice" class="form-label">Enter Price</label>
                  <input type="number" name="inputProductPrice" class="form-control" id="inputProductPrice" value="{{$data->product_price}}">
                </div>
                <div class="col-4 mb-3">
                  <label for="category" class="form-label">Select Category</label>
                    <select name="selectCategoryId" id="category" class="form-select">
                      @if($categories)
                      @foreach ($categories as $items)
                      <option value="{{$items->id}}" {{$items->id == $data->catagory_id ?'selected':''}}>&nbsp;{{$items->name}}</option>
                      @endforeach
                      @else
                      <option value="Na">Na</option>
                      @endif
                    </select>
                </div>
                <div class="col-12 mb-3">
                  <label for="inputProductDescription" class="form-label">Enter Description</label>
                  <textarea name="inputProductDescription" class="form-control" id="inputProductDescription">{{$data->description}}</textarea>
                </div>
                <div class="col-2">
                  <input type="submit"class="btn btn-warning form-control" value="Update">
                </div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
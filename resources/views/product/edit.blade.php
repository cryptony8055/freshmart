@extends('layout.main')
@section('admincontent')
  {{-- <div class="container-fluid">
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
  </div> --}}

  <div class="container-fluid">
    <div class="card p-3">
      <form method="POST" action="{{route('product.update',['id'=>$data->id])}}">
        @csrf
        @method('PUT')
        <div class="card-body row">
          <h5 class="fw-semibold mx-auto">Edit Product</h5>
          <div class="card card-body col-12 p-2">
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
                    @endif
                  </select>
              </div>
              <div class="col-12 mb-3">
                <label for="inputProductDescription" class="form-label">Enter Description</label>
                <textarea name="inputProductDescription" class="form-control" id="inputProductDescription">{{$data->description}}</textarea>
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
          <div class="card card-body col-12 p-2">
            <h5 class="fw-semibold mx-auto">Uploaded Image</h5>
            <div class="row featured__filter mt-3">
              @foreach($images as $image)
              <div class="col-lg-3 col-md-4 col-sm-6 mix">
                  <div class="featured__item">
                      <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'.$image)}}">
                          <ul class="featured__item__pic__hover">
                              <li><a href="#"><i class="fa fa-trash"></i></a></li>
                          </ul>
                      </div>
                      <div class="featured__item__text">
                          <h6><a href="#">{{$data->product_name}}</a></h6>
                          <h5>{{$data->product_price}}</h5>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
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
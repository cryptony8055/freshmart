@extends('layout.main')
@section('admincontent')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Category</h5>
            <form method="POST" action="{{route('category.update',['id'=>$data->id])}}">
              @csrf
              @method('PUT')
              <div class="row card-body">
                <div class="col-12 mb-3">
                  <label for="inputCategoryName" class="form-label">Category name</label>
                  <input type="text" name="inputCategoryName" class="form-control" id="inputCategoryName" value="{{$data->name}}">
                </div>
                <div class="col-12 mb-3">
                  <label for="inputCategoryName" class="form-label">Category Image</label>
                  <input type="file" class="form-control" name="image" >
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
@extends('layout.main')
@section('admincontent')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Category</h5>
            <form method="POST" action="{{route('category.store')}}">
              @csrf
              <div class="row card-body">
                <div class="col-12 mb-3">
                  <label for="inputCategoryName" class="form-label">Category Name</label>
                  <input type="text" class="form-control" name="inputCategoryName" >
                </div>
                <div class="col-2">
                  <input type="submit"class="btn btn-success form-control" value="Add">
                </div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
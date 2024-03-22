@extends('layout.main')
@section('admincontent')
<div class="row">
    <div class="col-lg-12 d-flex">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title fw-semibold mb-4">Category</h5>
            </div>
            <div class="col-md-6" style="text-align: right">
              <a class="btn btn-success" href = "{{route('category.create')}}">Add Category</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Sl no.</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Category Name</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Created By</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Created At</h6>
                  </th>
                </tr>
              </thead>
               <tbody>
               <tbody>
                @if($data)
                @foreach ($data as $item )
                <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$item->id}}</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{$item->name}}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$item->createdCategory->name}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$item->status}}</p>
                    </td>
                </tr> 
                @endforeach   
                @else
                 <tr>
                  <td class="text-danger">no record found!!!</td>
                 </tr> 
                @endif                      
              </tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@extends('layout.main')
@section('admincontent')
<div class="row">
    <div class="col-lg-12 d-flex">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title fw-semibold mb-4">Order</h5>
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
                    <h6 class="fw-semibold mb-0">User Name</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Order Price</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Order Item</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Address</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Order At</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Deliver At</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Deliver Status</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Payment Status</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Transaction Id</h6>
                  </th>
                  <th class="border-bottom-1">
                    <h6 class="fw-semibold mb-0">Account Number</h6>
                  </th>
                </tr>
              </thead>
               <tbody>
               <tbody>
                @if($data)
                @foreach ($data as $key => $item )
                <tr>
                    {{-- <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$key+1}}</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{$item->name}}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$item->createdCategory->name}}</p>
                    </td>
                    <td class="border-bottom-0">
                    <input type="checkbox"  id="toggleCheckbox1" data-category-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger">
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$item->created_at}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <a href="{{route('category.edit',['id'=>$item->id])}}"><i class="bi bi-pencil-square"></i></a>
                      <a href="{{route('category.destroy',['id'=>$item->id])}}" class="text-danger"><i class="bi bi-trash"></i></a>
                    </td> --}}
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

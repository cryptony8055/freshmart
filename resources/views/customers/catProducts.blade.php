@extends('layout.user_main');
@section('usercontent')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/flowers.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$category->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container w-100">
            <div class="row">
                <h4 class="mx-auto m-3">products</h4>
            </div>
            <div class="card p-5">
                <div class="row featured__filter mt-3">
                @foreach($productImageData as $image)
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="card featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{Storage::disk('local')->url($image->image_url)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart mt-2"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye mt-2"></i></a></li>
                                <li><a class="addToCart" data-product_id="{{$image->product_id}}"><i class="fa fa-shopping-cart mt-2"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            @foreach ( $data as $item )
                                @if ($item->id == $image->product_id)
                                <h6><a href="#">{{$item->product_name}}</a></h6>
                                <h5 class="mb-2">${{$item->product_price}}</h5>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
        <!-- Featured Section End -->
@endsection
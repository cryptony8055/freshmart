@extends('layout.user_main')
@section('usercontent')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/flowers.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Cart</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <div class="container d-flex justify-center align-items-center">
                                        {{-- <div class="image_container" style="width: 5rem">
                                            <img style="  width: 100%;
                                                height: 100%;
                                                object-fit: cover;
                                                " src="{{Storage::disk('local')->url($url[0]['image_url'])}}" alt="">
                                        </div> --}}
                                        <div class="ml-5">
                                            <h5>{{$item->product->product_name}}</h5>
                                            {{-- <h5>{{ $cpId }}</h5> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$item->product->product_price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty" >
                                            <input type="text" value="{{ $item->quantity }}" data-product_id="{{$item->product_id}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ $item->quantity * $item->product->product_price }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <button class="icon_close" data-product_id="{{$item->product_id}}"></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <span>${{$total}}</span></li>
                    </ul>
                    <a id="checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
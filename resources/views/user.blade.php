@extends('layout.user_main')
@section('usercontent')
        <!-- Hero Section Begin done-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All Categories</span>
                            </div>
                            @if($data)
                            <ul>
                            @foreach($data as $item )
                                <li><a href="">{{$item}}</a></li>
                            @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>9348751803</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero__item set-bg" data-setbg="{{ asset('assets/img/hero/banner.jpg') }}">
                            <div class="hero__text">
                                <span>FRUIT FRESH</span>
                                <h2>Vegetable <br />100% Organic</h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="#" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Categories Section Begin DONE-->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @if($category_data)
                        @foreach($category_data as $key => $cat_value)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('storage/'.$cat_value->image_url) }}">
                                <h5><a href="#">{{ $cat_value->name }}</a></h5>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->

        <!-- Blog Section Begin -->
        <section class="from-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>From The Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                            <img src="{{ asset('assets/img/blog/blog-1.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                            <img src="{{ asset('assets/img/blog/blog-2.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                            <img src="{{ asset('assets/img/blog/blog-3.jpg') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Visit the clean farm in the US</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
@endsection

@extends('frontend.layout.index')
@section('content')
<div class="page-wrap">
    <div class="ps-section--hero"><img src="frontend/images/hero/01.jpg" alt="">
        <div class="ps-section__content text-center">
            <h3 class="ps-section__title">OUR BAKERY</h3>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="homepage">Home</a></li>
                    <!-- <li class="active"></li> -->
                </ol>
            </div>
        </div>
    </div>
    <div class="ps-section pt-80 pb-80">
        <div class="container">
            <div class="ps-product--detail">
                @foreach($products as $product)
                <div class="row ps-product__content">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                        <div class="ps-product__thumbnail" data-image="{{$product->image}}">
                            <div class="ps-badge"><span>50%</span></div>
                            <div class="owl-slider primary" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;">
                                <div class="ps-product__image"><img src="upload/products/{{$product->image}}" alt=""></div>
                                <div class="ps-product__image"><img src="images/cake/img-cake-11.jpg" alt=""></div>
                                <div class="ps-product__image"><img src="images/cake/img-cake-10.jpg" alt=""></div>
                                <div class="ps-product__image"><img src="images/cake/img-cake-6.jpg" alt=""></div>
                                <div class="ps-product__image"><img src="images/cake/img-cake-5.jpg" alt=""></div>
                            </div>
                            <div class="owl-slider second mb-30" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="20" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;"><img src="images/cake/img-cake-12.jpg" alt=""><img src="images/cake/img-cake-11.jpg" alt=""><img src="images/cake/img-cake-10.jpg" alt=""><img src="images/cake/img-cake-6.jpg" alt=""><img src="images/cake/img-cake-5.jpg" alt=""></div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12   ">
                        <header>
                            <h3 class="ps-product__name">{{$product->name}}</h3>
                            <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="5">5</option>
                            </select>
                            <p class="ps-product__price" data-unit="{{$product->unit_price}}" data-promote="{{$product->promote_price}}">{!!number_format($product->promote_price,0,",",".") . ' đ'!!}
                                <del>{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</del>
                            </p>
                            @if(strlen($product->description) > 0)
                            <a class="ps-product__quickview popup-modal" data-effect="mfp-zoom-out">QUICK OVERVIEW</a>
                            <div class="ps-product__description">
                                <p>{{$product->description}}</p>
                            </div>
                            @endif
                            <div class="ps-product__meta">
                                @if(intval($product->quantity) > 0)
                                <p><span> Availability: </span> In stock</p>
                                @else
                                <p><span> Availability: </span> Out of stock</p>
                                @endif
                                <p class="category"><span>CATEGORIES: </span><a href="category/{{$product->categories->id}}">{{$product->categories->name}}</a></p>
                            </div>
                            <div class="ps-product__shop">
                                <div class="form-group--number">
                                    <button class="minus"><span>-</span></button>
                                    <input class="form-control" data-quantity="{{$product->quantity}}" type="number" value="1">
                                    <button class="plus"><span>+</span></button>
                                </div>
                                <ul class="ps-product__action">
                                    <li><a href="#" data-tooltip="Add to wishlist"><i class="ps-icon--heart"></i></a></li>
                                    <li><a href="#" data-tooltip="Compare"><i class="ps-icon--reload"></i></a></li>
                                </ul>
                            </div>
                        </header>
                        <footer>
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 "><a class="ps-btn--fullwidth ps-btn add-to-cart-product-page">Add To Cart<i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 ">
                                    <p class="ps-product__sharing">Share with:<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-twitter"></i></a></p>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="ps-section ps-section--best-seller pt-40 pb-100">
        <div class="container">
            <div class="ps-section__header text-center mb-50">
                <h4 class="ps-section__top">Sweet Cupcakes</h4>
                <h3 class="ps-section__title ps-section__title--full">BEST SELLER</h3>
            </div>
            <div class="ps-section__content">
                <div class="owl-slider owl-slider--best-seller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="100000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;ps-icon--back&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;ps-icon--next&quot;&gt;&lt;/i&gt;">
                    @foreach($bestsellers as $product)
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <div class="ps-badge">
                                <span>-{!!number_format((1-($product->promote_price/$product->unit_price))*100, 0) . '%'!!}</span></div>
                            <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" height='220.27px' alt="">
                        </div>
                        <div class="ps-product__content">
                            <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                            <div class="ps-product__category"><a class="ps-product__category" href="category/{{$product->categories->id}}">{{$product->categories->name}}</a>
                            </div>
                            <div class="ps-product__category"><del>
                                    <p class="ps-product__price">{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</p>
                                </del>
                            </div>
                            <p class="ps-product__price">{!!number_format($product->promote_price,0,",",".") . ' đ'!!}</p>
                            <a class="ps-btn ps-btn--xs" href="{!!url('add-to-cart', [$product->id])!!}">Order now<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endsection
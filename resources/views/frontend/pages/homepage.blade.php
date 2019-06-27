@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

    @include('frontend.layout.slide')

    <section class="ps-section ps-section--best-seller pt-40 pb-100">
        <div class="container">
            <div class="ps-section__header text-center mb-50">
                <h4 class="ps-section__top">Sweet Cupcakes</h4>
                <h3 class="ps-section__title ps-section__title--full">BEST SELLER</h3>
            </div>
            <div class="ps-section__content">
                <div class="owl-slider owl-slider--best-seller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;ps-icon--back&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;ps-icon--next&quot;&gt;&lt;/i&gt;">
                    @foreach($bestsellers as $product)
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <div class="ps-badge">
                                <span>{!!number_format((1-($product->promote_price/$product->unit_price))*100, 0) . '%'!!}</span></div>
                            <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" height='220.27px' alt="">
                        </div>
                        <div class="ps-product__content">
                            <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                            <div class="ps-product__category"><a href="category/{{$product->categories->id}}">{{$product->categories->name}}</a>
                            </div>
                            <div class="ps-product__category"><del data-unit="{{$product->unit_price}}" data-promote="{{$product->promote_price}}">
                                    <p class="ps-product__price">{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</p>
                                </del>
                            </div>
                            <p class="ps-product__price">{!!number_format($product->promote_price,0,",",".") . ' đ'!!}</p>
                            <a class="ps-btn ps-btn--xs add-to-cart" data-check='best-seller'>add to cart<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="ps-section ps-section--list-product pt-40 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header">
                        <h3 class="ps-section__title ps-section__title--left">HOT CAKE</h3>
                    </div>
                    @foreach($hotCake as $product)
                    <div class="ps-section__content">
                        <div class="ps-product--list">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" alt=""></div>
                            <div class="ps-product__content">
                                <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                                <div class="ps-product__category"><a class="ps-product__category" href="category/{{$product->categories->id}}">{{$product->categories->name}}</a>
                                </div>
                                <p>{{$product->description}}</p>
                                <p class="ps-product__price">
                                    <del data-unit="{{$product->unit_price}}" data-promote="{{$product->promote_price}}">{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</del>{!!number_format($product->promote_price,0,",",".") . ' đ'!!}
                                </p>
                                <a class="ps-btn ps-btn--xs add-to-cart">add to cart<i class=" fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header">
                        <h3 class="ps-section__title ps-section__title--left">New CAKE</h3>
                    </div>
                    @foreach($newCake as $product)
                    <div class="ps-section__content">
                        <div class="ps-product--list">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" alt=""></div>
                            <div class="ps-product__content">
                                <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                                <div class="ps-product__category"><a class="ps-product__category" href="category/{{$product->categories->id}}">{{$product->categories->name}}</a>
                                </div>
                                <p class="ps-product__price">
                                    <del data-unit="{{$product->unit_price}}" data-promote="{{$product->promote_price}}">{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</del>{!!number_format($product->promote_price,0,",",".") . ' đ'!!}
                                </p><a class="ps-btn ps-btn--xs add-to-cart">add to cart<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
<section class="ps-section ps-section--map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29802.517469351187!2d108.22326598766935!3d16.04084165660012!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219e8e4ccc6e9%3A0xdd5984c9af4b17c9!2zNzUgUGhhbiDEkMSDbmcgTMawdSwgSG_DoCBDxrDhu51uZyBC4bqvYywgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nLCBWaWV0bmFt!5e0!3m2!1sen!2sus!4v1540481704316" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
@endsection
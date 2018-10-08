@extends('frontend.layout.index')
@section('content')
<!-- <div class="ps-section--page">
@include('frontend.layout.slide')
<section class="ps-section ps-section--list-product pt-40 pb-80">
    <div class="container">
        <div class="ps-section__header text-center mb-50">
            <h4 class="ps-section__top">Sweet Cupcakes</h4>
            <h3 class="ps-section__title ps-section__title--full">FIND CAKE</h3>
        </div>
        <div class="ps-section__content">
            <div class="owl-slider owl-slider--best-seller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;ps-icon--back&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;ps-icon--next&quot;&gt;&lt;/i&gt;">
                @foreach($product as $new)
                <div class="ps-product">
                    <div class="ps-product__thumbnail">
                        <div class="ps-badge"><span>-50%</span></div>
                        <a class="ps-product__overlay" href="products/{{count($product)}}"></a><img src="upload/products/{{$new->image}}"  height= '220.27px' alt="">
                        <ul class="ps-product__action">
                            <li><a class="popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out" data-tooltip="View"><i class="ps-icon--search"></i></a></li>
                            <li><a href="#" data-tooltip="Add to wishlist"><i class="ps-icon--heart"></i></a></li>
                            <li><a href="#" data-tooltip="Compare"><i class="ps-icon--reload"></i></a></li>
                            <li><a href="#" data-tooltip="Add to cart"><i class="ps-icon--shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="ps-product__content"><a class="ps-product__title" href="product/{{$new->id}}">{{$new->name}}</a>
                        <div class="ps-product__category"><a class="ps-product__category" href="category/{{$new->categories->id}}">{{$new->categories->name}}</a>
                        </div>
                        <select class="ps-rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="5">5</option>
                        </select>
                        <p class="ps-product__price">{{$new->unit_price . ' vnd'}}</p>
                        <a class="ps-btn ps-btn--xs" href="{{route('product.addToCart', ['id' => $new->id])}}">Order now<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  </section>
</div> -->
<div class="page-wrap">

<div class="ps-section--page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
                        <div class="ps-shop-grid pt-80">
                            <div class="ps-shop-features">
                              <div class="ps-section__header text-center mb-50">
                                  <h4 class="ps-section__top">Sweet Cupcakes</h4>
                                  <h3 class="ps-section__title ps-section__title--full">FIND CAKE</h3>
                              </div>
                                <div class="row">
                                    @foreach($product as $new)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                                <!-- <div class="ps-badge ps-badge--new"><span>New</span></div> -->
                                                <a class="ps-product__overlay" href="product-detail.html"></a><img src="upload/products/{{$new->image}}" height= '220.27px'alt="">
                                                <ul class="ps-product__action">
                                                    <li><a class="popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out" data-tooltip="View"><i class="ps-icon--search"></i></a></li>
                                                    <li><a href="#" data-tooltip="Add to wishlist"><i class="ps-icon--heart"></i></a></li>
                                                    <li><a href="#" data-tooltip="Compare"><i class="ps-icon--reload"></i></a></li>
                                                    <li><a href="#" data-tooltip="Add to cart"><i class="ps-icon--shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__content"><a class="ps-product__title" href="product/{{$new->id}}">{{$new->name}}</a>

                                                <select class="ps-rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <p class="ps-product__price">{{$new->unit_price . ' vnd'}}</p>
                                                <a class="ps-btn ps-btn--xs" href="{{route('product.addToCart', ['id' => $new->id])}}">Order now<i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                        <div class="ps-sidebar">
                          <aside class="ps-widget ps-widget--sidebar ps-widget--search">
                                <form method="get" action="{{route('search')}}">
                                  {{ csrf_field() }}
                                    <input name="key" id="product_name" class="form-control product_name" type="text" placeholder="Type here bakery name...">
                                    <button type="submit"><i class="ps-icon--search"></i></button>
                                    <div class="dropdown-menu" id="productList"></div>
                                </form>
                          </aside>
                            <aside class="ps-widget ps-widget--sidebar ps-widget--filter">
                                <div class="ps-widget__header">
                                    <h3 class="ps-widget__title">Fillter Prices</h3>
                                </div>
                                <div class="ps-widget__content">
                                    <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                                    <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn ps-btn--xs" href="#">Filter</a>
                                </div>
                            </aside>
                            <aside class="ps-widget ps-widget--sidebar ps-widget--best-seller">
                                <div class="ps-widget__header">
                                    <h3 class="ps-widget__title">Best seller</h3>
                                </div>
                                <div class="ps-widget__content">
                                    <div class="ps-product--sidebar">
                                        @foreach($bestsellers as $bestseller)
                                        <div class="ps-product__thumbnail">
                                            <a class="ps-product__overlay" href="product/{{$bestseller->id}}"></a><img src="upload/products/{{$bestseller->image}}" alt=""></div>
                                        <div class="ps-product__content">
                                            <h4 class="ps-product__title"><a href="product/{{$bestseller->id}}">{{$bestseller->name}}</a></h4>
                                            <p class="ps-product__price">
                                                <del>{{$bestseller->unit_price . ' vnd'}}</del>{{$bestseller->promote_price . ' vnd'}}
                                            </p><a class="ps-btn ps-btn--xs" href="{{route('product.addToCart', ['id' => $bestseller->id])}}">Order Now</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                            <aside class="ps-widget ps-widget--sidebar ps-widget--tags">
                                <div class="ps-widget__header">
                                    <h3 class="ps-widget__title">TAGS</h3>
                                </div>
                                <div class="ps-widget__content">
                                    <ul class="ps-tags">
                                        <li><a href="#">Cupcake</a></li>
                                        <li><a href="#">vanila</a></li>
                                        <li><a href="#">sugar flower</a></li>
                                        <li><a href="#">vanila</a></li>
                                        <li><a href="#">coconut</a></li>
                                        <li><a href="#">vanila</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection

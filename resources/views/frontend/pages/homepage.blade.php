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
                        @foreach($products as $product)
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <div class="ps-badge"><span>-50%</span></div>
                                <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}"  height= '220.27px' alt="">
                                <ul class="ps-product__action">
                                    <li><a class="popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out" data-tooltip="View"><i class="ps-icon--search"></i></a></li>
                                    <li><a href="#" data-tooltip="Add to wishlist"><i class="ps-icon--heart"></i></a></li>
                                    <li><a href="#" data-tooltip="Compare"><i class="ps-icon--reload"></i></a></li>
                                    <li><a href="#" data-tooltip="Add to cart"><i class="ps-icon--shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product/{{$product->id}}">{{$product->name}}</a>
                                <div class="ps-product__category"><a class="ps-product__category" href="category/{{$product->categories->id}}">{{$product->categories->name}}</a>
                                </div>
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="5">5</option>
                                </select>
                                <p class="ps-product__price">{{$product->unit_price . ' vnd'}}</p>
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
                        @foreach($products as $product)
                        <div class="ps-section__content">
                            <div class="ps-product--list">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" alt=""></div>
                                <div class="ps-product__content">
                                    <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                                    <p>{{$product->description}}</p>
                                    <p class="ps-product__price">
                                        <del>{{$product->unit_price . ' vnd'}}</del>{{$product->promote_price . ' vnd'}}
                                    </p><a class="ps-btn ps-btn--xs" href="cart.html">Order now<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-section__header">
                            <h3 class="ps-section__title ps-section__title--left">New CAKE</h3>
                        </div>
                        @foreach($products as $product)
                        <div class="ps-section__content">
                            <div class="ps-product--list">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-product__overlay" href="product/{{$product->id}}"></a><img src="upload/products/{{$product->image}}" alt=""></div>
                                <div class="ps-product__content">
                                    <h4 class="ps-product__title"><a href="product/{{$product->id}}">{{$product->name}}</a></h4>
                                    <p>{{$product->description}}</p>
                                    <p class="ps-product__price">
                                    <del>{{$product->unit_price . ' vnd'}}</del>{{$product->promote_price . ' vnd'}}
                                    </p><a class="ps-btn ps-btn--xs" href="cart.html">Order now<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-section ps-section--partner">
            <div class="container">
                <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="40" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="6" data-owl-item-xs="3" data-owl-item-sm="4" data-owl-item-md="5" data-owl-item-lg="6" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;">
                    <a href="#"><img src="frontend/images/partner/1.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/2.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/3.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/4.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/5.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/6.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/7.png" alt=""></a>
                    <a href="#"><img src="frontend/images/partner/8.png" alt=""></a>
                </div>
            </div>
        </div>
        <section class="ps-section ps-section--map">
            <div id="contact-map" data-address="New York, NY" data-title="BAKERY LOCATION!" data-zoom="17"></div>
            <div class="ps-delivery">
                <div class="ps-delivery__header">
                    <h3>Contact Us</h3>
                    <p>Our Company is the best, meet the creative team that never sleeps. Say something to us we will answer to you.</p>
                </div>
                <div class="ps-delivery__content">
                    <form class="ps-delivery__form" action="product-listing.html" method="post">
                        <div class="form-group">
                            <label>Name<span>*</span></label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input class="form-control" type="email">
                        </div>
                        <div class="form-group">
                            <label>Phone Number<span>*</span></label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label>Your message<span>*</span></label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="ps-btn">Send Message<i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</div>
@endsection
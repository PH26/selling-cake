@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

@include('frontend.layout.section')

<div class="ps-section pt-80 pb-80">
            <div class="container">
                <div class="ps-product--detail">
                    @foreach($products as $product)
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                            <div class="ps-product__thumbnail">
                                <!-- <div class="ps-badge"><span>50%</span></div> -->
                                <div class="owl-slider primary" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;">
                                    <div class="ps-product__image"><img src="upload/products/{{$product->image}}" alt=""></div>
                                </div>
                                <!-- <div class="owl-slider second mb-30" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="20" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;"><img src="upload/products/{{$product->image}}" alt=""></div> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
                            <header>
                                <h3 class="ps-product__name">{{$product->name}}</h3>
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="5">5</option>
                                </select>
                                <p class="ps-product__price">{{$product->promote_price . ' vnd'}}
                                    <del>{{$product->unit_price . ' vnd'}}</del>
                                </p><a class="ps-product__quickview popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out">QUICK OVERVIEW</a>
                                <div class="ps-product__description">
                                    <p>{{$product->description}}</p>
                                    <p>Toffee chocolate cake apple pie sugar plum sesame snaps muffin cake pudding cupcake. Muffin danish muffin lollipop biscuit jelly beans oat cake croissant.</p>
                                </div>
                                <div class="ps-product__meta">
                                    <p><span> Availability: </span> In stock</p>
                                    <p class="category"><span>CATEGORIES: </span><a href="category/{{$product->categories->id}}">{{$product->categories->name}}</a></p>
                                </div>
                                <div class="form-group ps-product__size">
                                    <label>Size:</label>
                                    <select class="ps-select" data-placeholder="Popupar product">
                                        <option value="01">CHOOSE AN OPTION</option>
                                        <option value="01">Item 01</option>
                                        <option value="02">Item 02</option>
                                        <option value="03">Item 03</option>
                                    </select>
                                </div>
                                <div class="ps-product__shop">
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input class="form-control" type="text" value="1">
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
                                    <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 "><a class="ps-btn--fullwidth ps-btn" href="#">Order Now<i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 ">
                                        <p class="ps-product__sharing">Share with:<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-twitter"></i></a></p>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    @endforeach
                    <div class="ps-product__info">
                        <ul class="tab-list" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                            <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAG</a></li>
                            <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">ADDITIONAL</a></li>
                        </ul>
                    </div>
                    <div class="tab-content mb-60">
                        <div class="tab-pane active" role="tabpanel" id="tab_01">
                            <p>Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice. Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin.</p>
                            <p>Sweet roll soufflé oat cake apple pie croissant. Pie gummi bears jujubes cake lemon drops gummi bears croissant macaroon pie. Fruitcake tootsie roll chocolate cake Carrot cake cake bear claw jujubes topping cake apple pie. Jujubes gummi bears soufflé candy canes topping gummi bears cake soufflé cake. Cotton candy soufflé sugar plum pastry sweet roll..</p>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_02">
                            <p>1 review for Cupcakes Red Flowers</p>
                            <div class="ps-review-box">
                                <div class="ps-review-box__thumbnail"><img src="images/blog/people.png" alt=""></div>
                                <div class="ps-review-box__content">
                                    <header>
                                        <select class="ps-rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p>By<a href=""> Alena Studio</a> - November 25, 2017</p>
                                    </header>
                                    <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder. Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake. Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie.</p>
                                </div>
                            </div>
                            <form class="ps-product__review" action="_action" method="post">
                                <h4>ADD YOUR REVIEW</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Name:*<span>*</span></label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email: *<span>*</span></label>
                                            <input class="form-control" type="email" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Your rating<span></span></label>
                                            <select class="ps-rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Your Review:</label>
                                            <textarea class="form-control" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="ps-btn ps-btn--sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_03">
                            <p>Add your tag <span> *</span></p>
                            <form class="ps-product__tags" action="_action" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="">
                                    <button class="ps-btn ps-btn--sm">Add Tag</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_04">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
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
                        @foreach($bestsellers as $bestseller)
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__overlay" href="product/{{$bestseller->id}}"></a><img src="upload/products/{{$bestseller->image}}" height='220.17px'alt="">
                                <ul class="ps-product__action">
                                    <li><a class="popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out" data-tooltip="View"><i class="ps-icon--search"></i></a></li>
                                    <li><a href="#" data-tooltip="Add to wishlist"><i class="ps-icon--heart"></i></a></li>
                                    <li><a href="#" data-tooltip="Compare"><i class="ps-icon--reload"></i></a></li>
                                    <li><a href="#" data-tooltip="Add to cart"><i class="ps-icon--shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product/{{$bestseller->id}}">{{$bestseller->name}}</a>
                                <div class="ps-product__category"><a class="ps-product__category" href="category/{{$bestseller->categories->id}}">{{$bestseller->categories->name}}</a>
                                </div>
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="5">5</option>
                                </select>
                                <p class="ps-product__price">{{$bestseller->unit_price . ' vnd'}}</p>
                                <a class="ps-btn ps-btn--xs" href="cart.html">Order now<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

@endsection
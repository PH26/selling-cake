@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

@include('frontend.layout.section')
<div class="ps-section--page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
                        <div class="ps-shop-grid pt-80">
                            <div class="ps-shop-features">
                                <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                                <!-- <div class="ps-badge ps-badge--new"><span>New</span></div> -->
                                                <a class="ps-product__overlay" href="product-detail.html"></a><img src="upload/products/{{$product->image}}" height= '220.27px'alt="">
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
                                    </div>
                                    @endforeach
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <!-- Previous Page Link -->
                                            @if ($products->onFirstPage())
                                                <li class="disabled"><span>&laquo;</span></li>
                                            @else
                                                <li><a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                            @endif

                                            <!-- Pagination Elements -->
                                            @foreach ($products as $product)
                                                <!-- "Three Dots" Separator -->
                                                @if (is_string($product))
                                                    <li class="disabled"><span>{{ $product }}</span></li>
                                                @endif

                                                <!-- Array Of Links -->
                                                @if (is_array($product))
                                                    @foreach ($product as $page => $url)
                                                        @if ($page == $product->currentPage())
                                                            <li class="active"><span>{{ $page }}</span></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($products->hasMorePages())
                                                <li><a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                            @else
                                                <li class="disabled"><span>&raquo;</span></li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                        <div class="ps-sidebar">
                            <aside class="ps-widget ps-widget--sidebar ps-widget--search">
                                <form method="post" action="search-result.html">
                                    <input class="form-control" type="text" placeholder="Type here bakery name...">
                                    <button type="submit"><i class="ps-icon--search"></i></button>
                                </form>
                            </aside>
                            <aside class="ps-widget ps-widget--sidebar ps-widget--category">
                                <div class="ps-widget__header">
                                    <h3 class="ps-widget__title">CATEGORY</h3>
                                </div>
                                <div class="ps-widget__content">
                                    <ul class="ps-list--circle">
                                        <li class="current"><a href="allproduct"><span class="circle"></span>All category </a></li>
                                        @foreach($categories as $category)
                                        <li><a href="category/{{$category->id}}l"><span class="circle"></span>{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
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
                                            </p><a class="ps-btn ps-btn--xs" href="product-detail.html">Purchase</a>
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
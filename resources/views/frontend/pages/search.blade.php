@extends('frontend.layout.index')
@section('content')
<div class="page-wrap">
<div class="ps-section--hero"><img src="frontend/images/hero/01.jpg" alt="">
            <div class="ps-section__content text-center">
                <h3 class="ps-section__title">OUR BAKERY</h3>
                <div class="ps-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="homepage">Home</a></li>
                        <li class="active">Search</li>
                    </ol>
                </div>
            </div>
        </div>
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
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                             <div class="ps-badge"><span>-{!!number_format((1-($product->promote_price/$product->unit_price))*100, 0) . '%'!!}</span></div>
                                                <a class="ps-product__overlay" href="product-detail.html"></a><img src="upload/products/{{$product->image}}" height= '220.27px'alt="">
                                            </div>
                                            <div class="ps-product__content"><a class="ps-product__title" href="product/{{$product->id}}">{{$product->name}}</a>
                                                <div class="ps-product__category"><del><p class="ps-product__price">{!!number_format($product->unit_price,0,",",".") . ' đ'!!}</p></del>
                                                </div>
                                                <p class="ps-product__price">{!!number_format($product->promote_price,0,",",".") . ' đ'!!}</p>
                                                <a class="ps-btn ps-btn--xs" href="{!!url('add-to-cart', [$product->id])!!}">Order now<i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="ps-pagination">
                                {{ $products->links('frontend.pagination', ['paginator' => $products]) }}
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                        <div class="ps-sidebar">
                            <aside class="ps-widget ps-widget--sidebar ps-widget--filter">
                                <div class="ps-widget__header">
                                    <h3 class="ps-widget__title">Price Range</h3>
                                </div>
                                <div class="ps-widget__content">
                                <form action="fillter/0" method='GET' id=fillter>
                                            <input type="number" name="minimum_price" id='minimum_price' step="{!!number_format(10000,0,',','.')!!}" max="{!!number_format(300000,0,',','.')!!}" style="width: 80px; text-align:center;" placeholder='Min'/>

                                            <input type="number" name="maximum_price" id='maximum_price' step="{!!number_format(10000,0,',','.')!!}" max="{!!number_format(300000,0,',','.')!!}" style="width: 80px; text-align:center;" placeholder='Max'/>
                                            <button type='submit' class='ac-slider__filter ps-btn ps-btn--xs' style="width: 80px; height: 34px;">Fillter</button>
                                            <p>(Unit: 1000 đ)</p>

                                        </form>
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
                                            <a class="ps-product__overlay" href="product/{{$bestseller->id}}"></a><img src="upload/products/{{$bestseller->image}}" style='height: 56.4px;'></div>
                                        <div class="ps-product__content">
                                            <h4 class="ps-product__title"><a href="product/{{$bestseller->id}}">{{$bestseller->name}}</a></h4>
                                            <p class="ps-product__price" style='margin-bottom: -2px'>
                                                <del>{!!number_format($bestseller->unit_price,0,",",".") . ' đ'!!}</del>{!!number_format($bestseller->promote_price,0,",",".") . ' đ'!!}
                                            </p><a class="ps-btn ps-btn--xs" href="{!!url('add-to-cart', [$bestseller->id])!!}" style='margin-bottom: 10px;'>Order Now</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>
@endsection

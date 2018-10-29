@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

<div class="ps-section--hero"><img src="frontend/images/hero/01.jpg" alt="">
            <div class="ps-section__content text-center">
                <h3 class="ps-section__title">OUR BAKERY</h3>
                <div class="ps-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="homepage">Home</a></li>
                        <li class="active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
<div class="ps-section--cart pt-100 pb-100">
            <div class="container">
                @if(session('warning'))
                    <div class="alert alert-warning" data-dismiss="alert">
                        {!!session('warning')!!}
                    </div>
                @endif
                @if(Session::has('cart'))
                <div class="ps-cart-listing">
                    <p class="hidden-lg"><i>Slide right to view</i></p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>All Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <form method='POST' action=''>
                                {{ csrf_field() }}
                            <tbody>
                                @foreach(Cart::content() as $cart)
                                <tr>
                                    <td>
                                        <div class="ps-product--cart"><img src="upload/products/{{$cart->options->image}}" alt="">
                                            <a href="product/{{$cart->id}}">
                                                <div style='position: relative; bottom: 20px;' >
                                                {{$cart->name}}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                    {!!number_format($cart->price,0,",",".") . ' đ' !!}
                                    </td>
                                    <td>
                                        <div class="form-group--number">
                                            <input class="form-control changeQty" type="number" value="{{$cart->qty}}" id="{{$cart->rowId}}" style='border-radius: 25px; background: #F9DFDF;'>
                                        </div>
                                    </td>
                                    <td><span class="total-row">
                                    {!!number_format($cart->price*$cart->qty,0,",",".") . ' đ'!!}
                                    </span></td>
                                    <td>
                                        <div class="ps-cart-item" style='position: relative;  top: 20px;'><a class="ps-cart-listing__remove" href="{!!url('delete-item-cart', ['id' => $cart->rowId])!!}"></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="ps-cart__process">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                <div class="form-group form-group--icon ps-cart__promotion">

                                </div>
                                <div class="form-groupform-order">
                                    <a href="allproduct"><button class="ps-cart__shopping">Continue Shopping</button></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                <div class="ps-cart__total">
                                    <p>Total Price: <span>{!!Cart::subtotal(0,",",".") . ' đ'!!}</span></p>
                                    <a href="checkout">
                                    <button class="ps-btn ps-btn--sm ps-btn--fullwidth" >Process to checkout</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
</div>
@endsection

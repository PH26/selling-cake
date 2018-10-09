@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

@include('frontend.layout.section')
<div class="ps-section--cart pt-100 pb-100">
            <div class="container">
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
                                            <button class="minus"><span>-</span></button>
                                            <input class="form-control changeQty" type="text" value="{{$cart->qty}}" id="{{$cart->rowId}}">
                                            <button class="plus"><span>+</span></button>
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
                                    <div class="icon-wrap"><i class="fa fa-angle-right"></i>
                                        <input class="form-control" type="text" placeholder="promotion code">
                                    </div>
                                </div>
                                <div class="form-groupform-order">
                                    <button class="ps-cart__shopping">Continue Shopping</button>
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

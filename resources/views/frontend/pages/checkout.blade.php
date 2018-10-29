@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

<div class="ps-section--hero"><img src="frontend/images/hero/01.jpg" alt="">
            <div class="ps-section__content text-center">
                <h3 class="ps-section__title">OUR BAKERY</h3>
                <div class="ps-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="homepage">Home</a></li>
                        <li class="active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
<div class="ps-section--checkout pt-80 pb-80">
            <div class="container">
                <form class="ps-checkout" action="checkout" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                            <div class="ps-checkout__billing">
                                @if(session('notification'))
                                    <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                        {{session('notification')}}
                                    </div>
                                @endif
                                @if(session('warning'))
                                    <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                        {{session('warning')}}
                                    </div>
                                @endif
                                @if(!Auth::check())
                                <h3 style="text-align: center; color: red;">Please login to continue process checkout</h3>
                                @else
                                <h3>Billing Detail</h3>
                                <div class="form-group">
                                    <label>Name
                                    </label>
                                    <input class="form-control" type="text" name='name' value='{{Auth::user()->name}}'>
                                    @if ($errors->has('name'))
                                        <span class="help-block col-sm-9">
                                            <strong style='color:red; position:relative; left:150px' class="col-xs-10 col-sm-5">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email Address
                                    </label>
                                    <input class="form-control" type="email"
                                    name='email' value='{{Auth::user()->email}}'>
                                    @if ($errors->has('email'))
                                        <span class="help-block col-sm-9">
                                            <strong style='color:red; position:relative; left:150px' class="col-xs-10 col-sm-5">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone
                                    </label>
                                    <input class="form-control" type="text" name='phone' value='{{Auth::user()->phone}}'>
                                    @if ($errors->has('phone'))
                                        <span class="help-block col-sm-9">
                                            <strong style='color:red;position:relative; left:150px' class="col-xs-10 col-sm-5">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Address
                                    </label>
                                    <input class="form-control" type="text"
                                    name='address' value='{{Auth::user()->address}}'>
                                    @if ($errors->has('address'))
                                        <span class="help-block col-sm-9">
                                            <strong style='color:red; position:relative; left:150px' class="col-xs-10 col-sm-5">{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <h3> Addition information</h3>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <textarea class="form-control" name =' note' rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-checkout__order">
                                <h3>Your Order</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    @foreach(Cart::content() as $cart)
                                    <tbody>
                                        <tr>
                                            <td>{{$cart->name}} x {{$cart->qty}}</td>
                                            <td>
                                            {!!number_format($cart->price*$cart->qty,0,",",".") . ' đ'!!}
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <h3>Payment Method</h3>
                                @if ($errors->has('payment'))
                                        <span class="help-block col-sm-12">
                                            <strong style='color:red; position:relative; left:-11px' class="col-xs-10 col-sm-12">{{ $errors->first('payment') }}</strong>
                                        </span>
                                @endif
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="COD">Cash on delivery
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="Transfer Money">Internet Banking
                                        </label>
                                        <div class="card-list"></div>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="Visa">Visa
                                        </label>
                                        <div class="card-list"></div>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="MasterCard">MasterCard
                                        </label>
                                        <div class="card-list"></div>
                                    </div>
                                </div>
                                <button class="ps-btn ps-btn--sm">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

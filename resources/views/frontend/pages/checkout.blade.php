@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">

@include('frontend.layout.section')
<div class="ps-section--checkout pt-80 pb-80">
            <div class="container">
                <form class="ps-checkout" action="checkout" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                            <div class="ps-checkout__billing">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('notification'))
                                    <div class="alert alert-success">
                                        {{session('notification')}}
                                    </div>
                                @endif
                                @if(session('warning'))
                                    <div class="alert alert-warning">
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
                                </div>
                                <div class="form-group">
                                    <label>Email Address
                                    </label>
                                    <input class="form-control" type="email"
                                    name='email' value='{{Auth::user()->email}}'>
                                </div>
                                <div class="form-group">
                                    <label>Phone
                                    </label>
                                    <input class="form-control" type="text" name='phone' value='{{Auth::user()->phone}}'>
                                </div>
                                <div class="form-group">
                                    <label>Address
                                    </label>
                                    <input class="form-control" type="text"
                                    name='address' value='{{Auth::user()->address}}'>
                                </div>
								<input type="hidden" name='role' value="0">
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
                                </div>
                                <button class="ps-btn ps-btn--sm">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
<script>
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("showEnterPassword");
  // Get the output text
  var formPassword = document.getElementById("formPassword");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    formPassword.style.display = "block";
  } else {
    formPassword.style.display = "none";
  }
}
</script>
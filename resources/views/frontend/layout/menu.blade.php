<nav class="navigation">
            <div class="container">
                <div class="menu-toggle"><span></span></div>
                <div class="navigation__left">
                    <ul class="menu menu--left">
                        <li class=""><a href="/">Home</a>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li class="menu-item-has-children"><a href="allproduct">Categories</a>
                            <ul class="sub-menu">
                                @foreach($categories as $category)
                                <li><a href="category/{{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <a class="ps-logo" href="index.html"><img src="images/logo-1.png" alt=""></a>
                <div class="navigation__right">
                    <ul class="menu menu--right">
                        <li class=""><a href="#">Contact</a></li>
                    </ul>
                    <ul class="menu menu--right">
                        <li class=""><a href="#">Login</a></li>
                    </ul>
                    <ul class="menu menu--right">
                        <li class=""><a href="#">Signup</a></li>
                    </ul>
                    <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i>
                        @if(Session::has('cart'))
                            {{Session('cart')->totalQty}}
                        @else
                            0
                        @endif
                        </i></span><i class="ps-icon--shopping-cart"></i></a>
                        @if(Session::has('cart'))
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                @foreach($product_cart as $product)
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="{{route('product.deleteItemCart', ['id' => $product['item']['id']])}}"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product/{{$product['item']['id']}}"></a><img src="upload/products/{{$product['item']['image']}}" alt=""></div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product/{{$product['item']['id']}}">{{$product['item']['name']}}</a>
                                        <p><span>Quantity:<i>{{$product['qty']}}</i></span></p>
                                        <p><span>Total:<i>
                                        @if($product['item']['promote_price'] == 0)
                                        {{$product['qty']}}*{{$product['item']['unit_price']}}
                                        @else
                                        {{$product['qty']}}*{{$product['item']['promote_price']}}
                                        @endif
                                        </i></span></p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ps-cart__total">
                                <p>Number of items:<span>{{Session('cart')->totalQty}}</span></p>
                                <p>Item Total:<span>{{Session('cart')->totalPrice}}</span></p>
                            </div>
                            <div class="ps-cart__footer"><a class="ps-btn ps-btn--view-bag" href="viewcart">View Cart</a></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
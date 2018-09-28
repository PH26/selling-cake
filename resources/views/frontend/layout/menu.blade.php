
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
                    <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i>{{Cart::count()}}</i></span><i class="ps-icon--shopping-cart"></i></a>
                        <div class="ps-cart__listing">
                         
                            <div class="ps-cart__content">
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="abc"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="#"></a><img src="images/cake/img-cake-1.jpg" alt=""></div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">name</a>
                                        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                    </div>
                                </div>                                
                            </div>
                         
                            <div class="ps-cart__total">
                                <p>Number of items:<span>36</span></p>
                                <p>Item Total:<span>£528.00</span></p>
                            </div>
                            <div class="ps-cart__footer"><a class="ps-btn ps-btn--view-bag" href="{{route('showcart')}}">View Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
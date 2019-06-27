<nav class="navigation">
    <div class="container">
        <div class="menu-toggle"><span></span></div>
        <div class="navigation__left">
            <ul class="menu menu--left">
                <li class=""><a href="/">Home</a>
                </li>
                <li><a href="about">About</a></li>
                <li class="menu-item-has-children"><a href="all-product">Categories</a>
                    <ul class="sub-menu">
                        @foreach($categories as $category)
                        <li><a href="category/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <a class="ps-logo"><img src="frontend/images/logo-1.png" alt=""></a>
        <div class="navigation__right">
            <ul class="menu menu--right">
                <li class=""><a href="contact">Contact</a></li>
            </ul>
            @if(!Auth::check())
            <ul class="menu menu--right">
                <li class=""><a href="login">Login</a></li>
            </ul>
            <ul class="menu menu--right">
                <li class=""><a href="signup">Signup</a></li>
            </ul>
            @else
            <ul class="menu menu--right">
                <li class="dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <span class="user-info">
                            <small>Welcome,
                                {{Auth::user()->name}}
                            </small>
                        </span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li>
                            <a href="user/profile">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="user/order">
                                <i class="ace-icon fa fa-user"></i>
                                Order
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="logout">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
            <div class="ps-cart">
                <a class="ps-cart__toggle" href="viewcart"><span><i class="cart-count">
                        </i></span><i class="ps-icon--shopping-cart"></i></a>
                <div class="ps-cart__listing">
                    <div class="ps-cart__content" id="cart-content">
                    </div>
                    <div class="ps-cart__total">
                        <p>Number of items:<span class="cart-count"></span></p>
                        <p>Total:<span id="cart-total"></span></p>
                    </div>
                    <div class="ps-cart__footer"><a class="ps-btn ps-btn--view-bag" href="viewcart">View Cart</a></div>
                </div>
            </div>
        </div>
    </div>
</nav>
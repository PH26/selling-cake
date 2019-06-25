<div class="ps-searchbox">
    <div class="ps-searchbox__remove"><i class="fa fa-remove"></i></div>
    <div class="container">
        <header>
            <p>Enter your keywords:</p>
            <form method="post" action="/product-grid.html">
                <input class="form-control" id='search_products' type="text" placeholder="">
                <button><i class="ps-icon--search"></i></button>
            </form>
        </header>
        <div class="ps-searchbox__result">
            <div class="row" id="product_result_list">
            </div>
        </div>
        <footer class="text-center" id="view_all_result"></footer>
    </div>
</div>
<div class="header--sidebar"></div>
<header class="header" data-responsive="1199">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
                    <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 "><a class="ps-search-btn" href="#"><i class="ps-icon--search"></i></a>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("frontend.layout.menu")
</header>
<div id="back2top"><i class="fa fa-angle-up"></i></div>
<div class="loader"></div>
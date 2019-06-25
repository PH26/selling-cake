const $searchProducts = $('#search_products');
const $resultProductsList = $('#product_result_list');
const $viewAllResult = $('#view_all_result');
const totalPerDiv = 2;
const total = 4;
const viewAllResultLink = `<a class="ps-searchbox__morelink" href="/">VIEW ALL RESULT</a>`;
const noProductList = `<h2 class='text-center text-warning'>No product found!</h2>`;

$searchProducts.keyup(function () {
    const $query = $(this).val();
    if ($query !== '' && $query.length >=3) {
        $.ajax({
            url: "search",
            type: "GET",
            data: {
                query: $query,
            },
            success: function (data) {
                if (data.length > 0) {
                    let templateToInsert = '';
                    for (let i = 0; i <= totalPerDiv - 1; i++) {
                        if (sliceData(data, i).length > 0) {
                            templateToInsert += renderProducts(sliceData(data, i));
                        }
                    }
                    $resultProductsList.html(templateToInsert);
                    if (data.length > total) {
                        $viewAllResult.html(viewAllResultLink);
                    } else {
                        $viewAllResult.html('');
                    }
                } else {
                    $resultProductsList.html(noProductList);
                }
            }
        });
    } else {
        $resultProductsList.html('');
    }
});

//Slice data to render
const sliceData = (data, init) => {
    let start = init * totalPerDiv;
    return data.slice(start, start + totalPerDiv);
}

const renderProducts = (data) => {
    let template = '<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">';
    $.each(data, function (key, val) {
        template += `<div class="ps-product--list ps-product--list-light mt-60 col-lg-6">
                        <div class="ps-product__thumbnail">
                            <a class="ps-product__overlay" href="product/${val.id}"></a><img src="upload/products/${val.image}" alt=""></div>
                        <div class="ps-product__content">
                            <h4 class="ps-product__title"><a href="product/${val.id}">${val.name}</a></h4>
                            <p>${val.description}</p>
                            <p class="ps-product__price">
                                <del>${formatCurrencyVN(val.unit_price)}</del>${formatCurrencyVN(val.promote_price)}
                            </p><a class="ps-btn ps-btn--xs" href="cart.html">Order now<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>`;
    });
    template += `</div >`;
    return template;
}

const formatCurrencyVN = (price) => {
    return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(price);
}
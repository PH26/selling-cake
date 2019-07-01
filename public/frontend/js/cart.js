$(document).ready(function() {
    //Add to cart 
    const $addToCart = $('.add-to-cart');

    $addToCart.on('click', function() {
        const that = $(this);
        const $checkParent = that.data('check');
        let $productList;
        let item;
        const itemFromLocal = getItemFromLocal();
        
        if ($checkParent) {
            $productList = that.closest('.ps-product');
        } else {
            $productList = that.closest('.ps-product--list');
        }
        item = createItem($productList);
        if (itemFromLocal !== null) {
            const idOfItems = getIdFromObject(itemFromLocal);
            if (idOfItems.indexOf(item.id) === -1) {
                itemFromLocal.push(item);
                setItemToLocal(itemFromLocal);
                toast('success', 'Added ' + item.name + ' successfully!');
                renderCart(itemFromLocal);
            } else {
                toast('error', item.name + ' only added to cart once!');
            }
        } else {
            setItemToLocal([item]);
            toast('success', 'Added ' + item.name + ' successfully!');
            renderCart([item]);
        }
        
    });

    const createItem = (productList, quantity = 1) => {
        const hrefGetId = productList.find('.ps-product__title a').attr('href');
        const scrGetImage = productList.find('img').attr('src');
        const id = splitGetParam(hrefGetId, 1);
        const image = splitGetParam(scrGetImage, 2);
        const name = productList.find('.ps-product__title').text();
        const unitPrice = productList.find('.ps-product__price').data('unit');
        const promotePrice = productList.find('.ps-product__price').data('promote');
        let price;

        if (promotePrice) {
            price = promotePrice;
        } else {
            price = unitPrice;
        }
        const item = {id, image, name, price, quantity};
        return item;
    }

    const getIdFromObject = (items) => {
        return items.map(item => item.id);
    }
    const splitGetParam = (param, position) => {
        return param.split("/")[position];
    }
    const setItemToLocal = (item) => {
        return window.localStorage.setItem('items', JSON.stringify(item));
    }
    const getItemFromLocal = () => {
        return JSON.parse(window.localStorage.getItem('items'));
    }

    const toast = (type, message) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
        });

        Toast.fire({
            type: type,
            title: message
        })
    }

    //Display item in cart
    const $cartCount = $('.cart-count');
    const $cartContent = $('#cart-content');
    const $cartTotal = $('#cart-total');

    const renderCart = (items) => {
        $cartCount.html(cartCount(items));
        $cartContent.html(cartContent(items));
        $cartTotal.html(cartTotal(items));
    }
    const cartCount = (items) => {
        const quantityInItems =  items.map(item => item.quantity);
        return totalArr(quantityInItems);
    }
    const cartTotal = (items) => {
        const eachTotalInItems = items.map(item => item.quantity * item.price);
        return formatCurrencyVN(totalArr(eachTotalInItems));
    }
    const totalArr = (arr) => {
        return arr.reduce((first, second) => first + second, 0);
    }
    const cartContent = (item) => {
        let template = '';
        $.each(item, function(key, val) {
            template += `<div class="ps-cart-item">
                            <a class="ps-cart-item__close cart-remove""></a>
                            <div class="ps-cart-item__thumbnail">
                                <a href="product/${val.id}"></a><img src="upload/products/${val.image}" alt=""></div>
                            <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product/${val.id}">${val.name}</a>
                                <p><span>Quantity:<i>${val.quantity}</i></span></p>
                                <p><span>Item total:<i>
                                ${formatCurrencyVN(val.quantity * val.price)}
                                </i></span></p>
                            </div>
                        </div>`;
        })
        return template;
    }
    
    const formatCurrencyVN = (price) => {
        return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(price);
    }

    //Initialization cart
    const itemLocal = getItemFromLocal();
    if (itemLocal !== null) {
        renderCart(itemLocal);
    } else {
        renderCart([]);
    }

    //Remove item from cart
    const $document = $(document);
    $document.on("click", ".cart-remove", function () {
        const itemLocal = getItemFromLocal();
        const itemRemove = $(this).parent().find('.ps-cart-item__title').text();
        let indexItemRemove;
        $.each(itemLocal, function(key, val) {
            if (val.name === itemRemove) {
                indexItemRemove = key;
            }
        })
        itemLocal.splice(indexItemRemove, 1);
        setItemToLocal(itemLocal);
        toast('success', 'Removed ' + itemRemove + ' successfully!');
        renderCart(itemLocal);
    })
});
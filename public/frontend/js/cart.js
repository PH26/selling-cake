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
                addItemNotExistInItems(itemFromLocal, item);
            } else {
                toast('error', item.name + ' only added to cart once!');
            }
        } else {
            createItemsIfNotExist(item);
        }
    });

    const createItemsIfNotExist = (item) => {
        setItemToLocal([item]);
        toast('success', 'Added ' + item.name + ' successfully!');
        renderCart([item]);
    }
    const addItemNotExistInItems = (itemFromLocal, item) => {
        itemFromLocal.push(item);
        setItemToLocal(itemFromLocal);
        toast('success', 'Added ' + item.name + ' successfully!');
        renderCart(itemFromLocal);
    }

    const createItem = (productList, quantity = 1) => {
        const hrefGetId = productList.find('.ps-product__title a').attr('href');
        const scrGetImage = productList.find('img').attr('src');
        const id = splitGetParam(hrefGetId, 1);
        const image = splitGetParam(scrGetImage, 2);
        const name = productList.find('.ps-product__title').text();
        const unitPrice = productList.find('.ps-product__price').data('unit');
        const promotePrice = productList.find('.ps-product__price').data('promote');
        let price;

        if (promotePrice > 0) {
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
    
    
    //Change quantiy of a product 
    const $groupNumber = $(".form-group--number");

    const getAllIdFromItems = (items) => {
        return items.map(item => item.id);
    }

    const totalQtyofItems = (currentInput, unit) => {
        const itemLocal = getItemFromLocal();
        const address = window.location.pathname;
        const idFromAddress = splitGetParam(address, 2);
        const idFromLocal = getAllIdFromItems(itemLocal);
        let totalQty;

        if (idFromLocal.indexOf(idFromAddress) === 0) {
            totalQty = currentInput + unit;
        } else {
            totalQty = currentInput;
        }
        return totalQty;
    }

    const inputVal = (input, val, unit = 0) => {
        return input.val(val - unit);
    }
    const errorOverQty = () => {
        return toast('error', 'You add over quantity available of the product');
    }
    const notBelowOne = () => {
        return toast('error', "The quantity of the product can't below 1");
    }
    const changeQty = (element) => {
        //Number will plus or minus when click button
        const unit = 1;
        //Click to increase or decrease 
        element.find('button').on('click', function() {
            const that = $(this);
            const symbol = that.find('span').text();
            const input = that.parent().find('input');
            const currentInput = parseInt(input.val());
            const quantityAvailable = input.data('quantity')

            const totalQty = totalQtyofItems(currentInput, unit);

            if (symbol === '+') {
                if (totalQty < quantityAvailable) {
                    inputVal(input, totalQty);
                } else {
                    errorOverQty();
                }
            }

            if (symbol === '-') {
                if (currentInput > 1) {
                    inputVal(input, currentInput, unit);
                } else {
                    notBelowOne();
                }
            } 
        });

        //Get init value of input when click into input
        let initInput;
        element.find('input').focus(function(){
            initInput = $(this).val();
        });
        
        //Change input value by enter into it
        element.find('input').on('change', function(event) {
            const that = $(this);
            const quantityAvailable = that.data('quantity')
            const currentInput = that.val();
            const totalQty = totalQtyofItems(parseInt(currentInput), unit);

            if (totalQty <= quantityAvailable) {
                inputVal(that, currentInput);
            } else {
                errorOverQty();
                inputVal(that, initInput);
            }

            if (currentInput < 1) {
                notBelowOne();
                inputVal(that, initInput);
            }
        });
    }

    //Initialization change quantiy
    changeQty($groupNumber);

    //Add to cart at product page
    const getIndexFromId = (items, id) => {
        let index;
        $.each(items, function(key, val) {
            if (val.id === id) {
                index = key;
            }
        })
        return index;
    }

    const increaseQtyIfExist = (itemFromLocal, item) => {
        const index = getIndexFromId(itemFromLocal, item.id);
        itemFromLocal[index].quantity += item.quantity;
        setItemToLocal(itemFromLocal);
        toast('success', 'Added ' + item.name + ' successfully!');
        renderCart(itemFromLocal);
    }
    const $addtoCartProductPage = $('.add-to-cart-product-page');
    $addtoCartProductPage.click(function() {
        const $productList = $(this).closest('.ps-product__content');
        const itemFromLocal = getItemFromLocal();
        
        //Create item to add to cart
        const address = window.location.pathname;
        const id = splitGetParam(address, 2);
        const image = $productList.find('.ps-product__thumbnail').data('image');
        const name = $productList.find('.ps-product__name').text();
        const input = $productList.find('.form-group--number input');
        const quantity = parseInt(input.val());
        const unitPrice = $productList.find('.ps-product__price').data('unit');
        const promotePrice = $productList.find('.ps-product__price').data('promote');
        let price;

        if (promotePrice > 0) {
            price = promotePrice;
        } else {
            price = unitPrice;
        }
        const item = { id, image, name, price, quantity };
        
        //Check quantity over quantity available of the product when click
        const quantityAvailable = input.data('quantity')
        const index = getIndexFromId(itemFromLocal, item.id);
        let qtyIndexInItems = 0;
        if (index !== undefined) {
            qtyIndexInItems = itemFromLocal[index].quantity;
        }

        if (qtyIndexInItems + quantity <= quantityAvailable) {
            if (itemFromLocal !== null) {
                const idOfItems = getIdFromObject(itemFromLocal);
                if (idOfItems.indexOf(item.id) === -1) {
                    addItemNotExistInItems(itemFromLocal, item);
                } else {
                    increaseQtyIfExist(itemFromLocal, item);
                }
            } else {
                createItemsIfNotExist(item);
            }
        } else {
            errorOverQty();
            input.prop('readOnly', true);
            $productList.find('.form-group--number button').off('click');
        }
    })

});

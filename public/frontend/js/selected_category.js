$(document).ready(function () {
    const currentAddress = window.location.pathname;
    const paramId = currentAddress.split("/")[2];
    const $listCircle = $('.ps-list--circle');
    const categoryId = $listCircle.find('li');

    $.each(categoryId, function (key, val) {
        if (val.id === paramId) {
            $(this).addClass('current')
        } 
    })
})
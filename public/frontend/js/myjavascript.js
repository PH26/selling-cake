$(document).ready(function(){
    $(".changeQty").change(function(){
        var rowid = $(this).attr('id');
        var qty = $(this).val();
        var token = $("input[name=_token]").val();
        $.ajax({
            url:'cart/changeQty/' +rowid+ '/' +qty,
            type:'POST',
            cache:true,
            data:{'_token': token, 'id': rowid, 'qty': qty},
            success: function(data){
                if (data == 'ok'){
                    window.location ='viewcart'
                }
            }
        });
    });
});
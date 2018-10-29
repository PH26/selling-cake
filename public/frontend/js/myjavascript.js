$(document).ready(function(){
    $(".changeQty").change(function(){
        var rowid = $(this).attr('id');
        var qty = $(this).val();
        var token = $("input[name=_token]").val();
        if ((qty <= 0) || (qty > 10)){
            alert('You can buy with quantity from 1 to 10 ');
            window.location ='viewcart';
        } else {
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
        }
    });
});
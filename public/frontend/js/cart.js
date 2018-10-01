$(document).ready(function(){
    $(".changeQty").change(function(){
        var id = $(this).attr('id');
        var qty = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url:'changeQty/' + id + '/' + qty,
            type:'POST',
            cache:false,
            data:{"_token":token, "id":id, "qty":qty},
            success: function(data){
                if(data == 'ok'){
                    window.location = 'viewcart'
                }
            }
        });
    });
});
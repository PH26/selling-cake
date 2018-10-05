$(document).ready(function(){
    $(".changeQty").change(function(){
        var id = $(this).attr('id');
        var qty = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url:'cart/changeQty?id='+id+'&qty='+qty,
            type:'GET',
            cache:true,
            dataType: 'json',
            success: function(data){
                if(data == 'ok'){
                    window.location = 'viewcart';
                }
            },
            error: function(err){
                alert('ddd');
            }
        });
    });
});
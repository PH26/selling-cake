
    <div class="header--sidebar"></div>
    <header class="header" data-responsive="1199">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
                        <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                          <!-- <form class="input-group" method="post" action="{{route('search')}}">
                              <input  id="product_name" type="text" class="form-control product_name" name="key" placeholder="Enter your keywords:">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>

                          </form> -->
                          <aside class="ps-widget ps-widget--sidebar ps-widget--search">
                                <form method="get" action="{{route('search')}}">
                                    <input name="key" autocomplete="off" id="product_name" class="form-control product_name" type="text" placeholder="Type here bakery name...">
                                    <button type="submit"><i class="ps-icon--search"></i></button>
                                  <div class="dropdown-menu" id="productList"></div>
                                </form>
                          </aside>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
        @include("frontend.layout.menu")
    </header>
    <div id="back2top"><i class="fa fa-angle-up"></i></div>
    <div class="loader"></div>
<script type="text/javascript">
$(document).ready(function(){

 $('#product_name').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('product.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#productList').fadeIn();
                    $('#productList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){
        $('#product_name').val($(this).text());
        $('#productList').fadeOut();
    });

});
</script>

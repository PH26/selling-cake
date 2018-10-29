<div class="header--sidebar"></div>
    <header class="header" data-responsive="1199">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
                        <br>
                        <p>75-77- 79 Phan Dang Luu, Hoa Cuong Nam Ward, Hai Chau District, Da Nang City - Hotline: 1800.5555.17</p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                        <br>
                        <aside class="ps-widget ps-widget--search">
                            <form method="get" action="{{route('search')}}" >
                            {{ csrf_field() }}
                                <input name="key" autocomplete="off" id="product_name" class="form-control product_name" type="text" placeholder="Type here cake name...">
                                <button type="submit"><i class="ps-icon--search"></i></button>
                                <div class="dropdown-menu" id="productList"></div>
                            </form>
                        </aside>
                        <br>
                    </div>
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
        if(query != ''){
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
        } else {
            $('#productList').fadeOut();
        }


    });
     $(document).on('click', 'li', function(){
        $('#product_name').val($(this).text());
        $('#productList').fadeOut();
    });
 });
</script>
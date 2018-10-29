@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">
<div class="ps-section pt-80 pb-80">
            <div class="container">
                <div class="ps-contact">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                            <div class="ps-contact__info">
                                <div class="mb-60" id="contact-map" data-address="Da Nang" data-title="VANILA BAKERY!" data-zoom="17"></div>

                                <div class="ps-contact__block">
                                    <h4>VANILA BAKERY</h4>
                                    <p><i class="fa fa-envelope-o"></i>dovietlam94@gmail.com</p>
                                    <p><i class="fa fa-phone"></i>1800.5555.17</p>
                                    <h4>Follow Us</h4>
                                    <ul class="ps-contact__social">
                                        <li><a ><i class="fa fa-facebook"></i></a></li>
                                        <li><a ><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                            <div class="ps-contact__form">
                            @if(session('notification'))
                                <div class="alert alert-success" style="position:relative; left:-16px; width: 585px">
                                <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                </button>
                                    {{session('notification')}}
                                </div>
                                @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input class="form-control" type="text" name='name' placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="E-mail" name='email'>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Text your message here..." name='content'></textarea>
                                </div>
                                <div class="form-group mt-30">
                                    <button type='submit' class="ps-btn ps-btn--sm ps-contact__submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
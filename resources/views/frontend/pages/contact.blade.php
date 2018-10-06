@extends('frontend.layout.index')
@section('content')

<div class="page-wrap">
<div class="ps-section pt-80 pb-80">
            <div class="container">
                <div class="ps-contact">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                            <div class="ps-contact__info">
                                <div class="mb-60" id="contact-map" data-address="New York, NY" data-title="BAKERY LOCATION!" data-zoom="17"></div>
                                <div class="ps-contact__block">
                                    <h4>BASEMENT COMPANY, NEW YORK</h4>
                                    <p><i class="fa fa-envelope-o"></i>enquiry@bakery.com</p>
                                    <p><i class="fa fa-phone"></i>+1 650-253-0000</p>
                                    <h4>Follow Us</h4>
                                    <ul class="ps-contact__social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                            <div class="ps-contact__form">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Phone">
                                </div>
                                <!-- <div class="form-group">
                                    <select class="ps-select" data-placeholder="Popupar product">
                                        <option value="01">Popular products</option>
                                        <option value="01">Item 01</option>
                                        <option value="02">Item 02</option>
                                        <option value="03">Item 03</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Text your message here..."></textarea>
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
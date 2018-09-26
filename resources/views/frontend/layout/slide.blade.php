<div class="ps-banner--home-1">
            <div class="rev_slider_wrapper fullscreen-container" id="revolution-slider-1" data-alias="concept121" data-source="gallery" style="background-color:#000000;padding:0px;">
                <div class="rev_slider fullscreenbanner" id="rev_slider_1059_1" style="display:none;" data-version="5.4.1">
                    <ul class="ps-banner">
                        @foreach($slides as $slide)
                        <li data-index="rs-2972" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="../../assets/frontend/images/concept4-100x100.jpg" data-rotate="0" data-saveperformance="off" data-title="Web Show" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description=""><img class="rev-slidebg" src="upload/slide/{{$slide->image}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
                        </li>
                         @endforeach
                    </ul>
                </div>
            </div>
        </div>
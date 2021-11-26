@extends('layouts.website')


@section('content')
    <div class="slide-show-ver2">
        <div class="container">
            <div class="tp-banner-container">
                <div class="tp-banner tp-banner-ver2" >
                    <ul>
                        <!-- SLIDE  -->
                        <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption large_bold_orange weight-800 color-white skewfromleft customout size-123 text-shadow"
                                 data-x="180"
                                 data-y="380"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1600"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9">Fast Shipping
                            </div>
                            <!-- LAYER NR. 4 -->

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption large_bold_orange size-20 center color-white skewfromright customout transform-none"
                                 data-x="400"
                                 data-y="560"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1800"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 7">Lorem Ipsum and typesetting industry.<br>189usd
                            </div>


                            <!-- LAYER NR. 8s -->
                            <div class="tp-caption skewfromright customout link-1 link-2 height-50"
                                 data-x="515"
                                 data-y="670"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                            </div>

                            <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                 data-x="620"
                                 data-y="673"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="link"></a>
                            </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption skewfromright customout"
                                 data-x="300"
                                 data-y="320"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 1"><img src="{{ asset('frontend/assets/images/home5-slideshow.png') }}" alt="headephone">
                            </div>
                        </li>
                        <!-- SLIDER -->
                        <!-- SLIDE  -->
                        <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption large_bold_orange weight-800 color-white skewfromleft customout size-123 text-shadow"
                                 data-x="180"
                                 data-y="380"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1600"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9">Fast Shipping
                            </div>
                            <!-- LAYER NR. 4 -->

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption large_bold_orange size-20 center color-white skewfromright customout transform-none"
                                 data-x="400"
                                 data-y="560"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1800"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 7">Lorem Ipsum and typesetting industry.<br>189usd
                            </div>


                            <!-- LAYER NR. 8s -->
                            <div class="tp-caption skewfromright customout link-1 link-2 height-50"
                                 data-x="515"
                                 data-y="670"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                            </div>

                            <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                 data-x="620"
                                 data-y="673"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="link"></a>
                            </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption skewfromright customout"
                                 data-x="300"
                                 data-y="320"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 1"><img src="{{ asset('frontend/assets/images/home4-slideshow.png') }}" alt="headephone">
                            </div>
                        </li>
                        <!-- SLIDER -->
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
                <!-- End container -->
            </div>
        </div>
    </div>
    <!-- <div class="slide-show-ver1">
            <div class="container">
                <div class="tp-banner-container">
                    <div class="tp-banner tp-banner-ver1" >
                        <ul>
                            &lt;!&ndash; SLIDE  &ndash;&gt;
                            <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                                &lt;!&ndash; MAIN IMAGE &ndash;&gt;
                                <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                &lt;!&ndash; LAYER NR. 3 &ndash;&gt;

                                <div class="tp-caption large_bold_orange weight-600 capitalize color-white skewfromleft customout size-60 weight-800 uppercase"
                                    data-x="155"
                                    data-y="260"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1600"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 9">Fast Shipping
                                </div>
                                &lt;!&ndash; LAYER NR. 4 &ndash;&gt;

                                &lt;!&ndash; LAYER NR. 5 &ndash;&gt;
                                <div class="tp-caption large_bold_orange size-18 color-white skewfromright customout transform-none"
                                    data-x="155"
                                    data-y="370"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1800"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 7">Lorem Ipsum and typesetting industry. Lorem Ipsum<br> the industry's <span class="text-span">Sale up to 40%</span> text ever<br> since the 1500s
                                </div>


                                &lt;!&ndash; LAYER NR. 8s &ndash;&gt;
                                <div class="tp-caption skewfromleft customout link-1 link-2 height-50"
                                    data-x="155"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>
                                 &lt;!&ndash; LAYER NR. 8s &ndash;&gt;
                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                    data-x="270"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="link"></a>
                                </div>

                                &lt;!&ndash; LAYER NR. 9 &ndash;&gt;
                                <div class="tp-caption skewfromright customout"
                                    data-x="590"
                                    data-y="130"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 1"><img src="{{ asset('frontend/assets/images/Dana-home10.bg-feagtured.png') }}" alt="galaxy s7">
                                </div>
                            </li>
                            &lt;!&ndash; SLIDER &ndash;&gt;
                            &lt;!&ndash; SLIDE  &ndash;&gt;
                            <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                                <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                                <div class="tp-caption large_bold_orange weight-600 capitalize color-white skewfromleft customout size-60 weight-800 uppercase"
                                    data-x="155"
                                    data-y="260"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1600"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 9">Fast Shipping
                                </div>

                                <div class="tp-caption large_bold_orange size-18 color-white skewfromright customout transform-none"
                                    data-x="155"
                                    data-y="370"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1800"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 7">Lorem Ipsum and typesetting industry. Lorem Ipsum<br> the industry's <span class="text-span">Sale up to 40%</span> text ever<br> since the 1500s
                                </div>


                                <div class="tp-caption skewfromleft customout link-1 link-2 height-50"
                                    data-x="155"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>

                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                    data-x="270"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="link"></a>
                                </div>

                                <div class="tp-caption skewfromright customout"
                                    data-x="590"
                                    data-y="130"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 1"><img src="{{ asset('frontend/assets/images/Dana-home1.bg-feagtured.png') }}" alt="galaxy s7">
                                </div>
                            </li>
                            &lt;!&ndash; SLIDER &ndash;&gt;
                        </ul>
                        <div class="tp-bannertimer"></div>
                </div>
                &lt;!&ndash; End container &ndash;&gt;
                </div>

            </div>
        </div>-->
    <!-- End Slide-Show -->
    <div class="banner-home3">
        <div class="container">
            <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="200ms">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/assets/images/banner-home3-4.png') }}" alt="Banner">
                    </div>
                    <div class="text">
                        <h4>Number one</h4>
                        <h3>Shipping Co. </h3>
                        <p>Lorem Ipsum is here asdsad</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="300ms">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/assets/images/banner-home3-5.png') }}" alt="Banner">
                    </div>
                    <div class="text">
                        <h3>consectetur adipiscing </h3>
                        <h3>Lorem </h3>
                        <p>seut <span>perspiis</span> </p>
                        <a class="link-v1" href="#" title="link"><span>Start now</span><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="400ms">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/assets/images/banner-home3-6.png') }}" alt="Banner">
                    </div>
                    <div class="text">
                        <h3>24 Hours</h3>
                        <p>Lorem Ipsum consect adipiscing elit.</p>
                        <h4>Lorem <span>24</span></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container -->
    </div>

    <div class="shipping-total">
        <div class="container">
            <div class="col-md-6 coupon">
                <div class="title-ver2">
                    <h3>Calculate Shipment</h3>
                </div>
                <div class="contact-form">
                    <form class="form-horizontal">
                        <div class="form-group col-md-6">
                            <select name="" class="form-control" id="" >
                                <option >From</option>
                                <option value="">Cairo</option>
                                <option value="">Giza</option>
                                <option value="">Alexandria</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <select name="" class="form-control" id="">
                                <option >To</option>
                                <option value="">Cairo</option>
                                <option value="">Giza</option>
                                <option value="">Alexandria</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <select name="" class="form-control" id="">
                                <option >Unit</option>
                                <option value="">Kg</option>
                                <option value="">gm</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" step="0.01" class="form-control" id="inputfname" placeholder="Value...">
                        </div>
                        <div class="form-group col-md-12">
                            <button value="Submit" class="btn link-button link-border-raidus" type="submit">Calculate</button>
                        </div>
                    </form>
                </div>
                <!-- <a class="btn link-button link-border-raidus bg-gray" href="#" title="Continue shopping">Continue shopping</a>
                 <a class="btn link-button link-border-raidus bg-gray" href="#" title="Update cart">Update cart</a>-->
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6 cart-totals text-price">
                <div class="title-ver2">
                    <h3>Shipment Total</h3>
                </div>
                <ul>
                    <li><span class="text">Subtotal</span><span class="number"> 1990 EGP</span></li>
                    <li><span class="text">Tax</span><span class="number"> 50 EGP</span></li>
                    <li><span class="text totals">Total</span><span class="number totals"> 2040 EGP</span></li>
                </ul>
                <!--
                                    <a class="btn link-button link-border-raidus" href="#" title="Proceed to checkout">Proceed to checkout</a>
                -->
            </div>
            <!-- End col-md-6 -->
        </div>
        <!-- End shipping-total -->
    </div>
    <!-- End conainer -->

    <div class="main-content">
        <div class="featured-product slider-product space-padding-tb-80" data-wow-delay="0.1s">
            <div class="container">
                <div class="title-text size-64">
                    <h3><span>D</span>roplin services</h3>
                </div>
                <div class="images">
                    <img src="{{ asset('frontend/assets/images/Dana-home2.bg-featured.png') }}" alt="Product-Featured">
                </div>
                <!-- end images -->

                <div class="products">
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured1.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>voluptatem </p>
                            <p class="title"> Lorem Ipsum</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>incididunt ut labore, consectetur adipiscing elit</li>
                                <li>Excepteur sint occaecat cupidatat.</li>
                                <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                <li>non proident, sunt </li>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>accusantium </p>
                            <p class="title"> Lorem Ipsum</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>incididunt ut labore, consectetur adipiscing elit</li>
                                <li>Excepteur sint occaecat cupidatat.</li>
                                <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                <li>non proident, sunt </li>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>doloremque </p>
                            <p class="title"> Lorem Ipsum</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>incididunt ut labore, consectetur adipiscing elit</li>
                                <li>Excepteur sint occaecat cupidatat.</li>
                                <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                <li>non proident, sunt </li>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>laudantium</p>
                            <p class="title"> Lorem Ipsum</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>incididunt ut labore, consectetur adipiscing elit</li>
                                <li>Excepteur sint occaecat cupidatat.</li>
                                <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                <li>non proident, sunt </li>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                </div>
                <!-- End product -->

                <div class="wrap-time">
                    <h3>quae ab illo inventore veritatis</h3>
                    <p>Lorem Ipsum is simply dummy text of the</p>
                    <div class="time" data-countdown="countdown" data-date="12-20-2016-10-20-30"></div>
                    <p class="best-price"><span>Start now:</span>100.00 EGP- <span class="price-old">240.00 EGP</span></p>
                </div>
                <!-- End wrap-time -->
            </div>
            <!-- End container -->
        </div>
        <!-- End popular-product -->
        <div class="hot-deals">
            <div class="container">
                <div data-ride="carousel" class="vertical-slider carousel vertical slide" id="myCarousel">
                    <span class="btn-vertical-slider zmdi zmdi-favorite-outline next" data-slide="next"></span>
                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="product-images">
                                        <div class="slide-product-images">
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="title-text color-white">
                                        <h3><span>T</span>his week's hot deals</h3>
                                    </div>
                                    <p>Duis aute irure</p>
                                    <p><b>Sed ut perspiciatis unde omnis iste omnis iste</b></p>
                                    <ul>
                                        <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                                        <li>Duis aute irure dolor in reprehenderit  </li>
                                        <li>Sed ut perspiciatis unde omnis iste </li>
                                    </ul>
                                    <p class="wrap-price">Start <span class="price">Now </span></p>
                                </div>
                            </div>
                            <!--/row-fluid-->
                        </div>
                        <!--/item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="product-images">
                                        <div class="slide-product-images">
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>'>
                                                <a href="#" title="products">
                                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="title-text color-white">
                                        <h3><span>T</span>his week's hot deals</h3>
                                    </div>
                                    <p>Duis aute irure</p>
                                    <p><b>Sed ut perspiciatis unde omnis iste omnis iste</b></p>
                                    <ul>
                                        <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                                        <li>Duis aute irure dolor in reprehenderit  </li>
                                        <li>Sed ut perspiciatis unde omnis iste </li>
                                    </ul>
                                    <p class="wrap-price">Start <span class="price">Now </span></p>
                                </div>
                            </div>
                            <!--/row-fluid-->
                        </div>
                        <!--/item-->
                    </div>
                    <span class="btn-vertical-slider zmdi zmdi-favorite-outline prev" data-slide="prev"></span>
                </div>
            </div>
            <!-- End container -->
        </div>
        <!-- End hot deals -->
        <!-- End OurNewProduct -->
    <!-- <div class="banner-home1-bottom">
                        <div class="container">
                            <div class="images" data-wow-duration="0.5s" data-wow-delay="400ms">
                                <img src="{{ asset('frontend/assets/images/Dana-home2-banner-bottom.png') }}" alt="Banner">
                            </div> -->
        <!-- End image -->
        <!-- <div class="text" data-wow-duration="0.5s" data-wow-delay="400ms">
            <p>Shipping overview</p>
            <p class="product-title">Why you should use our shipping ?</p>
            <div class="description">
                <ul>
                    <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                    <li>Duis aute irure dolor in reprehenderit  </li>
                    <li>Sed ut perspiciatis unde omnis iste </li>
                    <li>SUPC: 1517704</li>
                </ul>
            </div>
            <div class="product-price">
                <span class="price">Start</span>
                <span class="title"> Now</span>
                <span class="price-old">$250.00</span>-->
        <!-- </div>
        <div class="product"> -->
        <!-- <div class="action">
            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div> -->
        <!--  </div>
     </div> -->
        <!-- End text -->
        <!--  </div> -->
        <!-- End container -->
        <!--  </div> -->
        <!-- End Banner Home1 Bottom -->

    </div>

    <!-- End product-footer -->
    <div class="brand-container space-50">
        <div class="container">
            <div class="slider-brand">
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand1.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand2.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand3.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand4.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand5.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand6.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
            </div>
            <!-- End brand slider -->
        </div>
        <!-- End Container -->
    </div>
    <!-- End Brand Container -->
    <div class="newsletter">
        <div class="container">
            <h3><a href="#" title="sign up">sign up</a> to newsletter</h3>
            <p>and receive a coupon for first shipping</p>
            <form action="#" method="get" accept-charset="utf-8">
                <input type="text" onblur="if (this.value == '') {this.value = 'Enter your email';}" onfocus="if(this.value != '') {this.value = '';}" value="Enter your emaill" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter" name="email">
                <button class="button button1" title="Subscribe" type="submit"></button>
            </form>
        </div>
        <!-- End container -->
    </div>
    <!-- End newsletter -->
@endsection

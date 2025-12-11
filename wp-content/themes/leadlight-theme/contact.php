<?php

/**
 * Template Name: Contact Page
 */
get_header();
?>




<div class="page-layout">
    <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
        <div class="container">
            <div class="row align-items-center justify-content-center extra-very-small-screen">
                <div class="col-md-8 position-relative text-center page-title-extra-small">
                    <h1 class="alt-fon text-white mb-0">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="position-relative z-index-1 pb-0">
        <div class="d-none d-md-flex mb-1">
            <a href="#down-section" class="section-link absolute-middle-center top-0">
                <div
                    class="d-flex justify-content-center align-items-center mx-auto rounded-circle h-70px w-70px fs-22 text-dark-gray bg-white box-shadow-bottom">
                    <i class="ti-mouse"></i>
                </div>
            </a>
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 pb-7 sm-pb-40px">
                    <span
                        class="fs-16 text-uppercase text-gradient-san-blue-new-york-red fw-700 mb-10px ls-1px d-inline-block">
                        Book your appointment
                    </span>
                    <h2 class="alt-fon fw-400 text-dark-gray ls-minus-1px w-80 lg-w-100 mb-40px sm-mb-30px">
                        We would love to hear from you.
                    </h2>
                    <div class="row row-cols-1 row-cols-sm-2 mb-30px xs-mb-25px">
                        <div class="col last-paragraph-no-margin xs-mb-25px">
                            <span class="fs-18 fw-600 text-dark-gray">Visit us</span>
                            <div class="h-1px w-80 sm-w-100 bg-dark-gray mt-10px mb-10px"></div>
                            <p class="w-75 lg-w-90"><?php echo get_option('leadlight_address'); ?></p>
                        </div>
                        <div class="col">
                            <span class="fs-18 fw-600 text-dark-gray">Opening hours</span>
                            <div class="h-1px w-80 sm-w-100 bg-dark-gray mt-10px mb-10px"></div>
                            <div class="w-100 d-block">
                                <span class="d-block">
                                    <span class="fw-600 text-dark-gray">Mon - Fri:</span>
                                    <?php echo get_option('leadlight_mon_fri'); ?>
                                </span>
                                <span class="d-block">
                                    <span class="fw-600 text-dark-gray">Sat - Sun:</span>
                                    <?php echo get_option('leadlight_sat_sun'); ?>
                                </span>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="col last-paragraph-no-margin xs-mb-25px">
                            <span class="fs-18 fw-600 text-dark-gray">Let's talk with us</span>
                            <div class="h-1px w-80 sm-w-100 bg-dark-gray mt-10px mb-10px"></div>
                            <div class="w-100 d-block">
                                <span class="d-block"><span class="fw-600 text-dark-gray">Phone:</span> <a
                                        href="tel:<?php echo get_option('leadlight_phone'); ?>" class="text-medium-gray"><?php echo get_option('leadlight_phone'); ?></a></span>
                            </div>
                        </div>
                          <div class="col">
                            <span class="fs-18 fw-600 text-dark-gray">Book appointment</span>
                            <div class="h-1px w-80 sm-w-100 bg-dark-gray mt-10px mb-10px"></div>
                            <div class="w-100 d-block">
                                <a href="mailto:<?php echo get_option('leadlight_email'); ?>"><?php echo get_option('leadlight_email'); ?></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-5 offset-lg- align-self-end contact-form-style-03 sm-mb-50px">
                    <div
                        class="bg-dark-gray box-shadow-double-large p-13 lg-p-10 border-radius-10px position-relative overflow-hidden">
                        <h2 class="alt-fon text-white xs-mb-15px fancy-text-style-4 ls-minus-1px">Say
                            <span data-fancy-text="{'effect': 'rotate', 'string': ['hello!', 'hallå!', 'salve!'] }" class="appear">
                                <span class="anime-text words chars splitting" data-splitting="true" style="--word-total: 1; --char-total: 6;">
                                    <span class="word" data-word="hallå!" style="--word-index: 0;">
                                        <span class="char" data-char="h" style="--char-index: 0; opacity: 1; transform: rotateX(0deg); will-change: transform;">h</span>
                                        <span class="char" data-char="a" style="--char-index: 1; opacity: 1; transform: rotateX(0deg); will-change: transform;">a</span>
                                        <span class="char" data-char="l" style="--char-index: 2; opacity: 1; transform: rotateX(0deg); will-change: transform;">l</span>
                                        <span class="char" data-char="l" style="--char-index: 3; opacity: 1; transform: rotateX(0deg); will-change: transform;">l</span>
                                        <span class="char" data-char="å" style="--char-index: 4; opacity: 0.94; transform: rotateX(-4.2deg); will-change: transform;">å</span>
                                        <span class="char" data-char="!" style="--char-index: 5; opacity: 0.6067; transform: rotateX(-27.5333deg); will-change: transform;">!</span>
                                    </span>
                                </span>
                            </span>
                        </h2>
                        <!-- <form id="contact-form" method="post">
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-person icon-extra-medium"></i></span>
                                <input type="text" name="name" placeholder="Enter your name*" class="form-control required">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-envelope icon-extra-medium"></i></span>
                                <input type="email" name="email" placeholder="Enter your email*" class="form-control required">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <textarea name="comment" placeholder="What do you need help with?" class="form-control"></textarea>
                                <span class="form-icon">
                                    <i class="bi bi-chat-square-dots icon-extra-medium"></i>
                                </span>
                            </div>

                             <button class="btn btn-medium btn-white btn-box-shadow mt-30px fw-700 submt btn-round-edge" type="submit">Send message</button>
                        </form> -->

                        <!-- <form action="" method="post"> -->
                        <form id="contact-form" method="post">
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-person icon-extra-medium"></i></span>
                                <input class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control required" type="text" name="name" placeholder="Enter your name*">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-envelope icon-extra-medium"></i></span>
                                <input class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control required" type="email" name="email" placeholder="Enter your email address*">
                            </div>
                            <div class="position-relative form-group form-textarea mt-15px mb-12">
                                <textarea class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control" name="comment" placeholder="What do you need help with?" rows="4"></textarea>
                                <span class="form-icon">
                                    <i class="bi bi-chat-square-dots icon-extra-medium"></i>
                                </span>
                                <!-- <input type="hidden" name="redirect" value=""> -->
                                <button class="btn btn-medium btn-white btn-box-shadow mt-30px fw-700 submi btn-round-edge" type="submit">Send message</button>
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </form>
                        <div class="w-200px h-200px xs-w-150px xs-h-150px border-radius-100 bg-light-blue d-flex align-items-center justify-content-center position-absolute right-minus-30px xs-right-minus-20px bottom-minus-60px xs-bottom-minus-40px">
                            <!-- <img src="images/demo-beauty-salon-contact-01.png" class="h-85px" alt="" data-no-retina=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="position-relative mt-30px bg-light-blue mb-0 d-non">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9 last-paragraph-no-margin">
                    <h3 class="alt-font text-dark-gray ls-minus-1px">
                        Feel confident on your wedding day that you're in safe hands. See makeup gallery.
                    </h3>
                    <p class="w-95 sm-w-100">
                        With over 35 years of experience and a footprint of over 400+ salons in
                        125 cities across the length and breadth of the country. We have developed a deep
                        understanding of the beauty industry.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <section class="overflow-hidden position-relative pb-0 pt-0 mt-0  pb-50px bg-light-blue ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <div class="outside-box-right-30">
                        <!-- <div class="swiper image-gallery-style-05 swiper-initialized swiper-horizontal swiper-android swiper-backface-hidden"
                            data-slider-options="{ 'slidesPerView': 1, 'spaceBetween': 25, 'loop': true, 'pagination': { 'el': '.slider-three-slide-pagination', 'clickable': true, 'dynamicBullets': false }, 'keyboard': { 'enabled': true, 'onlyInViewport': true }, 'breakpoints': { '992': { 'slidesPerView': 4 }, '768': { 'slidesPerView': 3 }, '320': { 'slidesPerView': 2 } }, 'effect': 'slide' }"
                            data-gallery-box="true"> -->
                        <div class="swiper image-gallery-style-05"
                            data-slider-options='{ "slidesPerView": 1, "spaceBetween": 25, "loop": true, "pagination": { "el": ".slider-three-slide-pagination", "clickable": true, "dynamicBullets": false },
                                    "keyboard": { "enabled": true, "onlyInViewport": true },
                                    "breakpoints": { "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 }, "320": { "slidesPerView": 2 } }, "effect": "slide"}'>
                            <div class="swiper-wrapper" id="swiper-wrapper-155e126f6cc13991" aria-live="polite">
                                <!-- start gallery item -->
                                <div class="swiper-slide transition-inner-all swiper-slide-active" role="group"
                                    aria-label="1 / 8" data-swiper-slide-index="0"
                                    style="width: 298.25px; margin-right: 25px;">
                                    <div class="gallery-box">
                                        <a href="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" data-group="lightbox-group-gallery-item-5" title="Lightbox gallery image title">
                                            <div class="position-relative bg-dark-gray border-radius-6px overflow-hidden">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" alt="" data-no-retina="">
                                                <div class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                    <i class="bi bi-camera icon-medium text-white"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- end gallery item -->


                                <!-- start gallery item -->
                                <div class="swiper-slide transition-inner-all swiper-slide-active" role="group"
                                    aria-label="1 / 8" data-swiper-slide-index="0"
                                    style="width: 298.25px; margin-right: 25px;">
                                    <div class="gallery-box">
                                        <a href="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" data-group="lightbox-group-gallery-item-5" title="Lightbox gallery image title">
                                            <div class="position-relative bg-dark-gray border-radius-6px overflow-hidden">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" alt="" data-no-retina="">
                                                <div class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                    <i class="bi bi-camera icon-medium text-white"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- end gallery item -->


                                <!-- start gallery item -->
                                <div class="swiper-slide transition-inner-all swiper-slide-active" role="group"
                                    aria-label="1 / 8" data-swiper-slide-index="0"
                                    style="width: 298.25px; margin-right: 25px;">
                                    <div class="gallery-box">
                                        <a href="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" data-group="lightbox-group-gallery-item-5" title="Lightbox gallery image title">
                                            <div class="position-relative bg-dark-gray border-radius-6px overflow-hidden">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" alt="" data-no-retina="">
                                                <div class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                    <i class="bi bi-camera icon-medium text-white"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- end gallery item -->


                                <!-- start gallery item -->
                                <div class="swiper-slide transition-inner-all swiper-slide-active" role="group"
                                    aria-label="1 / 8" data-swiper-slide-index="0"
                                    style="width: 298.25px; margin-right: 25px;">
                                    <div class="gallery-box">
                                        <a href="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" data-group="lightbox-group-gallery-item-5" title="Lightbox gallery image title">
                                            <div class="position-relative bg-dark-gray border-radius-6px overflow-hidden">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" alt="" data-no-retina="">
                                                <div class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                    <i class="bi bi-camera icon-medium text-white"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- end gallery item -->

                                <!-- start gallery item -->
                                <div class="swiper-slide transition-inner-all swiper-slide-active" role="group"
                                    aria-label="1 / 8" data-swiper-slide-index="0"
                                    style="width: 298.25px; margin-right: 25px;">
                                    <div class="gallery-box">
                                        <a href="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" data-group="lightbox-group-gallery-item-5" title="Lightbox gallery image title">
                                            <div class="position-relative bg-dark-gray border-radius-6px overflow-hidden">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-01.jpg" alt="" data-no-retina="">
                                                <div class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                    <i class="bi bi-camera icon-medium text-white"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- end gallery item -->





                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                    <!-- start slider pagination -->
                    <!--<div class="swiper-pagination slider-three-slide-pagination swiper-pagination-style-2 swiper-pagination-clickable swiper-pagination-bullets"></div>-->
                    <!-- end slider pagination -->
                </div>
            </div>
        </div>
        <!-- <div class="position-absolute left-0px bottom-0px" data-bottom-top="transform: translateY(-150px)" data-top-bottom="transform: translateY(150px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo-beauty-salon-wedding-08.jpg" alt="" data-no-retina="">
        </div> -->
    </section>


</div>


<?php
get_footer();
?>
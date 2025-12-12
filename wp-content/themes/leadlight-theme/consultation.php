<?php

/**
 * Template Name: Consultation Page
 */
get_header();
?>




<div class="page-layout">
    <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding "
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
        <div class="container">
            <div class="row align-items-center justify-content-center extra-very-small-screen">
                <div class="col-md-8 position-relative text-center page-title-extra-small">
                    <h1 class="alt-fon text-white mb-0">Consultation</h1>
                </div>
            </div>
        </div>
    </section>


    <!-- start section -->
    <section class="bg-very-light-gra pt- background-no-repeat background-position-left-top position-relativ">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-7">
                <div class="col-xl-5 col-lg-6 mb-" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>

                    <div class="calendly-inline-widget" data-url="<?php echo get_option('leadlight_calendly_link'); ?>" style="min-width:300px;height:900px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

                   
                </div>
                <div class="col-lg-6 text-center md-mb-20px offset-xl-1 bg-transparent">
                    <!-- Calendly inline widget begin -->

                    <!-- Calendly inline widget end -->
                    <figure class="position-relative mb-0 overflow-hidden  d-non" style="box-shadow: none;" data-shadow-animation="true" data-bottom-top="transform: translateY(70px)" data-top-bottom="transform: translateY(-70px)">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story-01.png'" class="w-100 border-radius-6px" alt="">
                        <figcaption class="position-absolute border-radius-4px text-center right-30px bottom-30px pt-35px pb-35px ps-5px pe-5px bg-white-transparent glass-effect">
                            <span class="fs-80 lh-75 text-dark-gray ls-minus-4px position-relative fw-800 mb-5px d-block alt-font">28<sub class="fs-40 lh-40 text-dark-gray position-relative top-minus-40px">+</sub></span>
                            <span class="d-block mx-auto fs-14 fw-700 lh-20 w-200px text-center text-dark-gray text-uppercase">Years working experience</span>
                        </figcaption>
                    </figure>
                </div>
            </div>

        </div>

    </section>
    <!-- end section -->





</div>


<?php
get_footer();
?>
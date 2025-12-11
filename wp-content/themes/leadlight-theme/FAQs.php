<?php

/**
 * Template Name: FAQs Page
 */
get_header();
?>

<div class="page-layout">
    <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
        <div class="container">
            <div class="row align-items-center justify-content-center extra-very-small-screen">
                <div class="col-md-8 position-relative text-center page-title-extra-small">
                    <h1 class="alt-fon text-white mb-0"> FAQs</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="position-relative p-0">
        <div class="position-absolute bottom-0px right-0px d-none d-md-inline-block lg-w-180px">
            <img src="images/demo-beauty-salon-services-01.jpg" alt="" data-no-retina="">
        </div>
        <div class="d-none d-md-flex mb-2">
            <a href="#down-section" class="section-link absolute-middle-center top-0">
                <div
                    class="d-flex justify-content-center align-items-center mx-auto rounded-circle h-70px w-70px fs-22 text-dark-gray bg-white box-shadow-bottom">
                    <i class="ti-mouse"></i>
                </div>
            </a>
        </div>



        <!-- start section -->
        <!-- <section class="p-0 bg-dark-gray position-relative"> -->
            <div class="container-fluid p-0">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-10 col-md-10 ps-10 pe-10 pt-7 pb-7 xxl-p-6" data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <h3 class="alt-fon fw-500 text-whit text-gradient-san-blue-new-york-red ls-minus-2px">
                            Some frequently asked questions
                        </h3>
                        <div class="accordion accordion-style-02" id="accordion-style-02" data-active-icon="fa-angle-down" data-inactive-icon="fa-angle-right">




                            <?php


                            // $args = [
                            //     'post_type'      => 'leadlight_faq',
                            //     'posts_per_page' => -1,       // number of FAQs to show
                            //     'orderby'        => 'rand',  // show randomly
                            // ];
                            $args = [
                                'post_type' => 'leadlight_faq',
                                'posts_per_page' => -1, // all FAQs
                                'orderby' => 'meta_value_num', // if using order meta
                                'meta_key' => '_faq_order',
                                'order' => 'ASC'
                            ];

                            $faqs = new WP_Query($args);

                            if ($faqs->have_posts()) {
                                echo '<div class="accordion accordion-style-02 text-dark" id="accordion-style-02" data-active-icon="fa-angle-down" data-inactive-icon="fa-angle-right">';
                                while ($faqs->have_posts()) {
                                    $faqs->the_post();
                                    $faq_id = get_the_ID(); // unique ID per FAQ

                            ?>






                                    <!-- start accordion item -->
                                    <div class="accordion-item">
                                        <div class="accordion-header border-bottom border-color-transparent-dark-light">
                                            <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-<?php echo $faq_id; ?>" aria-expanded="false" data-bs-parent="#accordion-style-02">
                                                <div class="accordion-title mb-0 position-relative text-dark">
                                                    <i class="feather icon-feather-plus"></i>
                                                    <span class="fw-500 fs-22">
                                                        <?php echo get_the_title(); ?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="accordion-<?php echo $faq_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-style-02">
                                            <div class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-white-light">
                                                <p class="text-whit opacity- fs-20">
                                                    <?php echo get_the_content(); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end accordion item -->

                            <?php
                                    // echo '<h4>' . get_the_title() . '</h4>';
                                    // echo '<p>' . get_the_content() . '</p>';
                                }
                                echo '</div>';
                            }
                            wp_reset_postdata();

                            ?>

                            <!-- end accordion item -->
                        </div>
                    </div>

                </div>
            </div>

        <!-- end section -->


    </section>




    <?php
    get_footer();



<div class="col-lg-4 pe-5 order-2 order-lg-1 lg-pe-3 md-pe-15px" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>

    <!-- Service Links -->
    <div class="bg-very-light-gray border-radius-6px p-45px lg-p-25px mb-25px">
        <span class="fs-20 ls-minus-05px alt-fon text-dark-gray fw-600 mb-20px d-inline-block">
            Our Core Services
        </span>
        <ul class="p-0 m-0 list-style-02">
            <?php
            $services = new WP_Query([
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC'
            ]);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();

                    // $image_id  = get_post_meta(get_the_ID(), '_service_hero_bg_id', true);
                    // $hero_bg   = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                    $hero_title = get_post_meta(get_the_ID(), '_service_hero_title', true);
                    $hero_desc  = get_post_meta(get_the_ID(), '_service_hero_desc', true);

                    // $thumb = $hero_bg ?: get_template_directory_uri() . '/assets/images/default.jpg';
                    $title = $hero_title ?: get_the_title();
                    $desc  = $hero_desc ?: 'Learn more about this service.';

            ?>
                    <li class="pb-10px mb-10px border-bottom border-color-transparent-dark">
                        <a href="<?php the_permalink(); ?>" class="text-dark-gray text-dark-gray-hover"><?php echo $title; ?></a>
                        <i class="feather icon-feather-arrow-right ms-auto"></i>
                    </li>

            <?php

                // Include template part
                // set_query_var('service_thumb', $hero_bg);
                // set_query_var('service_title', $title);
                // set_query_var('service_desc', $desc);
                // get_template_part('template-parts/service', 'card');


                endwhile;
            endif;

            wp_reset_postdata();
            ?>


           
        </ul>
    </div>


    <!-- Consultation Form -->
    <div class="bg-very-light-gray border-radius-6px p-40px lg-p-25px md-p-35px">
        <span class="fs-20 ls-minus-05px alt-fon text-dark-gray fw-600 mb-25px d-inline-block">Get a free consultation?</span>
        <div class="contact-form-style-01 mt-0">
            <form id="contact-form" method="post">
                <div class="position-relative form-group mb-20px">
                    <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                    <input type="text" name="name" class="form-control border-white box-shadow-large required" placeholder="Your name*" />
                </div>
                <div class="position-relative form-group mb-20px">
                    <span class="form-icon"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control border-white box-shadow-large required" placeholder="Your email address*" />
                </div>
                <div class="position-relative form-group form-textarea">
                    <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                    <textarea placeholder="Your message" name="comment" class="form-control border-white box-shadow-large" rows="3"></textarea>

                    <button class="btn btn-medium btn-round-edge btn-base-color btn-box-shadow mt-20px submi w-100" type="submit">Send message</button>

                </div>
            </form>
        </div>
    </div>

</div>
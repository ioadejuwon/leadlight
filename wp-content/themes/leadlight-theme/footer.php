<!-- start footer -->
<footer class="p-0 bg-gradient-blue-ironstone-brown">
    <div class="pt-40px pb-40px border-bottom border-color-transparent-white-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="text-white mb-0 alt-fon">
                        Leadership that produces transformation.
                        <a href="<?php echo esc_url(home_url('/consultation')); ?>" class="text-white text-decoration-line-bottom-medium d-inline-block">
                            Book Free Discovery Call
                        </a>
                        <i class="bi bi-arrow-right align-middle icon-extra-medium ms-10px"></i>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center pt-55px pb-55px sm-pt-40px sm-pb-40px">
            <!-- start footer column -->
            <div class="col-lg-3 col-md-12 col-sm-6 last-paragraph-no-margin text-center text-sm-start text-md-center text-lg-start md-mb-30px">
                <a href="demo-beauty-salon.html" class="footer-logo d-inline-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white2.png" alt="">
                </a>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-lg-3 col-md-4 col-sm-6 sm-mb-30px last-paragraph-no-margin text-center text-sm-start">
                <span class="d-block text-base-color fs-15 ls-1px mb-5px text-uppercase fw-600">Get in touch</span>
                <p class="lh-30 w-80 text-white lg-w-100"><?php echo get_option('leadlight_address'); ?></p>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-lg-3 col-md-4 col-sm-6 xs-mb-30px last-paragraph-no-margin text-center text-sm-start">
                <span class="d-block text-base-color fs-15 ls-1px mb-5px text-uppercase fw-600">Need support?</span>
                <!-- <a href="tel:1800222000" class="text-white lh-30">1-800-222-000</a><br> -->
                <a href="mailto:hello@leadlightleaders.com" class="text-white"> hello@leadlightleaders.com</a>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-lg-3 col-md-4 col-sm-6 last-paragraph-no-margin text-center text-sm-start">
                <span class="d-block text-base-color fs-15 ls-1px mb-10px text-uppercase fw-600">Connect with us</span>
                <div class="elements-social social-icon-style-09">
                    <ul class="medium-icon light">
                        <li><a class="facebook" href="https://www.facebook.com/<?php echo get_option('leadlight_facebook'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                        <li><a class="instagram" href="https://www.instagram.com/<?php echo get_option('leadlight_instagram'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i><span></span></a></li>
                        <li><a class="twitter" href="https://www.twitter.com/<?php echo get_option('leadlight_twitter'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li>
                        <li><a class="Whatsapp" href="https://www.wa.me/<?php echo get_option('leadlight_whatsapp'); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i><span></span></a></li>
                    </ul>
                </div>
            </div>
            <!-- end footer column -->
        </div>
    </div>
    <div class="pt-20px pb-20px border-top border-color-transparent-white-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-8 col-lg-7 text-center text-lg-start md-mb-10px">
                    <ul class="footer-navbar fs-16">
                        <li class="nav-item"><a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="<?php echo esc_url(home_url('/services')); ?>" class="nav-link">Services</a></li>
                        <!-- <li class="nav-item"><a href="#" class="nav-link">Blog</a></li> -->
                        <li class="nav-item"><a href="<?php echo esc_url(home_url('/consultation')); ?>" class="nav-link">Consultation</a></li>
                        <li class="nav-item"><a href="<?php echo esc_url(home_url('/faqs')); ?>" class="nav-link">FAQs</a></li>
                        <li class="nav-item"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-lg-5 fs-16 last-paragraph-no-margin text-white text-center text-lg-start">
                    <p>&copy; <?php echo FOOTERYEAR ?> <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="text-decoration-line-bottom text-white">LeadLight Leaders</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start scroll progress -->
<div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
        <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
</div>



<?php wp_footer(); ?>
</body>

</html>
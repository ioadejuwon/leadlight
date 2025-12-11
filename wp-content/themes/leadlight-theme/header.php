<!doctype html>
<html class="no-js" lang="en">
    <head>
         <title><?php echo wp_get_document_title(); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 56+ ready demos.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-114x114.png">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <?php wp_head(); ?>
    </head>
    <body data-mobile-nav-style="classic" class="custom-cursor">
        <div class="progress-container js-preloader">
        <div class="progress-bar"></div>
    </div>
    <div id="notification-container"></div>
        <!-- start cursor -->
        <div class="cursor-page-inner">
            <div class="circle-cursor circle-cursor-inner"></div>
            <div class="circle-cursor circle-cursor-outer"></div>
        </div>
        <!-- end cursor -->




           <!-- start header -->
        <header> 
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-transparent bg-transparent g-white border-bottom border-color-transparent-white-light disable-fixed">
                <div class="container-fluid">
                    <div class="col-auto col-xxl-3 col-lg-2 me-lg-0 me-auto">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white2.png" data-at2x="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white2.png" alt="" class="default-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-dark.png" data-at2x="<?php echo get_template_directory_uri(); ?>/assets/images/logo-dark@2x.png" alt="" class="alt-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-dark.png" data-at2x="<?php echo get_template_directory_uri(); ?>/assets/images/logo-dark@2x.png" alt="" class="mobile-logo"> 
                        </a>
                    </div>
                    <div class="col-auto menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav"> 
                            <ul class="navbar-nav"> 
                                <!-- <li class="nav-item"><a href="demo-beauty-salon.html" class="nav-link">Home</a></li> -->
                                <li class="nav-item"><a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">About</a></li>
                                <li class="nav-item"><a href="<?php echo esc_url(home_url('/services')); ?>" class="nav-link">Services</a></li>
                                <li class="nav-item"><a href="<?php echo esc_url(home_url('/consultation')); ?>" class="nav-link">Consultation</a></li>
                                <li class="nav-item"><a href="<?php echo esc_url(home_url('/faqs')); ?>" class="nav-link">FAQs</a></li>
                                <!-- <li class="nav-item"><a href="" class="nav-link">Blog</a></li> -->
                                <!-- <li class="nav-item"><a href="demo-beauty-salon-review.html" class="nav-link">Review</a></li> -->
                                <!-- <li class="nav-item"><a href="demo-beauty-salon-contact.html" class="nav-link">Contact</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-xxl-3 col-lg-2 text-end d-none d-sm-flex">
                        <div class="header-icon">
                            <!-- <div class="d-none d-xxl-inline-block me-25px lg-me-0"><a href="tel:1800222000" class="widget-text text-white-hover fs-17"><i class="feather icon-feather-phone-call me-10px"></i>1 800 222 000</a></div> -->
                            <div class="header-button"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-very-small border-1 btn-transparent-white-light btn-round-edge">Let's talk</a></div>
                        </div>  
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->
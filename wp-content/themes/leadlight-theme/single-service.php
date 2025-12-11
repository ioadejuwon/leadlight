<?php
get_header();
?>

<div class="page-layout">


    <!-- start page title -->
    <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
        <div class="container">
            <div class="row align-items-center justify-content-center extra-very-small-screen">
                <div class="col-md-8 position-relative text-center page-title-extra-small">
                    <h1 class="alt-fon text-white mb-0"> <?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- end page title -->


    <section>
        <div class="container">
            <div class="row">
                <?php
                get_template_part('template-parts/service', 'sidebar');
                ?>

                <div class="col-lg-8 order-1 order-lg-2" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>



    <?php
    get_footer();

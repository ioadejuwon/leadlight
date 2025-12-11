<?php

add_action('after_setup_theme', function () {
    add_theme_support('block-templates');
    add_theme_support('page-templates');
});

add_filter('admin_footer_text', '__return_empty_string');
add_filter('update_footer', '__return_empty_string', 11);


// Enqueue styles and scripts
function leadlight_enqueue_assets()
{
    // CSS
    wp_enqueue_style('vendor-style', get_template_directory_uri() . '/assets/css/vendors.min.css');
    wp_enqueue_style('icon-style', get_template_directory_uri() . '/assets/css/icon.min.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.min.css');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');

    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('vendors-js', get_template_directory_uri() . '/assets/js/vendors.min.js', ['jquery'], null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'vendors-js'], null, true);
    wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/js/scripts.js', [], null, true);

    // AJAX contact
    wp_enqueue_script('ajax-contact', get_template_directory_uri() . '/assets/js/contact.js', ['jquery'], null, true);
    wp_localize_script('ajax-contact', 'ajax_contact_obj', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('ajax-contact-nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'leadlight_enqueue_assets');

// AJAX handler
add_action('wp_ajax_ajax_contact_submit', 'ajax_contact_submit');
add_action('wp_ajax_nopriv_ajax_contact_submit', 'ajax_contact_submit');

function ajax_contact_submit()
{
    // Log for debugging
    error_log("AJAX FUNCTION HIT");

    // Check nonce
    check_ajax_referer('ajax-contact-nonce', 'nonce');

    // Sanitize inputs
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $comment = sanitize_textarea_field($_POST['comment'] ?? '');

    if (empty($name) || empty($email)) {
        wp_send_json_error(['message' => 'Please fill all required fields.']);
    }

    global $wpdb;
    $table = $wpdb->prefix . 'contact_submissions';

    $insert = $wpdb->insert($table, [
        'name'         => $name,
        'email'        => $email,
        'message'      => $comment,
        'submitted_at' => current_time('mysql')
    ]);

    if (!$insert) {
        error_log("INSERT FAILED: " . $wpdb->last_error);
        wp_send_json_error(['message' => 'Failed to save to database']);
    }

    // Optional: send email
    wp_mail('isaac@leadlight.app', 'New Contact Form Submission', "Name: $name\nEmail: $email\nMessage: $comment");

    wp_send_json_success(['message' => 'Message sent successfully!']);
}






// Service CPT
function mv_register_service_cpt()
{

    $labels = array(
        'name'               => 'LeadLight Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'LeadLight Services',
        'name_admin_bar'     => 'Service',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'view_item'          => 'View Service',
        'all_items'          => 'All Services',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found.',
        'not_found_in_trash' => 'No services found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-hammer',     // You can change this
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'            => array('slug' => 'services'),
        'has_archive'        => true,
        'show_in_rest'       => true,                   // Gutenberg/ACF compatibility
        'show_in_menu' => 'leadlight-forms'

    );

    register_post_type('service', $args);
}
add_action('init', 'mv_register_service_cpt');

function mv_flush_rewrite_on_theme_activation()
{
    mv_register_service_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'mv_flush_rewrite_on_theme_activation');

function leadlight_service_hero_metabox()
{
    add_meta_box(
        'leadlight_service_hero_box',
        'Service Hero Section',
        'leadlight_service_hero_box_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'leadlight_service_hero_metabox');


function leadlight_service_hero_box_callback($post)
{

    wp_nonce_field('leadlight_service_hero_nonce_action', 'leadlight_service_hero_nonce');

    $image_id = get_post_meta($post->ID, '_service_hero_bg_id', true);
    $title    = get_post_meta($post->ID, '_service_hero_title', true);
    $desc     = get_post_meta($post->ID, '_service_hero_desc', true);

    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
?>

    <p>
        <label><strong>Hero Background Image</strong></label><br>

        <img id="service-hero-preview"
            src="<?php echo esc_url($image_url); ?>"
            style="max-width:250px; display:<?php echo $image_url ? 'block' : 'none'; ?>; margin-bottom:10px;">

        <input type="hidden" name="service_hero_bg_id" id="service-hero-image-id"
            value="<?php echo esc_attr($image_id); ?>">

        <button type="button" class="button" id="service-hero-upload-btn">Upload Image</button>
        <button type="button" class="button" id="service-hero-remove-btn"
            style="display:<?php echo $image_id ? 'inline-block' : 'none'; ?>;">Remove</button>
    </p>

    <p>
        <label><strong>Hero Title</strong></label><br>
        <input type="text" name="service_hero_title" value="<?php echo esc_attr($title); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Description</strong></label><br>
        <textarea name="service_hero_desc" style="width:100%;" rows="4"><?php echo esc_textarea($desc); ?></textarea>
    </p>

    <script>
        jQuery(function($) {
            let frame;

            $('#service-hero-upload-btn').on('click', function(e) {
                e.preventDefault();

                frame = wp.media({
                    title: "Select Hero Image",
                    button: {
                        text: "Use This Image"
                    },
                    multiple: false
                });

                frame.on('select', function() {
                    const attachment = frame.state().get('selection').first().toJSON();

                    $('#service-hero-image-id').val(attachment.id);
                    $('#service-hero-preview').attr('src', attachment.url).show();
                    $('#service-hero-remove-btn').show();
                });

                frame.open();
            });

            $('#service-hero-remove-btn').on('click', function(e) {
                e.preventDefault();
                $('#service-hero-image-id').val('');
                $('#service-hero-preview').hide();
                $(this).hide();
            });
        });
    </script>

<?php
}


function leadlight_save_service_hero($post_id)
{

    if (
        !isset($_POST['leadlight_service_hero_nonce']) ||
        !wp_verify_nonce($_POST['leadlight_service_hero_nonce'], 'leadlight_service_hero_nonce_action')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    update_post_meta($post_id, '_service_hero_bg_id', intval($_POST['service_hero_bg_id']));
    update_post_meta($post_id, '_service_hero_title', sanitize_text_field($_POST['service_hero_title']));
    update_post_meta($post_id, '_service_hero_desc', sanitize_textarea_field($_POST['service_hero_desc']));
}
add_action('save_post', 'leadlight_save_service_hero');

// Service CPT



function leadlight_register_faq_cpt()
{
    $labels = [
        'name'               => 'FAQs',
        'singular_name'      => 'FAQ',
        'menu_name'          => 'FAQs',
        'name_admin_bar'     => 'FAQ',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New FAQ',
        'new_item'           => 'New FAQ',
        'edit_item'          => 'Edit FAQ',
        'view_item'          => 'View FAQ',
        'all_items'          => 'All FAQs',
        'search_items'       => 'Search FAQs',
        'not_found'          => 'No FAQs found.',
        'not_found_in_trash' => 'No FAQs found in trash.'
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        // 'show_in_menu'       => true,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => ['title', 'editor', 'revisions'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'faqs'],
        'show_in_menu' => 'leadlight-forms'
    ];

    register_post_type('leadlight_faq', $args);
}
add_action('init', 'leadlight_register_faq_cpt');





function leadlight_faq_metabox()
{
    add_meta_box(
        'leadlight_faq_order',
        'FAQ Order',
        'leadlight_faq_order_callback',
        'leadlight_faq',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'leadlight_faq_metabox');

function leadlight_faq_order_callback($post)
{
    $value = get_post_meta($post->ID, '_faq_order', true);
    echo '<input type="number" name="faq_order" value="' . esc_attr($value) . '" style="width:100%">';
}

// Save meta
function leadlight_save_faq_meta($post_id)
{
    if (isset($_POST['faq_order'])) {
        update_post_meta($post_id, '_faq_order', sanitize_text_field($_POST['faq_order']));
    }
}
add_action('save_post', 'leadlight_save_faq_meta');

function leadlight_faq_shortcode()
{
    ob_start();
    $args = [
        'post_type' => 'leadlight_faq',
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'meta_key' => '_faq_order',
        'order' => 'ASC'
    ];

    $faqs = new WP_Query($args);
    if ($faqs->have_posts()) {
        echo '<div class="faqs">';
        while ($faqs->have_posts()) {
            $faqs->the_post();
            echo '<div class="faq-item">';
            echo '<h4>' . get_the_title() . '</h4>';
            echo '<p>' . get_the_content() . '</p>';
            echo '</div>';
        }
        echo '</div>';
    }
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('leadlight_faqs', 'leadlight_faq_shortcode');





function leadlight_register_site_settings()
{

    register_setting('leadlight_site_details_group', 'leadlight_address');
    register_setting('leadlight_site_details_group', 'leadlight_phone');
    register_setting('leadlight_site_details_group', 'leadlight_email');
    register_setting('leadlight_site_details_group', 'leadlight_facebook');
    register_setting('leadlight_site_details_group', 'leadlight_instagram');
    register_setting('leadlight_site_details_group', 'leadlight_whatsapp');
    register_setting('leadlight_site_details_group', 'leadlight_mon_fri');
    register_setting('leadlight_site_details_group', 'leadlight_sat_sun');
}
add_action('admin_init', 'leadlight_register_site_settings');


function leadlight_admin_custom_styles($hook)
{
    // Check if we're on the Site Details page
    // if ($hook !== 'toplevel_page_leadlight-site-details') {
    //     return;
    // }
    // Only load on Site Details and Contact Submissions pages
    // $allowed_hooks = [
    //     'leadlight_page_leadlight-site-details',
    //     'toplevel_page_leadlight-forms'
    // ];

    // if (!in_array($hook, $allowed_hooks)) {
    //     return;
    // }
    wp_enqueue_style('vendor-style', get_template_directory_uri() . '/assets/css/vendors.min.css');
    // Load CSS from your theme folder
    wp_enqueue_style('leadlight-admin-style', get_template_directory_uri() . '/assets/css/style.min.css', [], '1.0');
    wp_enqueue_style('leadlight-main-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0');
}
add_action('admin_enqueue_scripts', 'leadlight_admin_custom_styles');

add_action('admin_enqueue_scripts', function ($hook) {
    // Show the hook name for the current admin page
    echo '<script>console.log("Current admin hook:", "' . $hook . '");</script>';
});

function leadlight_site_details_page_html()
{
?>
    <div class="wrap">

        <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding  border-radius-6px"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
            <div class="container">
                <div class="row align-items-center justify-content-center extra-very-small-screen">
                    <div class="col-md-8 position-relative text-center page-title-extra-small">
                        <h1 class="alt-fon text-white mb-0">Site Details</h1>
                    </div>
                </div>
            </div>
        </section>

        <form method="post" action="options.php">
            <?php
            settings_fields('leadlight_site_details_group');
            do_settings_sections('leadlight_site_details_group');
            ?>
            <div class="bg-very-light-gray border-radius-6px p-40px lg-p-25px md-p-35px mt-50px">

                <!-- <span class="fs-20 ls-minus-05px alt-fon text-dark-gray fw-600 mb-25px d-inline-block">Get a free consultation?</span> -->
                <div class="contact-form-style-0 mt-0 ">
                    <h6 class="mb-10px mt-20px">Site details</h6>
                    <div class="row">

                        <div class="col-6">
                            <div class="position-relativ form-group mb-10px">
                                <span>Email Address</span>
                                <input type="text" name="leadlight_email" class="form-control regular-text border-color-extra-medium-gray" value="<?php echo esc_attr(get_option('leadlight_email')); ?>">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="position-relativ form-group mb-10px">
                                <span>Phone Number</span>
                                <input type="text" name="leadlight_phone" class="form-control border-color-extra-medium-gray regular-text" value="<?php echo esc_attr(get_option('leadlight_phone')); ?>">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="position-relativ form-group mb-10px">
                                <span>Company Address</span>
                                <textarea name="leadlight_address" id="" class="form-control  regular-text"> <?php echo esc_attr(get_option('leadlight_address')); ?> </textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="position-relativ form-group mb-10px">
                                <span>About You</span>
                                <textarea name="leadlight_about" id="" class="form-control regular-text"> <?php echo esc_attr(get_option('leadlight_about')); ?> </textarea>
                                <span class="fs-14">This is where you enter something about you</span>
                            </div>
                        </div>

                    </div>

                    <h6 class="mb-10px mt-20px">Social Media Link</h6>

                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group mb-20px">
                                <span>Facebook URL</span>
                                <input type="text" name="leadlight_facebook" value="<?php echo esc_attr(get_option('leadlight_facebook')); ?>" class="form-control regular-text border-color-extra-medium-gray" placeholder="@handle">
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="position-relative form-group mb-20px">
                                <span>Instagram URL</span>
                                <input type="text" name="leadlight_instagram" value="<?php echo esc_attr(get_option('leadlight_instagram')); ?>" class="form-control regular-text border-color-extra-medium-gray" placeholder="@handle">
                            </div>
                        </div>



                        <div class="col-6">
                            <div class="position-relative form-group mb-20px">
                                <span>WhatsApp Number</span>
                                <input type="text" name="leadlight_whatsapp" value="<?php echo esc_attr(get_option('leadlight_whatsapp')); ?>" class="form-control regular-text border-color-extra-medium-gray" placeholder="@handle">
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="mb-10px mt-20px">Opening Hours</h6>

                <div class="row">
                    <div class="col-6">
                        <div class="position-relative form-group mb-20px">
                            <span>Monday - Friday</span>
                            <input type="text" name="leadlight_mon_fri" value="<?php echo esc_attr(get_option('leadlight_mon_fri')); ?>" class="form-control regular-text border-color-extra-medium-gray" placeholder="@handle">
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="position-relative form-group mb-20px">
                            <span>Saturday - Sunday</span>
                            <input type="text" name="leadlight_sat_sun" value="<?php echo esc_attr(get_option('leadlight_sat_sun')); ?>" class="form-control regular-text border-color-extra-medium-gray" placeholder="@handle">
                        </div>
                    </div>
                </div>


                <!-- <button class="btn btn-medium btn-round-edge btn-base-color btn-box-shadow mt-20px submit w-20" type="submit">Send message</button> -->

                <?php submit_button(
                    'Update Details',
                    'primary',
                    'submit',
                    false,
                    array(
                        'class' => 'btn btn-extra-large btn-base-color btn-hover-animation-switch btn-round-edge btn-box-shadow',
                        'style' => 'background:#0D3556;border-radius:8px;padding:12px 24px;font-size:16px;border:none; width: 200px'

                    )
                ); ?>

            </div>
    </div>




    <!-- function submit_button( $text = '', $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = '' ) {
	echo get_submit_button( $text, $type, $name, $wrap, $other_attributes );
} -->

    </form>
    </div>
<?php
}


function display_submissions()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    $submissions = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC");


?>
    <div class="wrap">
        <section class="page-title-big-typography bg-dark-gray cover-background pb-0 top-space-padding  border-radius-6px"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/title-bg.png'); padding-top: 93px;">
            <div class="container">
                <div class="row align-items-center justify-content-center extra-very-small-screen">
                    <div class="col-md-8 position-relative text-center page-title-extra-small">
                        <h1 class="alt-fon text-white mb-0">Contact Form Submissions</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg-very-light-gray border-radius-6px p-40px lg-p-25px md-p-35px mt-50px">


            <div class="container-flui d-non mt-30px">
                <div class="row justify-content-cente ">
                    <?php


                    if ($submissions) {
                        foreach ($submissions as $s) {
                            $date = new DateTime($s->submitted_at);
                            $formatted = $date->format('F j, Y, g:i a'); // Example: December 10, 2025, 1:45 pm


                            echo '
                <div class="col-lg-3 col-md-3 col-sm-6 icon-with-text-style-0 mb-10px xs-mb-10px">
                    <div class="border border-color-extra-medium-gray border-radius-6px d-fle">
                                   
                        <div class="p-20px border-start border-color-extra-medium-gray d-fle justify-content-center xs-p-25px">

                            <span class="text-dark-gray">
                                <p class="m w- xl-w-100 mb-0">
                                    <strong>Name:</strong> ' . esc_html($s->name) . ' </span>
                                </p>
                                <p class="m w- xl-w-100 mb-0">
                                    <strong>Email:</strong> ' . esc_html($s->email) . '
                                </p>
                                <p class=" w- xl-w-100 mb-0">
                                    <strong>Message:</strong> ' . nl2br(esc_html($s->message)) . '
                                </p>

                                <p class=" w- xl-w-100 mb-0">
                                    <strong>Date submitted:</strong> ' . esc_html($formatted) . '
                                </p>
                                

                        </div>
                    </div>
                    <div class="feature-box text-start overflow-hidden">
                        
                       
                    </div>
                </div>
            ';
                        }
                    } else {
                        echo '
            <li class="grid-item text-center py-5">
                <h4>No contact submissions found.</h4>
            </li>
        ';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

function leadlight_about_excerpt($slug = 'about', $num_words = 90, $read_more = true)
{
    // Get the page by slug
    $about_page = get_page_by_path($slug);

    if (!$about_page) {
        return; // Page not found
    }

    $content = $about_page->post_content;

    // Allowed HTML tags
    $allowed_tags = array(
        'p' => array(),
        'br' => array(),
        'strong' => array(),
        'b' => array(),
        'em' => array(),
        'i' => array(),
        'a' => array('href' => array(), 'title' => array()),
        'ul' => array(),
        'ol' => array(),
        'li' => array()
    );

    // Keep only allowed tags
    $content = wp_kses($content, $allowed_tags);

    // Split into words while keeping HTML tags
    $words = preg_split('/\s+/', $content, -1, PREG_SPLIT_NO_EMPTY);
    $trimmed_words = array_slice($words, 0, $num_words);
    $excerpt = implode(' ', $trimmed_words);

    // Add ellipsis
    $excerpt .= '...';

    // Wrap in paragraphs for line breaks
    $excerpt = wpautop($excerpt);

    // Add custom classes to <p> tags
    $excerpt = str_replace('<p>', '<p class="mb-30px w-90 xl-w-90 lg-w-90 lg-mb-25px">', $excerpt);

    // Output the excerpt
    echo $excerpt;

    // Optional Read More button
    // if ($read_more) {
    //     echo '<p><a href="' . get_permalink($about_page->ID) . '" class="leadlight-read-more-btn">Read More</a></p>';
    // }
}


function popup()
{
    // $popup
?>
    <!-- start subscription popup -->
    <div id="subscribe-popup" class="mfp-hide subscribe-popup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 p-60px pt-40px pb-40px xs-p-30px xs-pt-30px xs-pb-30px position-relative box-shadow-quadruple-large bg-white border-radius-10px">
                    <div class="row">
                        <div class="col-12 text-center mb-20px">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/popup.gif" alt="" />
                        </div>
                        <div class="col-12 newsletter-popup position-relative">
                            <h5 class="d-inline-block fw-500 text-dark-gray ls-minus-1px mb-20px">Grow your confidence with <span class="fw-700">Tayo Koleade.</span></h5>
                            <div class="col icon-with-text-style-08 mb-5px">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-15px">
                                        <i class="bi bi-wallet2 icon-small text-base-color"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="text-dark-gray">Increase your conversion rate.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col icon-with-text-style-08 mb-5px">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-15px">
                                        <i class="bi bi-calendar-check icon-small text-base-color"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="text-dark-gray">Save your time and effort spent.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col icon-with-text-style-08 md-mb-15px">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-15px">
                                        <i class="bi bi-clock icon-small text-base-color"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="text-dark-gray">Make your business stand out.</span>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/consultation')); ?>" class="btn btn-extra-large btn-gradient-purple-pin btn-dark-gray btn-round-edge  btn-rounde btn-box-shadow d-block mt-30px">Let's talk now <i class="fa-solid fa-arrow-right"></i></a>
                            <button title="Close (Esc)" type="button" class="mfp-close mfp-close-btn text-dark-gray mx-auto mt-10px">No thanks</button>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close text-dark-gray"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end subscription popup -->
<?php

    // return $popup;
}
function leadlight_admin_menu()
{

    // Add Parent Menu
    add_menu_page(
        'LeadLight Forms',
        'LeadLight',
        'manage_options',
        'leadlight-forms',
        'display_submissions',
        'dashicons-email-alt',
        2 // position
    );

    // Submenu - Submissions
    add_submenu_page(
        'leadlight-forms',
        'Contact Form Submissions',
        'Contact Form Submissions',
        'manage_options',
        'leadlight-forms',
        'display_submissions'
    );

    add_submenu_page(
        'leadlight-forms',
        'Site Details',
        'Site Details',
        'manage_options',
        'leadlight-site-details',
        'leadlight_site_details_page_html',
        // 'dashicons-admin-home',
    );

    // // Submenu - Form Settings
    // add_submenu_page(
    //     'leadlight-forms',
    //     'Form Settings',
    //     'Settings',
    //     'manage_options',
    //     'leadlight-form-settings',
    //     'leadlight_form_settings'
    // );
}
add_action('admin_menu', 'leadlight_admin_menu');

























function add_custom_button_html($content)
{
    return preg_replace_callback(
        '#<div class="wp-block-button[^"]*">\s*<a[^>]*href="([^"]*)".*?>(.*?)</a>\s*</div>#is',
        function ($matches) {
            $button_url  = !empty($matches[1]) ? esc_url($matches[1]) : '#';
            $button_text = strip_tags($matches[2]);

            $new_button = '<a href="' . $button_url . '" class="btn btn-large btn-dark-gray btn-hover-animation-switch btn-round-edge btn-box-shadow">
                <span>
                    <span class="btn-text">' . esc_html($button_text) . '</span>
                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                </span>
            </a>';

            return '<div class="wp-block-button row text-center">' . $new_button . '</div>';
        },
        $content
    );
}
add_filter('the_content', 'add_custom_button_html');



// Image Custom Begin

function add_custom_image_class_for_services_blog($content)
{
    // Only run for services CPT or blog posts
    if (is_singular('service') || is_singular('post') || is_post_type_archive('service') || is_home() || is_archive()) {
        // Add class "custom-img-style" if not already present
        $content = preg_replace_callback(
            '/<img(.*?)>/i',
            function ($matches) {
                $img_tag = $matches[0];
                // Only add if class not already present
                if (strpos($img_tag, 'custom-img-style') === false) {
                    // If there’s a class attribute, append our class
                    if (preg_match('/class="([^"]*)"/i', $img_tag, $class_match)) {
                        $new_class = $class_match[1] . ' custom-img-style';
                        $img_tag = str_replace($class_match[0], 'class="' . $new_class . '"', $img_tag);
                    } else {
                        // No class attribute, just add it
                        $img_tag = str_replace('<img', '<img class="custom-img-style"', $img_tag);
                    }
                }
                return $img_tag;
            },
            $content
        );
    }
    return $content;
}
add_filter('the_content', 'add_custom_image_class_for_services_blog');



function leadlight_add_feather_icon_to_lists($content)
{
    // Add icon before every <li> in the content
    $content = preg_replace_callback(
        '#<li>(.*?)</li>#s',
        function ($matches) {
            // Feather icon HTML
            $icon_html = '<i class="feather icon-feather-check-circle me-10px"></i>';

            // Prepend the icon to the list item content
            return '<li>' . $icon_html . $matches[1] . '</li>';
        },
        $content
    );

    return $content;
}
add_filter('the_content', 'leadlight_add_feather_icon_to_lists');

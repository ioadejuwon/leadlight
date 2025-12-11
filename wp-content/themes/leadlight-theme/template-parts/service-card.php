  <?php
    $thumb = get_query_var('service_thumb', '');
    $title = get_query_var('service_title', '');
    $desc  = get_query_var('service_desc', '');
    ?>

  <div class="col mb-20px">
      <div class="services-box-style-01 hover-box">
          <a href="<?php the_permalink(); ?>">
              <div class="position-relative box-image border-radius-6px overflow-hidden"
                  style="background-image: url('<?php echo esc_url($thumb); ?>');
                        background-size: cover;
                        background-position: center;
                        height: 250px;">
                  <div class="box-overlay bg-gradient-blue-ironstone-brown"></div>
                  <span class="d-flex justify-content-center align-items-center mx-auto icon-box absolute-middle-center z-index-1 w-65px h-65px rounded-circle border border-color-transparent-white border-1">
                      <i class="bi bi-arrow-right-short text-white icon-very-medium d-flex"></i>
                  </span>
              </div>
          </a>

          <div class="p-25px last-paragraph-no-margin text-center">
              <span class="fs-22 text-dark-gray alt-fon"><?php echo esc_html($title); ?></span>
              <p class="lh-26"><?php echo esc_html($desc); ?></p>
          </div>
      </div>
  </div>
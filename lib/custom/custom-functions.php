<?php
/**
 *
 * Lifted Logic custom functions
 *
 */

/**
 * Get post meta shortcut
 */
function meta( $key ) {
  global $post;
  return get_post_meta($post->ID, $key, true);
}

/**
 * Formats text like the default WordPress wysiwyg
 */
function format_text( $content ) {
  $content = apply_filters('the_content', $content);
  return $content;
}

/**
 * var_dump variable
 * wrap it in a <pre> tag
 */
function _pre_var() {
  $args = func_get_args();

  echo '<pre>';
  call_user_func_array( 'var_dump', $args );
  echo '</pre>';
}

/**
 * Custom background function
 */
function set_post_background() {
  global $post;
  $bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
  if (!empty($bgimage)) {
    return '<style type="text/css">body {background-image: url('.$bgimage[0].');} </style>';
  }
}

/**
 * Get attachement image
 */
function ll_get_banner_image( $id=null ) {
  global $post;
  if ( !$id ) {
    $id = $post->ID;
  }
  $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "Full");
  $banner_image;

  if ( !empty( $post_image ) ) {
    $banner_image = $post_image[0];
  }


  return $banner_image;
}


function ll_format_post_banner( $post_id=null ) {
  global $post;
  if ( !$post_id ) {
    $post_id = $post->ID;
  }

  $hero_banner = array(
    'main_text'        => get_field( 'hero_banner_main_text', $post_id ),
    'sub_text'         => get_field( 'hero_banner_sub_text', $post_id ),
    'call_to_action'   => get_field( 'hero_banner_cta', $post_id ),
    'background_image' => wp_get_attachment_image_src( get_field( 'hero_banner_background_image', $post_id ), 'll_full_image' )
  );

  if ( !$hero_banner['main_text']['text'] ) {
    $hero_banner['main_text']['text'] = get_the_title( $post_id );
    $hero_banner['main_text']['tag'] = 'h1';
  }

  if ( !$hero_banner['sub_text']['text'] ) {

    $categories = wp_get_post_categories( $post_id );

    if ( $categories ) {
      foreach ($categories as $cat_key => $category) {
        if ( $cat_key == 0 ) {
          $hero_banner['sub_text']['text'] .= get_cat_name( $category );
        } else {
          $hero_banner['sub_text']['text'] .= ', '.get_cat_name( $category );
        }
      }

    }
    $hero_banner['sub_text']['tag']  = 'p';
  }

  if ( !$hero_banner['background_image'] ) {
    $hero_banner['background_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'll_full_image' );
  }

  return $hero_banner;
}
/**
* Converts phone numbers to the formatting standard
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns the formatted phone number
*/
function format_phone( $num,$area = false,$sep='-' ) {

  $num = preg_replace( '/[^0-9]/', '', $num );
  $len = strlen( $num );

  if( $len == 7 ) {

    $num = preg_replace( '/([0-9]{3})([0-9]{4})/', '$1'.$sep.'$2', $num );
  }
  elseif( $len == 10 ) {

    if ( $area )
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2'.$sep.'$3', $num );
    else
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','$1'.$sep.'$2'.$sep.'$3', $num );
  }

  return $num;
}

/**
* Strips all non-numeric characters from a string
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns number without any special characters or spaces
*/
function strip_phone($num) {
  $num = preg_replace('/[^0-9]/','',$num);
  return $num;
}

/**
 * returns values from custom site options
 * @param  string $context context name of option i.e global, contact
 * @param  String $option_name key of the option i.e _logo_ or _facebook_
 * @return mixed
 */
function ll_get_option( $context = false, $option_name = 'option' ) {
  global $ll_options;
  $ll_options = get_fields( $option_name );

  if ( $context ) {
    return $ll_options[ $context ];
  } else {
    return $ll_options;
  }
}

function ll_get_forms_as_options() {
  if ( !class_exists( 'RGFormsModel' ) )
    return;

  $forms = RGFormsModel::get_forms( null, 'title' );
  $options = array();

  if ( empty( $forms ) ) {
    $forms = array();
  };

  foreach ( $forms as $key => $form ) {
    $options[ $form->id ] = $form->title;
  };

  return $options;
}


/**
 * Get all social media options as a key=>value pair of
 * "social_name" => "social_link". To use, make sure all social media
 * options under "Contact Options" are prefixed with _options_contact_social.
 * Example: _options_contact_social_facebook
 * @return Boolean/Array if there is even one single social link, return the array,
 * else, return boolean false
 */
function ll_has_social() {

  $social_media_sites = array(
    'facebook' => get_field( 'social_facebook', 'option' ),
    'twitter' => get_field( 'social_twitter', 'option' ),
    'instagram' => get_field( 'social_instagram', 'option' ),
    'google_plus' => get_field( 'social_google_plus', 'option' ),
    'youtube' => get_field( 'social_youtube', 'option' ),
    'linkedin' => get_field( 'social_linkedin', 'option' ),
    'pinterest' => get_field( 'social_pinterest', 'option' ),
  );

  if ( $social_media_sites ) {
    return $social_media_sites;
  } else {
    return false;
  }
}

/**
 * Get all social media options as a key=>value pair of
 * "social_name" => "social_link". To use, make sure all social media
 * options under "Contact Options" are prefixed with _options_contact_social.
 * Example: _options_contact_social_facebook
 * @param  $css a css class to add to the ul element
 * @return array array of social media sites and links
 */
function ll_get_social_list( $css = '' ) {

  if ( $social_media_sites = ll_has_social() ) {
    if ( $css !== '' ) $css = ' ' . $css;
    echo '<ul class="social-list'.$css.'">';
      foreach ( $social_media_sites as $social => $link ) {
        if( $link ) {
          echo '<li class="social-list__item"><a class="social-list__link '.$social.'" href="'.$link.'" target="_blank"><svg class="icon icon-'.$social.'"><use xlink:href="#icon-'.$social.'"></use></svg></a></li>';
        }
      }
    echo '</ul>';
  }
}


/**
 * Set custom logo for the Wordpress login page
 */
function ll_custom_login_logo() {

  $logo = get_field( 'global_logo', 'option' );

  if ( $logo ) : ?>
    <style type="text/css">
      #login h1 a, .login h1 a {
        background-image: url(<?php echo $logo['url']; ?> );
        width: 100%;
        height: auto;
        min-height: 100px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
      }
    </style>
  <?php endif; ?>
<?php }
add_action( 'login_enqueue_scripts', 'll_custom_login_logo' );

function ll_custom_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'll_custom_login_logo_url' );

function ll_custom_login_logo_url_title() {
  return get_bloginfo( 'description' );
}
add_filter( 'login_headertitle', 'll_custom_login_logo_url_title' );

/**
* ll_stop_reordering_my_categories
* -----------------------------------------------------------------------------
* Keep categories and taxonomies in their hierarchical order rather than showing selected on top.
*
*/
function ll_stop_reordering_my_categories($args) {
  $args['checked_ontop'] = false;
  return $args;
}
add_filter('wp_terms_checklist_args','ll_stop_reordering_my_categories');

/**
* ll_generate_schema_json
* -----------------------------------------------------------------------------
* Keep categories and taxonomies in their hierarchical order rather than showing selected on top.
*
*/

function ll_generate_schema_json() {
  $schema = array(
    '@context'  => 'http://schema.org',
    '@type'     => get_field('schema_type', 'option'),
    'name'      => get_bloginfo('name'),
    'url'       => get_home_url(),
    'telephone' => strip_phone( get_field('contact_phone_number', 'option') ),
    'email' => get_field('contact_email_address', 'option'),
    'address'   => array(
      '@type'           => 'PostalAddress',
      'streetAddress'   => get_field('contact_street_address', 'option'),
      'postalCode'      => get_field('contact_zip', 'option'),
      'addressLocality' => get_field('contact_city', 'option'),
      'addressRegion'   => get_field('contact_state', 'option'),
      'addressCountry'  => get_field('contact_country', 'option')
    )
  );
  /// LOGO
  if (get_field('schema_logo', 'option')) {
    $schema['logo'] = get_field('schema_logo', 'option');
  }
  /// IMAGE
  if (get_field('schema_building_photo', 'option')) {
    $schema['image'] = get_field('schema_building_photo', 'option');
  }
  /// SOCIAL MEDIA
  // Google only looks for these 6 social media sites (and MySpace)
  $social_media_sites = array(
    'facebook' => get_field( 'social_facebook', 'option' ),
    'twitter' => get_field( 'social_twitter', 'option' ),
    'instagram' => get_field( 'social_instagram', 'option' ),
    'google_plus' => get_field( 'social_google_plus', 'option' ),
    'youtube' => get_field( 'social_youtube', 'option' ),
    'linkedin' => get_field( 'social_linkedin', 'option' )
  );

  if ( ll_filter_array( $social_media_sites ) ) {
    $schema['sameAs'] = array();
    foreach ( $social_media_sites as $key => $social_media ) {
      if ( $social_media ) {
        array_push( $schema['sameAs'], $social_media );
      }
    }
  }
  /// OPENING HOURS
  if (have_rows('scehma_openings', 'option')) {
    $schema['openingHoursSpecification'] = array();
    while (have_rows('scehma_openings', 'option')) : the_row();
    $closed = get_sub_field('closed');
    $from   = $closed ? '00:00' : get_sub_field('from');
    $to     = $closed ? '00:00' : get_sub_field('to');
    $openings = array(
      '@type'     => 'OpeningHoursSpecification',
      'dayOfWeek' => get_sub_field('days'),
      'opens'     => $from,
      'closes'    => $to
      );
    array_push($schema['openingHoursSpecification'], $openings);
    endwhile;
    /// VACATIONS / HOLIDAYS
    if (have_rows('schema_special_days', 'option')) {
      while (have_rows('schema_special_days', 'option')) : the_row();
      $closed    = get_sub_field('closed');
      $date_from = get_sub_field('date_from');
      $date_to   = get_sub_field('date_to');
      $time_from = $closed ? '00:00' : get_sub_field('time_from');
      $time_to   = $closed ? '00:00' : get_sub_field('time_to');
      $special_days = array(
        '@type'        => 'OpeningHoursSpecification',
        'validFrom'    => $date_from,
        'validThrough' => $date_to,
        'opens'        => $time_from,
        'closes'       => $time_to
        );
      array_push($schema['openingHoursSpecification'], $special_days);
      endwhile;
    }
  }
  echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}
add_action( 'wp_head', 'll_generate_schema_json'  );

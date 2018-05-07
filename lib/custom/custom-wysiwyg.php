<?php

/**
 * Adds the custom formats button back into tinymce
 *
 * @param  array $buttons The available buttons
 * @return array          The buttons to display
 */
function ll_new_mce_button( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

add_filter( 'mce_buttons_2', 'll_new_mce_button' );

/**
 * Removes the random classes added by TinyMCE v4
 */
function ll_strip_tinymce_styles($in) {
  $in['paste_preprocess'] = "function(pl,o){ o.content = o.content.replace(/p class=\"p[0-9]+\"/g,'p'); o.content = o.content.replace(/span class=\"s[0-9]+\"/g,'span'); }";
  return $in;
}
add_filter('tiny_mce_before_init', 'll_strip_tinymce_styles');

/**
 * adds custom formats to the formats selection
 * on the tinymce editor
 *
 * @param  array $data Tinymce data
 * @return array       Tinyce data
 */
function ll_format_tinymce( $data ) {
  $style_formats = array(
    array(
      'title'    => 'Heading Sizes',
      'items'  => array(
        array(
          'title'    => 'Hero',
          'classes'  => 'large-paragraph-text',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 1',
          'classes'  => 'h1',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 2',
          'classes'  => 'h2',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 3',
          'classes'  => 'h3',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading Style Four',
          'classes'  => 'h4',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading Style Five',
          'classes'  => 'h5',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading Style Six',
          'classes'  => 'h6',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title' => 'Images',
      'items' => array(
        array(
          'title'    => 'Offset',
          'classes'  => 'offset',
          'selector' => 'img, figure',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Invert',
          'classes'  => 'invert',
          'selector' => 'img, figure',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title' => 'Buttons & Links',
      'items' => array(
        array(
          'title'    => 'Button',
          'classes'  => 'button',
          'selector' => 'a, button',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Hollow Button',
          'classes'  => 'button hollow',
          'selector' => 'a, button',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title' => 'Lists',
      'items' => array(
        array(
          'title'    => 'No Bullets',
          'classes'  => 'no-bullet',
          'selector' => 'ul, ol',
          'wrapper'  => false
        ),
      ),
    ),
    array(
        'title' => 'Colors',
        'items' => array(
          array(
            'title'    => 'Orange',
            'classes'  => 'orange',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Red',
            'classes'  => 'red',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Chartreuese',
            'classes'  => 'grey',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Teal',
            'classes'  => 'grey',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Black',
            'classes'  => 'black',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Gray',
            'classes'  => 'grey',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Steel',
            'classes'  => 'steel',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Silver',
            'classes'  => 'silver',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'White',
            'classes'  => 'white',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
        ),
    )
  );

  $data['style_formats'] = json_encode( $style_formats );

  $custom_colours = '
        "00A79D", "Teal",
        "BFD730", "Orange",
        "F15A29", "Red",
        "BFD730", "Chartreuese",
        "000000", "Black",
        "808080", "Grey",
        "9b9b9b", "Steel",
        "b9b9b9", "Silver",
        "ffffff", "White"
    ';

    // build colour grid default+custom colors
  $data['textcolor_map'] = '['.$custom_colours.']';

  return $data;
}

add_filter( 'tiny_mce_before_init', 'll_format_tinymce' );
/**
 * Remove the Color Picker plugin from tinyMCE. This will
 * prevent users from adding custom colors. Note, the default color
 * palette is still available (and customizable by developers) via
 * textcolor_map using the tiny_mce_before_init hook.
 *
 * @param array $plugins An array of default TinyMCE plugins.
 */
function ll_tiny_mce_remove_custom_colors( $plugins ) {

    foreach ( $plugins as $key => $plugin_name ) {
        if ( 'colorpicker' === $plugin_name ) {
            unset( $plugins[ $key ] );
            return $plugins;
        }
    }

    return $plugins;
}
add_filter( 'tiny_mce_plugins', 'll_tiny_mce_remove_custom_colors' );

//Used with ACF to simplify wysiwyg toolbar

// function my_toolbars( $toolbars ) {
//   // Uncomment to view format of $toolbars
//   // echo '<div class="postbox  acf-postbox" style="width: 75%; margin: 0 auto; padding: 20px;">';
//   //   var_dump( $toolbars['Full' ] );
//   // echo '</div>';

//   // Add a new toolbar called "Very Simple"
//   // - this toolbar has only 1 row of buttons
//   $toolbars['Very Simple' ] = array();
//   $toolbars['Very Simple' ][1] = array('formatselect','styleselect','bullist','numlist','bold', 'link', 'unlink','alignleft','aligncenter','alignright' );


//   // remove the 'Basic' toolbar completely
//   unset( $toolbars['Basic' ] );
//   unset( $toolbars['Full'] );

//   // return $toolbars - IMPORTANT!
//   return $toolbars;
// }

// add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );


/**
 * add visual button
 * for added tinymce plugins
 */
function add_tiny_mce_plugins_button( $buttons ) {
   array_push( $buttons, 'anchor', 'square');
   return $buttons;
}
add_filter( 'mce_buttons', 'add_tiny_mce_plugins_button' );

/**
 * Add tinymce plugins assuming they live in
 * /lib/tinymce
 */
function add_tinymce_plugins( $plugins ) {
    $plugins['anchor'] = get_template_directory_uri() . '/lib/tinymce/anchor/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_tinymce_plugins' );


/**
 * Allow custom classes to be applied to
 * WYSIWYG fields for editing editor.css
 */
/*
function ll_acf_admin_footer() {
  ?>
  <script>
    ( function( $) {
      acf.add_filter( 'wysiwyg_tinymce_settings', function( mceInit, id ) {
        // grab the classes defined within the field admin and put them in an array
        var classes   = $( '#' + mceInit.id ).closest( '.acf-field-wysiwyg' ).attr( 'class' ),
            classarray = classes.split(' ');
        var bodyclass = $(classarray).get(-1);

        mceInit.body_class += ' ' + bodyclass;
        return mceInit;
      });
    })( jQuery );
  </script>
<?php
}
add_action('acf/input/admin_footer', 'll_acf_admin_footer');
*/

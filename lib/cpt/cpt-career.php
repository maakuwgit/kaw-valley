<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_career_custom_post_type') ) {

  // Register Custom Post Type
  function register_career_custom_post_type() {

    $labels = array(
      'name'                => 'Careers',
      'singular_name'       => 'Career',
      'menu_name'           => 'Careers',
      'parent_item_colon'   => 'Parent Career',
      'all_items'           => 'All Careers',
      'view_item'           => 'View Career',
      'add_new_item'        => 'Add New Career',
      'add_new'             => 'New Career',
      'edit_item'           => 'Edit Career',
      'update_item'         => 'Update Career',
      'search_items'        => 'Search Career',
      'not_found'           => 'No careers found',
      'not_found_in_trash'  => 'No careers found in Trash',
    );
    $args = array(
      'label'               => 'career',
      'description'         => 'Career description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 22,
      'menu_icon'           => 'dashicons-businessman',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'career', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_career_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_career_taxonomies') ) {

  function register_career_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Location', 'taxonomy general name' ),
      'singular_name'       => _x( 'Location', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Locations' ),
      'all_items'           => __( 'All Locations' ),
      'parent_item'         => __( 'Parent Location' ),
      'parent_item_colon'   => __( 'Parent Location:' ),
      'edit_item'           => __( 'Edit Location' ),
      'update_item'         => __( 'Update Location' ),
      'add_new_item'        => __( 'Add New Location' ),
      'new_item_name'       => __( 'New Location Name' ),
      'menu_name'           => __( 'Locations' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'location' )
    );

    register_taxonomy( 'career_location', array( 'career' ), $args ); // Must include custom post type name

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
      'name'                         => _x( 'Career Tags', 'taxonomy general name' ),
      'singular_name'                => _x( 'Career Tag', 'taxonomy singular name' ),
      'search_items'                 => __( 'Search Career' ),
      'popular_items'                => __( 'Popular Career' ),
      'all_items'                    => __( 'All Career' ),
      'parent_item'                  => null,
      'parent_item_colon'            => null,
      'edit_item'                    => __( 'Edit Career' ),
      'update_item'                  => __( 'Update Career' ),
      'add_new_item'                 => __( 'Add New Career' ),
      'new_item_name'                => __( 'New Career Name' ),
      'separate_items_with_commas'   => __( 'Separate Career with commas' ),
      'add_or_remove_items'          => __( 'Add or remove Career' ),
      'choose_from_most_used'        => __( 'Choose from the most used Career' ),
      'not_found'                    => __( 'No Career found.' ),
      'menu_name'                    => __( 'Career Tags' )
    );

  }

  add_action( 'init', 'register_career_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */
 if ( function_exists( 'acf_add_options_sub_page' ) ){
   acf_add_options_sub_page(array(
     'title'      => 'Settings',
     'parent'     => 'edit.php?post_type=career',
     'capability' => 'manage_options'
   ));
 }

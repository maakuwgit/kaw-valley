<?php
/**
 * Register the Location custom post type
 */
if ( ! function_exists('register_location_custom_post_type') ) {

  // Register Custom Post Type
  function register_location_custom_post_type() {

    $labels = array(
      'name'                => 'Locations',
      'singular_name'       => 'Location',
      'menu_name'           => 'Locations',
      'parent_item_colon'   => 'Parent Location',
      'all_items'           => 'All Locations',
      'view_item'           => 'View Location',
      'add_new_item'        => 'Add New Location',
      'add_new'             => 'New Location',
      'edit_item'           => 'Edit Location',
      'update_item'         => 'Update Location',
      'search_items'        => 'Search Location',
      'not_found'           => 'No locations found',
      'not_found_in_trash'  => 'No locations found in Trash',
    );
    $args = array(
      'label'               => 'location',
      'description'         => 'Location description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'revisions' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 2,
      'menu_icon'           => 'dashicons-location-alt',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'location', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_location_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_location_taxonomies') ) {

  function register_location_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'States', 'taxonomy general name' ),
      'singular_name'       => _x( 'State', 'taxonomy singular name' ),
      'search_items'        => __( 'Search States' ),
      'all_items'           => __( 'All States' ),
      'parent_item'         => __( 'Parent State' ),
      'parent_item_colon'   => __( 'Parent State:' ),
      'edit_item'           => __( 'Edit State' ),
      'update_item'         => __( 'Update State' ),
      'add_new_item'        => __( 'Add New State' ),
      'new_item_name'       => __( 'New State Name' ),
      'menu_name'           => __( 'States' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'location' )
    );
//Dev Note: potentional crash here, shouldn't happen but just might....
    register_taxonomy( 'state', array( 'location' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_location_taxonomies', 0 );

}
<?php
/**
 * Register the Service custom post type
 */
if ( ! function_exists('register_service_custom_post_type') ) {

  // Register Custom Post Type
  function register_service_custom_post_type() {

    $labels = array(
      'name'                => 'Services',
      'singular_name'       => 'Service',
      'menu_name'           => 'Services',
      'parent_item_colon'   => 'Parent Service',
      'all_items'           => 'All Services',
      'view_item'           => 'View Service',
      'add_new_item'        => 'Add New Service',
      'add_new'             => 'New Service',
      'edit_item'           => 'Edit Service',
      'update_item'         => 'Update Service',
      'search_items'        => 'Search Service',
      'not_found'           => 'No services found',
      'not_found_in_trash'  => 'No services found in Trash',
    );
    $args = array(
      'label'               => 'service',
      'description'         => 'Service description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'revisions' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 9,
      'menu_icon'           => 'dashicons-admin-generic',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'service', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_service_custom_post_type', 0 );

}
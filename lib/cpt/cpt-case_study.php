<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_case_study_custom_post_type') ) {

  // Register Custom Post Type
  function register_case_study_custom_post_type() {

    $labels = array(
      'name'                => 'Case Studies',
      'singular_name'       => 'Case Study',
      'menu_name'           => 'Case Studies',
      'parent_item_colon'   => 'Parent Case Study',
      'all_items'           => 'All Case Studys',
      'view_item'           => 'View Case Study',
      'add_new_item'        => 'Add New Case Study',
      'add_new'             => 'New Case Study',
      'edit_item'           => 'Edit Case Study',
      'update_item'         => 'Update Case Study',
      'search_items'        => 'Search Case Study',
      'not_found'           => 'No case studies found',
      'not_found_in_trash'  => 'No case studies found in Trash',
    );
    $args = array(
      'label'               => 'case_study',
      'description'         => 'Case Study description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 9,
      'menu_icon'           => 'dashicons-id-alt',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'case_study', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_case_study_custom_post_type', 0 );

}
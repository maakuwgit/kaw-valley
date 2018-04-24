<?php
/**
 * Register the Career custom post type
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
      'supports'            => array( 'title', 'editor', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
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
 * Create ACF setting page under CPT menu
 */
 if ( function_exists( 'acf_add_options_sub_page' ) ){
   acf_add_options_sub_page(array(
     'page_title' => 'Career Settings',
     'menu_title' => 'Settings',
     'menu_slug'  => 'career_settings',
     'parent'     => 'edit.php?post_type=career',
     'capability' => 'manage_options'
   ));
 }

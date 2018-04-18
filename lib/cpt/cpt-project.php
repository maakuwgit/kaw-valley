<?php
/**
 * Register the Project custom post type
 */
if ( ! function_exists('register_project_custom_post_type') ) {

  // Register Custom Post Type
  function register_project_custom_post_type() {

    $labels = array(
      'name'                => 'Projects',
      'singular_name'       => 'Project',
      'menu_name'           => 'Projects',
      'parent_item_colon'   => 'Parent Project',
      'all_items'           => 'All Projects',
      'view_item'           => 'View Project',
      'add_new_item'        => 'Add New Project',
      'add_new'             => 'New Project',
      'edit_item'           => 'Edit Project',
      'update_item'         => 'Update Project',
      'search_items'        => 'Search Project',
      'not_found'           => 'No projects found',
      'not_found_in_trash'  => 'No projects found in Trash',
    );
    $args = array(
      'label'               => 'project',
      'description'         => 'Project description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 8,
      'menu_icon'           => 'dashicons-portfolio',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'project', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_project_custom_post_type', 0 );
}

/**
 * Create ACF setting page under CPT menu
 */
 if ( function_exists( 'acf_add_options_sub_page' ) ){
   acf_add_options_sub_page(array(
     'page_title' => 'Project Settings',
     'menu_title' => 'Settings',
     'menu_slug'  => 'project_settings',
     'parent'     => 'edit.php?post_type=project',
     'capability' => 'manage_options'
   ));
 }

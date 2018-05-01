<?php
/*
Template Name: Tabular
*/
$cat = get_queried_object();

$spotlight_strength = get_field( 'careers_hero_spotlight_strength', 'options' );
$banner_text = array( 'text' => $cat->label . '.' );
$banner_sub_text = false;
$background_image = get_field( 'careers_hero_background_image', 'options' );
?>
<?php include( locate_template('templates/contents/content-hero.php') ); ?>
<?php include( locate_template('templates/contents/content-archive__career.php') ); ?>
<?php include( locate_template('templates/contents/content-page.php') ); ?>

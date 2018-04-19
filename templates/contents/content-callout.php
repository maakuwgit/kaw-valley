<?php
  $show_prefooter = true;
?>
<?php if ( $show_prefooter ) : ?>
  <?php
    $callout = array(
      'headline'  => get_field('prefooter_headline'),
      'link'      => array(
        'text'   => get_field('prefooter_link_text'),
        'title'   => get_field('prefooter_link_title'),
        'href'    => get_field('prefooter_link_href')
      )
    );

    ll_include_component(
      'callout',
      $callout,
      array(
        'classes' => array('row'),
        'id' => 'pre-footer'
      )
    );
  ?>
<?php endif; ?>
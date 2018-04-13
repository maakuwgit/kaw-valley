<?php
  $show_prefooter = true;
?>
<?php if ( $show_prefooter ) : ?>
  <?php
    ll_include_component(
      'callout',
      array(),
      array(
        'classes' => array('row'),
        'id' => 'pre-footer'
      )
    );
  ?>
<?php endif; ?>
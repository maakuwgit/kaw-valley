<?php
$contract = ( get_field('career_contract') === null ? '' : get_field('career_contract') );
$location = ( get_field('career_location') === null ? '' : get_field('career_location') );
if( $location ) $location = $location->post_title;
?>
<tr class="entry">
  <td class="h4"><?php the_title(); ?></td>
  <td><?php echo $contract; ?></td>
  <td><?php echo $location; ?></td>
  <td><a href="<?php the_permalink(); ?>">View Details</a></td>
</tr>
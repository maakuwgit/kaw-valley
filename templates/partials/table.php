<?php
$city = $state = '';
$contract = ( get_field('career_contract') === null ? '' : get_field('career_contract') );
$location = ( get_field('career_location') === null ? '' : get_field('career_location') );
if( $location ) {
  $city = $location->post_title;
  $state = get_the_terms($location, 'state');
  $location = $city;
  if( $state ) {
    $state = strtoupper($state[0]->slug);
    $location .= ', ' . $state;
  }
}
?>
<tr class="entry">
  <td><span class="h4"><?php the_title(); ?></span></td>
  <td><?php echo $contract; ?></td>
  <td><?php echo $location; ?></td>
  <td><a href="<?php the_permalink(); ?>">View Details</a></td>
</tr>
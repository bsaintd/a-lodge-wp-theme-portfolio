<div class="interests-cue">
<?php
  $interests_query = array(
    'post_type' =>'service_items',
    'posts_per_page' => -1,
    'orderby' => 'category',  // Makes sure the posts are sorted by date.
    'order' => 'ASC',  // And that the most recent ones come first
  );

  $interests = new WP_Query( $interests_query );

  // loop through results
  if ( $interests->have_posts() ):
    while ( $interests->have_posts() ):
      $interests->the_post();
      $role = get_field('page_role');
      if(isset($role['title'])):
      ?>
    <label id="<?php echo get_field('interest_cue_id'); ?>" class="material-checkbox">
      <input type="checkbox"/>
      <span>
        <?php echo $role['title']; ?>
      </span>
    </label>
      <?php
      endif;
    endwhile;
  endif;
?>
</div>

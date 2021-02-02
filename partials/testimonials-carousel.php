<div class="testimonials-carousel">
  <?php
    $testimonials = $data['sections'];
    foreach( $testimonials as $testimonial) {
      $copy = $testimonial['body_copy'];
      $source = $testimonial['subheading_copy'];
      echo '<p>' . $copy . '<br><br>' . '<span class="source">' . $source . '</span>' . '</p>';
    } // END foreach $testimonials as $testimonial
  ?>
</div>
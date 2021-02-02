<?php foreach( get_posts(array("post_type" => $data['section_css_class'], "numberposts" => -1)) as $room ) { ?>
  <div class="room"
      style="background-image: url(<?php echo get_the_post_thumbnail_url($room->ID); ?>)">
      <h2><?php echo substr($room->post_title, 0, 32); ?></h2>
      <p class="copy">
        <?php echo substr($room->post_excerpt, 0, 230);?></p>
      <div class="cta-wrapper">
          <a
            href="<?php echo get_permalink($room->ID); ?>"
            target=""
            class="cta"
            id="<?php echo hash('crc32', substr($room->post_title, 0, 32)); ?>">
            Learn More
          </a>
      </div>
  </div>
<?php } ?>
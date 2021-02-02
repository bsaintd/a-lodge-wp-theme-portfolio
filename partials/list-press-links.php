<?php
      foreach( get_posts(array(
        "post_type" => "press-links",
        "numberposts" => -1
      )) as $link ) { ?> 
        <div class="press-link">
            <h2><?php echo $link->post_title; ?></h2>
            <p class="date"><?php echo date("M d, Y", date_create_from_format('d/m/Y', get_field('posting_date', $link->ID))->getTimestamp()); ?>
            <p class="source"><?php echo get_field('source', $link->ID); ?>
            <p class="copy">
              <?php echo $link->post_excerpt;?></p>
            <div class="cta-wrapper">
                <a
                  href="<?php echo get_field('article_url', $link->ID); ?>"
                  target="_blank"
                  class="cta"
                  id="<?php echo hash('crc32', $link->post_title)?>">
                  Read More
                </a>
            </div>
        </div>
      <?php 
} ?>
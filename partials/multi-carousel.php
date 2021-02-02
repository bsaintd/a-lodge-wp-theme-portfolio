
<?php
$all_slides = $data['sections'];
$d_slides = [];
$m_slides = [];
foreach( $all_slides as $slide) {
  if ( $slide['css_class'] == "desktop" ) {
    $add_slide = ['name' => $slide['name'], 'img_url' => $slide['image']['url'], 'alt' => $alt['image']['alt'], 'css_class' => $slide['css_class']];
    $d_slides[] = $add_slide;
  } elseif ( $slide['css_class'] == "mobile" ) {
    $add_slide = ['name' => $slide['name'], 'img_url' => $slide['image']['url'], 'alt' => $alt['image']['alt'], 'css_class' => $slide['css_class']];
    $m_slides[] = $add_slide;
  }
} ?>
<div class="multi-carousel desktop">
  <?php
  foreach( $d_slides as $d_slide ) { ?>
    <img
      class="image-container"
      src="<?php echo $d_slide['img_url']; ?>"
      alt="<?php echo $d_slide['alt']; ?>"/>
  <?php } ?>
</div>
<div class="multi-carousel mobile">
  <?php
  foreach( $m_slides as $m_slide ) { ?>
    <img
      class="image-container"
      src="<?php echo $m_slide['img_url']; ?>"
      alt="<?php echo $m_slide['alt']; ?>"/>
  <?php } ?>
</div>
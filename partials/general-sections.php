<?php
/**
 * This function can be called to create a section and recursively calls itself to generate extra elements, too.
 */
function includePartial($path, $data = null){
  include(get_template_directory() . "/" . "partials/" . $path . '.php');
}

function createSection($data, $section_title, $config = NULL){
  $config = (empty($config)) ? $data : $config;
  $skip_this_area = isset($data['copy_config_to_children']) && $data['copy_config_to_children'];
  if(isset($config['load_partial']) && $config['load_partial']){
    includePartial($data['partial_path'], $data);
    return;
  }
  if( $skip_this_area ){
    // Don't use any of the typical fields, this configuration is for the child sections
  } else {
    if( $config['name'] ) { ?>
      <!-- <?php echo $config['name']; ?> -->
    <?php } // endif content area name ?>
    <div
      <?php if( $config['css_class'] ) { ?>
        class="<?php echo $config['css_class']; ?>"
      <?php }
      if( !empty($data['bg_color'])) { ?>
        style="background-color: <?php echo $data['bg_color']; ?>"
      <?php } // endif section bg color ?>
      >
      <?php
      if( isset($config['has_bg_image']) && $config['has_bg_image'] && isset($data['bg_img']) ) {
        $bg_img = $data['bg_img'];
        $bg_mobile_img = $data['bg_img_mobile']; ?>
        <div
          class="desktop background"
          style="background-image: url('<?php echo $bg_img['url']; ?>');"
          <?php if( $bg_img['alt'] ) {
            echo 'alt="' . $bg_img['alt'] . '"';
          } // endif content area bg image alt text ?>
        ></div>
        <div
          class="mobile background"
          style="background-image: url('<?php echo $bg_mobile_img['url']; ?>');"
          <?php if( $bg_mobile_img['alt'] ) {
            echo 'alt="' . $bg_mobile_img['alt'] . '"';
          } // endif content area mobile bg image alt text ?>
        ></div>
      <?php } // endif content area bg image

      if( isset($config['has_image']) && $config['has_image'] && isset($data['image']) ) {
        $img = $data['image']; ?>
        <img
          src="<?php echo $img['url']; ?>"
          class="image"
          <?php if( $img['alt'] ) {
            echo 'alt="' . $img['alt'] . '"';
          } // endif content area image alt text ?>
        />
      <?php } // endif content area image
      if( isset($config['has_heading']) && $config['has_heading'] ) {
        if( $config['heading_is_h1'] ) { ?>
          <h1><?php echo $data['heading_copy']; ?></h1>
        <?php } else { // endif content area heading is h1 ?>
          <h2><?php echo $data['heading_copy']; ?></h2>
        <?php } // end else content area heading is h2
      } // endif content area heading
      if( isset($config['has_subheading']) && $config['has_subheading'] ) { ?>
        <h3><?php echo $data['subheading_copy']; ?></h3>
      <?php } // endif content area subheading
      if( isset($config['has_body_copy'] ) && $config['has_body_copy'] ) { ?>
        <div class="copy"><?php echo $data['body_copy']; ?></div>
      <?php } // endif content area copy
      if( isset($config['has_cta']) && $config['has_cta'] ) {
        $cta =$data['cta'] ?>
        <a
          href="<?php echo $cta['url']; ?>"
          target="<?php echo $cta['target']; ?>"
          class="cta"
          id="<?php echo hash('crc32', $cta['title'] . $section_title); ?>">
          <?php echo $cta['title']; ?>
        </a>
      <?php } // endif content area cta
  } // end the skip test

  if( isset($config['has_sections']) && $config['has_sections'] ) {
    if( isset($config['wrap_sections'] ) && $config['wrap_sections'] == true) { ?>
      <div class="<?php echo $config['wrapper_class']; ?>">
    <?php }
    $config = ( isset($data['copy_config_to_children']) && $data['copy_config_to_children'] ) ? $data : NULL;
    if( isset($data['sections']) && sizeof($data['sections']) > 0 ) {
      foreach( $data['sections'] as $sub_area ) {
        createSection($sub_area, $section_title, $config);
      } // endwhile extra elements
    } // endif extra elements
  }

  if( isset($data['wrap_sections'] ) && $data['wrap_sections'] == true ) { ?>
    </div>
  <?php } ?>

  </div>
  <?php
}

function fob_section_repeater($sections){
  if( isset($sections) && is_array($sections) && sizeof($sections) > 0 ) {
    foreach( $sections as $section) {
      if( $section['section_name'] ){ ?>
        <!-- <?php echo $section['section_name']; ?> -->
      <?php } // endif section name ?>
      <section
        <?php if( isset($section['section_css_class']) ) { ?>
          class="<?php echo $section['section_css_class']; ?>"
        <?php } // endif section css class
        if( $section['section_bg_color'] ) { ?>
          style="background-color: <?php echo $section['section_bg_color']; ?>"
        <?php } // endif section bg color ?>
      >
        <?php if( $section['section_has_bg_image'] ) {
          $bg_img = $section['section_bg_image'];
          $bg_mobile_img = $section[ 'section_bg_image_mobile']; ?>
          <div
            class="desktop background"
            style="background-image: url('<?php echo $bg_img['url']; ?>');"
            <?php if( $bg_img['alt'] ) {
              echo 'alt="' . $bg_img['alt'] . '"';
            } // endif bg image alt text ?>
          ></div>
          <div
            class="mobile background"
            style="background-image: url('<?php echo $bg_mobile_img['url']; ?>');"
            <?php if( $bg_mobile_img['alt'] ) {
              echo 'alt="' . $bg_mobile_img['alt'] . '"';
            } // endif mobile bg image alt text ?>
          ></div>
        <?php } // endif section bg image
        createSection($section, $section['section_name']);
        ?>
      </section>
    <?php } // endwhile sections
  } // endif sections

}
?>

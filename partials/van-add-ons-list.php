<?php
$all_add_ons = get_field('add_on_checkboxes');
if($all_add_ons){ ?>
  <div class="van-add-on-list">
    <ul>
      <?php foreach ( $all_add_ons as $each_add_on ) { ?>
        <li class="add-on">
          <?php echo $each_add_on['checkbox_title']; ?>
        </li>
      <?php } ?>
    </ul>
  </div>
<?php } ?>
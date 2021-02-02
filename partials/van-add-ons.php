<?php
$all_add_ons = get_field('add_on_checkboxes');
if($all_add_ons){ ?>
  <div class="van-add-on-selections">
    <form
    name="vans-add-ons"
    action="javascript: ;"
    method="post">
    <?php foreach ( $all_add_ons as $each_add_on ) { ?>
      <div class="add-on">
        <label class="checkbox-container">
          <input
            type="checkbox"
            name="<?php echo $each_add_on['checkbox_data_value']; ?>"
            value="<?php echo $each_add_on['checkbox_data_value']; ?>"
            id="<?php echo $each_add_on['checkbox_data_value']; ?>">
          <span class="checkbox-custom"></span>
        </label>
        <div class="checkbox-title"><?php echo $each_add_on['checkbox_title']; ?></div>
      </div>
    <?php } ?>
    </form>
  </div>
<?php } ?>
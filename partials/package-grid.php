
<div class="tabs">
<?php
$packages = $content['packages'];
$count = 1;
foreach($packages as $package): ?>
  <div class="tab <?php echo 'package-'.$count; ?>"><?php echo $count; $count++; ?></div>
<?php endforeach;?>
</div>
<div class="packages">
  <?php
  $count = 1;
  foreach($packages as $package): ?>
  <div class="package <?php
    echo 'package-'.$count.' ';
    if($count == 1) echo "active";
    $count++; ?>">
    <div class="name">
      <div><?php echo $package['name']; ?></div>
      <div><?php echo $package['value_column_heading']; ?></div>
    </div>
    <div class="feature">
      <div class="bold">Price Range</div>
      <div><?php echo $package['price_range']; ?></div>
    </div>
    <div class="feature">
      <div class="bold">Number of pages</div>
      <div><?php echo $package['number_of_pages']; ?></div>
    </div>
    <div class="feature">
      <div class="bold">Rate per page</div>
      <div><?php echo $package['rate_per_page']; ?></div>
    </div>
    <div class="feature">
      <div class="bold">Monthly</div>
      <div><?php echo $package['monthly']; ?></div>
    </div>
    <div class="feature">
      <div class="bold">Minimum Contract</div>
      <div><?php echo $package['minimum_contract']; ?></div>
    </div>
    <?php $sections = $package['sections'];
    foreach($sections as $section): ?>
    <div class="feature-section">
      <div class="name"><?php echo $section['name']; ?></div>
        <?php $features = $section['features'];
        foreach($features as $feature): ?>
        <div class="feature">
          <div><?php echo $feature['name']; ?></div>

          <?php
            $class = '';
            $value = $feature['value'];
            switch($feature['value']) {
              case 'check':
                $value = '<span class="material-icons green">check</span>';
                break;
              case 'N/A':
                $class = 'red';
            }
          ?>
          <div class="<?php echo $class; ?>">
            <?php echo $value; ?>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endforeach; ?>
</div>
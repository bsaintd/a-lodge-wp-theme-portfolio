<?php
/**
 * Template Name: Booking
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */
get_header();

$checkin = date_format(date_create('today +3 weekdays'),'Y-m-d');
$checkout = date_format(date_create('today +8 weekdays'),'Y-m-d');
?>

<iframe src="https://hotels.cloudbeds.com/reservation/U8dLXh?widget=1#<?php echo $_SERVER['QUERY_STRING']."&checkin=$checkin&checkout=$checkout"; ?>" width="100%" scrolling="no" class="iframe-class" frameborder="0" id="cloudbeds">
</iframe>
<script type="text/javascript" src="https://hotels.cloudbeds.com/widget/iFrameResizer"></script> -->
<?php
get_footer(); ?>
 <script>window.iFrameResize({}, '#cloudbeds')</script> 
<?php
/**
 * Template Name: Barebones
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */
get_header();
?>
<style>
    iframe{min-height:unset !important;}
</style>
<?php
echo $post->post_content;
get_footer(); ?>
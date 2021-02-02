<?php

/**
 * Template part for displaying page blog-sidebar in blog and press templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */

?>
<section class="blog-sidebar">
    
    <div class="search desktop">
        <i class="material-icons">search</i>
        <form role="search" method="get" class="search-form" action="/">
            <label>
                <input type="search" class="search-field" placeholder="Search" value="<?php
                    echo isset($_GET["s"]) ? $_GET["s"] : "";
                    ?>" name="s" />
            </label>
            <input type="submit" class="search-submit" value="Search" />
        </form>
    </div>
    
    <h3>Archives</h3>
    <div class="articles">
        
        <div class="posts">
            <?php

            $months_with_posts = $wpdb->get_results( $wpdb->prepare( "
                SELECT
                    YEAR( post_date )  AS year,
                    MONTH( post_date ) AS month,
                    count( ID )        AS posts
                FROM {$wpdb->posts}
                WHERE
                    post_type = %s
                AND post_status = %s
                GROUP BY
                    YEAR( post_date ),
                    MONTH( post_date )
                ORDER BY post_date
                ASC
            ", "post", "publish") );

            foreach($months_with_posts as $link){
                $dateObj   = DateTime::createFromFormat('!m', $link->month);
                $monthName = $dateObj->format('F');
                $url = get_month_link($link->year, $link->month);
                echo "<a href='$url' class='archive-link'>$monthName $link->year</a>";
            }
            ?>
        </div>
    </div>
  
</section> <!-- end blog-sidebar -->
<?php
/* restore original post data */
wp_reset_postdata();
?>
<?php
 /**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Elicit AB
 *                  URL:     http://elicit.se
 *                  Date:    2014-02-04
 *                  Time:    11:26
 *
 * Copyright © | Fixing:IT™ - Your only IT-contact™ | All rights reserved.
 */

print check_content();

$numPostsPage   = 10;
$currentPage    = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination
$offset         = ( $paged - 1 ) * $numPostsPage;

$press = new WP_Query( array(
    'post_type'         => 'pressmeddelande',
    'order_by'          => 'post_date',
    'order'             => 'DESC',
    'paged'             => $currentPage,
    'posts_per_page'    => $numPostsPage
));

$numPages       = $press->max_num_pages;

pageNavigation($currentPage,$numPages);
?>
<hr class="noMarginTop"/>
<?php

$i = 1;

while ( $press->have_posts() ) : $press->the_post();
    $postExcerpt = check_and_create_excerpt($post, 400);
    ?>
    <?php if($i > 1) { ?><hr/><?php } ?>
    <div class="newsPost">
        <a href="<?php print get_permalink(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
            ?>
            <div class="col-md-5 col-lg-5">
                <?php the_post_thumbnail('medium'); ?>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7">
                <?php
                }
                else {
                ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <?php
                    }
                    ?>
                    <p class="italic">
                        Publicerad den <time><?php print get_the_date() ?></time> kl. <time><?php the_time(); ?></time>
                    </p>
                    <h5><?php print get_the_title(); ?></h5>
                    <p class="newsPostListingContent">
                        <?php print $postExcerpt; ?>
                    </p>
                    <p class="readmore pull-right">
                        Läs hela pressmeddelandet >>
                    </p>
                </div>
        </a>
    </div>
    <?php
    $i++;
endwhile;

wp_reset_postdata();

pageNavigation($currentPage,$numPages);

<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Elicit AB
 *                  URL:     http://elicit.se
 *                  Date:    2014-02-05
 *                  Time:    14:17
 *
 * Copyright © | Fixing:IT™ - Your only IT-contact™ | All rights reserved.
 */

print check_content();

$numPostsPage   = 6;
$currentPage    = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination
$offset         = ( $paged - 1 ) * $numPostsPage;

$berattelser = new WP_Query( array(
    'post_type'         => 'berattelse',
    'order_by'          => 'post_date',
    'order'             => 'DESC',
    'paged'             => $currentPage,
    'posts_per_page'    => $numPostsPage
));

$numPages       = $berattelser->max_num_pages;

pageNavigation($currentPage,$numPages);
?>
    <hr class="noMarginTop"/>
<?php

$i = 1;

while ( $berattelser->have_posts() ) : $berattelser->the_post();
    $image              = get_field('liten_bild');
    $uploadsDir         = wp_upload_dir();
    $imagePath          = $uploadsDir['path'] . "/" .  $image['title'] . substr(strrchr($image['url'],'.'),0);
    $postQuoteExcerpt   = check_and_create_excerpt($post, 230, true, "citat");

    ?>
    <div class="storyBox <?php if($i == 1) { print "first"; } ?> <?php if(!($i % 3) == 0) { print "rightBorder"; } ?> col-sm-4 col-md-4 col-lg-4">
        <a href="<?php print get_permalink(); ?>">
            <?php
            $file = get_field('utvald_bild');
            $uploadsDir = wp_upload_dir();
            $filePath =  $uploadsDir['path'] .  substr(strrchr($file['url'],'/'),0);
            ?>
            <div class="storyImageContainer">
                <?php
                if($file != null and file_exists($filePath)) {
                    ?>
                    <img src="<?php print $file['url']; ?>" class="attachment-medium wp-post-image" alt="<?php print $file['title']; ?>" />
                <?php
                } else {
                    ?>
                    <div class="missingImg" alt="Foto saknas...">&nbsp;</div>
                <?php
                }
                ?>
            </div>
            <h6 class="storyTitle"><?php print get_the_title(); ?></h6>
            <p class="storyUserType"><?php the_field('anvandartyp'); ?></p>
            <p class="storyQuote">
                "<?php print $postQuoteExcerpt; ?>"
            </p>
            <p class="readmore pull-right">
                Läs hela berättelsen >>
            </p>
        </a>
    </div>
    <?php
    $i++;
endwhile;

wp_reset_postdata();

pageNavigation($currentPage,$numPages);

<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-15
 *                  Time:    11:16
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

print check_content();

$news = get_posts(array(
    'post_type'      => 'nyhet',
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'numberposts'    => 10
));

foreach($news as $post) {
    $postExcerpt = check_and_create_excerpt($post, 400);
    ?>
    <hr/>
    <div class="newsPost row">
        <a href="<?php print get_permalink(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
                ?>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <div class="col-sm-7 col-md-7 col-lg-7">
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
                    Läs hela artikeln >>
                </p>
            </div>
        </a>
    </div>
    <?php
}

wp_reset_postdata();

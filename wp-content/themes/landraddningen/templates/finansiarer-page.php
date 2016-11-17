<?php
 /**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2014-01-17
 *                  Time:    11:08
 *
 * Copyright © | Fixing:IT? - Your only IT-contact? | All rights reserved.
 */

$finansiarer = new WP_Query( array(
    'post_type'     => 'partner',
    'meta_key'      => 'typ',
    'meta_value'    => 'finansiar',
    'orderby'       => 'menu_order',
    'order'         => 'ASC',
    'numberposts'   => -1
));

$i = 1;
$length = $finansiarer->post_count;

if($length >= 1) {
    show_post_by_path("om-oss/partnerskap-och-finansiarer/finansiarer/");
}
?>
    <div class="partnerRow row">
        <?php
            while ( $finansiarer->have_posts() ) : $finansiarer->the_post();
            $image = get_field('logotyp');
            $uploadsDir = wp_upload_dir();
            $imagePath =  $uploadsDir['path'] . "/" .  $image['title'] . substr(strrchr($image['url'],'.'),0);

            if(($i % 3) == 0) { ?>
                <div class="partnerRow row">
            <?php } ?>
            <div class="partnerCol col-sm-4 col-md-4 col-lg-4">
                <a href="<?php print get_field("url"); ?>" target="_blank">
                    <img src="<?php print $image['url']; ?>" alt="<?php the_title(); ?> logotyp">
                </a>
            </div>
            <?php if(($i % 3) == 0) { ?>
                </div><!--SLUT-->
            <?php
            }
            $i++;
        endwhile;
        ?>
    </div>
<?php

wp_reset_postdata();

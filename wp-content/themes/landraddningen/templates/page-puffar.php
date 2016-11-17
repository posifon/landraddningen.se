<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-14
 *                  Time:    12:08
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

$puffs = get_posts(array(
    'post_type' => 'puff',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'numberposts' => 2
));

$latestNewsPost = get_posts(array(
    'post_type' => 'nyhet',
    'orderby' => 'post_date',
    'order' => 'DESC',
    'numberposts' => 1
));

$latestNewsPostTitle = get_the_title($latestNewsPost[0]->ID);
//$latestNewsPostTitle = substr($latestNewsPostTitle,0,50).'...';

$latestNewsPostURL = get_permalink($latestNewsPost[0]->ID);

$i = 1;
?>
    <aside id="puffar">
        <a class="puffLink" href="<?php print $latestNewsPostURL; ?>">
            <div class="puffBorderTop" id="puffBorderTop1">&nbsp;</div>
            <div class="puff" id="puff1">
                <h2>Senaste nytt!</h2>

                <p id="newsScroller"><?php print $latestNewsPostTitle; ?></p>

                <div class="puffLinkContainer">
                    Läs mer här >>
                </div>
            </div>
        </a>
        <?php
        $i++;
        foreach ($puffs as $post) {
        ?>
        <?php if (null != get_field("internalurl")) { ?>
        <a class="puffLink" href="<?php print get_field("internalurl"); ?>">
            <?php } else if (null != get_field("externalurl")) { ?>
            <a class="puffLink" href="<?php print get_field("externalurl"); ?>">
                <?php } ?>
                <div class="puffBorderTop" id="puffBorderTop<?php print $i; ?>">&nbsp;</div>
                <div class="puff" id="puff<?php print $i; ?>">
                    <h2><?php print get_the_title(); ?></h2>
                    <?php if (null != get_field("pufftext")) { ?>
                        <p class="puffText">
                            <?php print get_field("pufftext"); ?>
                        </p>
                    <?php } ?>
                    <div class="puffLinkContainer">
                        <?php the_field("linktext"); ?>
                    </div>
                    <div class="puffLinkContainer">
                        <?php the_field("linktext"); ?>
                    </div>
                </div>
            </a>
            <?php
            $i++;
            }
            ?>
    </aside>
<?php
wp_reset_postdata();

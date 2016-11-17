<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-31
 *                  Time:    11:00
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

$news = get_posts(array(
    'post_type'      => 'nyhet',
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'numberposts'    => 3
));
?>
<aside class="subMenuPosts">
    <hr/>
    <h1>Våra senaste nyheter</h1>
    <?php
    foreach($news as $post) {
        $postExcerpt = check_and_create_excerpt($post, 110, true);
        ?>
        <hr/>
        <div class="subMenuPost">
            <a href="<?php print get_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                    ?>
                    <h2><?php print get_the_title(); ?></h2>
                    <div class="subMenuPostImg"><?php the_post_thumbnail(array(240,240)); ?></div>
                    <p class="subMenuPostExcerpt"><?php print $postExcerpt; ?></p>
                <?php
                }
                else {
                    ?>
                    <h6><?php print get_the_title(); ?></h6>
                    <p class="subMenuPostExcerpt"><?php print $postExcerpt; ?></p>
                <?php
                }
                ?>
                <p class="readmore">
                    Läs hela artikeln >>
                </p>
            </a>
        </div>
    <?php } ?>
</aside>
<?php wp_reset_postdata(); ?>

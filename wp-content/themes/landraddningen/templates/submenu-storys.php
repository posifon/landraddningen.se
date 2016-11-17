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

$storys = get_posts(array(
    'post_type'      => 'berattelse',
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'numberposts'    => 3
));
?>
<ul id="subMenuList" class="children level-2-children">
    <li class="level-2">
        <a href="<?php print get_page_link(16); ?>">Tillbaka till listvyn</a>
    </li>
</ul>
<hr/>
<aside class="subMenuPosts">
    <h1>Våra senaste berättelser</h1>
    <?php
    foreach($storys as $post) {
        $postExcerpt = check_and_create_excerpt($post, 230, true, "citat");
        ?>
        <hr/>
        <div class="subMenuPost">
            <a href="<?php print get_permalink(); ?>">
                <h2><?php print get_the_title(); ?></h2>
                <div class="subMenuPostImgContainer">
                    <?php
                    $file = get_field('utvald_bild');
                    $uploadsDir = wp_upload_dir();
                    $filePath =  $uploadsDir['path'] .  substr(strrchr($file['url'],'/'),0);

                    if($file != null and file_exists($filePath)) {
                        ?>
                        <img src="<?php print $file['url']; ?>" class="subMenuPostImg media-object photo" alt="<?php print $file['title']; ?>" />
                    <?php
                    }
                    else {
                    ?>
                    <div class="missingImg" alt="Foto saknas...">&nbsp;</div>
                    <?php
                    }
                    ?>
                </div>
                <p class="subMenuPostExcerpt"><?php print $postExcerpt; ?></p>
                <p class="readmore">
                    Läs hela berättelsen >>
                </p>
            </a>
        </div>
    <?php } ?>
</aside>
<?php
wp_reset_postdata();

get_template_part("templates/submenu","news")
?>

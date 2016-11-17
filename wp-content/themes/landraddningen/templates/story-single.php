<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Elicit AB
 *                  URL:     http://elicit.se
 *                  Date:    2014-02-05
 *                  Time:    14:17
 *
 * Copyright © | Elicit AB - Effektiva IT-lösningar.™ | All rights reserved.
 */

while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header class="page-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <?php
        $file = get_field('stor_bild');
        $uploadsDir = wp_upload_dir();
        $filePath =  $uploadsDir['path'] .  substr(strrchr($file['url'],'/'),0);
        ?>
            <?php
            if($file != null and file_exists($filePath)) {
                ?>
            <div id="storyImageContainer" class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <img src="<?php print $file['url']; ?>" class="attachment-medium wp-post-image" alt="<?php print $file['title']; ?>" />
            </div>
            <blockquote class="col-md-7 col-lg-7">
            <?php
            } else {
                ?>
                <blockquote>
            <?php
            }
            ?>
            <?php print get_field("citat"); ?>
        </blockquote>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <hr/>
        <div id="contactpersoninfo">
            <?php get_template_part('templates/contactperson'); ?>
        </div>
    </article>
    <hr/>
    <?php comments_template('/templates/comments.php'); ?>
<?php endwhile; ?>

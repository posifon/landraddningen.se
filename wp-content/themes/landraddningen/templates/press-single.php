<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-15
 *                  Time:    11:49
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header class="page-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <hr/>
        <div id="contactpersoninfo">
            <?php get_template_part('templates/contactperson'); ?>
        </div>
        <hr/>
        <div id="downloadAsPDF">
            <?php get_template_part('templates/press','download'); ?>
        </div>
    </article>
<?php endwhile; ?>

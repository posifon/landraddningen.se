<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-29
 *                  Time:    14:54
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

print check_content();

$nyheter = get_posts(array(
    'post_type'         => 'nyhet',
    'posts_per_page'    => -1 // to show all posts
));

$ordered_posts = array();

foreach ($nyheter as $single) {
    $year  = mysql2date('Y', $single->post_date);
    $month = mysql2date('F', $single->post_date);

    // specifies the position of the current post
    $ordered_posts[$year][$month][] = $single;
}

?>
    <ul id="newsArchive" class="years">
        <?php
        // iterates the years
        foreach ($ordered_posts as $year => $months) { ?>
        <div class="panel panelYearList">
            <h5 data-toggle="collapse" data-parent="#newsArchive" data-target="#list<?php print $year; ?>"><?php print $year; ?></h5>
            <ul id="list<?php print $year; ?>" class="collapse months">
                <?php foreach ($months as $month => $posts ) { /* iterates the moths */ ?>
                <div class="panel panelMonthList">
                    <h6 data-toggle="collapse" data-parent="#list<?php print $year; ?>" data-target="#list<?php print $month; ?>"><?php printf("%s (%d)", $month, count($months[$month])); ?></h6>
                    <ul id="list<?php print $month; ?>" class="posts collapse">
                        <?php foreach ($posts as $single ) { /* iterates the posts */ ?>
                            <a href="<?php print get_permalink($single->ID); ?>"><?php print mysql2date('j', $single->post_date); ?> - <?php print get_the_title($single->ID); ?></a><br/>
                        <?php } /* ends foreach $posts */ ?>
                    </ul> <!-- ul.posts -->
                    </div>
                <?php } /* ends foreach for $months */ ?>
            </ul> <!-- ul.months -->
            </div>
        <?php
        } // ends foreach for $ordered_posts
        ?>
    </ul><!-- ul.years -->
<?php

wp_reset_postdata();

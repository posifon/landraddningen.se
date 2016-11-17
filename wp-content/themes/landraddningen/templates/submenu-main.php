<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-28
 *                  Time:    12:55
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

if($post->post_type == 'nyhet' or $post->post_type == 'pressmeddelande') {
    $parent_array = array(0 => 10);
}
else {
    $parent_array = get_post_ancestors($post->ID);
}
if (empty($parent_array)) {
    $top_parent_id = $post->ID;
} else {
    $top_parent_id = $parent_array[0];
}

show_all_children($top_parent_id, $post->ID, 2);

wp_reset_postdata();

if (!is_page('Nyheter')) {
    get_template_part('templates/submenu', 'news');
}


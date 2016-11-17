<?php
/*
Plugin Name: Landräddningen
Plugin URI: http://www.landraddningen.com
Description: Custom functions plugin for Landräddningen
Version: 0.1
Author: Elicit AB
Author URI: http://www.elicit.se
*/

function show_all_children($parent_id, $post_id, $current_level)
{
    $top_parents    = array();
    $top_parents    = get_post_ancestors($post_id);
    $top_parents[]  = $post_id;

    $children = get_posts(
        array(
            'post_type'       => 'page',
            'posts_per_page'  => -1,
            'post_parent'     => $parent_id,
            'orderby'        => 'menu_order title',
            'order'           => 'ASC'
        ));


    if (empty($children)) return;

    echo '<ul id="subMenuList" class="children level-'.$current_level.'-children">';

    foreach ($children as $child){

        echo '<li class="level-'.$current_level;
        if (in_array($child->ID, $top_parents))
        {
            echo ' current_page_item';
        }
        echo '">';

        echo '<a href="'.get_permalink($child->ID).'">';

            //echo '<div class="subMenuListItemImg">&nbsp;</div><div class="subMenuListItemText">';
            echo apply_filters('the_title', $child->post_title);
            //cho '</div>';

        echo '</a>';


        echo '</li>';
    }

    echo '</ul>';
}

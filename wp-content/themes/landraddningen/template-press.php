<?php
/**
 * Template Name: Press
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-15
 *                  Time:    10:49
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */
?>

<div id="subMenu" class="rightBorder col-lg-3">
    <?php get_template_part('templates/submenu', 'main'); ?>
</div>
<div id="pageContent" class="col-sm-12 col-md-12 col-lg-9">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/press', 'page'); ?>
</div>

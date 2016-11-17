<?php
/**
 * Template name: Nyhetsarkiv
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Elicit AB
 *                  URL:     http://elicit.se
 *                  Date:    2014-02-11
 *                  Time:    14:00
 *
 * Copyright © | Elicit AB - Effektiva IT-lösningar.™ | All rights reserved.
 */
?>

<div id="subMenu" class="rightBorder col-lg-3">
    <?php get_template_part('templates/submenu', 'main'); ?>
</div>
<div id="pageContent" class="col-sm-12 col-md-12 col-lg-9">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/news', 'archive'); ?>
</div>

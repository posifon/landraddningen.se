<?php get_template_part('templates/head'); ?>
    <body <?php body_class(); ?>>
        <div id="defaultContainer" class="container">
            <?php
            do_action('get_header');
            // Use Bootstrap's navbar if enabled in config.php
            if (current_theme_supports('bootstrap-top-navbar')) {
                get_template_part('templates/header-top-navbar');
            } else {
                get_template_part('templates/header');
            }
            ?>
            <div id="mainContent" class="fadeContent wrap container" role="document">
                <div class="whiteopacity content row">
                    <div class="main col-sm-12 col-md-12 col-lg-12 <?php //echo roots_main_class(); ?>" role="main">
                        <?php include roots_template_path(); ?>
                    </div><!-- /.main -->
                </div><!-- /.content -->
            </div><!-- /.wrap -->
            <?php if(!isset($nofooter)) get_template_part('templates/footer'); else wp_footer(); ?>
        </div>
    </body>
</html>

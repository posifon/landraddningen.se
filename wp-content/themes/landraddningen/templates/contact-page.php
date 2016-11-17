<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-22
 *                  Time:    14:25
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */
?>

<div id="contactPage" class="row">
    <div id="formContainer" class="rightBorder col-sm-5 col-md-5 col-lg-5">
        <h1>Kontaktformulär</h1>
        <?php print do_shortcode( '[contact-form-7 id="134" title="Kontaktformulär"]' ); ?>
    </div>
    <div id="infoContainer" class="col-sm-7 col-md-7 col-lg-7">
        <?php get_template_part('templates/content', 'page') ?>
    </div>
</div>

<!--<script>
    jQuery(function($){
        $.fn.wpcf7NotValidTip = function(message) {
            return this.each(function() {
                var into = $(this);
                into.append('<div class="wpcf7-not-valid-tip">' + message + '</div>');
                $('div.wpcf7-not-valid-tip').mouseover(function() {
                    //$(this).fadeOut('fast');
                });
                into.find(':input').mouseover(function() {
                    //into.find('.wpcf7-not-valid-tip').not(':hidden').fadeOut('fast');
                });
                into.find(':input').focus(function() {
                    //into.find('.wpcf7-not-valid-tip').not(':hidden').fadeOut('fast');
                });
            });
        };
        $.fn.wpcf7ClearResponseOutput = function() {
            return this.each(function() {
                $(this).find('div.wpcf7-response-output').hide().empty().removeClass('wpcf7-mail-sent-ok wpcf7-mail-sent-ng wpcf7-validation-errors wpcf7-spam-blocked');
                $(this).find('div.wpcf7-not-valid-tip').remove();
                $(this).find('img.ajax-loader').css({ visibility: 'hidden' });
            });
        };
    });
</script>-->

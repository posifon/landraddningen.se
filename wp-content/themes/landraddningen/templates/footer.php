<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-15
 *                  Time:    11:16
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

$berattelser = get_posts(array(
    'post_type'      => 'berattelse',
    'orderby'        => 'rand',
    'posts_per_page' => 1
));
?>

<footer id="footer" class="fadeContent content-info container" role="contentinfo">
    <div class="row">
        <?php
        foreach($berattelser as $post) {
            $postQuoteExcerpt   = check_and_create_excerpt($post, 230, true, "citat");
            ?>
            <a href="<?php the_permalink(); ?>">
                <div id="footerStory">
                    <?php
                    if($file = get_field('liten_bild')) {
                        ?>
                        <div id="footerUserImgContainer" class="col-sm-1 col-md-1 col-lg-1">
                            <img id="footerUserImg" src="<?php print $file['url']; ?>" class="avatar media-object avatar-96 photo" alt="<?php print $file['title']; ?>" />
                        </div>
                        <div id="footerUserQuoteContainer" class="col-sm-5 col-md-5 col-lg-5">
                            <blockqoute id="footerUserQuote">"<?php print $postQuoteExcerpt; ?>"</blockqoute>
                            <hr/>
                            <p id="footerUserSign"><?php the_title(); print ', '; the_field('anvandartyp'); ?></p>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div id="footerUserQuoteContainer" class="noImg col-sm-6 col-md-6 col-lg-6">
                            <blockqoute id="footerUserQuote">"<?php print $postQuoteExcerpt; ?>"</blockqoute>
                            <hr/>
                            <p id="footerUserSign"><?php the_title(); print ', '; the_field('anvandartyp'); ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </a>
        <?php } ?>
        <div class="onlyMobile col-sm-3 col-md-3">&nbsp;</div>
        <div id="laddaNerAppen" class="col-xs-7 col-sm-4 col-md-4 col-lg-3">
            <h3>Ladda ner appen</h3>
            <a href="https://itunes.apple.com/se/app/landraddningen/id740469338?mt=8&uo=4" target="_blank">
                <div class="laddaNerAppenImg iPhone">&nbsp;</div><span class="laddaNerAppenText iPhone">iPhone</span>
            </a>
            <a href="https://play.google.com/store/apps/details?id=se.elicit.posifon_landraddningen" target="_blank">
                <div class="laddaNerAppenImg Android">&nbsp;</div><span class="laddaNerAppenText Android">Android</span>
            </a>
        </div>
        <div id="socialaMedier" class="col-xs-5 col-sm-4 col-md-4 col-lg-3">
            <h3>Sociala medier</h3>
            <a href="http://www.facebook.com/Landraddningen" target="_blank">
                <div id="Facebook">&nbsp;</div>
            </a>
            <a href="http://twitter.com/Landraddningen" target="_blank">
                <div id="Twitter">&nbsp;</div>
            </a>
<!--            <a href="<?php /*print $_SERVER["HTTP_HOST"] */?>/kontakt" target="_self">
                <div id="kontakt">&nbsp;</div>
            </a>-->
        </div>
        <div class="onlyMobile col-sm-1 col-md-1">&nbsp;</div>
    </div>
</footer>
<?php
wp_reset_postdata();
wp_footer();
?>

<?php
/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-15
 *                  Time:    17:45
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
    $class = str_replace("class='avatar pull-left media-object avatar-100 photo", "class='avatar media-object avatar-200 photo", $class) ;
    return $class;
}

$contactperson       = get_field('contactperson', get_post('ID'));
$contactpersonID     = $contactperson['ID'];
$contactpersonPhone  = get_user_meta($contactperson['ID'], 'phone');
$contactpersonPhone  = array_shift($contactpersonPhone);
?>
<div class="row">
    <div id="contactpersonAvatarDiv" class="col-sm-2 col-md-2 col-lg-2">
        <?php print get_avatar($contactperson['ID'], 100); ?>
    </div>
    <div id="contactpersonInfo" class="col-sm-10 col-md-10 col-lg-10">
        <h5>Kontaktperson</h5>
    <p class="byline author vcard">
        <a href="mailto:<?php print $contactperson['user_email']; ?>" rel="contact" class="fn"><?php print $contactperson['user_firstname'] . " " . $contactperson['user_lastname']; ?></a><br/>
        Tfn: <?php print $contactpersonPhone; ?><br/>
    </p>
    <p>
        Publicerad den <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?> kl. <?php echo get_the_time(); ?></time>
    </p>
</div>

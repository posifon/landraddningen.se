<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>
        <?php
        if (is_page('Startsida')) {
            bloginfo('name'); print ' | '; bloginfo('description');
        } elseif (function_exists('is_tag') && is_tag()) {
            print 'Tag-arkiv för &quot;'.$tag.'&quot;';
        } elseif (is_archive()) {
            wp_title(''); print ' Arkiv';
        } elseif (is_search()) {
            print 'Sökning efter &quot;'._wp_specialchars($s).'&quot;';
        } elseif (is_404()) {
            print 'Sidan kan inte hittas';
        } else {
            the_title();
        }

        if (!is_page('Startsida')) {
            print ' | '; bloginfo('name');
        }
        ?>
    </title>
    <meta name="author" content="Stellan Lindell, Elicit AB" />
    <meta name="dcterms.rightsHolder" content="Landräddningen & Elicit AB">
    <meta name="dcterms.rights" content="Copyright (&copy;) 2012-<?php print date('Y'); ?> Landräddningen. Alla rättigheter är reserverade." />
    <meta name="dcterms.dateCopyrighted" content="2012-<?php print date('Y'); ?>">
    <?php if(WP_DEBUG == true) { ?>
        <meta name="robots" content="noindex, nofollow">
    <?php } else { ?>
        <meta name="robots" content="all">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADNC+hwzQvv+G6N8QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADNC+rwzQvv8M0L7/DNC+/wzQvlAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADNC+zwzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+YAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADNC+pwzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L4gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADNC+jwzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wAAAAAAAAAAAAAAAAAAAAAAAAAAhujfOAzQvvcM0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L6fAAAAAAAAAAAAAAAAAAAAAAzQvocM0L7/DNC+/wzQvv8M0L7/t+3o/87z8P9G2cz/DNC+/wzQvv8M0L7/DNC+/wAAAAAAAAAAAAAAAAAAAAAM0L6/DNC+/wzQvv8M0L7/NtbI/+/7+v//////mefh/zbWyP8M0L7/DNC+/wzQvv+G6N9AAAAAAAAAAAAAAAAADNC+9wzQvv8M0L7/hujf////////////////////////////DNC+/wzQvv8M0L7/hujfdwAAAAAAAAAAAAAAAAzQvv8M0L7/DNC+/4bo3////////////////////////////wzQvv8M0L7/DNC+/4bo338AAAAAAAAAAAAAAAAM0L7/DNC+/wzQvv8M0L7/DNC+/+j5+P//////b+LX/wzQvv8M0L7/DNC+/wzQvv+G6N9/AAAAAAAAAAAAAAAADNC+5wzQvv8M0L7/DNC+/wzQvv+37ej/zvPw/0bZzP8M0L7/DNC+/wzQvv8M0L7/hujfXwAAAAAAAAAAAAAAAAzQvl8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+xwAAAAAAAAAAAAAAAAAAAAAAAAAADNC+9wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+9wzQviAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAM0L7vDNC+/wzQvv8M0L7/DNC+/wzQvv8M0L7/DNC+5wzQvjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzQvlcM0L7fDNC+/wzQvv8M0L7XDNC+pwAAAAAAAAAAAAAAAAAAAAAAAAAA/n8AAPw/AAD4HwAA8A8AAOAHAADgAwAAwAMAAMADAADAAwAAwAMAAMADAADAAwAA4AMAAOAHAADwDwAA/B8AAA==" />
    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>

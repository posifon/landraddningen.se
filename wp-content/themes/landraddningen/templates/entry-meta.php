<?php
add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar pull-left media-object avatar-200 photo", "class='r", $class) ;
return $class;
}
?>
<?php print get_avatar(get_the_author_meta('ID'), 200); ?>
<p class="byline author vcard">
    Publicerad av: <a href="mailto:<?php echo get_the_author_meta('email'); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a><br/>
     den <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?> kl. <?php echo get_the_time(); ?></time>
</p>

<?php
/**
 * Custom functions
 */

@ini_set('upload_max_size' , '128M');
@ini_set('post_max_size', '128M');
@ini_set('max_execution_time', '1200');
@ini_set('max_input_time', '1200');

/* Add some custom fields to users profile. */
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profilinformation", "blank"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="phone"><?php _e("Telefonnummer"); ?></label></th>
            <td>
                <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Var god ange ert telefonnummer."); ?></span>
            </td>
        </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    update_user_meta( $user_id, 'phone', $_POST['phone'] );
}

/* Creates own excerpt. */
function check_and_create_excerpt($post, $maxLength, $overrideGlobalExcerptLength = false, $customField = null) {
//    if(empty($postExcerpt)) {
    if(null != $customField) {
        $newPostExcerpt = get_field($customField);
    }
    else {
        $newPostExcerpt = $post->post_content;
    }
    $length = strlen($newPostExcerpt);
    //$newPostExcerpt = apply_filters('the_content', $newPostExcerpt);
    $newPostExcerpt = str_replace(']]>', ']]&gt;', $newPostExcerpt);
    $newPostExcerpt = strip_tags($newPostExcerpt);

    if ( !strlen($newPostExcerpt) <= $maxLength ) {
        $newPostExcerpt = substr($newPostExcerpt, 0, $maxLength);
        if ( substr($newPostExcerpt,-1,1) != ' ') {
            if($length >= $maxLength) {
                $newPostExcerpt = substr($newPostExcerpt, 0, strrpos($newPostExcerpt, " "));
                $newPostExcerpt = rtrim($newPostExcerpt, ',');
                $newPostExcerpt = rtrim($newPostExcerpt, '.');
                $newPostExcerpt = $newPostExcerpt . "...";
            }
        }
        else {
            $newPostExcerpt = substr($newPostExcerpt,0,-1) . "...";
        }
    }
    return $newPostExcerpt;
//    }
//    elseif (strlen($postExcerpt) >= $maxLength && $overrideGlobalExcerptLength) {
//        $cuttedPostExcerpt = substr($postExcerpt, 0, $maxLength);
//        $cuttedPostExcerpt = substr($cuttedPostExcerpt,0,-1) . "...";
//        //if ( substr($cuttedPostExcerpt,-1,1) != ' ' )
//            //$cuttedPostExcerpt = substr($cuttedPostExcerpt, 0, strrpos($cuttedPostExcerpt, " ")).'...';
//        return $cuttedPostExcerpt;
//    }
//    else {
//        return $postExcerpt;
//    }
}


//Removes version from static resources
function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/* Show posts by ID or path */
function show_post($path, $postID) {
    if(is_null($postID)) {
        $post = get_page_by_path($path);
        $content = apply_filters('the_content', $post->post_content);
    }
    elseif(is_null($postID)) {
        $content = apply_filters('the_content', $postID->post_content);
    }
    else {
        $content = "ERROR TRYING TO GET POST CONTENT...";
    }
    return $content;
}

function show_post_by_path($path) {
    print show_post($path, null);
}
function show_post_by_id($ID) {
    print show_post(null, $ID);
}

function the_post_by_path($path) {
    return show_post($path, null);
}
function the_post_by_id($ID) {
    return show_post(null, $ID);
}

/* Add CPT to RSS-feed */
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'nyhet', 'berattelse');
    return $qv;
}
add_filter('request', 'myfeed_request');

/* Alters the email and sender for share-toolbar */
function my_mail_from( $email ) {
    return 'kundtjanst@landraddningen.se';
}
add_filter('wp_mail_from', 'my_mail_from');

function my_mail_from_name( $name ) {
    return 'Landräddningen';
}
add_filter('wp_mail_from_name','my_mail_from_name');

//Crashar siten...
//function sharing_email_send_post( $data ) {
//    $content  = sprintf( __( '%1$s (%2$s) tror att du kan vara intresserad av följande inlägg på vår webbplats:'."\n\n", 'jetpack' ), $data['name'], $data['source'] );
//    $content .= $data['post']->post_title."\n";
//    $content .= get_permalink( $data['post']->ID )."\n";
//
//    wp_mail( $data['target'], '['.__( 'Shared Post', 'jetpack' ).'] '.$data['post']->post_title, $content );
//}

function check_content() {
    $pageContent = the_content();
    if(!empty($pageContent)) {
        return '<div class="col-sm-12 col-md-12 col-lg-12">' . $pageContent . '<br/><br/></div><hr/>';
    }
    else {
        return $pageContent;
    }
}


function pageNavigation($currentPage, $numPages) {
    $previousPage   = $currentPage - 1;
    $nextPage       = $currentPage + 1;
    $numPageNumber  = 5;
    if($numPages > 1) {
        ?>
        <div id="pageNav" class="col-sm-12 col-md-12 col-lg-12">
            <?php
            if($previousPage >= 1) {
                ?>
                <div id="pageNavPreviousContainer">
<!--                    <a href="<?php /*print get_permalink(); */?>">
                        <span id="pageNavFirst" title="Gå till första sidan" target="_self"><<</span>
                    </a>-->
                    <a href="<?php print get_permalink() . "page/" . $previousPage;?>" title="Gå till föregående sida" target="_self">
                        <span id="pageNavPrevious"><< <span class="noMobile">Föregående</span></span>
                    </a>
                </div>
            <?php
            }
            ?>
            <div id="pageNavNumberContainer">
                <?php
                for($i = 1; $i <= $numPageNumber; $i++) {
                    if($i > $numPages) {
                        break;
                    }
                    ?>
                    <a href="<?php print get_permalink() . "page/" . $i;?>" title="Gå till sidan <?php print $i; ?>" target="_self">
                        <span class="pageNavNumber <?php if($i == $currentPage) { ?>active<?php } ?>"><?php print $i; ?></span>
                    </a>
                <?php
                }
                if ($numPages > $numPageNumber) {
                    if($numPages > ($numPageNumber * 2)) {
                        ?>
                        <span id="pageNavDots" class="pageNavNumber">...</span>
                    <?php
                    }
                    for($i = (($numPages - $numPageNumber) + 1); $i <= $numPages; $i++) {
                        ?>
                        <a href="<?php print get_permalink() . "page/" . $i;?>" title="Gå till sidan <?php print $i; ?>" target="_self">
                            <span class="pageNavNumber <?php if($i == $currentPage) { ?>active<?php } ?>"><?php print $i; ?></span>
                        </a>
                    <?php
                    }
                }
                ?>
            </div>
            <?php
            if($currentPage != $numPages) {
                ?>
                <div id="pageNavNextContainer">
                    <a href="<?php print get_permalink() . "page/" . $nextPage;?>" title="Gå till nästa sida" target="_self">
                        <span id="pageNavNext"><span class="noMobile">Nästa</span> >></span>
                    </a>
<!--                    <a href="<?php /*print get_permalink() . "page/" . $numPages; */?>" title="Gå till sista sidan" target="_self">
                        <span id="pageNavLast">>></span>
                    </a>-->
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
}

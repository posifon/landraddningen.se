<?php
 /**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Elicit AB
 *                  URL:     http://elicit.se
 *                  Date:    2014-02-04
 *                  Time:    15:42
 *
 * Copyright © | Fixing:IT™ - Your only IT-contact™ | All rights reserved.
 */

$file       = get_field('pdf', get_post('ID'));
$fileTitle  = $file['title'];
$fileURL    = $file['url'];
$fileType   = $file['mime_type'];

if(!empty($file) and $fileType == "application/pdf") {
    ?>
    <div id="pdfContainer" class="col-sm-12 col-md-12 col-lg-12">
        <a href="<?php print $fileURL ?>" title="<?php print $fileTitle ?>" target="_blank">
            <div id="pdfText"><strong>Ladda ner detta pressmeddelande som en PDF-fil här.</strong></div>
            <div id="pdfImg">&nbsp;</div>
        </a>
    </div>
    <?php
}

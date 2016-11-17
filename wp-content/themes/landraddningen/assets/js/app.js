/**
 * Created by:
 *                  User:    Stellan Lindell
 *                  Company: Fixing:IT
 *                  URL:     http://FixingIT.se
 *                  Date:    2013-10-21
 *                  Time:    14:43
 *
 * Copyright © 2013 - Fixing:IT™ - Your only IT-contact™ - All rights reserved.
 */

$(document).ready(function() {
    "use strict";

    // Fixes so that if user has IE8 or bellow a message shows up telling the user to upgrade their browser.
    if (navigator.appVersion.indexOf("MSIE 8.") != -1 || navigator.appVersion.indexOf("MSIE 7.") != -1 || navigator.appVersion.indexOf("MSIE 6.") != -1 || navigator.appVersion.indexOf("MSIE 5.") != -1 || navigator.appVersion.indexOf("MSIE 4.") != -1 || navigator.appVersion.indexOf("MSIE 3.") != -1 || navigator.appVersion.indexOf("MSIE 2.") != -1 || navigator.appVersion.indexOf("MSIE 1.") != -1) {
        $('body').empty();
        $('body').attr("id","wrongBrowser");
        $('body').html('' +
            '<div style="width:60%; background-color:#FFFFFF; margin:5% auto auto auto; padding: 10px 20px;">' +
            '<img src="http://landraddningen.se/wp-content/themes/landraddningen/assets/img/Landraddningen_vanster_svart_RGB.png" style="width:319px; height:50px; float:right; padding: 10px 20px;">' +
            '<p style="font-size: 3em; padding-top: 15px; padding-bottom: 10px;">Hej!</p>' +
            '<p style="font-size: 1.5em;">Den äldre version av webbläsaren Internet Explorer som du använder kan tyvärr inte visa Landräddningens hemsida. Vi beklagar detta men kan tyvärr inte göra något åt det, förutom att uppmuntra dig att uppgradera till en nyare webbläsare som är bättre och mer anpassad till moderna hemsidor.</p>' +
            '<p style="font-size: 1.5em;">Vi på Landräddningen vill gärna komma i kontakt med dig i vilket fall och ber dig kontakta vår kundtjänst för att få hjälp och svar på de frågor du har. Du når oss på <a href="mailto:kundtjanst@landraddningen.se">kundtjanst@landraddningen.se</a> eller 031-388 78 10. Tack på förhand!</p>' +
            '<p style="font-size: 1.5em;">Tips! Du uppdaterar lätt din webbläsare genom att gå in i programmet "Windows update" som du hittar i menyn med alla program under startmenyn eller i "Kontrollpanelen". Du kan också gå in på hemsidan <a href="http://browsehappy.com/" target="_blank">http://browsehappy.com/</a> där du får stöd att välja webbläsare, uppgradera och förbättra din upplevelse på internet. Lycka till.</p>' +
            '<p style="font-size: 1.5em;">Hälsningar från oss engagerade i Landräddningen!</p>' +
            '</div>');
    }
    // END!

    dropdownfix();

    // Fixes bug with submenu border
    $(function() {
        var subMenuHeight = $('#subMenu').height();
        var pageContentHeight = $('#pageContent').height();
        var mainContentHeight = $('#mainContent').height();

        subMenuBorderFix(subMenuHeight,pageContentHeight,mainContentHeight);
    });
    // End!

    // If users browser supports HTML5 (function in the bottom) ads fade in/out effect when clicking link in main menu or on homepage without "target='_BLANK'".
    if(supports_html5_storage()) {
        var newLocationURL = localStorage.getItem("newLocationURL");

        if (newLocationURL !== null){
            localStorage.clear();
        }

        $('#mainHeader a').click(function(event) {
            "use strict";
            event.preventDefault();
            fadeEffect($(this));
        });
        $('#homepageBody a').click(function(event) {
            "use strict";
            event.preventDefault();
            fadeEffect($(this));
        });
        $('.fadeLink').click(function(event) {
            "use strict";
            event.preventDefault();
            fadeEffect($(this));
        });
    }
    // END!

    // Fixes input placeholder compability issues.
    jQuery(function() {
        "use strict";
        jQuery.support.placeholder = false;
        var test = document.createElement('input');
        if('placeholder' in test) jQuery.support.placeholder = true;
    });
    $(function() {
        "use strict";
        if(!$.support.placeholder) {
            console.log("Browser supports placeholder:" + $.support.placeholder);
            var active = document.activeElement;
            $('input, textarea').focus(function () {
                if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
                    $(this).val('').removeClass('hasPlaceholder');
                }
            }).blur(function () {
                if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
                    $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
                }
            });
            $('input, textarea').blur();
            $(active).focus();
            $('form').submit(function () {
                $(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
            });
        }
    });
    // END!

    // Adding AJAX loader on send button click
    $('#sendBtn').on("click", function(){
        "use strict";
        $(this).toggleClass("ajax-loader");
    });
    // END!

    $('.newsPost').on("mouseover", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,160,59)" );
    });
    $('.newsPost').on("mouseout", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,0,0)" );
    });
    $('.subMenuPost').on("mouseover", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,160,59)" );
    });
    $('.subMenuPost').on("mouseout", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,0,0)" );
    });
    $('.storyBox').on("mouseover", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,160,59)" );
    });
    $('.storyBox').on("mouseout", function(){
        $(this).find( ".readmore" ).css( "color", "rgb(0,0,0)" );
    });

    $(function() {
        // Loops through all sharedaddy-divs and removes all "like" and keeps only the "share this"
        $.each($('.sharedaddy'), function() {
            if($(this).hasClass('sd-like')) {
                $(this).remove();
            }
        });
        // Counts the length of the remaining sharedaddy-divs.
        var total = $('.sharedaddy').length;
        // Loops through
        $.each($('.sharedaddy'), function(index, element) {
            var thisVal = $(this).val();
            if(parseInt(thisVal) != 0) {
                // Removes all instances except the last.
                if (!(index == total - 1)) {
                    $(this).remove();
                }
            }
        });
        //$('#pageContent').append( $('.sharedaddy') );
        if (!$('#subMenu').length){
            console.log("NoMenu!");
            $('.sharedaddy').addClass('nomenu');
        }
        $('#mainContent').append($('.sharedaddy').css("display", "block"));
    });

    // Fixes some small design problems with footer.
    $(function() {
        var footerUserQuoteContainerSize = $('#footerUserQuoteContainer').height();
        if(footerUserQuoteContainerSize > 102) {
            console.log(footerUserQuoteContainerSize);
            var difference  = footerUserQuoteContainerSize - 100;
            var marginTop   = difference + 23;
            $('#footerUserImg').css('height',100).css('width', 100).css('margin-top', marginTop);
        }
        else {
            $('#footerUserImg').css('height',footerUserQuoteContainerSize).css('width', footerUserQuoteContainerSize);
        }
    });
});

$( window ).resize(function() {
    dropdownfix();
});

var fadeOutEffect = (function (newURL) {
    "use strict";
    $('.fadeContent').animate({
        display: "none",
        opacity: 0.0
    },600, function() {
        "use strict";
        localStorage.setItem('newLocation URL', newURL);
        window.location = newURL;
    });

    var image_url = $('#defaultContainer').css('background-image'), image;

    // Remove url() or in case of Chrome url("")
    image_url = image_url.match(/^url\("?(.+?)"?\)$/);

    if (image_url[1]) {
        image_url = image_url[1];
        image = new Image();

        // just in case it is not already loaded
        $(image).load(function () {
            console.log('"defaultContainer" background height: ' + image.height);
            $('#defaultContainer').animate({
                height: image.height
            },400);
        });

        image.src = image_url;
    }
});


var fadeEffect = (function(linkObject) {
    "use strict";
    $(linkObject).css("color","#83BB26");
    var newURL = linkObject.attr('href');
    if(!linkObject.hasClass('dropdown-toggle')) {
        if(linkObject.attr('target') !== undefined) {
            var URLTarget = linkObject.attr('target').toLowerCase();
            if(URLTarget === "_blank") {
                window.open(newURL);
            }
        }
        else {
            fadeOutEffect(newURL);
        }
    }
});

var supports_html5_storage = (function () {
    "use strict";
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
});

var submitForm = (function () {
    $('form').submit();
});

var dropdownfix = (function () {
    // Fixes bugs with menu dropdown menus
    $('.dropdown').click(function() {
        "use strict";
        if($(window).width() >= 992) {
            $(this).toggleClass('open');
            if($(this).hasClass('open')) {
                if($(this).hasClass('active')) {
                    $(this).find('.dropdown-toggle').css('color', 'rgb(255,255,255)');
                }
                else {
                    $(this).find('.dropdown-toggle').css('color', 'rgb(255,255,255)');
                }
            }
            else if($(this).hasClass('active')) {
                $(this).find('.dropdown-toggle').css('color', 'rgb(190,208,0)');
            }
        }
    });
    $('.dropdown').focusout(function() {
        "use strict";
        if($(this).hasClass('active')) {
            $(this).find('.dropdown-toggle').css('color', 'rgb(190,208,0)');
        }
        else {
            $(this).find('.dropdown-toggle').css('color', 'rgb(255,255,255)');
        }
    });

    $('.dropdown').on("mouseover", function(){
        "use strict";
        if($(window).width() >= 992) {
            $(this).find('.dropdown-toggle').css('color', 'rgb(131,187,38)');
        }
    });
    $('.dropdown').on("mouseout", function(){
        "use strict";
        if($(window).width() >= 992) {
            if($(this).hasClass('active')) {
                $(this).find('.dropdown-toggle').css('color', 'rgb(190,208,0)');
            }
            else {
                $(this).find('.dropdown-toggle').css('color', 'rgb(255,255,255)');
            }
        }
    });
    $('.dropdown').on("mouseover", function(){
        "use strict";
        if($(window).width() >= 992) {
            $(this).toggleClass('open', true);
            $(this).find('.dropdown-menu').css('display','block');
        }
    });
    $('.dropdown').on("mouseout", function(){
        "use strict";
        if($(window).width() >= 992) {
            $(this).toggleClass('open', false);
            $(this).find('.dropdown-menu').css('display','none');
        }
    });
    $('.dropdown-menu').click(function() {
        if($(window).width() >= 992) {
            $(this).css('display','none');
        }
    });
    // END!
});

var subMenuBorderFix = (function(subMenuHeight,pageContentHeight,mainContentHeight) {
    // Fixes bug with submenu border
    console.log('"subMenu" height: ' + subMenuHeight);
    console.log('"pageContent" height: ' + pageContentHeight);
    console.log('"mainContent" height: ' + mainContentHeight);

    if($(window).width() >= 992) {
        console.log('Browser window width: ' + $(window).width());
        if(subMenuHeight  < mainContentHeight && pageContentHeight < mainContentHeight) {
            $('#subMenu').css("height", mainContentHeight + "px");
        }
        else if(subMenuHeight <= pageContentHeight) {
            console.log("asfdas: " + pageContentHeight);
            $('#subMenu').css("height", (pageContentHeight) + "px");
//            subMenuHeight = $('#subMenu').height();
//            if ($(subMenuHeight) >= 1200) {
//                $('#subMenu').css("height", (pageContentHeight - 120) + "px");
//            }
        }
        else {
            $('#pageContent').css("height", subMenuHeight + "px");
        }
    }
    // End border fix
});

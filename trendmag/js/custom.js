/**
 * http://kopatheme.com
 * Copyright (c) 2014 Kopatheme
 *
 * Licensed under the GPL license:
 *  http://www.gnu.org/licenses/gpl.html
 **/
/**
 *   1. Breadking News
 *   2. Menu
 *   3. Owl carousel
 *   4. Flex slider
 *   5. BxSlider
 *   6. Slider pro
 *   7. Match Height
 *   8. Fitvid
 *   9. Flick
 *   10. Bootstrap collapse
 *   11. Google Map
 *   12. Validate Form
 *   13. Behavior
 *   14. Sticky sidebar
 *   15. Video bg
 *   16. Instagram
 *-----------------------------------------------------------------
 **/

 
"use strict";

jQuery(document).ready(function() {
    
    /* =========================================================
    1. Breadking News
    ============================================================ */

    if (jQuery('.kopa-sticker-widget').length) {
        Modernizr.load([{
            load: kopa_variable.url.template_directory_uri + 'js/jquery.carouFredSel.js',

            complete: function() {
                jQuery('.kopa-sticker-widget').each(function() {
                    var $this = jQuery(this);
                    var sticker = $this.find('.ticker');

                    var tickerWidth = sticker.data('ticker-width');
                    var tickerHeight = sticker.data('ticker-height');

                    var _scroll = {
                        delay: 1000,
                        easing: 'linear',
                        infinite: true,
                        items: 1,
                        duration: 0.07,
                        timeoutDuration: 0,
                        pauseOnHover: 'immediate'
                    };
                    sticker.carouFredSel({
                        width: tickerWidth,
                        align: false,
                        items: {
                            width: tickerWidth,
                            height: tickerHeight,
                            visible: 1
                        },
                        scroll: _scroll
                    });

                });
            }
        }]);
    }


    /* =========================================================
    2. Menu
    ============================================================ */
    
    if (jQuery('.sf-menu').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/superfish.js'],
            complete: function() {
                jQuery('ul.sf-menu').superfish();
            }
        }]);
    }

    if (jQuery('.navgoco').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.navgoco.js'],
            complete: function() {
                jQuery(".navgoco").navgoco({
                    accordion: true
                });
            }
        }]);
    }

    jQuery('.megamenu').parent().css('position', 'static');

    // toggle menu
    jQuery('.toggle-menu').on('click', function(event) {
        event.preventDefault()
        var $this = jQuery(this);
        jQuery('.left').removeClass('left');
        jQuery('.overlay-block').removeClass('overlay-block');
        $this.next('.need-left').addClass('left');
        jQuery('.kopa-overlay').addClass('overlay-block');
        jQuery('body').addClass('ov-hidden');
    });

    jQuery('.kopa-overlay').on('click', function(event) {
        event.preventDefault()
        jQuery('.left').removeClass('left');
        jQuery('.overlay-block').removeClass('overlay-block');
        jQuery('body').removeClass('ov-hidden');
    });

    jQuery('.kopa-close').on('click', function(event) {
        event.preventDefault()
        jQuery('.left').removeClass('left');
        jQuery('.overlay-block').removeClass('overlay-block');
        jQuery('body').removeClass('ov-hidden');
    });

    /* =========================================================
    3. Owl carousel
    ============================================================ */
    if (jQuery('.kopa-owl-widget').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/owl.carousel.js' ] ,
            complete: function() {
                jQuery('.kopa-owl-widget').each(function() {

                    // Control slider
                    var $this = jQuery(this);
                    var $owl_wrapper = $this.find('.owl-carousel');
                    var item = $owl_wrapper.data('slider-item');
                    var itemTablet = $owl_wrapper.data('item-tablet');
                    var auto = $owl_wrapper.data('slider-auto');
                    var navigation = $owl_wrapper.data('slider-navigation');
                    var pagination = $owl_wrapper.data('slider-pagination');

                    // Call slider
                    var owl = $this.find(".owl-content");

                    if (1 == pagination) {
                        pagination = true;
                    } else {
                        pagination = false;
                    }

                    if (1 == itemTablet) {
                        itemTablet = 1;
                    } else {
                        itemTablet = 2;
                    }

                    if (1 == auto) {
                        auto = true;
                    } else {
                        auto = false;
                    }

                    if (1 == navigation) {
                        navigation = true;
                    } else {
                        navigation = false;
                    }

                    owl.owlCarousel({
                        items: item,
                        itemsDesktop: [1000, 3],
                        itemsDesktopSmall: [992, 3],
                        itemsTablet: [767,itemTablet],
                        itemsMobile: [480, 1],
                        slideSpeed: 500,
                        autoPlay: auto,
                        navigation: navigation,
                        pagination: pagination,
                        stopOnHover: true,
                        navigationText: false,
                        addClassActive: true,
                        afterInit: function() {
                            var total = this.owl.owlItems.length;
                            jQuery(".owl-widget-12 .owl-carousel .owl-item.active:eq(1)").addClass('sp-selected');
                            $this.find('.total-slides').text(total);
                            jQuery('.current-slide').text('1');
                            if (jQuery('.owl-widget-1 .owl-wrapper .active').length > 3) {
                                jQuery('.owl-widget-1 .owl-wrapper .active:last,.owl-widget-1 .owl-wrapper .active:first').addClass('shadow');
                                jQuery('.owl-widget-1 .owl-wrapper .active:first .entry-item').css('border', 'none');
                            }

                        },
                        afterMove: function() {
                            var current = Number(this.owl.currentItem) + 1;

                            jQuery(".owl-widget-12 .owl-carousel .owl-item").removeClass('sp-selected');
                            jQuery(".owl-widget-12 .owl-carousel .owl-item.active:eq(1)").addClass('sp-selected');

                            jQuery('.current-slide').text(current);
                            jQuery('.owl-widget-1 .owl-wrapper .owl-item').removeClass('shadow');
                            if (jQuery('.owl-widget-1 .owl-wrapper .active').length > 3) {
                                jQuery('.owl-widget-1 .owl-wrapper .active:last,.owl-widget-1 .owl-wrapper .active:first').addClass('shadow');
                                jQuery('.owl-widget-1 .owl-wrapper .active:first .entry-item').css('border', 'none');
                            }
                        }
                    });

                    // Custom Navigation Events
                    $this.find(".next").on('click',function() {
                        owl.trigger('owl.next');
                    });

                    $this.find(".prev").on('click',function() {
                        owl.trigger('owl.prev');
                    });

                });
            }
        }]);
    };

    /* =========================================================
    4. Flex slider
    ============================================================ */

    if (jQuery('.kopa-flex-widget').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.flexslider.js' ],

            complete: function() {
                jQuery('.kopa-flex-widget').each(function() {
                    var $this = jQuery(this);
                    var flex = $this.find('.flexslider');

                    // Control
                    var direction = flex.data('slider-direction');
                    var auto = flex.data('slider-auto');
                    var speed = flex.data('slider-speed');
                    var controlNav = flex.data('slider-controlnav');
                    var directionNav = flex.data('slider-directionnav');

                    if (1 == auto) {
                        auto = true;
                    } else {
                        auto = false;
                    }

                    if (1 == controlNav) {
                        controlNav = true;
                    } else {
                        controlNav = false;
                    }

                    if (1 == directionNav) {
                        directionNav = true;
                    } else {
                        directionNav = false;
                    }

                    flex.flexslider({
                        animation: "slide",
                        direction: direction,
                        pauseOnHover: true,
                        slideshowSpeed: speed,
                        slideshow: auto,
                        controlNav: controlNav,
                        directionNav: directionNav
                    });

                    if (direction == 'horizontal') {
                        $this.addClass('directionnav-horizontal');
                    }
                    if (direction == 'vertical') {
                        $this.addClass('directionnav-vertical');
                    }

                });
            }
        }]);
    }

    /* =========================================================
    5. BxSlider
    ============================================================ */

    if (jQuery('.kopa-bx-widget').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.bxslider.js' ],
            complete: function() {
                jQuery('.kopa-bx-widget').each(function(){
                        var $this = jQuery(this);

                        var bxSlider = $this.find('.bxslider');

                        // Control
                        var bxControl = $this.find('.widget-content');
                        var mode = bxControl.data('slider-mode');
                        var auto = bxControl.data('slider-auto');
                        var speed = bxControl.data('slider-speed');

                        var navigation = bxControl.data('slider-navigation');
                        var pagination = bxControl.data('slider-pagination');

                        if (1 == auto) {
                            auto = true;
                        } else {
                            auto = false;
                        }

                        if (1 == navigation) {
                            navigation = true;
                        } else {
                            navigation = false;
                        }

                        if (1 == pagination) {
                            pagination = true;
                        } else {
                            pagination = false;
                        }

                        bxSlider.bxSlider({
                            mode: mode,
                            auto:auto,
                            controls:navigation,
                            pager:pagination,
                            pause:speed,
                            autoHover:true
                        });

                    });
            }
        }]);
    }

    /* =========================================================
    6. Slider pro
     ============================================================ */

    if (jQuery('.kopa-slider-pro-widget').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.sliderPro.js'],
            complete: function() {
                var slider_pro = jQuery('.slider-pro');
                slider_pro.each(function() {
                    var $this = jQuery(this);
                    var auto = $this.data('auto-play');
                    var arrows = $this.data('slider-arrows');
                    var buttons = $this.data('slider-buttons');
                    var width = $this.data('slider-width');
                    var orientation = $this.data('slider-orientation');
                    var thumbnailsPosition = $this.data('slider-thumbnails-position');

                    if (1 == auto) {
                        auto = true;
                    } else {
                        auto = false;
                    }

                    if (1 == arrows) {
                        arrows = true;
                    } else {
                        arrows = false;
                    }

                    if (1 == buttons) {
                        buttons = true;
                    } else {
                        buttons = false;
                    }

                    $this.sliderPro({
                        autoplay: auto,
                        width: width,
                        autoHeight: true,
                        aspectRatio: 1.5,
                        visibleSize: '100%',
                        arrows: arrows,
                        buttons: buttons,
                        slideDistance: 0,
                        thumbnailsPosition: thumbnailsPosition,
                        thumbnailPointer: true,
                        thumbnailWidth: 198,
                        thumbnailHeight: 100,
                        responsive: true,
                        orientation: orientation,
                        breakpoints: {
                            1240:{
                                thumbnailWidth: 130,
                                thumbnailHeight: 70,
                                width:500
                            },
                            1000:{
                                thumbnailWidth: 130,
                                thumbnailHeight: 70,
                                width:500
                            },
                            992: {
                                thumbnailsPosition: 'bottom',
                                width:'100%'
                            },
                            500: {
                                thumbnailsPosition: 'bottom',
                                width:'100%',
                                thumbnailWidth: 155,
                                thumbnailHeight: 100
                            }
                        }

                    });
                });
            }
        }]);
    }

    /* =========================================================
    7. Match Height
    ============================================================ */

    if (jQuery('.kopa-match-height').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.matchHeight.js' ],

            complete: function() {
                jQuery('.kopa-match-height').each(function() {
                    jQuery(this).find('.match-height-item').matchHeight({});
                });
            }
        }]);
    }



    /* =========================================================
    8. Fitvid
    ============================================================ */
    if (jQuery('.kopa-wrap-iframe').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/fitvids.js' ],
            complete: function() {
                jQuery('.kopa-wrap-iframe').fitVids();
            }
        }]);
    }


    /* =========================================================
    9. Flick
    ============================================================ */
    if (jQuery('.kopa-photo-flick-widget').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jflickrfeed.js', kopa_variable.url.template_directory_uri + 'js/imgliquid.js'],
            complete: function() {
                jQuery('.kopa-photo-flick-widget').each(function() {
                    var $this = jQuery(this);
                    var flickid = $this.data('id');
                    $this.find('.widget-content ul').jflickrfeed({
                        limit: 6,
                        qstrings: {
                            id: flickid
                        },
                        itemTemplate: '<li class="flickr-badge-image">' +
                            '<a target="blank" href="{{link}}" title="{{title}}" class="imgLiquid">' +
                            '<img src="{{image_m}}" alt="{{title}}"  />' + '</a>' + '</li>'
                    }, function() {
                        jQuery('.kopa-photo-flick-widget .imgLiquid').imgLiquid();
                    });
                });

            }
        }]);
    }

    /* =========================================================
    10. Bootstrap collapse
    ============================================================ */

    var panel_titles = jQuery('.panel-title a');
    panel_titles.addClass("collapsed");
    jQuery('.panel-heading.active').find(panel_titles).removeClass("collapsed");
    if (panel_titles.length) {
        panel_titles.on('click', function() {
            var parent = jQuery(this).attr('data-parent');
            //ACCORDION
            if (undefined !== parent) {
                var obj_actived = jQuery(parent).find('.panel-heading.active');
                obj_actived.removeClass('active');
                obj_actived.find('span.b-collapse').html('+');
                if (jQuery(this).hasClass('collapsed')) {
                    jQuery(this).parents('.panel-heading').addClass('active');
                    jQuery(this).find('span.b-collapse').html('-');
                } else {
                    jQuery(this).parents('.panel-heading').removeClass('active');
                    jQuery(this).find('span.b-collapse').html('+');
                }
            } else {
                //TOGGLE
                var parent = jQuery(this).parents('.panel-heading');
                if (parent.hasClass('active')) {
                    parent.removeClass('active');
                    jQuery(this).find('span.b-collapse').html('+');
                } else {
                    parent.addClass('active');
                    jQuery(this).find('span.b-collapse').html('-');
                }
            }
        });
    }

    // Toggle

    jQuery('.toggle .collapse').collapse({
        toggle: false
    });

    /* =========================================================
    12. Validate Form
    ============================================================ */
    /*--- comment form ---*/

    if (jQuery('#comments-form').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.form.js',kopa_variable.url.template_directory_uri + 'js/jquery.validate.js'],
            complete: function() {
                jQuery('#comments-form').validate({
                    // Add requirements to each of the fields
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        author: {
                            required: true,
                            minlength: 10
                        },
                        comment : {
                            required: true,
                            minlength: 10
                        }
                    },
                    // Specify what error messages to display
                    // when the user does something horrid
                    messages: {
                        author: {
                            required: kopa_variable.validate.name.REQUIRED,
                            minlength: jQuery.format(kopa_variable.validate.name.minlength)
                        },
                        email: {
                            required: kopa_variable.validate.email.REQUIRED,
                            email: kopa_variable.validate.email.EMAIL
                        },
                        comment: {
                            required: kopa_variable.validate.message.REQUIRED,
                            minlength: jQuery.format(kopa_variable.validate.message.minlength)
                        }
                    }
                });
            }
        }]);
    }

    /* =========================================================
    13. Behavior
    ============================================================ */


    // Style link hover
    jQuery('.share-wrap').on('mouseenter',function(){
        var $this = jQuery(this);
        var shareWrapOffset = jQuery(this).offset().left;
        var wraplink = jQuery(this).find('.wrap-link').width();
        var wrapperWidth = jQuery('.wrapper').width();
        var wrapperOffset = ( jQuery(window).width() - wrapperWidth ) / 2;
        var newOffset = Number( wrapperWidth ) + Number( wrapperOffset );
        var minus = Number( newOffset ) - Number( shareWrapOffset );

        if( minus < wraplink ){
            jQuery(this).find('.wrap-link').addClass('wrap-link-right');
        }

    });

    jQuery(window).resize(function(){
        jQuery('.wrap-link').removeClass('wrap-link-right');
    });

  

    // Style widget title style 2
    if ('.widget-title.style-2') {
        jQuery('.widget-title.style-2').each(function() {
            var height = (jQuery(this).height() / 2);
            var negativeheight = height * -1;
            jQuery(this).css('margin-top', negativeheight).parents('.widget').css('margin-top', height);
        });
    }

    // Toggle search box
    jQuery('.toggle-search-box').on('click', function(event) {
        event.preventDefault();

        var $this = jQuery(this);
        $this.find('i').toggleClass('fa-close');
        $this.next('.search-form').toggleClass('block');
    });

    // Toggle share-1
    jQuery('.toggle-share-1').on('click', function(event) {
        event.preventDefault();
        var test = jQuery(this).next('ul');

        if (test.hasClass('block')) {
            jQuery('.share-1').removeClass('block');
        } else {
            jQuery('.share-1').removeClass('block');
            test.addClass('block');
        }
    });

   

    // Toggle social
    jQuery('.toggle-social').on('click', function(event) {
        event.preventDefault();
        var check = jQuery(this).next('.top-social');

        if (check.hasClass('block')) {
            jQuery('.top-social').removeClass('block');
        } else {
            jQuery('.top-social').removeClass('block');
            check.addClass('block');
        }
    });

    // Style padding widget header has view-topic
    if( jQuery('.view-topic').length ){
        jQuery('.widget-header').each(function(){
            var setpd = jQuery(this);
            var getw = setpd.find('.view-topic').width();
            var getwnumber = Number(getw) + 5 ;

            setpd.css('padding-right',getwnumber).css('padding-left',getwnumber);
        });
    }

    jQuery(window).on('resize',function(){
        if( jQuery('.view-topic').length ){
            jQuery('.widget-header').each(function(){
                var setpd = jQuery(this);
                var getw = setpd.find('.view-topic').width();
                var getwnumber = Number(getw) + 5 ;

                setpd.css('padding-right',getwnumber).css('padding-left',getwnumber);
            });
        }
    });

    // Style entry meta
    jQuery('.entry-meta').each(function(){
        jQuery(this).children().first().css("border", 0);
    });


    //Pagination
    jQuery('.kopa-pagination').find('.prev').removeClass('prev').parent().addClass('prev');
    jQuery('.kopa-pagination').find('.next').removeClass('next').parent().addClass('next');

    jQuery('.woocommerce-pagination').find('.prev').text('next').removeClass('prev').parent().addClass('prev');
    jQuery('.woocommerce-pagination').find('.next').text('prev').removeClass('next').parent().addClass('next');

    /* =========================================================
    14. Sticky sidebar
    ============================================================ */

    if (jQuery('.sidebar').length) {
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/sticky-kit.js',kopa_variable.url.template_directory_uri + 'js/jquery.debouncedresize.js'],
            complete: function() {
                var wWidth = jQuery(window).width();
                var key;
                if( wWidth >= 993 ){
                    jQuery(".sidebar").stickit();
                    key = 1;
                }else{
                    key = 2;
                }

                jQuery(window).bind('debouncedresize', function() {
                    wWidth = jQuery(window).width();

                    if( wWidth >= 993 && key == 2 ){
                        jQuery(".sidebar").stickit();
                        key = 1;

                    }if( wWidth < 992 && key == 1 ){
                        jQuery(".sidebar").stickit('destroy');
                        key = 2;
                    }
                });
            }
        }]);
    }

    /* =========================================================
    15. Video bg
    ============================================================ */

    if (jQuery('.has-parallax').length) {
        Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/parallax.js'],
            complete: function() {
                jQuery('.owl-widget-3').addClass('has-parallax');
               jQuery('.has-parallax').parallax("50%", 0.1);
            }
        }]);
    }

    if (jQuery('.bg-video').length) {
        Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/jquery.backgroundvideo.js'],
            complete: function () {
                jQuery('.bg-video').each(function(){
                    var $this = jQuery(this);
                    var video_id = $this.data('video-id');
                    var video_path = $this.data('video-path');
                    var video_name = $this.data('video-name');
                    var video_type = $this.data('video-type');
                    var video_width = $this.data('video-width');
                    var video_height = $this.data('video-height');
                    var $this = jQuery(this);
                    var videobg = new jQuery.backgroundVideo($this, {
                        videoid: video_id,
                        "align": "centerXY",
                        "width": video_width,
                        "height": video_height,
                        "path": video_path,
                        "filename": video_name,
                        "types": [video_type]
                    });
                });
            }
        }]);
    };

    /* =========================================================
    17. Stick menu
    ============================================================ */

    if( jQuery('.nav-fix').length){
        Modernizr.load([{
            load: [ kopa_variable.url.template_directory_uri + 'js/jquery.sticky-menu.js'],
            complete: function() {
                var TopHeader = jQuery('.middle-header.nav-fix');
                var BottomHeader = jQuery('.bottom-header.nav-fix');
                var wWidth = jQuery(window).width();
                var anchorOne = 1;
                var anchorTwo = 1;

                if( wWidth >= 993 && anchorOne == 1 ){
                    BottomHeader.sticky({ topSpacing: 0 });
                    anchorOne ++;
                }if( wWidth < 992 && anchorTwo == 1 ){
                    TopHeader.sticky({ topSpacing: 0 });
                    anchorTwo ++;
                }

                jQuery(window).on('resize', function() {
                    wWidth = jQuery(window).width();

                    if( wWidth >= 993 && anchorOne == 1 ){
                        BottomHeader.sticky({ topSpacing: 0 });
                        anchorOne ++;

                    }if( wWidth < 992 && anchorTwo == 1 ){
                        TopHeader.sticky({ topSpacing: 0 });
                        anchorTwo ++;

                    }if( wWidth >= 993 ){
                        BottomHeader.parent('#sticky-wrapper').show();
                        TopHeader.parent('#sticky-wrapper').hide();

                    }if( wWidth < 992 ){
                        BottomHeader.parent('#sticky-wrapper').hide();
                        TopHeader.parent('#sticky-wrapper').show();
                    }
                });

            }
        }]);
    }

});


jQuery(window).load(function() {
    setTimeout(function() {
        jQuery('*').removeClass('loader');

    }, 500);

});






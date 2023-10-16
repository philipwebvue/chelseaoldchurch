
(function($) {
    let current_menu = 'main-menu';
    let menu_start_page = '';

    $(function() {
        var current_menu_item = $(document).find('#offcanvas-menu-container .current-menu-item');
        var menu_start_page = current_menu_item.closest('.section-menu').prop('id');
        if(menu_start_page){
            animateSubMenuOpenMenu(menu_start_page);
        }
    });
    // here $ would be point to jQuery object

    $(function() {
        $('.slick-banner-slider').slick({
            'asNavFor':$('.slick-banner-text')
        });
        $('.slick-banner-text').slick({
            'asNavFor':$('.slick-banner-slider')
        });

        $('.slick-slider').slick({
            "slidesToShow": 3,
            "slidesToScroll": 1,
            "arrows":true,
            "dots":false,
            "autoplay":false,
            "cssEase":"ease",
            "responsive":[
                {
                    "breakpoint": 1280,
                    "settings":{
                        "slidesToShow": 3,
                    }
                },
                {
                    "breakpoint": 1024,
                    "settings":{
                        "slidesToShow": 2,
                        "arrows": false
                    }
                },
                {
                    "breakpoint": 768,
                    "settings":{
                        "slidesToShow": 1,
                        "arrows": false
                    }
                }
            ],
        });
    });

    var windowsize = $(window).width();
    var lastWidth = $(window).width();


    $(function() {
        if(windowsize < 1280){
            initialStateShowHide()
        }

        $(window).resize(function () {
            lastWidth = windowsize;
            windowsize = $(window).width();
            if((windowsize < 1280 && lastWidth >1280) || (windowsize > 1280 && lastWidth < 1280) ){
                initialStateShowHide()
            }

        });
    })

    function initialStateShowHide(){
        console.log(windowsize);
        //if the window is greater than 440px wide then turn on jScrollPane..
        $(document).find('.show-hide-text').each(function () {

            $(this).find('span').each(function () {
                if ($(this).hasClass('hidden')) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            })
            $(this).find('i').toggleClass('fa-rotate-180');
        })

        $(document).find('.toggle-show-hide').toggleClass('h-0 invisible py-0');
    }

    $(document).on('click','.show-hide-text', function(e){

        $(document).find('.show-hide-text').each(function(){
            $(this).find('span').each(function(){
                if($(this).hasClass('hidden')){
                    $(this).removeClass('hidden');
                }else{
                    $(this).addClass('hidden');
                }
            })
            $(this).find('i').toggleClass('fa-rotate-180');
        })

        $(document).find('.toggle-show-hide').toggleClass('h-0 invisible py-0');
    });

    $(document).on('click', '#menu-button',function(e){
        animateOpenMenu();
    })

    $(document).on('click', '.close-menu',function(e){
        animateCloseMenu();
    })

    /*$(document).on('click','.return-main-menu',function(e){
        e.stopPropagation();
        e.preventDefault();
        $id=$(this).data('id');
        animateSubMenuOpenMenu($id);
    });

    $(document).on('click','.primary_menu_has_children a',function(e){
        e.stopPropagation();
        e.preventDefault();
        $id=$(this).closest('.primary_menu_has_children').data('id');
        animateSubMenuOpenMenu($id);
    });*/

    $(document).on('click','#offcanvas-menu-container .primary-menu-container > ul > .menu-item-has-children > a > i',function(e) {
        e.preventDefault();

        $(this).parent('a').siblings('.sub-menu').addClass('active');

        var parentLink = $(this).parent('a').attr('href');
        var parentText = $(this).parent('a').text();
        $(this).parent('a').siblings('.sub-menu').find('.js-parent-link span').text(parentText);
        $(this).parent('a').siblings('.sub-menu').find('.js-parent-link').attr('href', parentLink);
    });

    $(document).on('click','#offcanvas-menu-container .primary-menu-container > ul ul .menu-item-has-children > a > i',function(e) {
        e.preventDefault();
        if($(this).parent('a').siblings('.sub-menu').hasClass('active')){
            $(this).parent('a').siblings('.sub-menu').removeClass('active');
            $(this).parent('a').removeClass('is-active');
        }
        else{
            $(this).parent('a').parent('li').parent('ul').find('a.is-active').removeClass('is-active');
            $(this).parent('a').parent('li').parent('ul').find('.sub-menu.active').removeClass('active');

            $(this).parent('a').siblings('.sub-menu').addClass('active');
            $(this).parent('a').addClass('is-active');
            var parentLink = $(this).parent('a').attr('href');
            var parentText = $(this).parent('a').text();
            $(this).parent('a').siblings('.sub-menu').find('.js-parent-link span').text(parentText);
            $(this).parent('a').siblings('.sub-menu').find('.js-parent-link').attr('href', parentLink);
        }        
    });

    $(document).on('click','.js-mob-menu-back',function(e) {
        e.preventDefault();
        $(this).parent().parent().removeClass('active');
    });
    $(document).on('click','.staff-filter',function(e){
        e.preventDefault();
        filter_list_type($(this),'staff')
    });
    $(document).on('click','.monument-filter',function(e){
        e.preventDefault();
        filter_list_type($(this),'monument');
    });

    function filter_list_type($current,$type){
        $('.card-'+$type).hide();
        var catg = $current.data('slug');
        $current.parents('.taxonomy-list').find('.'+$type+'-filter.active').removeClass('active');
        $current.addClass('active');
        if(catg!==".*"){
            $('.card-'+$type).filter(catg).show(200);
        }
        else{
            $('.card-'+$type).show(200);
        }
    }

    $(document).on('click','.menu-open',function(e){
        e.stopPropagation();
        e.preventDefault();
        $(this).find('i').toggleClass('fa-plus');
        $(this).find('i').toggleClass('fa-minus');
        $(this).closest('li').toggleClass('active');
        var ul =$(this).closest('li').find('ul:first');
        ul.animate({
            height:['toggle',"swing"]
        },'fast');
    })

    function animateSubMenuOpenMenu($id){
        $('#'+current_menu).animate({
            left: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'fast');

        $('#'+$id).delay( 300 ).animate({
            left: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'slow');

        current_menu = $id;
    }

    function animateOpenMenu(){
        $('#offcanvas-menu-container').animate({
            left: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'slow');
    }
    function animateCloseMenu(){
        $('#offcanvas-menu-container').animate({
            left: [ '-100%' , "swing" ],
            opacity: "toggle"
        }, 'slow');
    }


    $(document).on('click','.show-hide-toggle', function(e){
        $parent = $(this).closest('.show-hide-toggle-container');
        $parent.find('.show-hide-toggle-area').toggleClass('hidden');
        $(this).find('i').toggleClass('fa-plus');
        $(this).find('i').toggleClass('fa-minus');
        $(this).find('i').toggleClass('fa-rotate-180');

    })
    
    $(document).on('click','.faq-question',function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('expand')){
            $(this).parents('.faq-block').find('.faq-accordion.expand .faq-answer').css('max-height',0);
            $(this).parents('.faq-block').find('.faq-accordion.expand').removeClass('expand');
            $(this).parents('.faq-accordion').addClass('expand');
            $(this).next(".faq-answer").css('max-height',$(this).next(".faq-answer").get(0).scrollHeight + 'px');
        }
        else{
            $(this).parent().removeClass('expand');
            $(this).next(".faq-answer").css('max-height',0);
        }
    });

    $(document).on('click','.close-search-modal', function(e){
        toggle_search_modal()
    })
    $(document).on('click','.search-modal', function(e){
        toggle_search_modal()
    })

    function toggle_search_modal(){
        //$(document).find('.search-modal-area').toggleClass('hidden');
        $(document).find('.search-modal-area').animate({
            opacity: "toggle"
        }, 'fast');
    }


    $(function() {
        let height = $(document).find('#post-content .column-two').height();
        if(typeof height !== "undefined" && height > 0){
            $(document).find('#post-content').css('min-height', height+'px');
        }

        $('.js-select-2-single').select2();
    });

    $(window).on('load',function(){
        $('.open-m-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-staff",
            fixedContentPos: true,
            callbacks: {    
                buildControls: function() {
                  // re-appends controls inside the main container
                  this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });
        
        $('.staffhead-m-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-staff",
            fixedContentPos: true,
            callbacks: {    
                buildControls: function() {
                  // re-appends controls inside the main container
                  this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });

        $('.staff-more-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-staff",
            fixedContentPos: true,
            callbacks: {    
                buildControls: function() {
                  // re-appends controls inside the main container
                  this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });

        $('.open-mm-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-monument",
            fixedContentPos: true,
            callbacks: {
                buildControls: function() {
                    // re-appends controls inside the main container
                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });

        $('.monumenthead-m-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-monument",
            fixedContentPos: true,
            callbacks: {
                buildControls: function() {
                    // re-appends controls inside the main container
                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });

        $('.monument-more-popup').magnificPopup({
            type:'inline',
            gallery:{
                enabled:true
            },
            closeBtnInside: true,
            mainClass: "magnific-popup-monument",
            fixedContentPos: true,
            callbacks: {
                buildControls: function() {
                    // re-appends controls inside the main container
                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });

        $('.image-gallery-large').magnificPopup({
            type:'image',
            gallery:{
                enabled:true,
                tCounter: '',
            },
            closeBtnInside: true,
            fixedContentPos: true,
            mainClass: "magnific-popup-image-gallery",            
            callbacks: {    
                buildControls: function() {
                  // re-appends controls inside the main container
                  this.content.find('div.mfp-bottom-bar').prepend(this.arrowLeft);
                  this.content.find('div.mfp-bottom-bar').append(this.arrowRight);
                }
            }
        });

        $(document).on('click','.primary-navigation .dropdown-toggle',function(e){
            e.preventDefault();
            if(!$(this).hasClass('fc')){                
                $(this).parents('.primary-navigation').find('.dropdown-toggle.fc').removeClass('fc');
                $(this).parents('.primary-navigation').find('.dropdown-menu.toggled').removeClass('toggled');
                $(this).addClass('fc');
                $(this).next('.dropdown-menu').addClass('toggled');
            }
            else{
                $(this).removeClass('fc');
                $(this).next('.dropdown-menu').removeClass('toggled')
            }
        });
        $(document).on('click','.close-megamenu',function(e){
            e.preventDefault();
            $('.primary-navigation .dropdown-toggle.fc').removeClass('fc');
            $('.dropdown-menu.toggled').removeClass('toggled');
        });

        var stickyOffset = 100;
        $(window).on("scroll",function(){
            var sticky = $('#masthead'),
                scroll = $(window).scrollTop();
                
            if (scroll >= stickyOffset){
                sticky.addClass('fixed');
                sticky.removeClass('absolute');
                $('.site-header').addClass('is-sticky');
                $('body').addClass('has-sticky-header');
                if($('body').hasClass('home')){
                    $('.site-header').removeClass('xl:flex-col');
                    $('.topbar').addClass('h-0 overflow-hidden !p-0');
                }
            }
            else{
                sticky.addClass('absolute');
                sticky.removeClass('fixed');
                $('.site-header').removeClass('is-sticky');
                $('body').removeClass('has-sticky-header');
                if($('body').hasClass('home')){
                    $('.site-header').addClass('xl:flex-col');
                    $('.topbar').removeClass('h-0 overflow-hidden !p-0');
                }
            }
        });
    });
})(jQuery);
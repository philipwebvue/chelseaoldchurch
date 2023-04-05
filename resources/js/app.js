
(function($) {
    let current_menu = 'main-menu';
    let menu_start_page = '';

    $(document).ready(function() {
        var current_menu_item = $(document).find('#offcanvas-menu-container .current-menu-item');
        var menu_start_page = current_menu_item.closest('.section-menu').prop('id');
        if(menu_start_page){
            animateSubMenuOpenMenu(menu_start_page);
        }
    });
    // here $ would be point to jQuery object

    $(document).ready(function() {
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


    $(document).ready(function() {
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
    })

    $(document).on('click', '#menu-button',function(e){
        animateOpenMenu();
    })

    $(document).on('click', '.close-menu',function(e){
        animateCloseMenu();
    })

    $(document).on('click','.return-main-menu',function(e){
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
    });

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
            right: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'fast');

        $('#'+$id).delay( 300 ).animate({
            right: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'slow');

        current_menu = $id;
    }

    function animateOpenMenu(){
        $('#offcanvas-menu-container').animate({
            right: [ 0 , "swing" ],
            opacity: "toggle"
        }, 'slow');
    }
    function animateCloseMenu(){
        $('#offcanvas-menu-container').animate({
            right: [ '-100%' , "swing" ],
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


    $(document).ready(function(){
        let height = $(document).find('#post-content .column-two').height();
        if(typeof height !== "undefined" && height > 0){
            $(document).find('#post-content').css('min-height', height+'px');
        }

        $('.js-select-2-single').select2();
    })


})(jQuery);
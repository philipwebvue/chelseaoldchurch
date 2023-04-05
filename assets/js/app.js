/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

(function ($) {
  var current_menu = 'main-menu';
  var menu_start_page = '';
  $(document).ready(function () {
    var current_menu_item = $(document).find('#offcanvas-menu-container .current-menu-item');
    var menu_start_page = current_menu_item.closest('.section-menu').prop('id');
    if (menu_start_page) {
      animateSubMenuOpenMenu(menu_start_page);
    }
  });
  // here $ would be point to jQuery object

  $(document).ready(function () {
    $('.slick-banner-slider').slick({
      'asNavFor': $('.slick-banner-text')
    });
    $('.slick-banner-text').slick({
      'asNavFor': $('.slick-banner-slider')
    });
    $('.slick-slider').slick({
      "slidesToShow": 3,
      "slidesToScroll": 1,
      "arrows": true,
      "dots": false,
      "autoplay": false,
      "cssEase": "ease",
      "responsive": [{
        "breakpoint": 1280,
        "settings": {
          "slidesToShow": 3
        }
      }, {
        "breakpoint": 1024,
        "settings": {
          "slidesToShow": 2,
          "arrows": false
        }
      }, {
        "breakpoint": 768,
        "settings": {
          "slidesToShow": 1,
          "arrows": false
        }
      }]
    });
  });
  var windowsize = $(window).width();
  var lastWidth = $(window).width();
  $(document).ready(function () {
    if (windowsize < 1280) {
      initialStateShowHide();
    }
    $(window).resize(function () {
      lastWidth = windowsize;
      windowsize = $(window).width();
      if (windowsize < 1280 && lastWidth > 1280 || windowsize > 1280 && lastWidth < 1280) {
        initialStateShowHide();
      }
    });
  });
  function initialStateShowHide() {
    console.log(windowsize);
    //if the window is greater than 440px wide then turn on jScrollPane..
    $(document).find('.show-hide-text').each(function () {
      $(this).find('span').each(function () {
        if ($(this).hasClass('hidden')) {
          $(this).removeClass('hidden');
        } else {
          $(this).addClass('hidden');
        }
      });
      $(this).find('i').toggleClass('fa-rotate-180');
    });
    $(document).find('.toggle-show-hide').toggleClass('h-0 invisible py-0');
  }
  $(document).on('click', '.show-hide-text', function (e) {
    $(document).find('.show-hide-text').each(function () {
      $(this).find('span').each(function () {
        if ($(this).hasClass('hidden')) {
          $(this).removeClass('hidden');
        } else {
          $(this).addClass('hidden');
        }
      });
      $(this).find('i').toggleClass('fa-rotate-180');
    });
    $(document).find('.toggle-show-hide').toggleClass('h-0 invisible py-0');
  });
  $(document).on('click', '#menu-button', function (e) {
    animateOpenMenu();
  });
  $(document).on('click', '.close-menu', function (e) {
    animateCloseMenu();
  });
  $(document).on('click', '.return-main-menu', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $id = $(this).data('id');
    animateSubMenuOpenMenu($id);
  });
  $(document).on('click', '.primary_menu_has_children a', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $id = $(this).closest('.primary_menu_has_children').data('id');
    animateSubMenuOpenMenu($id);
  });
  $(document).on('click', '.menu-open', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).find('i').toggleClass('fa-plus');
    $(this).find('i').toggleClass('fa-minus');
    $(this).closest('li').toggleClass('active');
    var ul = $(this).closest('li').find('ul:first');
    ul.animate({
      height: ['toggle', "swing"]
    }, 'fast');
  });
  function animateSubMenuOpenMenu($id) {
    $('#' + current_menu).animate({
      right: [0, "swing"],
      opacity: "toggle"
    }, 'fast');
    $('#' + $id).delay(300).animate({
      right: [0, "swing"],
      opacity: "toggle"
    }, 'slow');
    current_menu = $id;
  }
  function animateOpenMenu() {
    $('#offcanvas-menu-container').animate({
      right: [0, "swing"],
      opacity: "toggle"
    }, 'slow');
  }
  function animateCloseMenu() {
    $('#offcanvas-menu-container').animate({
      right: ['-100%', "swing"],
      opacity: "toggle"
    }, 'slow');
  }
  $(document).on('click', '.show-hide-toggle', function (e) {
    $parent = $(this).closest('.show-hide-toggle-container');
    $parent.find('.show-hide-toggle-area').toggleClass('hidden');
    $(this).find('i').toggleClass('fa-plus');
    $(this).find('i').toggleClass('fa-minus');
    $(this).find('i').toggleClass('fa-rotate-180');
  });
  $(document).on('click', '.close-search-modal', function (e) {
    toggle_search_modal();
  });
  $(document).on('click', '.search-modal', function (e) {
    toggle_search_modal();
  });
  function toggle_search_modal() {
    //$(document).find('.search-modal-area').toggleClass('hidden');
    $(document).find('.search-modal-area').animate({
      opacity: "toggle"
    }, 'fast');
  }
  $(document).ready(function () {
    var height = $(document).find('#post-content .column-two').height();
    if (typeof height !== "undefined" && height > 0) {
      $(document).find('#post-content').css('min-height', height + 'px');
    }
    $('.js-select-2-single').select2();
  });
})(jQuery);

/***/ }),

/***/ "./resources/css/theme.css":
/*!*********************************!*\
  !*** ./resources/css/theme.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/app": 0,
/******/ 			"assets/css/theme": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkstarter_theme"] = self["webpackChunkstarter_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/theme"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/theme"], () => (__webpack_require__("./resources/css/theme.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
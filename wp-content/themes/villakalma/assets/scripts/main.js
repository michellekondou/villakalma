/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'gallery': {
      init: function() {
        // JavaScript to be fired on the gallery page
        // init Packery
        var $grid = $('.grid').packery({
          // options
          itemSelector: '.grid-item',
          gutter: 10,
          percentPosition: true
        });
        // layout Packery after each image loads
        $grid.imagesLoaded().progress( function( instance, image ) {

          $(image.img).addClass('loaded');
          console.log(image);
          $grid.packery();
        });

        //----Start PhotoSwipe
        var PhotoSwipe = window.PhotoSwipe,
        PhotoSwipeUI_Default = window.PhotoSwipeUI_Default;

        $('body').on('click', 'a[data-size]', function(e) {
          
          if( !PhotoSwipe || !PhotoSwipeUI_Default ) {
            return;
          }

          e.preventDefault();
          openPhotoSwipe( this );

        });

        var parseThumbnailElements = function(gallery, el) {
          var 
            elements = $(gallery).find('a[data-size]').has('img'),
            galleryItems = [],
            index;

          elements.each(function(i) {
            var 
              $el = $(this),
              size = $el.data('size').split('x'),
              caption;

            if( $el.next().is('.wp-caption-text') ) {
              // image with caption
              caption = $el.next().text();
            } else if( $el.parent().next().is('.wp-caption-text') ) {
              // gallery icon with caption
              caption = $el.parent().next().text();
            } else {
              caption = $el.attr('title');
            }

            galleryItems.push({
              src: $el.attr('href'),
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10),
              title: caption,
              msrc: $el.find('img').attr('src'),
              el: $el
            });

            if( el === $el.get(0) ) {
              index = i;
            }

          });

        return [galleryItems, parseInt(index, 10)];
      }; // parseThumbnailElements

      var openPhotoSwipe = function( element, disableAnimation ) {
        var 
          pswpElement = $('.pswp').get(0),
          galleryElement = $(element).parents('.photoswipe, .hentry, .main, body').first(),
          gallery,
          options,
          items, 
          index;

          items = parseThumbnailElements(galleryElement, element);
          index = items[1];
          items = items[0];

        options = {
          index: index,
          getThumbBoundsFn: function(index) {
            var image = items[index].el.find('img'),
            offset = image.offset();
            return {x:offset.left, y:offset.top, w:image.width()};
          },
          showHideOpacity: true,
          history: false,
          captionEl: true,
          // showHideOpacity: false,
          // showAnimationDuration: 150,
          // hideAnimationDuration: 150,
          bgOpacity: 0.8,
          shareEl: true,
          // spacing: 0.12,
          // allowPanToNext: true,
          // maxSpreadZoom: 2,
          // loop: 1,
          pinchToClose: true,
          closeOnScroll: true,
          // closeOnVerticalDrag: true,
          escKey: true,
          arrowKeys: true,
          zoomEl: false

        };

        if(disableAnimation) {
          options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
      };

      //----End PhotoSwipe
      }
    },
    'accommodation': {
      init: function() {

        //----Start PhotoSwipe
        var PhotoSwipe = window.PhotoSwipe,
        PhotoSwipeUI_Default = window.PhotoSwipeUI_Default;

        $('#photoswipe-btn').on('click', function(e) {
          
          if( !PhotoSwipe || !PhotoSwipeUI_Default ) {
            return;
          }

          e.preventDefault();
          openPhotoSwipe( this );

        });

        var parseThumbnailElements = function(gallery, el) {
          var 
            elements = $(gallery).find('a[data-size]').has('img'),
            galleryItems = [],
            index;

          elements.each(function(i) {
            var 
              $el = $(this),
              size = $el.data('size').split('x'),
              caption;

            if( $el.next().is('.wp-caption-text') ) {
              // image with caption
              caption = $el.next().text();
            } else if( $el.parent().next().is('.wp-caption-text') ) {
              // gallery icon with caption
              caption = $el.parent().next().text();
            } else {
              caption = $el.attr('title');
            }

            galleryItems.push({
              src: $el.attr('href'),
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10),
              title: caption,
              msrc: $el.find('img').attr('src'),
              el: $el
            });

            if( el === $el.get(0) ) {
              index = i;
            }

          });

        return [galleryItems, parseInt(index, 10)];
      }; // parseThumbnailElements

      var openPhotoSwipe = function( element, disableAnimation ) {
        var 
          pswpElement = $('.pswp').get(0),
          galleryElement = $(element).parents('.photoswipe, .hentry, .main, body').first(),
          gallery,
          options,
          items, 
          index;

          items = parseThumbnailElements(galleryElement, element);
          index = items[1];
          items = items[0];

        options = {
          index: index,
          getThumbBoundsFn: function(index) {
            var image = items[index].el.find('img'),
            offset = image.offset();
            return {x:offset.left, y:offset.top, w:image.width()};
          },
          showHideOpacity: true,
          history: false,
          captionEl: true,
          // showHideOpacity: false,
          // showAnimationDuration: 150,
          // hideAnimationDuration: 150,
          bgOpacity: 0.8,
          shareEl: true,
          // spacing: 0.12,
          // allowPanToNext: true,
          // maxSpreadZoom: 2,
          // loop: 1,
          pinchToClose: true,
          closeOnScroll: true,
          // closeOnVerticalDrag: true,
          escKey: true,
          arrowKeys: true,
          zoomEl: false

        };

        if(disableAnimation) {
          options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
      };
      } //end init function
    } //end accommodation object
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);  
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');


      $('#nav-icon').click(function(){
        $(this).toggleClass('open');
        $('#nav-overlay').toggleClass('open');
        $('.navbar-nav').toggleClass('open');
      }); 

      $('#collapseContent').on('show.bs.collapse', function () {
        $('.arrow-down').toggleClass('up');
      });

      $('#collapseContent').on('hidden.bs.collapse', function () {
        $('.arrow-down').toggleClass('up');
      });

      //flickity
      $('.js .gallery-wide').flickity({
         // options
        cellAlign: 'left',
        selectedAttraction: 0.23,
        friction: 1,
        wrapAround: true,
        imagesLoaded: true,
        resize: true,
        touchVerticalScroll: true,
        setGallerySize: true,
        lazyLoad: true,
        autoPlay: 5000
      });

      //imagesloaded
      var $container = $('.image-container');

      $container.imagesLoaded()
        .always( function( instance ) {
          console.log('all images loaded');
        })
        .done( function( instance ) {
          var $item = $('.image-container img');
          //$item.removeClass('preload');
          $item.addClass('loaded');
          $('.main-image').css('min-height', 'auto');
          console.log('all images successfully loaded');
        })
        .fail( function() {
          console.log('all images loaded, at least one is broken');
        })
        .progress( function( instance, image ) {
          var $item = $( image.img ).parent();
          $item.removeClass('is-loading');
          $('.loader').addClass('none');
          if ( !image.isLoaded ) {
            $item.addClass('is-broken');
          }
          var result = image.isLoaded ? 'loaded' : 'broken';
          console.log( 'image is ' + result + ' for ' + image.img.src );
          //console.log( 'image is ' + result + ' for ' + image.img.src );
      });

    }//end events
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

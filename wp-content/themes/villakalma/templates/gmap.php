<style type="text/css">

.acf-map {
  width: 100%;
  height: 642px;
  /*border: #ccc solid 1px;*/
/*  margin: 20px 0;*/
}

@media (min-width: 0) {
  .acf-map {
    height: 276px;
  }
}
@media (min-width: 570px) {
  .acf-map {
    height: 350px;
  }
}
@media (min-width: 720px) {
  .acf-map {
    height: 442px;
  }
}
@media (min-width: 940px) {
  .acf-map {
    height: 577px;
  }
}
@media (min-width: 1140px) {
  .acf-map {
    height: 642px;
  }
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

.gmnoprint img {
  width: 30px;
  height: 37px;
  background-size: 100%;
 /* display: none !important;*/
}
.gmnoprint.gm-style-cc, .gmnoprint .gm-style-cc {
  display: none !important;
}

/* white background and box outline */
.gm-style > div:first-child > div + div > div:last-child > div > div:first-child > div
{
    background-color: #ffffff !important;
}
.gm-style > div:first-child > div + div > div:last-child > div > div:first-child > div:nth-child(1n)
{
border-width: 0!important;
}
.gm-style > div:first-child > div + div > div:last-child > div > div:first-child > div:nth-child(3n) > div
{
   display: none;
}

#gm_content {
  position: relative;
  max-width: 320px;
  padding: 15px; 
}  

#gm_content, #gm_content h4 {
  color: #6D6E70;
  font-size: 16px;
  line-height: 1.2;
}
#gm_content p {
  margin-bottom: 0!important;
  font-size: 14px;
  line-height: 1.2;
}

#gm_content .address {
  margin-bottom: 15px!important;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpY4cPQ1A9HADAoOUjjmDwlhvqG7fDfkY"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {
  
  // var
  var $markers = $el.find('.marker');
  
  
  // vars
  var args = {
    scrollwheel: false,
    zoom    : 2,
    center: new google.maps.LatLng(0, 0),
    mapTypeId : google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    overviewMapControl: false,
    minZoom: 2, 
    maxZoom: 16
    //zoomControl: false,
  };

  // Styles for map 
  var styles = [
  {
      "featureType": "administrative",
      elementType: "geometry.fill",
      stylers: [
          { visibility: "off" },
      ]
  },
  {
      featureType: "administrative",
      elementType: "geometry",
      stylers: [
          { visibility: "off" },
      ]
  },
  {
    featureType: "administrative",
    elementType: "geometry.stroke",
    stylers: [
        { visibility: "off" },
    ]
  },
  {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [
          {
              "color": "#f2f2f2"
          }
      ]
  },
  {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [
          {
              "visibility": "off"
          }
      ]
  },
  {
      "featureType": "road",
      "elementType": "all",
      "stylers": [
          {
              "saturation": -100
          },
          {
              "lightness": 45
          }
      ]
  },
  {
      "featureType": "road.highway",
      "elementType": "all",
      "stylers": [
          {
              "visibility": "simplified"
          }
      ]
  },
  {
      "featureType": "road.arterial",
      "elementType": "labels.icon",
      "stylers": [
          {
              "visibility": "off"
          }
      ]
  },
  {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [
          {
              "visibility": "off"
          }
      ]
  },
  {
      "featureType": "water",
      "elementType": "all",
      "stylers": [
          {
              "color": "#3F993C"
          },
          {
              "visibility": "on"
          },
                    {
              "saturation": -85
          },
          {
              "lightness": 80
          }
      ]
  },
  {
    featureType: "all",
    elementType: "labels",
    stylers: [
      { visibility: "on" }
    ]
  }

  ];
  
  
  // create map           
  var map = new google.maps.Map( $el[0], args);
  
  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,{name: "administrative"});
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
  
  // add a markers reference
  map.markers = [];
  
  
  // add markers
  $markers.each(function(){
    
      add_marker( $(this), map );
    
  });
  
  
  // center map
  center_map( map );
  

  
  // return
  return map;
  
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $marker (jQuery element)
*  @param map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  var iconBase = '/wp-content/themes/villakalma/dist/images/pin-villa-kalma.png';
  //var image
  var image = {
    url: iconBase,
    size: new google.maps.Size(117, 95),
    anchor: new google.maps.Point(80, 80)
  };
  // create marker
  var marker = new google.maps.Marker({
    position  : latlng,
    map     : map,
    icon: image,
    animation: google.maps.Animation.DROP,
    optimized: false
  });

  marker.addListener('click', toggleBounce);

  function toggleBounce() {
    if (marker.getAnimation() !== null) {
      marker.setAnimation(null);
    } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
      setTimeout(function () {
          marker.setAnimation(null);
      }, 750); // current maps duration of one bounce (v3.13)
    }
  }

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {

     // var contentString = '<div id="content">'+
     //  '<div id="siteNotice">'+
     //  '</div>'+
     //  '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
     //  '<div id="bodyContent">'+$marker.html()+
     //  '</div>'+
     //  '</div>';
    // create info window
    var infowindow = new google.maps.InfoWindow({
      //content   : $marker.html()
      content:'<div id="gm_content">' + $marker.html() + '</div>',

    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, 'mousedown', function() {
      $('.gm-style-iw').parent().addClass('test');
      // el.firstChild.setAttribute('class','closeInfoWindow');
      // el.firstChild.setAttribute('title','Close Info Window');
      // el = (el.previousElementSibling)?el.previousElementSibling:el.previousSibling;
      // el.setAttribute('class','infoWindowContainer');
      //el.setAttribute('class','test');
      // for(var i=0; i<11; i++){
      //   el = (el.previousElementSibling)?el.previousElementSibling:el.previousSibling;
      //   el.style.display = 'block';
      // }
      if($('.gm-style-iw').length) {
         $('.gm-style-iw').parent().hide();
      }
      infowindow.open( map, marker );
    });
  }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length == 1 )
  {
    // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 14 );
  }
  else
  {
    // fit to bounds
    map.fitBounds( bounds );
  }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type  function
*  @date  8/11/2013
*  @since 5.0.0
*
*  @param n/a
*  @return  n/a
*/
// global var
var map = null;

$(document).ready(function(){

  $('.acf-map').each(function(){

    // create map

   map = new_map( $(this) ); 

  });

});

})(jQuery);
</script>
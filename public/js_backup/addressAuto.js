
$(document).on('keyup','input#list-address',function (e) {
  document.getElementById("btn-address").disabled = true;
  $("#frmlistingaddress").find('#btn-address').removeClass("listaddress-btn-active");
  $("#frmlistingaddress").find('#btn-address').addClass("listaddress-btn-notactive");
  map=new google.maps.Map(document.getElementById("map"));
  $('.addressmap #map').height(0);

});
google.maps.event.addDomListener(window, 'load', function () {
    initAutocomplete();
});

function initAutocomplete() {
    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    cityBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(43.629720, -79.436106),
        new google.maps.LatLng(43.673200, -79.349498),
    );
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('list-address'), { bounds: cityBounds, types: ['geocode'] });

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    //autocomplete.setFields(['address_component']);

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.

    autocomplete.addListener('place_changed', fillInAddress);
}


function fillInAddress() {
    document.getElementById("btn-address").disabled = false;
   $("#frmlistingaddress").find('#btn-address').addClass("listaddress-btn-active");
   $("#frmlistingaddress").find('#btn-address').removeClass("listaddress-btn-notactive");

    // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
      initMap(place.geometry.location.lat(), place.geometry.location.lng()) ;
      $('.addressmap #map').height(267);




    $("#lat").val(place.geometry.location.lat());
    $('#lng').val(place.geometry.location.lng());
    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        console.log(place.address_components[i]);

        if (place.address_components[i].types[0] == 'postal_code') {
            var postal = place.address_components[i]['short_name'];
            $("#postalcode").val(postal);
        }

        if(place.address_components[i].types[0] == 'locality'){
            var country = place.address_components[i]['long_name'];
            $("#country").val(country);
        }

        if(place.address_components[i].types[0] == 'administrative_area_level_1'){
            var province = place.address_components[i]['long_name'];
            $('#province').val(province);
        }


    }
}

function geolocate() {
  console.log('Geo locate');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}



function initMap(lati, lagi) {
    // The location of Uluru
    var uluru = {lat: lati, lng: lagi};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {
        zoom: 17,
        center: uluru,
        styles: [
    {
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "elementType": "labels.icon",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "featureType": "administrative.land_parcel",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#bdbdbd"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#eeeeee"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#ffffff"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dadada"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [
        {
          "color": "#80ff00"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "transit.station",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#eeeeee"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#c9c9c9"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    }
  ]
        });

    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
  }

$( document ).ready(function() {



   var geocoder = new google.maps.Geocoder();
   var address =  document.getElementById('list-address').value;
   geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        initMap(latitude, longitude);
        $('.addressmap #map').height(267);

        }
    });

});



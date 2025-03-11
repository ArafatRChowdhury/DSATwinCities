<?php
include "config.php"; #include config.php because it's the configuration file
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twin Cities</title>
        <link rel="stylesheet" href="style.css">

        <!-- Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <!-- Maplibre GL-->
        <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />
        <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>

        <!-- Maplibre GL Leaflet -->
        <script src="https://unpkg.com/@maplibre/maplibre-gl-leaflet/leaflet-maplibre-gl.js"></script>
    </head>
    <body>

    <div class="navbar">
            <a href="WeatherAPI.php">Weather Forecast</a>
            <a href="#">Rio de Janeiro</a>
        </div>
    <div class="grid-container">
        <header class="grid-container">
          <h2><u>Twined Cities:</u> Liverpool and Rio de Janeiro</h2>
        </header>

        

        <div class="city">
        <h3>Liverpool</h3>
        <p>Information about Liverpool</p>
        </div>
        <div class="city">
          <h3>Rio de Janeiro</h3>
          <p>Information about Rio de Janeiro</p>  
        </div>
        <div id="LiverpoolMap" class="liverpoolMap" style="width: 100%; height: 500px;">
        </div>
        <script>
            const LiverpoolMap = L.map('LiverpoolMap', {dragging: false, zoomControl: false}).setView([53.40050, -2.99], 10);
            //const liverpoolMountain = L.latLng(53.401065, -2.994611);

            var markerTemplate = L.Icon.extend({
                options: {
                    iconSize: [25, 25],
                    iconAnchor: [11, 47],
                    popupAnchor: [-1, -38],
                }
            });

            var defaultMarker = new markerTemplate({iconUrl: "icons/marker.png"});

            L.maplibreGL({
              style: 'https://tiles.openfreemap.org/styles/liberty',
              minZoom: 15,
              maxZoom: 15,
            }).addTo(LiverpoolMap)

            //array containing liverpool's places of interest
            var liverpoolMarkers = [
                {lat: 53.23699, lng: -3.04574, name: "Wheel of Liverpool", path: "places/wheelofliverpool.php"},
                {lat: 53.41572, lng: -3.29094, name: "Liverpool Mountain", path: "places/liverpoolmountain.php"},
                {lat: 53.36087, lng: -3.25074, name: "Pride of Liverpool", path: "places/prideofliverpool.php"},
                {lat: 53.50072, lng: -3.26722, name: "De Wadden", path: "places/dewadden.php"},
                {lat: 53.43543, lng: -3.18072, name: "Maritime Museum", path: "places/maritimemuseum.php"},
                {lat: 53.37807, lng: -2.74551, name: "Maldron Hotel", path: "places/maldronhotel.php"}
            ];

            var places = <?php echo json_encode($places); ?>
            //create a variable with the json encoded $places

            //loop through the array and add a marker for each place of interest
            //add mouse hover functionality that shows the places' names
            //later on, this functionality will instead pull data from the database
            liverpoolMarkers.forEach(marker => {
                let name = marker.name;
                let description = "Loading information";

                places.liverpool.forEach(place => {
                    if (place.Name == marker.name) {
                        description = place.Description;
                    };
                });

                let liverpoolMarkersMap = L.marker([marker.lat, marker.lng], {draggable: false, icon: defaultMarker})
                .addTo(LiverpoolMap)
                .bindPopup(`${name}<br>${description}`);

                liverpoolMarkersMap.on("mouseover", function() {
                    liverpoolMarkersMap.openPopup();
                })

                liverpoolMarkersMap.on("mouseout", function() {
                    liverpoolMarkersMap.closePopup();
                })

                liverpoolMarkersMap.on("click", function() {
                    window.location.href = marker.path;
                })
            });

            /*
            This click function event was to make finding co ordinates easier
            LiverpoolMap.on('click', function(e) { //to find co ordinates easier, will most likely be removed
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                console.log("Clicked at: " + lat + ", " + lng);
                alert("Latitude: " + lat + "\nLongitude: " + lng);
            });*/

            // disable map interactions so that users don't lose sight of the markers
            //map interaction ruins the placement of the markers too
            LiverpoolMap.dragging.disable();
            LiverpoolMap.scrollWheelZoom.disable();
            LiverpoolMap.touchZoom.disable();
            LiverpoolMap.doubleClickZoom.disable();
            LiverpoolMap.boxZoom.disable();
            LiverpoolMap.keyboard.disable();
        </script>

        <div id="rioDeJaneiroMap" class="rioDeJaneiroMap" style="width: 100%; height: 500px;"></div>
        <script>
            const rioDeJaneiroMap = L.map('rioDeJaneiroMap', {dragging: false, zoomControl: false}).setView([-22.955333, -43.176388], 14)
          
            L.maplibreGL({
              style: 'https://tiles.openfreemap.org/styles/liberty',
            }).addTo(rioDeJaneiroMap)


            // array of dictionaries that contains co ordinates for rio's places of interest
            var rioDeJaneiroMarkers = [
                {lat: -22.95350, lng: -43.21112, name: "Christ the Redeemer", path: "places/christtheredeemer.php"},
                {lat: -22.97200, lng: -43.18083, name: "Copacabana Beach", path: "places/copacabanabeach.php"},
                {lat: -22.96267, lng: -43.21215, name: "Parque Lage", path: "places/parquelage.php"},
                {lat: -22.94948, lng: -43.18332, name: "Botafogo Praia Shopping", path: "places/botafogopraiashoppingcentre.php"},
                {lat: -22.95650, lng: -43.17800, name: "Museu Botafogo FR", path: "places/museubotafogo.php"},
                {lat: -22.95050, lng: -43.15415, name: "Sugarloaf Mountain", path: "places/sugarloafmountain.php"},
            ]

            console.log(places.rio);
            //loop through the array and create a new marker for each place
            //add a popup that says the name when the mouse hovers over the marker 
            //later, data from the database will be shown instead
            rioDeJaneiroMarkers.forEach(marker => {
                let name = marker.name;
                let description = "Loading information";

                places.rio.forEach(place => {
                    if (place.Name == marker.name) {
                        description = place.Description;
                    };
                });

                let rioMarkersMap = L.marker([marker.lat, marker.lng], {draggable: false, icon: defaultMarker})
                .addTo(rioDeJaneiroMap)
                .bindPopup(`${name}<br>${description}`);

                rioMarkersMap.on("mouseover", function() {
                    rioMarkersMap.openPopup();
                })

                rioMarkersMap.on("mouseout", function() {
                    rioMarkersMap.closePopup();
                })

                rioMarkersMap.on("click", function() {
                    window.location.href = marker.path;
                })
            });


            /*
            This click function event was to make finding co ordinates easier
            rioDeJaneiroMap.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                console.log("Clicked at: " + lat + ", " + lng);
                alert("Latitude: " + lat + "\nLongitude: " + lng);
            });*/

            // disable map interactions so that users don't lose sight of the markers
            //map interaction ruins the placement of the markers too
            rioDeJaneiroMap.dragging.disable();
            rioDeJaneiroMap.scrollWheelZoom.disable();
            rioDeJaneiroMap.touchZoom.disable();
            rioDeJaneiroMap.doubleClickZoom.disable();
            rioDeJaneiroMap.boxZoom.disable();
            rioDeJaneiroMap.keyboard.disable();
        </script>
        <div class="footer">
            <p>Add any links related to the content here</p>
        </div>
    </div>
      </body>
    </html>
    
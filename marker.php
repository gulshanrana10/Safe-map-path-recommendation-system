<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css' rel='stylesheet' />
    <style>
      body {
        margin: 0;
        padding: 0;
      }

      #map {
        height: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
      }
    </style>
</head>
<body>
<div id='map'></div>

<script>

mapboxgl.accessToken = 'pk.eyJ1IjoiaWFtLXByaXRlc2giLCJhIjoiY2s2ZDJucjNmMTVqbDNncnpoMmFkMHVreSJ9.HBHjc66PwYW3p66QOR1KsA';

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/light-v10',
  center: [21.1643,72.7841],
  zoom: 3
});

// code from the next step will go here!

</script>

</body>
</html>
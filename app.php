<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Get driving directions from one location to another</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />

    
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; height: 70%}
    </style>
</head>
<body>
<style>
    
    #instructions {
        position:absolute;
        height: 150px;
        width: 23%;
        top:45px;
        bottom:0;
        background-color: rgba(255,255,255,0.9);
        overflow-y: scroll;
        font-family: sans-serif;
    }
    #sos{
        background-color: red;
        border: none;
        z-index: 100;
        color: white;
        margin-left: 45%;
        text-align: center; 
        position: absolute; 
        top: 80%; 
        height: 10%; 
        width: 25%; 
        font-size: 100%; 
        border-radius: 5%;
    }
    #finish{
        background-color: green;
        color: white;
        border: none;
        z-index: 100;
        text-align: center; 
        position: absolute; 
        top: 80%; 
        height: 10%; 
        width: 25%; 
        font-size: 100%; 
        border-radius: 5%;
    }
</style>

<!--  the map -->
<div id='map' style="height: 100%;"></div>
<!-- geocoder search input -->

    <div id="geocoder"></div>
<!-- left side instructions -->
<div id='instructions'>
    <div id="calculated-line"></div>
</div>
<audio id="playing">
    <source src="./High Frequency.mp3" type="audio/mpeg">
</audio>

<div class="container">
    <div class="row">
        <button id="finish" class="col-4">END ROUTE</button>
        <button  id="sos" class="col-4">DISTRESS CALL</button>
    </div>
</div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-auth.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-analytics.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-firestore.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyD9lJGvpzFYY3ctmcRGdLdJaAhNdAyhS5M",
        authDomain: "cautious-8b6e4.firebaseapp.com",
        databaseURL: "https://cautious-8b6e4.firebaseio.com",
        projectId: "cautious-8b6e4",
        storageBucket: "cautious-8b6e4.appspot.com",
        messagingSenderId: "190211129776",
        appId: "1:190211129776:web:243827c2f4a21f6a17d675",
        measurementId: "G-33CJ4B6B1X"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const auth = firebase.auth();
    const db = firebase.firestore();

    let finish = document.querySelector("#finish");
    finish.addEventListener('click', () => {
        location.href = "feedback.php";
    })

    let sos = document.querySelector("#sos");
    sos.addEventListener('dblclick', () => {
        let mus = document.querySelector('#playing');
        mus.play();
        let user = firebase.auth().currentUser;

        if (user) {
            let docRef = db.collection("users").doc(user.uid);
            docRef.get().then(function(doc) {
                if (doc.exists) {
                    var yourNumber = doc.data().emergency;
                    console.log(yourNumber);
                    var yourMessage = "Your friend is in trouble..."

                    function getLinkWhastapp(number, message) {
                        number = yourNumber;
                        message = yourMessage.split(' ').join('%20')
                        return console.log('whatsapp://send?phone=' + number + '&text=%20' + message)
                    }
                    getLinkWhastapp()
                } else {
                    // doc.data() will be undefined in this case
                    console.log("No such document!");
                }
            }).catch(function(error) {
                console.log("Error getting document:", error);
            });
            
            
            
        }
    });
    

</script>
<script>

let points= [[21.1419, 72.84  ], //police station data
       [21.1771, 72.8302],
       [21.2093, 72.8487],
       [21.1687, 72.7861],
       [21.2126, 72.7899],
       [21.2313, 72.8973],
       [21.1983, 72.8342],
       [21.2185, 72.8294],
       [20.929 , 73.2303],
       [21.1759, 72.8569],
       [21.204 , 72.8334],
       [21.2148, 72.8733],
       [21.1632, 72.8527],
       [21.1906, 72.815 ],
       [21.195 , 72.8194],
       [32.1204, 76.5358],
       [21.1103, 72.7186],
       [21.196816 , 72.819859 ],  //hospital data
       [21.185292 , 72.808836 ],
       [21.168165 , 72.786642 ],
       [21.196176 , 72.819436 ],
       [21.223781 , 72.860589 ],
       [21.209459 , 72.854694 ],
       [21.178169 , 72.811018 ],
       [21.169205 , 72.795899 ],
       [21.173847 , 72.787488 ],
       [21.196016 , 72.798745 ],
       [21.197536 , 72.802917 ],
       [21.19839  , 72.791517 ],
       [21.189539 , 72.798186 ],
       [21.201764 , 72.80114  ],
       [21.1740356, 72.7937429],
       [21.1927855, 72.7998089],
       [21.187633 , 72.861754 ]];
       points= points.toString();
       //points.join(',');

    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHIiLCJhIjoiY2pseXc0djE0MHBibzN2b2h4MzVoZjk4aSJ9.ImbyLtfsfSsR_yyBluR8yQ';
    var instructions = document.getElementById('instructions');
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
        center: [21.1643,72.7841], // starting position
        zoom: 13, // starting zoom
        minZoom: 11 // keep it local
    });
    
    //  geocoder here
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken
        // limit results to Australia
        //country: 'IN',
    });

    // After the map style has loaded on the page, add a source layer and default
    // styling for a single point.
    map.on('load', function() {
        // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
        // makes a selection and add a symbol that matches the result.
        geocoder.on('result', function(ev) {

        });
    });
    var draw = new MapboxDraw({
        displayControlsDefault: false,
        controls: {
            line_string: true,
            trash: true
        },
        styles: [
            // ACTIVE (being drawn)
            // line stroke
            {
                "id": "gl-draw-line",
                "type": "line",
                "filter": ["all", ["==", "$type", "LineString"], ["!=", "mode", "static"]],
                "layout": {
                    "line-cap": "round",
                    "line-join": "round"
                },
                "paint": {
                    "line-color": "#3b9ddd",
                    "line-dasharray": [0.2, 2],
                    "line-width": 4,
                    "line-opacity": 0.7
                }
            },
            // vertex point halos
            {
                "id": "gl-draw-polygon-and-line-vertex-halo-active",
                "type": "circle",
                "filter": ["all", ["==", "meta", "vertex"], ["==", "$type", "Point"], ["!=", "mode", "static"]],
                "paint": {
                    "circle-radius": 10,
                    "circle-color": "#FFF"
                }
            },
            // vertex points
            {
                "id": "gl-draw-polygon-and-line-vertex-active",
                "type": "circle",
                "filter": ["all", ["==", "meta", "vertex"], ["==", "$type", "Point"], ["!=", "mode", "static"]],
                "paint": {
                    "circle-radius": 6,
                    "circle-color": "#3b9ddd",
                }
            },
        ]
    });
    // add the draw tool to the map
    map.addControl(draw);

    // add create, update, or delete actions
    map.on('draw.create', updateRoute);
    map.on('draw.update', updateRoute);
    map.on('draw.delete', removeRoute);

    // use the coordinates you just drew to make your directions request
    function updateRoute() {
        removeRoute(); // overwrite any existing layers
        var data = draw.getAll();
        var lastFeature = data.features.length - 1;
        var coords = data.features[lastFeature].geometry.coordinates;
        var newCoords = coords.join(';');
        getMatch(newCoords);
    }

    // make a directions request
    function getMatch(e) {
        var url = 'https://api.mapbox.com/directions/v5/mapbox/cycling/' + e
            +'?geometries=geojson&steps=true&access_token=' + mapboxgl.accessToken;
        var req = new XMLHttpRequest();
        req.responseType = 'json';
        req.open('GET', url, true);
        req.onload  = function() {
            var jsonResponse = req.response;
            var distance = jsonResponse.routes[0].distance*0.001;
            var duration = jsonResponse.routes[0].duration/60;
            var steps = jsonResponse.routes[0].legs[0].steps;
            var coords = jsonResponse.routes[0].geometry;
    
            console.log(steps);
            console.log(coords);
            console.log(distance);
            console.log(duration);

            // get route directions on load map
            steps.forEach(function(step){
                instructions.insertAdjacentHTML('beforeend', '<p>' + step.maneuver.instruction + '</p>');
            });
            // get distance and duration
            instructions.insertAdjacentHTML('beforeend', '<p>' +  'Distance: ' + distance.toFixed(2) + ' km<br>Duration: ' + duration.toFixed(2) + ' minutes' + '</p>');

            // add the route to the map
            let ans = dist(steps,coords,distance,duration,points);
            addRoute(ans);
            // addRoute(coords);
            // console.log(coords['coordinates'][0][0]);

        };
        req.send();
    }

    // adds the route as a layer on the map
    function addRoute (coords) {
        // check if the route is already loaded
        if (map.getSource('route')) {
            map.removeLayer('route');
            map.removeSource('route')
        } else{
            map.addLayer({
                "id": "route",
                "type": "line",
                "source": {
                    "type": "geojson",
                    "data": {
                        "type": "Feature",
                        "properties": {},
                        "geometry": coords
                    }
                },
                "layout": {
                    "line-join": "round",
                    "line-cap": "round"
                },
                "paint": {
                    "line-color": "#f00",
                    "line-width": 8,
                    "line-opacity": 0.8
                }
            });
        };
    }

    // remove the layer if it exists
    function removeRoute () {
        if (map.getSource('route')) {
            map.removeLayer('route');
            map.removeSource('route');
            instructions.innerHTML = '';
        } else  {
            return;
        }
    }
    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    const dist = function(steps,coords,distance,duration,points){
        let savelist;
        let m=0;
        let ret=[];
        const leng = coords['coordinates'].length;
       // let ret = coords;
        let acc = coords['coordinates'];
        let a=0;
        for(j=0;j<points.length;j++){
            for(k=0;k<leng;k++){
                if(acc[0][0] >points[j][0] && acc[0][1] >points[j][1] && acc[1][0] > points[j][0] && acc[1][1]>points[j][1]){
                      if(acc[k][0]==points[j][0] && acc[k][1]==points[j][1]){
                        ret.append([acc[k][0],acc[k][1]]);
                        a+= Math.sqrt(Math.pow(ret[k-1][0]-ret[k][0],2)+Math.pow(ret[k-1][1]-ret[k][1],2));
                        }
                        
                    }
                    
               // if(m>a){
                   
                // }
                // m=max(a,m);
                
            }
               }
            if(ret.length==0){
                return coords;}
            else{
                savelist=ret;
                return ret;}
    }

    

</script>

</body>
</html>
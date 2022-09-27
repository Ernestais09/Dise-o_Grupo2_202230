    const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

    let myMap = L.map('myMap'). setView([10.9886091, -74.7922088], 13)

    L.tileLayer(tilesProvider,{
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(myMap)

    let marker = L.marker([10.9886091, -74.7922088]).addTo(myMap)


    var points = [];
    var points2 = [];

    const poly = L.polyline(points,{color:'blue',opacity:1}).addTo(myMap);
    const poly2 = L.polyline(points2,{color:'red',opacity:1}).addTo(myMap);

   // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

    var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(myMap);
}


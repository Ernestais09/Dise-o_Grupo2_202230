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
    let poly2 = L.polyline(points2,{color:'red',opacity:1}).addTo(myMap);

   // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

    var popup = L.popup();

//function onMapClick(e) {
//    popup
//        .setLatLng(e.latlng)
//        .setContent("You clicked the map at " + e.latlng.toString())
//        .openOn(myMap);
//}

    //function onMapClick(e) {
  //  popup
   // .setLatLng(e.latlng)
  //  .setContent("Has clickado sobre las coordenadas: " + e.latlng.toString())
 //   .openOn(myMap);
//
   // }
    //myMap.on('click', onMapClick);

    myMap.on('click', function(e) {
        popup
        .setLatLng(e.latlng)
        .setContent("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        .openOn(myMap);

         

        console.log(e.latlng.lat + ", " + e.latlng.lng)

        var latinit = (e.latlng.lat-0.0036022)
        var latfin = (e.latlng.lat+0.0036022);
        var lnginit = (e.latlng.lng+0.0036022);
        var lngfin = (e.latlng.lng-0.0036022);

        console.log(latinit)
        console.log(latfin)
        console.log(lnginit)
        console.log(lngfin)

        if(latinit != '' && lnginit!= '')  
                {  
                     $.ajax({  
                          url:"where.php",  
                          method:"POST",  
                          data:{latinit:latinit, latfin:latfin,lnginit:lnginit, lngfin:lngfin},  
                          success:function(data)  
                          {  
                              
                              const dato = JSON.parse(data);

                              console.log(data)

                              document.getElementById("order_table1").innerHTML = dato.map((element) => {
                              return "<tr><td>"+element.LATITUD+"</td><td>"+element.LONGITUD+"</td><td>"+element.TIMESTAMP+"</td></tr>";
                              
                               }).join("\n");  
                               
                               console.log(document.getElementById("order_table1").innerHTML)
     
                              //$('#order_table').html(data); 
   
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  


    });


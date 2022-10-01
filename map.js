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

    var popup = L.popup();

    myMap.on('click', function(e) {
        popup
        .setLatLng(e.latlng)

        var latinit = (e.latlng.lat-0.0036022)
        var latfin = (e.latlng.lat+0.0036022);
        var lnginit = (e.latlng.lng+0.0036022);
        var lngfin = (e.latlng.lng-0.0036022);

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

                               var cuca = dato.map((element, i) => [i + ". " + element.TIMESTAMP + "<br/>"]).join("\n");

                               popup
                              
                               .setLatLng(e.latlng)
                              .setContent(cuca)
                               .openOn(myMap);
     
                          }  
                     });  
                }  
                else  
                {  
                     alert("Porfavor seleccione un rango de fechas.");  
                }  


    });


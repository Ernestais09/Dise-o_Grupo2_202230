    const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

    let myMap = L.map('myMap'). setView([10.9886091, -74.7922088], 13)

    L.tileLayer(tilesProvider,{
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(myMap)

    var camion1 = L.icon({
      iconUrl: 'Camion1.png',
  
      iconSize:     [38, 90], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
  });

  var camion2 = L.icon({
    iconUrl: 'Camion2.png',

    iconSize:     [38, 90], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
});

    let marker = L.marker([10.9886091, -74.7922088], {icon: camion1}).addTo(myMap)
    let marker2 = L.marker([10.9886091, -74.7922088], {icon: camion2}).addTo(myMap)


    var points = [];
    var points2 = [];
    var points3 = [];
    var points4 = [];

    const poly = L.polyline(points,{color:'blue',opacity:1}).addTo(myMap);
    let poly2 = L.polyline(points2,{color:'red',opacity:1}).addTo(myMap);
    const poly3 = L.polyline(points,{color:'green',opacity:1}).addTo(myMap);
    let poly4 = L.polyline(points,{color:'green',opacity:1}).addTo(myMap);

    var popup = L.popup();

    

    myMap.on('click', function(e) {
      
      var x = document.getElementById("mySelect").value;
      console.log(x);

        popup
        .setLatLng(e.latlng)

        var latinit = (e.latlng.lat-0.0036022)
        var latfin = (e.latlng.lat+0.0036022);
        var lnginit = (e.latlng.lng+0.0036022);
        var lngfin = (e.latlng.lng-0.0036022);

                 if(x=="V1"){
                     $.ajax({  
                          url:"where.php",  
                          method:"POST",  
                          data:{latinit:latinit, latfin:latfin,lnginit:lnginit, lngfin:lngfin},  
                          success:function(data)  
                          {  
                              
                            const dato = JSON.parse(data);

                            if(data !== "[]"){

                              console.log(data)  

                              var hist = dato.map((element, i) => [i + ". " + element.TIMESTAMP + "<br/>"]).join("\n");

                              popup
                              
                              .setLatLng(e.latlng)
                              .setContent("El vehiculo 1 ha estado por la zona en estas ocaciones: <br/>" + hist)
                              .openOn(myMap);

                            }
                              else{
                                   popup
                              
                                   .setContent("El vehiculo 1 no ha estado por la zona <br/>")
                                   .openOn(myMap);
                            }
     
                          }  
                     });
                    }

                    if(x=="V2"){
                     $.ajax({  
                      url:"where2.php",  
                      method:"POST",  
                      data:{latinit:latinit, latfin:latfin,lnginit:lnginit, lngfin:lngfin},  
                      success:function(data)  
                      {  
                          
                        const dato2 = JSON.parse(data);

                        if(data !== "[]"){

                          console.log(data)  

                          var hist2 = dato2.map((element2, j) => [j + ". " + element2.TIMESTAMP + "<br/>"]).join("\n");

                          popup
                          
                          .setLatLng(e.latlng)
                          .setContent("El vehiculo 2 ha estado por la zona en estas ocaciones: <br/>" + hist2)
                          .openOn(myMap);

                        }
                          else{
                               popup
                          
                               .setContent("El vehiculo 2 no ha estado por la zona <br/>")
                               .openOn(myMap);
                        }
 
                      }  
                 });
                }
    });


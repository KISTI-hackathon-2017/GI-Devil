<body>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=KEY&callback=myMap"></script>
<script type="text/javascript">

var myarray=<?php echo json_encode($videosetting); ?>;
document.write("<br>array <br>")
document.write(myarray)
document.write("<br>array[0] <br>")
document.write(myarray[0])

document.write("<br>array[1] <br>")
document.write(myarray[1])

var count= <?php echo $count; ?>;
document.write(count)

var markes=[];

for (var i=0; i<count ;i++) {
    markes[i]= [
        {
            "title": 'Reduit',
            "lat": myarray[i][2],
            "lng": myarray[i][3],
            "description": 'reduit'
        }
    ,
        {
            "title": 'Bagatelle',
            "lat": myarray[i][4],
            "lng": myarray[i][5],
            "description": 'bagatelle'
        }
    ,
            {
            "title": 'Bagatelle',
            "lat": myarray[i][8],
            "lng": myarray[i][9],
            "description": 'bagatelle'
        }
    ,
        {
            "title": 'Reduit',
            "lat": myarray[i][6],
            "lng": myarray[i][7],
            "description": 'reduit'
        }



];
}


window.onload = function () {
    var mapOptions = {
        center: new google.maps.LatLng(markes[0][1].lat, markes[0][1].lng),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
    var infoWindow = new google.maps.InfoWindow();

    var latlngbounds = new google.maps.LatLngBounds();



//Creating Markers


    var data=[];
    var myLatlng=[];
    var marker=[];
    //var lat_lng = new Array();
    var lat_lng = [];
    for (var i=0;i<count; i++) {
           for (j = 0; j < markes[i].length; j++) {
        data[j] = markes[i][j];
        myLatlng[j] = new google.maps.LatLng(data[j].lat, data[j].lng);
        lat_lng.push(myLatlng[j]);
        //lat_lng[j]=myLatlng[j];
        marker[j] = new google.maps.Marker
            (
                {
                 position: myLatlng[j],
                    map: map,
                title: data[j].title

                }
            );


        latlngbounds.extend(marker[j].position);

        (
            function (marker, data) 
            {
              google.maps.event.addListener
              ( marker, "click", function (e) 
                        {
                                infoWindow.setContent(data.description);
                                infoWindow.open(map, marker);
                        }
                    );
            }
            )(marker[j], data[j]);
    }
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);
    }



    //Initialize the Path Array


    //Initialize the Direction Service


    //Set the Path Stroke Color

   var color=['#0EF022','#FF0000','#FFFF00','#00FF00','#00FFFF','#0000FF','#000000','FFFFFF'];
   var src_des=[];
   var j=0;
   for (i=0;i<lat_lng.length;i++) {
    src_des[j]=[lat_lng[i],lat_lng[i+1]];

    j+=1;
    i+=1;
   }





 for (var t = 0;t < src_des.length; t++) 
 {
 //Intialize the Direction Service
 var service = new google.maps.DirectionsService();
 var directionsDisplay = new google.maps.DirectionsRenderer();

 var bounds = new google.maps.LatLngBounds();
 if ((t + 1) < lat_lng.length) 
 {
  var src = src_des[t][0];
  var des = src_des[t][1];
  service.route(
  {
    origin: src,
    destination: des,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  }, 
  function(result, status) 
  {
    if (status == google.maps.DirectionsStatus.OK) 
    {
      // new path for the next result
      var path = new google.maps.MVCArray();
      //Set the Path Stroke Color
      // new polyline for the next result
      var poly = new google.maps.Polyline(
      {
        map: map,
        strokeColor: color[t]
      });
      poly.setPath(path);
      for (var k = 0, len = result.routes[0].overview_path.length; k < len; k++) 
      {
        path.push(result.routes[0].overview_path[k]);
        bounds.extend(result.routes[0].overview_path[k]);
        map.fitBounds(bounds);
      }
    } else alert("Directions Service failed:" + status);
  });
  }
 }






 }// window.onload = function () 
 </script>
<div id="dvMap" style="width: 100%; height: 800px">
</div>
<?php
	$host        = "host=127.0.0.1";
	$port        = "port=5432";
	$dbname      = "dbname=ko";
	$credentials = "user=postgres password=peet";

	$db = pg_connect("$host $port $dbname $credentials") ;
	if(!$db) {
		echo "Error : Unable to open database\n";
	} else {
		echo "Opened database successfully\n";
	}
	/*$sql =<<<EOF
	SELECT * from kk;
EOF;*/
	$sql = "SELECT * FROM kk;";
	$ret = pg_query($db, $sql) ;
	if(!$ret) {
		echo pg_last_error($db) ;
		exit;
	} 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polylines</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      // This example creates a 2-pixel-wide red polyline showing the path of William
      // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
      // Brisbane, Australia.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 35.84486, lng: 128.594692},
          mapTypeId: 'satellite'
        });

		<?php
			$num_row = pg_num_rows($ret);
			$k = 0;
			//$ret2 = $ret;
			// Draw paths
			echo "var flightPlanCoordinates = [";
			while($row = pg_fetch_row($ret) ){
				echo "{lat: " . $row["7"] . ", lng: " . $row["8"] . "},\n";
				
				$k++;
				if($k > 100) {break;}
			}
			echo "];";
			$k = 0;
			while($row = pg_fetch_row($ret) ){
				?>
				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					animation: google.maps.Animation.DROP,
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				 <?php
				$k++;
				if($k > 100) {break;}
			}
		?>
		var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#000000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeVERtl6-MScPy5xT3ysrJsM4zRkcjGaY&callback=initMap">
    </script>
  </body>
</html>
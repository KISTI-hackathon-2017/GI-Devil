<?php
			$host        = "host=127.0.0.1";
			$port        = "port=5432";
			$dbname      = "dbname=ko";
			$credentials = "user=postgres password=peet";

			$db = pg_connect("$host $port $dbname $credentials") ;
			/*if(!$db) {
				echo "Error : Unable to open database\n";
			} else {
				echo "Opened database successfully\n";
			}*/
			$sql = <<<EOF
			(SELECT *FROM v85 ); 
EOF;

			$ret = pg_query($db, $sql) ;
			if(!$ret) {
				echo pg_last_error($db) ;
				exit;
			} 
		?>
		
<!DOCTYPE html>
<html>
	<head>
		<style>
			#map {
				height: 400px;
				width: 100%;
			}
		</style>
		
		<div id="map"></div>
		<script>
			// The following example creates a marker in Stockholm, Sweden using a DROP
			// animation. Clicking on the marker will toggle the animation between a BOUNCE
			// animation and no animation.
			var marker;
			function initMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 10,
				center: {lat: 35.84486, lng: 128.594692}
			  });
			 <?php
				$num_row = pg_num_rows($ret);
					$k = 0;
					while($row = pg_fetch_row($ret) ){
				?>

				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					animation: google.maps.Animation.BOUNCE,
					position: {lat:<?php echo $row["10"];?>, lng:<?php echo $row["11"];?>},
				  });
				  <?php
						$k++;
						if($k > 1100) {break;}
						}
					?>
			}
			</script>
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeVERtl6-MScPy5xT3ysrJsM4zRkcjGaY&callback=initMap">
			</script>
  </head>
  <body>
		<?php
			pg_close($db) ;
		?>
	</body>
</html>
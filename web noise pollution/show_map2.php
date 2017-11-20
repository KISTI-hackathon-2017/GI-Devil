<!DOCTYPE html>
<html>
	<head>
		<style>
			#map {
			height: 400px;
			width: 100%;
			}
		</style>
	
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
			(SELECT *FROM kk where field_5 BETWEEN 90 AND 100 ); 
EOF;

			$ret = pg_query($db, $sql) ;
			if(!$ret) {
				echo pg_last_error($db) ;
				exit;
			}
			$sql = <<<EOF
			(SELECT *FROM kk where field_5 BETWEEN 80 AND 89 ); 
EOF;

			$res = pg_query($db, $sql) ;
			if(!$res) {
				echo pg_last_error($db) ;
				exit;
			} 
		?>
	</head>
	<body>
		<h3>My Google Maps</h3>
		<div id="map"></div>
		<script>
			// The following example creates a marker in Stockholm, Sweden using a DROP
			// animation. Clicking on the marker will toggle the animation between a BOUNCE
			// animation and no animation.
			var marker;
			var map;
			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
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
					draggable: false,
					icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
					//http://maps.google.com/mapfiles/ms/icons/blue-dot.png or http://maps.google.com/mapfiles/ms/icons/red-dot.png
					
					animation: google.maps.Animation.BOUNCE,
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				  <?php
					$k++;
					if($k > 100) {break;}
					}
					?>
			}
		</script>
			<div id="map"></div>
			<script>
			var marker1;
			function initMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 10,
				center: {lat: 35.84486, lng: 128.594692}
			  });
				<?php
					$num_row = pg_num_rows($res);
					$k = 0;
					while($row = pg_fetch_row($res) ){
				?>

					marker1 = new google.maps.Marker({
					map: map,
					draggable: false,
					icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
					//http://maps.google.com/mapfiles/ms/icons/blue-dot.png or http://maps.google.com/mapfiles/ms/icons/red-dot.png
					
					animation: google.maps.Animation.BOUNCE,
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				  <?php
					$k++;
					if($k > 100) {break;}
					}
					?>
			}
			</script>
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeVERtl6-MScPy5xT3ysrJsM4zRkcjGaY&callback=initMap">
			</script>
  
		<?php
			pg_close($db) ;
		?>
	</body>
</html>
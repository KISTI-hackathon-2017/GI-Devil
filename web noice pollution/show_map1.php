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
$sql =<<<EOF
			(SELECT *FROM kk where field_5 BETWEEN 90 AND 100 ); 
EOF;
$sql1 =<<<EOF
			(SELECT *FROM kk where field_5 BETWEEN 80 AND 90) ; 
EOF;
$sql2 =<<<EOF
			(SELECT *FROM kk where field_5 > 100 ); 
EOF;

			$ret = pg_query($db,$sql) ;
			if(!$ret) {
				echo pg_last_error($db) ;
				
				exit;
			} 
			$ret1 = pg_query($db,$sql1) ;
			if(!$ret) {
				echo pg_last_error($db) ;
				
				exit;
			}
			$ret2 = pg_query($db,$sql2) ;
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
		<h3>My Google Maps</h3>
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
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				  <?php
						$k++;
						if($k >1000) {break;}
						}
					?>
					 <?php
					 
				$num_row = pg_num_rows($ret1);
					$k = 0;
					while($row = pg_fetch_row($ret1) ){
				?>

				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
					animation: google.maps.Animation.BOUNCE,
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				  <?php
						$k++;
						if($k >1000) {break;}
						}
					?>
					
					<?php
				$num_row = pg_num_rows($ret2);
					$k = 0;
					while($row = pg_fetch_row($ret2) ){
				?>

				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					icon:'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
					animation: google.maps.Animation.BOUNCE,
					position: {lat:<?php echo $row["7"];?>, lng:<?php echo $row["8"];?>},
				  });
				  <?php
						$k++;
						if($k >1000) {break;}
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
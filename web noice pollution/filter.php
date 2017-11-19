<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Map of Noise Pollution</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
	
	<link href="./style2.css" rel="stylesheet">
	
  </head>
	
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container" >
        <a class="navbar-brand" href="#">Map of Noise Pollution </a>
        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Qgis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      
        <!-- <small>Noise Pollution</small> -->
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <?php 
			include("show_map.php");
		  ?>
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Filter</h3>
          <div class="container">
  <form action="/action_page.php">
    <label for="mcp">noise value and time</label>
	 
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">noise value
			</button>
			<ul class="dropdown-menu">
			  
			  <li class="normal"><a href="#"> < 80 db</a></li>
			  <li class="normal"><a href="#"> 80-85 db</a></li>
			  <li class="danger"><a href="#"> > 85 db</a></li>
			  
			</ul>
		</div>
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">time
			</button>
			<ul class="dropdown-menu">
			  
			  <li class="normal"><a href="#"> < 30 min </a></li>
			  <li class="normal"><a href="#"> 30-60 min </a></li>
			  <li class="danger"><a href="#"> > 60 min </a></li>
			  
			</ul>
		</div>
	</div>

    <br>
    


    <input type="submit" value="Submit">
  </form>

        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Thank you sponsors</h3>
		<li>We would like to thank everyone from KISTI for thier supports during this workshop in Korea</li>
        <li>We, also, would like to thank the President of RBRU and the ex-dean of CSIT for thier additional supports</li><br><br>
      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="./img/kisti_logo.png" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="./img/ebay.png" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="./img/rbru.png" alt=""width="80px" height="78px">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="./img/csit.png" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    

    
    

    

  </body>

</html>

<?php
  include 'Adding.php';
  if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])){
    addLocation($_POST["name"],$_POST['address'],$_POST["contact"]);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Setup Location</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/mdb/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb/css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/mdb/css/style.css" rel="stylesheet">
    <link href="css/mdb/css/style.min.css" rel="stylesheet" />
    <!-- Modal Template -->
    <link href="css/mdb/css/modals/bootstrap-fs-modal-master/dist/css/fs-modal.min.css" rel="stylesheet">

</head>

<body class="bg-fadedpurple all-align-center">

<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark py-0">

    <!-- button for mobile -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapse_target">
        <!-- nav branding -->
        <a class="navbar-brand text-primary" href="home.html">Tink's Bistro</a>

        <!-- nav links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.html">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pos.html">POS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CRM</a>
            </li>
        </ul>

        <!-- dropdown -->
        <div class="dropdown">
            <button type="button" class="btn py-2 px-3 btn-light dropdown-toggle" data-toggle="dropdown">
              Settings
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="setup.html">Setup</a>
              <a class="dropdown-item" href="profile.html">Profile</a>
              <a class="dropdown-item" href="#">Tour</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" id="btnLogout">Logout</a>
            </div>
          </div>

    </div>

</nav>

<!-- breadcrumb -->  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small active" aria-current="page">Location</li>
    </ol>
  </nav>

<!-- "Locations" + add location btn -->
<div class="row px-2 mx-auto my-5">
    <div class="col-4"><h3 class="text-success">Locations</h3></div>
    <div class="col-8">
        <div class="d-flex flex-row-reverse">
            <div><button type="button" data-toggle="modal" data-target="#addLocationModal" class="btn btn btn-success shadow-sm text-white text-capitalize py-2 px-3">Add a Location</button></div>
        </div>
    </div>

    <!-- add location modal -->
    <div class="modal fade" id="addLocationModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title text-capitalize">add a location</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                
                <form action setup-location.php method="POST" >
                    <div class="form-row">
                        <div class="col">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <div class="col">
                        <input type="number" class="form-control" placeholder="Contact No." name="contact">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col">
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                        </div>
                    </div>
                    <!-- Modal footer -->
                        <div class="modal-footer py-2 bg-lightgrey">
                            <button type="submit" class="btn btn-success">Add Location</button>
                        </div>
                </form>

            </div>
            
            
            
        </div>
        </div>
    </div>

</div>

<!-- List Locations Here -->
<div class="row mx-auto px-2 py-4 border border-light border-bottom-0 border-left-0 border-right-0">

    <!-- if yes locations, for each location ... -->
    <!-- <div class="d-flex shadow jumbotron w-90 mx-auto bg-lightgrey rounded border-light border">
        <div>
        <h2 class="mb-4">Temasek Polytechnic</h2>
        <p class=" mb-1"><strong>Address:</strong> 8 Taman Siglap, Singapore 455669</p>
        <p class=" mb-1"><strong>Contact:</strong> 85188974</p>
        </div>
        <div class="ml-auto">
            <div><button type="button" class="btn btn btn-primary text-white font-weight-bold text-capitalize py-2 px-3">Edit location</button></div>        
        </div>
    </div> -->

    <?php
        require_once "mysql.php";
        $sql='SELECT * FROM Location;';
        $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $rows=array();
        while ($row=mysqli_fetch_array($result_select)){
            $rows[]=$row;
        }
        if (empty($rows))
        {
            echo (' <!-- if no locations -->
            <div class="jumbotron w-90 mx-auto bg-lightgrey shadow-none rounded border-light border">
                <h2 class="mb-3">No Locations Setup</h2>
                <p class="small">You don\'t have any locations setup yet. To start, click <strong>Add a Location</strong>.</p> <div class="d-flex">
                    <div><button type="button" data-toggle="modal" data-target="#addLocationModal" class="btn btn btn-success shadow-sm text-white text-capitalize py-2 px-3">Add a Location</button></div>        
                </div>
            </div>');
        }
        else{
            foreach ($rows as $stmt){
                echo ('<!-- if yes locations, for each location ... -->
                <div class="d-flex shadow jumbotron w-90 mx-auto bg-lightgrey rounded border-light border">
                    <div>
                    <h2 class="mb-4">'.$stmt['location_name'].'</h2>
                    <p class=" mb-1"><strong>Address:</strong> '.$stmt['Address'].'</p>
                    <p class=" mb-1"><strong>Contact:</strong> '.$stmt['ContactNumber'].'</p>
                    </div>
                    <div class="ml-auto">
                        <div><button onclick="location.href=\'setup-location-edit.php?location_name='.$stmt['location_name'].'\'" type="button" class="btn btn btn-primary text-white font-weight-bold text-capitalize py-2 px-3">Edit location</button></div>        
                    </div>
                </div>');
            }
        }
    ?>

</div>

    <!-- validation for forms inside the modals -->
    <!-- JQuery -->
    <script type="text/javascript" src="css/mdb/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="css/mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="css/mdb/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="css/mdb/js/mdb.min.js"></script>
    <!-- Modal Template -->
    <script src="css/mdb/css/modals/bootstrap-fs-modal-master/dist/js/fs-modal.min.js"></script>

</body>

</html>
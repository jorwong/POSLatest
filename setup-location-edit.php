<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Edit Location</title>

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

<?php
include "navbar.php";
?>

<!-- breadcrumb -->  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-location.php">Location</a></li>
      <li class="breadcrumb-item small active" aria-current="page"><?php echo $_GET["location_name"]?></li>
    </ol>
  </nav>


<div class="container">

    <!-- header-->
    <div class="row mx-auto py-4 border-bottom"><h3 class="text-darker">Edit: <?php echo $_GET["location_name"]?></h3></div>

    <!-- container for 4 buttons -->
    <div class="row bg-transparent my-5 text-center mx-auto"><!-- row1 -->
        <div class="col-3">
            <button class="btn btn-block shadow-none border border-silver bg-transparent text-capitalize rounded m-0 p-4" onclick="locationEditGeneral('<?php echo $_GET['location_name']?>')">
                <i class="fas fa-info-circle mb-3 text-darker size-350"></i>
                <br />
                general details
            </button>
        </div>
        <div class="col-3">
            <button class="btn btn-block shadow-none border border-silver bg-transparent text-capitalize rounded m-0 p-4" onclick="">
                <i class="fas fa-people-carry mb-3 text-darker size-350"></i>
                <br />
                staff
            </button>        
        </div>
        <div class="col-3">
            <button class="btn btn-block shadow-none border border-silver bg-transparent text-capitalize rounded m-0 p-4" onclick="taxHTML('<?php echo $_GET['location_name']?>')">
                <i class="fas fa-calculator mb-3 text-darker size-350"></i>
                <br />
                Tax Rates
            </button>
        </div>
        <div class="col-3">
            <button class="btn btn-block shadow-none border border-silver bg-transparent text-capitalize rounded m-0 p-4" onclick="">
                <i class="fas fa-utensils mb-3 text-darker size-350"></i>
                <br />
                Menu
            </button>
        </div>
    </div>
    <div class="row bg-transparent my-5 text-center mx-auto"><!-- row2 -->
        <div class="col-3">
            <button class="btn btn-block shadow-none border border-silver bg-transparent text-capitalize rounded m-0 p-4" onclick="discountsHTML()">
                <i class="fas fa-percent mb-3 text-darker size-350"></i>
                <br />
                discounts
            </button>
        </div>
    </div>

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

    <!-- common.js -->
    <script src="scripts/common.js"></script>

</body>

</html>
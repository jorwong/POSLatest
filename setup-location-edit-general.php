<?php
include 'CRUD.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
  editLocation($_POST["title"],$_POST["address"],$_POST["contact"],$_POST["prevlocation"]);
};
?>

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
include 'navbar.php';
?>
<!-- breadcrumb -->  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-location.php">Location</a></li>
      <li class="breadcrumb-item small"><a href="#"><?php echo $_GET["location_name"]?></a></li>
      <li class="breadcrumb-item small active" aria-current="page">General Details</li>
    </ol>
  </nav>




<div class="container mt-4">

    <!-- header -->
    <h3 class="text-darker">General Details</h3>
    <hr />
<!-- form -->
<?php
              include "mysql.php";
              $sql="SELECT * FROM Location WHERE location_name= ?";
              if($stmt=$conn->prepare($sql)){
                $stmt->bind_param("s",$_GET["location_name"]);

                $stmt->execute();
                $stmt->bind_result($locationID,$location_name,$Address,$ContactNumber);
                $stmt->fetch();
              }
                  
                  echo ('<form class="mt-4" action="setup-location-edit-general.php" method="POST">
                  <div class="form-group">
                    <label for="title">Restauraunt Name:</label>
                    <input type="title" class="form-control" id="title" name="title" value="'.$location_name.'"
                  </div>
                  <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="'.$Address.'">
                  </div>
                  <!-- <div class="form-group">
                      <label for="city">City:</label>
                      <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select class="form-control" id="country">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="time_zone">Time Zone</label>
                      <select class="form-control" id="time_zone">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="currency">Currency</label>
                      <select class="form-control" id="currency">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label for="contact">Contact No.:</label>
                      <input type="number" class="form-control" id="pwd"  name="contact" value="'.$ContactNumber.'">
                    </div>
                  <!-- <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>       -->
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="prevlocation" value="'.$_GET["location_name"].'">
                    </div>
                  <button type="submit" class="btn btn-success">Update</button>
                </form>');
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
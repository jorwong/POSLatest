<?php
session_start();
include "mysql.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["password"])){
    $sql="SELECT * FROM SupervisorPassword";
    if($stmt=$conn->prepare($sql)){
        $stmt->execute();
        $stmt->bind_result($passID,$password);
        $stmt->fetch();
        if ($password==$_POST["password"]){
            $_SESSION['SupervisorPassword'] = $password;
            echo "<script type='text/javascript'>alert('Correct Password, Now you can Cancel or Change an Order');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Wrong Password');</script>";
        }
    }

    


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Super Password | Edit</title>

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
<?php include "navbar.php" ?>

<!-- breadcrumb -->  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-globalSettings.html">Global Settings</a></li>
      <li class="breadcrumb-item small active" aria-current="page">Super Password</li>
    </ol>
  </nav>


<div class="container">

    <!-- header -->
    <div class="py-4 d-flex border-bottom">
        <div class="mr-auto">      <h3 class="text-darker mb-0">Super Password</h3></div>
    </div>

    <!-- change password -->
    <div class="jumbotron">
        <form action="setup-globalSettings-superPass.php" method="POST">
            <div class="form-group">
              <label for="pwd">Supervisor Password to Cancel or Change an Order:</label>
              <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
            </div>
            <button type="submit" class="btn btn-success text-white btn-sm">Save</button>
          </form>
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

</body>

</html>
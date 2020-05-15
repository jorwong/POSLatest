<?php
  session_start(); 
  require_once "mysql.php";
  $sql="SELECT role, name  FROM Users INNER JOIN Role ON Users.roleID = Role.roleID WHERE email= ?;";
  if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param('s',$_SESSION['name']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($role,$name);
    $stmt->fetch();
    $stmt->close();
    
  }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Profile</title>

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

<body class="bg-lightgrey all-align-center">

<?php include "navbar.php" ?>



<!-- card with input field -->
<div class="container pt-5">
    <div class="my-4">
        <h2>Your Profile Details</h2>
    </div>
    <div class="card border rounded shadow" >
        <div class="card-body">

          <!-- readonly fields -->
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Email" name="name" value=<?php echo $_SESSION['name']; ?> readonly>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Role" value=<?php echo $role; ?> readonly>
            </div>
          </div>

            <form action="profile.php" method="POST"><!-- editable fields -->
                <div class="mt-4 form-group">
                    <input type="text" class="form-control" id="user_name" name="name" placeholder="Name" value=<?php echo $name ?> >
                  </div>
                  <div class="form-group">
                    <input type="password" name="Password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="cfm_Password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                  </div>
                  <div class="card-footer text-right">
                  <button id="update_user" type="submit" class="card-link"><i class="far fa-edit"></i> update changes</button>
                  </div>  
              </form>

        </div>
        <!-- <div class="card-footer text-right">
            <button id="update_user" type="submit" class="card-link"><i class="far fa-edit"></i> update changes</button>
        </div> -->
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

    <!-- COMMON JS -->
    <script src="scripts/common.js"></script>

</body>
<?php
  session_start(); 
  require_once "mysql.php";
$name = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter username.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }

    if(empty(trim($_POST["cfm_Password"]))){
      $cfm_pass_err = "Please enter your confirmed password.";
    } else{
      $cfm_password = trim($_POST["cfm_Password"]);
    }
    if($cfm_password === $password){
      if(empty($cfm_pass_err) && empty($password_err) && empty($name_err)){

        $sql='UPDATE Users SET name= ? ,password= ? WHERE email= ?';
        if($stmt=mysqli_prepare($conn,$sql)){
          mysqli_stmt_bind_param($stmt,'sss',$param_name,$param_password,$param_email);
          $param_name=$name;
          $param_password=$password;
          $param_email=$_SESSION['name'];
        
          if (mysqli_stmt_execute($stmt)){
            echo "Record done";
          }
        }
          $stmt->close();
        }
    }
    }
?>


</html>
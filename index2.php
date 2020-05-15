<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "mysql.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["Email"]))){
        $email_err = "Please enter username.";
    } else{
        $email = trim($_POST["Email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){


      if ($stmt = $conn->prepare('SELECT userID, email, name, password FROM Users WHERE email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['Email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
          $stmt->bind_result($userID,$email,$name,$password);
          $stmt->fetch();
          // Account exists, now we verify the password.
          // Note: remember to use password_hash in your registration file to store the hashed passwords. NEED TO CHANGE
          if ($_POST['Password'] === $password) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            if (isset($_POST['logincheck']) && in_array('Stay Logged In', $_POST['logincheck']) === true){
              $_SESSION['loggedin'] = TRUE;
            }
            $_SESSION['name'] = $_POST['Email'];
            $_SESSION['id'] = $userID;
            
            header("location: pos.php");
          } else {
            echo 'Incorrect password!';
          }
        } else {
          echo 'Incorrect username!';
        }
      
        $stmt->close();
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

    <title>Login</title>

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

<body class="bg-fadedpurple w-90 all-align-center">

<!-- navbar -->
<nav class="navbar navbar-expand-sm bg-transparent shadow-none pl-0">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">TiNK Singapore</a>
  <!-- links if any, so far none-->
  </nav>

<!-- 2-col container -->
<div class="row shadow-lg rounded mx-1">
  <!--col 1-->
  <div class="col-md-6 box-aside bg-white p-5">
      <h5>Welcome back!</h5>
      <p>Enter Your Details Below.</p>
    <!-- form starts here -->
    <form action index2.php method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="Email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="logincheck[]" value="Stay Logged In">
        <label class="form-check-label" for="exampleCheck1">Stay logged in</label>
      </div>
      <button type="submit" class="btn btn-primary text-uppercase">login</button>
    </form>
  </div>
      <!-- col 2-->
    <div class="col-md-6 box-aside bg-primary">
      <img src="../CDSE - Website Resource/images/Cable Detection.jpg">    
    </div>
</div>



<!-- footer -->

    <!-- validation for forms inside the modals -->
    <!-- JQuery -->
    <script type="text/javascript" src="./mdb/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./mdb/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="./mdb/js/mdb.min.js"></script>
    <!-- Modal Template -->
    <script src="./mdb/css/modals/bootstrap-fs-modal-master/dist/js/fs-modal.min.js"></script>

</body>

</html>
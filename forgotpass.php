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

<body class="bg-success w-90 all-align-center">


<div class="container">
    <div class="big-kay-icon">
        <h1>Tink</h1>
        <span>Singapore</span>
    </div>
</div>

<br />

<!-- Login card -->
<div class="container">
<div class="card bg-light text-dark">
    <div class="card-body">
        <!-- form starts here -->
        <form>
            <div class="form-group">
                <small id="emailHelp" class="form-text text-muted mb-2">We will send your new password to this email address</small>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
            </div>

                <!-- checkbox and login btn -->
                <div class="d-flex">
                    <div class="mt-3">
                        <a href="index.html" style="text-decoration:underline;" class="font-weight-bold small">Login if you have your password</a>
                    </div>
                    <div class="ml-auto"><button type="submit" id="btnLogin" class="btn btn-success text-uppercase">reset</button></div>
                </div>
        </form>
    </div>
</div>
<br />

<!-- footer -->
<p class="small fixed-bottom text-center text-light">Copyright © 2020 Tink Singapore. All rights reserved.</p>
</div>
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
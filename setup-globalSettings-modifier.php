<?php session_start(); 
    include 'Adding.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["CHGcategory"])){
        editVariant($_POST["CHGcategory"],$_SESSION["prevVarCat"]);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["category"])){
        addVariant($_POST["category"]);
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Combo | Edit</title>

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

<?php include "navbar.php" ?>

<!-- breadcrumb -->  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-globalSettings.html">Global Settings</a></li>
      <li class="breadcrumb-item small active" aria-current="page">Variant Categories</li>
    </ol>
  </nav>


<div class="container">

    <!-- header -->
    <div class="py-4 d-flex border-bottom">
        <div class="mr-auto">      <h3 class="text-darker mb-0">Variant Categories</h3></div>
        <div><button type="button" data-toggle="modal" data-target="#addNewModifierModal" class="btn btn-success text-white text-capitalize btn-sm">+ Add Variant Category</button></div>
    </div>


    <!-- table listing cancellation reasons -->
    <table class="table table-striped table-borderless border-bottom border-light">
        <thead>
          <tr>
            <th>Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <!-- for each combo listing-->
        <?php
              require_once "mysql.php";
              $sql='SELECT variance_name FROM Variance_Category;';
              $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              $rows=array();
              while ($row=mysqli_fetch_array($result_select)){
                $rows[]=$row;
              }
              if (empty($rows)){
                  
                echo ('<!-- if no combos created -->
                <div class="text-capitalize bg-lightgrey text-center p-2 m-0 row">
                    no combos added yet!
                </div>');
              }

              else {
                foreach ($rows as $stmt){
                    echo ('<tr><!-- row 1 -->
                    <td>'. $stmt['variance_name'] .'</td>
                    <td class="text-right">
                        <button type="button" class="btn btn-sm bg-success text-white" data-toggle="modal" data-target="#editModifierModal" data-id="'.$stmt['variance_name'].'" > edit </button>
                    </td>
                  </tr>');
              }

              }
        ?>
        </tbody>
    </table>
</div>


    <!-- edit variant modal -->
    <div class="modal fade" id="editModifierModal">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title text-capitalize">Edit Variant Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                
                <form action setup-globalSettings-modifier.php method="POST">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" class="form-control" id="category_name" placeholder="Name" name="category_name">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer py-2 bg-lightgrey">
                         <button type="submit" class="btn btn-sm btn-success">save</button>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>


    <!-- add new variant modal -->
        <div class="modal fade" id="addNewModifierModal">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title text-capitalize">add a variant category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    
                    <form action setup-globalSettings-modifier.php method="POST">
                        <div class="form-row">
                            <div class="col">
                            <input type="text" class="form-control" id="category" placeholder="Name" name="category">
                            </div>
                            <!-- Modal footer -->
                            
                        </div>
                        <div class="modal-footer py-2 bg-lightgrey">
                            <button type="submit" class="btn btn-sm btn-success">save</button>
                            </div>
                        </form>
    
                </div>
                
                
                
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
    
    <script> 
            $(document).ready(function(){

            $('button.btn.btn-sm.bg-success.text-white.waves-effect.waves-light').click(function() {
            
                    var userid = $(this).data("id");
                    // AJAX request
                    $.ajax({
                    url: 'test.php',
                    type: 'POST',
                    data: 'variance_name='+ userid,
                    success: function(response){ 
                        // Add response in Modal body
                        $('.modal-body').html(response);
                        // Display Modal
                        $('#editModifierModal').modal('show'); 
                    }
                    });
            });
    });
    </script>


</body>


</html>
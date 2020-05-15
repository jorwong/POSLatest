<?php
session_start();
require_once "mysql.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["CategoryName"]))){
    $Cat_err = "Please enter username.";
  } 
  else{
    $category = trim($_POST["CategoryName"]);
    }
  if (empty($Cat_err)){
    $sql='INSERT INTO Menu_Category (category) VALUES ( ? )';
    if($stmt=mysqli_prepare($conn,$sql)){
      mysqli_stmt_bind_param($stmt,'s',$category);

      if (mysqli_stmt_execute($stmt)){
        echo "Menu Category Added";
      }
      else{
        echo mysqli_stmt_error($stmt);
      }
    }
    else {
      echo mysqli_error($conn);
    }
      $stmt->close();
    }

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Setup Menu</title>

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


<!-- "Menu" + 4 buttons -->
<div class="row px-2 mx-auto mb-3 mt-5">
    <div class="col-4"><h3 class="text-success">Menu</h3></div>
    <div class="col-8">
        <div class="d-flex flex-row-reverse">
            <div><button type="button" class="btn btn btn-success shadow text-white text-capitalize p-2" onclick="menuItem()">Add Menu Item</button></div>
            <div><button type="button" class="btn btn btn-info shadow text-darker text-capitalize p-2" data-toggle="modal" data-target="#menuCategoryModal">Add Menu Category</button></div>
            <div><button type="button" class="btn btn shadow-none text-danger text-capitalize p-2">Refresh Menu</button></div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="row mx-auto px-2">

<!-- left side bar (main content) -->
    <div class="col-9">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search menu item by name">
            <div class="input-group-append">
              <button class="btn btn-success m-0 py-0 px-3" type="submit">Search</button>
            </div>
        </div>
    <hr />

        <!-- list each menu item -->
    <!-- table listing cancellation reasons -->
    <table class="table table-striped table-borderless border-bottom border-light">
        <thead class="text-primary font-weight-bold small">
          <tr>
            <th>Product Information</th>
            <th></th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr><!-- row 1 -->
            <td>
              <!-- load food image ... default image to be tink logo -->
            </td>
            <td>
              <p class="m-0">food_item (food_code)</p>
              <p class="small m-0">category_1</p>
              <p class="small m-0">category_2</p>
            </td>
            <td>Price</td>
            <td><button class="btn btn-success text-white rounded btn-sm">edit</button></td>
          </tr>
        </tbody>
    </table>

        <!-- if no menu items yet -->
        <div class="jumbotron bg-lightgrey shadow-none rounded border-light border">
            <h2 class="mb-3">No Items Found</h2>
            <p class="small">You don't have any dish yet. To start, click <strong>Add Menu Item</strong> or, if you want, click <strong>Add Menu Item Category</strong> so you will have a better product view.</p>
            <div class="d-flex">
                <div><button type="button" class="btn btn-success px-3 py-2 text-capitalize text-white">add menu item</button></div>
                <div><button type="button" class="btn btn-info px-3 py-2 text-capitalize text-white" data-toggle="modal" data-target="#menuCategoryModal">add menu category</button></div>
            </div>
        </div>

    </div>



<!-- right sidebar -->
    <div class="col-3">
        <nav class="navbar bg-light p-0" action setup-menu.php method="GET">
            <ul class="navbar-nav text-capitalize w-100">
              <li class="nav-item rounded-top pl-2" style="background-color:rgb(219, 219, 219);">
                <a class="nav-link text-lightgrey small"  href="#">menu categories</a>
              </li>


              <!-- add this li not the one on top!-->
              <li class="nav-item pl-2">
                <a class="nav-link small active" href="#">all</a>
              </li>
              <?php
              session_start();
              require_once "mysql.php";
              $sql='SELECT category FROM Menu_Category;';
              $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              $rows=array();
              while ($row=mysqli_fetch_array($result_select)){
                $rows[]=$row;
              }
              foreach ($rows as $stmt){
                $CatName=stripslashes($stmt['category']);
                echo ('<li class="nav-item pl-2">
                <a class="nav-link small active" href="#">'. $CatName . '</a>
                  </li>');

              }
              ?>

            </ul>
          </nav>

          <br />

          <!-- add new category button + modal-->
        <button type="button" class="btn shadow-none btn-transparent text-info text-center p-2 btn-block text-capitalize" data-toggle="modal" data-target="#menuCategoryModal">
            + add menu category
        </button>

        <!-- The Modal -->
        <div class="modal fade" id="menuCategoryModal">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title text-capitalize">add new menu category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  <form action setup-menu.php method="POST">
                    <div class="form-group">
                        <label for="menuCategoryName">Name:</label>
                        <input type="text" class="form-control" placeholder="Category Name" id="categoryName" name="CategoryName">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer py-2 bg-lightgrey">
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                  </form >

                </div>
                
                

                
            </div>
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
<script src="scripts/common.js"></script>
</body>

</html>
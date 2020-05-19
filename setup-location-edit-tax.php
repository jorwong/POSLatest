<?php 
include 'CRUD.php';
if ($_SERVER['REQUEST_METHOD']=="POST"){
    editLocationtax($_POST["tax_name"],$_POST["tax_rate"],$_POST["taxId"]);
}
if ($_SERVER['REQUEST_METHOD']=="POST"){
  addLocationtax($_POST["tax_name"],$_POST["tax_rate"],$_POST["locationName"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Tax | Edit</title>

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
      <li class="breadcrumb-item small"><a href="setup-location.php">Location</a></li>
      <li class="breadcrumb-item small"><a href="#"><?php echo $_GET["location_name"]?></a></li>
      <li class="breadcrumb-item small active" aria-current="page">Tax Rates</li>
    </ol>
  </nav>


<div class="container">

    <!-- header -->
    <div class="py-4 d-flex border-bottom border-silver">
        <div class="mr-auto">
          <h3 class="text-darker mb-0">Tax Rates</h3>
        </div>
        <div><button type="button" data-toggle="modal" data-target="#addTaxModal" class="text-white btn btn-secondary text-capitalize py-2">+ add tax</button></div>
    </div>
    <table class="table table-striped table-borderless">
        <thead>
          <tr class="text-primary">
            <th class="text-capitalize small font-weight-bold">Name</th>
            <th class="text-capitalize small font-weight-bold">Rate (%)</th>
            <th class="text-capitalize small font-weight-bold">is Default?</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        <?php
          require_once "mysql.php";
          $sql="SELECT * FROM TaxRates INNER JOIN Location ON Location.locationID = TaxRates.locationID WHERE location_name= '".$_GET["location_name"]."'";
            $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $rows=array();
            while ($row=mysqli_fetch_array($result_select)){
              $rows[]=$row;
            }
            if (empty($rows)){
              echo ('<!-- if no taxes added  -->
              <div class="bg-lightgrey py-3 shadow-none border border-light mt-3 text-center">
                  <h6 class="m-0 text-capitalize text-darker font-weight-bold">No Taxes Added Yet!</h6> 
          
              </div>');
            }
            else {
              foreach ($rows as $stmt){
                echo ('<!-- list each tax by row -->
                <tr>
                  <td>'.$stmt['taxName'].'</td>
                  <td>'.$stmt['TaxRate'].'</td>
                  <td>
                  <!-- toggle box -->
                      <form>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="'.$stmt['taxID'].'" '.($stmt['isDefault']== 1 ? "checked" : "").' name="chk[]" onclick="save_checkbox('.$stmt['taxID'].')">
                        <label class="custom-control-label" for="'.$stmt['taxID'].'"></label>
                      </div>
                    </form>
                  </td>
                  <td class="text-right">
                      <button type="button" data-toggle="modal" data-target="#editTaxModal" class="btn w-50 btn-sm btn-success text-white" data-id="'.$stmt['taxID'].'">
                          Edit tax
                      </button>
                          <br />
                      <button type="button" class="btn w-50 btn-sm btn-danger text-white" onclick="delete_button('.$stmt['taxID'].')">
                          delete
                      </button>
                  </td>
                </tr>');
              }
            }

        ?>
          
        </tbody>
    </table>

</div>


<!-- Add Tax Modal -->
  <div class="modal fade" id="addTaxModal">
      <div class="modal-dialog modal-md">
      <div class="modal-content">
      
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title text-capitalize">add sales tax</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              
              <form action setup-location-edit-tax.php method="POST">
                  <div class="form-row">
                      <div class="col">
                      <input type="text" class="form-control" id="tax_name" placeholder="Name" name="tax_name" />
                      </div>
                  </div>
                    <br/>
                  <div class="form-row">
                    <div class="col">
                    <input type="number" class="form-control" id="tax_rate" placeholder="Rate (%)" name="tax_rate" />
                    <input type="hidden" id="locationName" name="locationName" value="<?php echo $_GET['location_name'] ?>">

                    </div>
                </div>
                <br />
          <!-- Modal footer -->
                  <div class="modal-footer py-2 bg-lightgrey">
                    <button type="submit" class="btn btn-sm btn-success">save tax</button>
                  </div>

                </form>

          </div>
          
      </div>
      </div>
  </div>

<!-- Edit Tax Modal -->
<div class="modal fade" id="editTaxModal">
  <div class="modal-dialog modal-md">
  <div class="modal-content">
  
      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title text-capitalize">Edit Tax</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
              <form>
                  <div class="form-row">
                      <div class="col">
                      <input type="text" class="form-control" id="tax_name" placeholder="Name" name="tax_name" />
                      </div>
                  </div>
                    <br/>
                  <div class="form-row">
                    <div class="col">
                    <input type="number" class="form-control" id="tax_rate" placeholder="Rate (%)" name="tax_rate" />
                    </div>
                </div>
                <br />
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label text-capitalize" for="defaultCheck1">
                          default tax
                        </label>
                      </div>
                      <!-- Modal footer -->
                    <div class="modal-footer py-2 bg-lightgrey">
                    <button type="submit" class="btn btn-sm btn-success">save discount</button>
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
      function save_checkbox(tax_id){
        $.ajax({
          url: 'location-edit.php',
          type: "POST",
          data: {'id': tax_id,'func': "SaveChck"},
          success: function(response){
            alert(response);
          }
        });
      }
    </script>
    <script>
      function delete_button(tax_id){
        $.ajax({
          url: 'location-edit.php',
          type: "POST",
          data: {'id': tax_id,'func': "Delete"},
          success: function(response){
            location.reload();
          }
        });
      }
      </script>
      <script>
      $(document).ready(function(){

        $('button.btn.w-50.btn-sm.btn-success.text-white.waves-effect.waves-light').click(function() {

        var taxid = $(this).data("id");
        // AJAX request
        $.ajax({
        url: 'locationedit.php',
        type: 'POST',
        data: 'taxid='+ taxid,
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
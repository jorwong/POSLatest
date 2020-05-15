<?php
  include 'Adding.php';
  if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["ReasonName"])){
    addReason($_POST["ReasonName"]);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Order Cancellation Reasons | Edit</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/mdb/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb/css/mdb.min.css" rel="stylesheet">

    <link href="css/mdb/css/style.min.css" rel="stylesheet" />
    <!-- Modal Template -->
    <link href="css/mdb/css/modals/bootstrap-fs-modal-master/dist/css/fs-modal.min.css" rel="stylesheet">

</head>

<body class="bg-fadedpurple all-align-center">

<?php include "navbar.php" ?>

<div class="container">

    <!-- header -->
    <div class="py-4 d-flex border-bottom">
        <div class="mr-auto">      <h3 class="text-darker mb-0">Order Cancellation Reasons</h3></div>
        <div><button type="button" data-toggle="modal" data-target="#addReasonModal" class="btn btn-success text-white text-capitalize btn-sm">+ Add Reason</button></div>
    </div>

    <!-- add reason modal -->
    <div class="modal fade" id="addReasonModal">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title text-capitalize">add cancellation reason</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
          <form action setup-globalSettings-orderCancel.php method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Reason" id="ReasonName" name="ReasonName">
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer py-2 bg-lightgrey">
              <button type="submit" class="btn btn-sm btn-success">save reason</button>
            </div>
          </form>
            
        </div>
        </div>
    </div>
    

    <!-- table listing cancellation reasons -->
    <table class="table table-striped table-borderless border-bottom border-light">
        <thead>
          <tr>
            <th>Reason</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <!-- list each order discount here-->
          <?php
            require_once "mysql.php";
            $sql='SELECT reasonID ,reason, is_active FROM Order_Cancellation_Reasons;';
            $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $rows=array();
            while ($row=mysqli_fetch_array($result_select)){
              $rows[]=$row;
            }

            foreach ($rows as $stmt){
              echo ('<tr>
                <td>'.$stmt['reason'].'</td>
                <td> 
                    <form action setup-globalSettings-orderCancel.php method="POST">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="'.$stmt['reasonID'].'" value="'.$stmt['reasonID'].'"
                        '.($stmt['is_active']== 1 ? "checked" : "").' name="chk[]" onclick="save_checkbox('.$stmt['reasonID'].')">
                        <label class="custom-control-label" for="'.$stmt['reasonID'].'"></label>
                      </div>
                    
                  </td>
            <td class="text-right">
                <button type="button" class="btn btn-sm btn-danger text-white" onclick="delete_button('.$stmt['reasonID'].')">
                    delete
                </button>
                </form >
            </td>
          </tr>');
            };
          ?>
          <!-- if no order discounts -->
          <!-- <tr>
            <div class="mx-auto bg-lightgrey text-darker text-center text-capitalize py-3">no order cancellation reasons added yet.</div>
          </tr> -->

        </tbody>
    </table>

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
      function save_checkbox(record_id){
        $.ajax({
          url: 'OrderCancellationReason.php',
          type: "POST",
          data: {'id': record_id,'func': "SaveChck"},
          success: function(response){
            alert(response);
          }
        });
      }
      </script>
      <script>
      function delete_button(Reason_ID){
        $.ajax({
          url: 'OrderCancellationReason.php',
          type: "POST",
          data: {'id': Reason_ID,'func': "Delete"},
          success: function(response){
            location.reload();
          }
        });
      }
      </script>
    
            
</body>

</html>
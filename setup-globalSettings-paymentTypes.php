<?php 
include "mysql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkbox']))
{

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Payment Types | Edit</title>

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


<div class="container">

    <!-- header -->
    <div class="py-4 d-flex border-bottom">
        <div class="mr-auto">      <h3 class="text-darker mb-0">Payment Types</h3></div>
    </div>


    <!-- table listing cancellation reasons -->
    <table class="table table-striped table-borderless border-bottom border-light">
        <thead>
          <tr>
            <th>Payment Type</th>
            <!-- <th>Is Default?</th> -->
            <th>Is Active?</th>
          </tr>
        </thead>
        <tbody>
          <!-- list each order discount here-->
          <?php
            require_once "mysql.php";
            $sql='SELECT payment, is_active FROM Payment_Type;';
            $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $rows=array();
            while ($row=mysqli_fetch_array($result_select)){
              $rows[]=$row;
            }

            foreach ($rows as $stmt){
              echo ('<tr>
              <td>'.$stmt['payment'].'</td>
              <form id="Test" action setup-globalSettings-paymentTypes.php method="POST">
              <td> 
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="'.$stmt['payment'].'" value='.$stmt['payment'].'"
                '.($stmt['is_active']== 1 ? "checked" : "").' name="chk[]" onclick="save_checkbox('.$stmt['payment'].'.value)">
                <label class="custom-control-label" for="'.$stmt['payment'].'"></label>
                </div>
              </td>
              <td class="text-right">
                  <button type="button" class="btn btn-sm btn-danger text-white" onclick="delete_button('.$stmt['payment'].'.value)">
                      delete
                  </button>
              </td>
              </form>
          </tr>');
            };
          ?>

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
          url: 'paymentload.php',
          type: "POST",
          data: {'id':record_id,'func':"SaveChck"},
          success: function(response){
            alert(response);
          }
        });
      }

      function delete_button(payment_name){
        $.ajax({
          url: 'paymentload.php',
          type: "POST",
          data: {'id': payment_name,'func': "Delete"},
          success: function(response){
            location.reload();
          }
        });
      }
    </script>
</body>

</html>

<!-- <tr>
            <td><img class="h-25" src="css/img/payment_type_logos/cashpayment.jpg" /></td>
            <td>Cash</td>
            <td>
                <form>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck0" checked>
                      <label class="custom-control-label" for="customCheck0"></label>
                    </div>
                  </form>
            </td>
            <td>
            
                <form>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch0">
                  <label class="custom-control-label" for="switch0"></label>
                </div>
              </form>
            </td>
          </tr>
          <tr>
            <td><img style="height:8%!important;" src="css/img/payment_type_logos/visapayment.jpg" /></td>
            <td>VISA</td>
            <td>
                <form>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1"></label>
                    </div>
                  </form>
            </td>
            <td>
              
                  <form>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="switch1">
                    <label class="custom-control-label" for="switch1"></label>
                  </div>
                </form>
              </td>
          </tr>
          <tr>
            <td><img class="h-25" src="css/img/payment_type_logos/mastercardpayment.jpg" /></td>
            <td>MasterCard</td>
            <td>
                <form>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2"></label>
                    </div>
                  </form>
            </td>
            <td>
            
                <form>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch2">
                  <label class="custom-control-label" for="switch2"></label>
                </div>
              </form>
            </td>
          </tr>
          <tr>
            <td><img class="h-25" src="css/img/payment_type_logos/discoverpayment.png" /></td>
            <td>Discover</td>
            <td>
                <form>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3">
                      <label class="custom-control-label" for="customCheck3"></label>
                    </div>
                  </form>
            </td>
            <td>
            
                <form>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch3">
                  <label class="custom-control-label" for="switch3"></label>
                </div>
              </form>
            </td>
          </tr> -->
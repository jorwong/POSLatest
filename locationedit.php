<?php
session_start();
include 'mysql.php';

$varianceName=$_POST['taxid'];
$sql="SELECT * FROM TaxRates WHERE taxID='".$varianceName ."'";

$result=mysqli_query($conn,$sql) or die (mysqli_error($conn));

if (mysqli_num_rows($result) > 0) { 
    $row=mysqli_fetch_array($result);
    echo ('<div class="modal-body">
    <form action setup-location-edit-tax.php method="POST">
        <div class="form-row">
            <div class="col">
            <input type="text" class="form-control" id="tax_name" placeholder="'. $row['taxName']. '" name="tax_name" />
            </div>
        </div>
          <br/>
        <div class="form-row">
          <div class="col">
          <input type="number" class="form-control" id="tax_rate" placeholder="'.$row['TaxRate'].'%" name="tax_rate" />
          <input type="hidden" id="taxId" name="taxId" value="'.$row['taxID'].'">
          </div>
      </div>
      <br />
            <!-- Modal footer -->
          <div class="modal-footer py-2 bg-lightgrey">
          <button type="submit" class="btn btn-sm btn-success">save discount</button>
          </div>
      </form>

</div>');

    
}

?>


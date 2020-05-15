<?php
session_start();
include 'mysql.php';

$varianceName=$_POST['variance_name'];
$sql="SELECT variance_name FROM Variance_Category WHERE variance_name='" .$varianceName ."'";

$result=mysqli_query($conn,$sql) or die (mysqli_error($conn));

if (mysqli_num_rows($result) > 0) { 
    $row=mysqli_fetch_array($result);
    unset($_SESSION["prevVarCat"]);
    $_SESSION["prevVarCat"]=$varianceName;
    echo ('<div class="modal-body">
                <form action setup-globalSettings-modifier.php method="POST">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" class="form-control" id="category_name" placeholder="'. $row['variance_name']. '" name="CHGcategory">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer py-2 bg-lightgrey">
                        <button type="submit" class="btn btn-sm btn-success">save</button>
                    </div>
                    </form>
            </div>');

    
}

?>


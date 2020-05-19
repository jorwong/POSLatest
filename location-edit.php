<?php
    
    $func=$_POST["func"];
    $id=$_POST["id"];
    include "mysql.php";

    if($func == "SaveChck"){
        if($id!=NULL){
            $sql='SELECT isDefault FROM TaxRates WHERE taxID= ? ';
            if ($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'i',$id);
                if(mysqli_stmt_execute($stmt)){
                    $reslt= mysqli_stmt_get_result($stmt);
                    $value=$reslt->fetch_object();
                    $check=$value->isDefault;
                    if ($check==1){
                        $sql='UPDATE TaxRates SET isDefault= 0 WHERE taxID= ? ';
                        if($stmt=mysqli_prepare($conn,$sql)){
                            mysqli_stmt_bind_param($stmt,'i',$namevar);
                            $namevar=$id;
                            if (mysqli_stmt_execute($stmt)){
                              echo "Updated";
                            }
                            else{
                                echo mysqli_stmt_error($stmt);
                            }
                            $stmt->close();
                        }
                    }
                    else{
                        $sql='UPDATE TaxRates SET isDefault= 1 WHERE taxID= ? ';
                        if($stmt=mysqli_prepare($conn,$sql)){
                            mysqli_stmt_bind_param($stmt,'i',$namevar);
                            $namevar=$id;
                            if (mysqli_stmt_execute($stmt)){
                               echo "Updated";
                            }
                            else{
                                echo mysqli_stmt_error($stmt);
                            }
                            $stmt->close();
                        }
                    }
                }
                else{
                    echo mysqli_stmt_error($stmt);
                }
            }        
            
        }
    }

    if ($func == "Delete"){
        $sql="DELETE FROM TaxRates WHERE taxID= ?";
        if($stmt=mysqli_prepare($conn,$sql)){
            mysqli_stmt_bind_param($stmt,'i',$idparm);
            $idparm=$id;
            if (mysqli_stmt_execute($stmt)){
                echo "Updated";
             }
             else{
                 echo mysqli_stmt_error($stmt);
             }
             $stmt->close();
        }

    }
    
    
?>
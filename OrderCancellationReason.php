<?php
    
    $func=$_POST["func"];
    $id=$_POST["id"];
    include "mysql.php";

    if($func == "SaveChck"){
        if($id!=NULL){
            $sql='SELECT is_active FROM Order_Cancellation_Reasons WHERE reasonID= ? ';
            if ($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'i',$id);
                if(mysqli_stmt_execute($stmt)){
                    $reslt= mysqli_stmt_get_result($stmt);
                    $value=$reslt->fetch_object();
                    $check=$value->is_active;
    
                    if ($check==1){
    
                        $sql='UPDATE Order_Cancellation_Reasons SET is_active= 0 WHERE reasonID= ? ';
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
                        $sql='UPDATE Order_Cancellation_Reasons SET is_active= 1 WHERE reasonID= ? ';
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
        $sql="DELETE FROM Order_Cancellation_Reasons WHERE reasonID= ?";
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
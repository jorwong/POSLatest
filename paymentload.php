<?php
    $func=$_POST["func"];
    $name=$_POST["id"];
    $name= mb_substr($name, 0,-1);
    include "mysql.php";


    if ($func == "SaveChck"){
        if($name!=NULL){
            $sql='SELECT is_active FROM Payment_Type WHERE payment= ? ';
            if ($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'s',$name);
                if(mysqli_stmt_execute($stmt)){
                    $reslt= mysqli_stmt_get_result($stmt);
                    $value=$reslt->fetch_object();
                    $check=$value->is_active;
                    if ($check==1){
                        $sql='UPDATE Payment_Type SET is_active= 0 WHERE payment=  ? ';
                        if($stmt=mysqli_prepare($conn,$sql)){
                            mysqli_stmt_bind_param($stmt,'s',$namevar);
                            $namevar=$name;
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
                        $sql='UPDATE Payment_Type SET is_active= 1 WHERE payment=  ? ';
                        if($stmt=mysqli_prepare($conn,$sql)){
                            mysqli_stmt_bind_param($stmt,'s',$namevar);
                            $namevar=$name;
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
        $sql="DELETE FROM Payment_Type WHERE payment= ?";
        if($stmt=mysqli_prepare($conn,$sql)){
            mysqli_stmt_bind_param($stmt,'s',$namevar);
            $namevar=$name;
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
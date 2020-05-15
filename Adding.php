<?php
    echo $_POST["Food_warning_name"];
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Food_warning_name"]!=NULL)
    {
        addWarning($_POST["Food_warning_name"]);
    };

    function addWarning($Warning_Name){
        require_once "mysql.php";
        echo "hello";
        echo $Warning_Name;
        if($Warning_Name!= NULL)
        {
            echo "test";
            $Warning = trim($Warning_Name);
            
            $sql='INSERT INTO Food_Warning (warning) VALUES ( ? )';
            if($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'s',$Warning);
            
                if (mysqli_stmt_execute($stmt)){
                    echo "Food Warning Added";
                }
                else{
                    echo mysqli_stmt_error($stmt);
                }
                }
        };
    };

    function addVariant($Variant_name){
        include "mysql.php";
        if ($Variant_name!=NULL){
            $sql='INSERT INTO Variance_Category (variance_name) VALUES ( ? )';
            if($stmt=mysqli_prepare($conn,$sql))
            {
                mysqli_stmt_bind_param($stmt,'s',$Variant_name);
            
                if (mysqli_stmt_execute($stmt))
                {
                    header("Refresh:0");
                }
                else
                {
                    echo mysqli_stmt_error($stmt);
                }
            }
        };
    };

    function editVariant($Variant_name,$prevVarName){
        include "mysql.php";
        if ($Variant_name!=NULL){
            $sql='UPDATE Variance_Category SET variance_name= ? WHERE variance_name= ?';
            if($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'ss',$setVar,$prevVar);
                $setVar=$Variant_name;
                $prevVar=$prevVarName;
                if (mysqli_stmt_execute($stmt)){
                    header("Refresh:0");
                }
                $stmt->close();
            }
        }
    }

    function addReason($ReasonName){
        include "mysql.php";
        if ($ReasonName!=NULL){
            $sql='INSERT INTO Order_Cancellation_Reasons (reason, is_active) VALUES ( ? , TRUE )';
            if($stmt=mysqli_prepare($conn,$sql))
            {
                mysqli_stmt_bind_param($stmt,'s',$ReasonName);
            
                if (mysqli_stmt_execute($stmt))
                {
                    header("Refresh:0");
                }
                else
                {
                    echo mysqli_stmt_error($stmt);
                }
            }
        };
    }

    function addLocation($LocationName, $address, $Contact){
        include "mysql.php";
        if ($LocationName!=NULL){
            $sql='INSERT INTO Location (location_name, Address, ContactNumber) VALUES ( ? , ?, ?)';
            if($stmt=mysqli_prepare($conn,$sql))
            {
                mysqli_stmt_bind_param($stmt,'ssi',$LocationName,$address,$Contact);
            
                if (mysqli_stmt_execute($stmt))
                {
                    header("Refresh:0");
                }
                else
                {
                    echo mysqli_stmt_error($stmt);
                }
            }
        };
    }

    function editLocation($LocationName, $address, $Contact, $prevLoca){
        include "mysql.php";
        if ($prevLoca!=NULL){
            $sql='UPDATE Location SET location_name= ? , Address= ?, ContactNumber= ? WHERE location_name= ?';
            if($stmt=mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,'ssis',$setLoca,$SetAddress,$SetContact,$prev);
                $setLoca=$LocationName;
                $SetAddress=$address;
                $SetContact=$Contact;
                $prev=$prevLoca;
                if (mysqli_stmt_execute($stmt)){
                    header("location:setup-location-edit.php?".'location_name='.$prevLoca);
                }
                $stmt->close();
            }
            else {
                trigger_error("error:".mysqli_error($conn),E_USER_ERROR);
                }
        }
    }


?>
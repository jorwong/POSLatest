<?php
    include 'CRUD.php';
    echo $_POST["Food_warning_name"];
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Food_warning_name"]!=NULL)
    {
        addWarning($_POST["Food_warning_name"]);
    };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Add Menu Item</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/mdb/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb/css/mdb.min.css" rel="stylesheet">

    <!-- Modal Template -->
    <link href="css/mdb/css/modals/bootstrap-fs-modal-master/dist/css/fs-modal.min.css" rel="stylesheet">

</head>

<body class="bg-fadedpurple all-align-center">

<?php include "navbar.php" ?>

<div class="px-4">

<!-- header -->
<div class="row py-3 mx-auto">
    <div class="col"><h3 class="text-success">Add Menu Item</h3></div>
</div>

<hr />


<!-- form starts here -->
<div class="mb-5 pb-5">
    <form action setup-menu-addItem.php method="POST"> 
        
        <!--- Item detail accordion -->
        <div class="accordion mb-4" id="accordion_item">

            <div class="card">
                <div class="card-header pl-0 d-flex bg-666" id="headingOne">
                    <div class="mr-auto">
                        <h5 class="mb-0">
                        <button class="btn btn-link py-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="text-white text-capitalize">Item Details</span>
                        </button>
                        </h5>
                    </div>
                    <div class="font-weight-bold">
                        <button class="btn btn-link bg-transparent text-white font-weight-bold py-0 px-3" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="text-white">+</span>
                        </button>
                    </div>    
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_item">
                    <div class="card-body row">
                        
                        <!-- left sidebar input fields -->
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="food_item" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="food_item" name="food_name">
                                </div>
                                </div>

                                <div class="form-group row">
                                <label for="food_item_code" class="col-sm-2 col-form-label">Item Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="food_item_code" name="food_item_code">
                                </div>
                                </div>


                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="Price">                            
                                <small id="passwordHelpInline" class="text-muted">
                                    All prices are in SGD
                                </small>
                                </div>
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Location Availability</legend>
                                <div class="col-sm-10">
                                    <?php
                                    require_once "mysql.php";
                                    $sql="SELECT location_name FROM Location;";
                                    $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $rows=array();
                                    while ($row=mysqli_fetch_array($result_select)){
                                        $rows[]=$row;
                                    }
                                    foreach ($rows as $stmt){
                                        $LocaName=stripslashes($stmt['location_name']);
                                        echo ('<div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="location1">
                                        <label class="form-check-label" for="location1">'.$LocaName .'</label>
                                        <br />');
                                    }
                                    ?>
                                    
                                </div>
                                </div>
                            </fieldset>

                            
                            <div class="form-group row">
                                <label for="cattegory" class="col-sm-2 col-form-label">Cateogry</label>
                                <div class="col-sm-10">
                                    <select class="custom-select my-1 mr-sm-2" id="category">
                                    <?php
                                        require_once "mysql.php";
                                        $sql='SELECT category FROM Menu_Category;';
                                        $result_select=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                        $rows=array();
                                        while ($row=mysqli_fetch_array($result_select)){
                                            $rows[]=$row;
                                        }
                                        foreach ($rows as $stmt){
                                            $CatName=stripslashes($stmt['category']);
                                            echo ('<option value="'. $CatName .'">'. $CatName . '</option>');
                                        }
                                        ?>
                                    </select>
                                </div> 
                            </div>


                            
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="description" rows="4"></textarea>
                                    </div>
                                </div>

                        </div>

                        <!-- right sidebar input fields -->
                        <div class="col-5">

                                <div class="form-group row">
                                <label for="food_img" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control-file" id="food_img">
                                    </div>
                                </div>

                                <div class="bg-lightgrey pt-3 px-3 pb-0 rounded border border-light">
                                    <fieldset class="form-group">
                                        <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Item Status</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Available
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Unavailable
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Food Warning accordion -->
        <div class="accordion mb-4" id="accordion_symbols">

            <div class="card">
                <div class="card-header pl-0 d-flex bg-666" id="headingOne">
                    <div class="mr-auto">
                        <h5 class="mb-0">
                        <button class="btn btn-link py-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <span class="text-white text-capitalize">Food Warnings</span>
                        </button>
                        </h5>
                    </div>
                    <div class="font-weight-bold">
                        <button class="btn btn-link bg-transparent text-white font-weight-bold py-0 px-3" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <span class="text-white">+</span>
                        </button>
                    </div>    
                </div>
            
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_symbols">

                    <div class="card-body pb-0 row">
                        <div class="col-3">
                            <fieldset class="form-group">
                                    <div class="col-sm-10">
                                    <div class="form-check custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck0" name="example0">
                                        <label class="custom-control-label" for="customCheck0">Vegetarian</label>
                                    </div>
                                    <div class="form-check custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                        <label class="custom-control-label" for="customCheck1">May contain nuts</label>
                                    </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                    <div class="col-sm-10">
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                            <label class="custom-control-label" for="customCheck2">Spicy</label>
                                        </div>
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="example1">
                                            <label class="custom-control-label" for="customCheck3">Very Spicy</label>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                    <div class="col-sm-10">
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="example4">
                                            <label class="custom-control-label" for="customCheck4">Gluten Free</label>
                                        </div>
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="example5">
                                            <label class="custom-control-label" for="customCheck5">Contains Beef</label>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                    <div class="col-sm-10">
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="example6">
                                            <label class="custom-control-label" for="customCheck6">Contains Pork</label>
                                        </div>
                                        <div class="form-check custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="example7">
                                            <label class="custom-control-label" for="customCheck7">Contains Fish</label>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                    </div>
                
                    <!-- btnAddFoodWarning -->
                    <button type="button" id="btnAddFoodWarning" class="btn text-primary text-capitalize btn-transparent shadow-none ml-3  px-3 m-0">
                        <i class="fa fa-plus text-primary"></i> add food warning
                    </button>
                    <!-- add food warning form -->
                        <div id="fwFormContainer" class="d-none ml-4 mb-3 form-row align-items-center">
                          <div class="col-sm-3 my-1">
                            <input type="text" class="form-control rounded form-control-sm" id="inlineFormInputName" placeholder="Food Warning Name" name="Food_warning_name">
                          </div>
                          <div class="col-auto my-1">
                            <button type="submit" id="save_food_warning" class="btn btn-success btn-sm px-4 text-capitalize">save</button>
                          </div>
                        </div>

                    

                </div>
            </div>

        </div>


        <!-- Item Variants accordion -->
        <div class="accordion mb-4" id="accordion_variants">

            <div class="card">
                <div class="card-header pl-0 d-flex bg-666" id="headingOne">
                    <div class="mr-auto">
                        <h5 class="mb-0">
                        <button class="btn btn-link py-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <span class="text-white text-capitalize">Item Variants</span>
                        </button>
                        </h5>
                    </div>
                    <div class="font-weight-bold">
                        <button class="btn btn-link bg-transparent text-white font-weight-bold py-0 px-3" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <span class="text-white">+</span>
                        </button>
                    </div>    
                </div>
            
                <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_variants">
                    <div class="card-body">
                        
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck8"  onclick="letVarInputs()">
                            <label class="custom-control-label" for="customCheck8">This product has multiple variances, like different sizes or different doneness levels</label>
                        </div>

                        <!-- if box checked, show this div and its checked values -->
                        <div class="d-none" id="variance_list_container">
                            <hr />
                            <p class="font-weight-bold text-capitalize small mb-0">variances</p>

                                <!-- list all variants here -->
                                <table class="table mb-0 table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col"><small class="text-muted text-capitalize">variant category</small></th>
                                        <th scope="col"><small class="text-muted text-capitalize">options</small></th>
                                        <th scope="col"><small class="text-muted text-capitalize">price difference</small></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>variant</td>
                                        <td>option</td>
                                        <td>price_diff</td>
                                        <td class="text-right"><button class="btn btn-sm btn-danger text-capitalize font-weight-normal text-white">delete</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            



                            <button type="button" data-toggle="modal" data-target="#addVarModal" class="btn rounded btn-primary mt-0 text-white btn-sm text-capitalize">add a variant</button> 
                            <hr />

                            <!-- add VARient modal -->
                            <div class="modal fade" id="addVarModal">
                                <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h5 class="modal-title text-capitalize">add a varient</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <div class="form-row mb-3 px-1">
                                            <div class="col">

                                                <div class="input-group">
                                                    <input type="text" id="variant_category" placeholder="e.g. size or doneness level" class="form-control" aria-label="Text input with dropdown button">
                                                        <div class="input-group-append">
                                                            <select class="custom-select">
                                                                <option selected></option>
                                                                <option value="category1">category1</option>
                                                            </select>                                                          
                                                        </div>
                                                </div>  

                                            </div>
                                        </div>

                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer py-2 bg-lightgrey">
                                    <button type="button" class="btn btn-sm btn-primary">save varient</button>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>   
</div>


<!-- footer -->
<footer type="footer" class="d-flex bg-lightgrey mx-100 p-2 fixed-bottom border-top border-light">
    <div class="mr-auto"><button onclick="menuHTML()" class="text-capitalize btn btn-light py-2 shadow-sm Border border-light rounded">Cancel</button></div>
    <div><button id="btnSaveFoodItem" type="submit" class="btn btn-success text-white py-2 text-capitalize border border-light shadow-sm">Save</button></div>
</footer> 

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
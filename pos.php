<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>POS</title>

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

    <!-- font aswesome -->
    <script src="https://use.fontawesome.com/41a51dbca5.js"></script>

</head>

<body class="bg-fadedpurple all-align-center">

<?php include "navbar.php" ?>



<form meta-charset="utf-8">

    <!-- header -->
    <div class="row mx-auto py-3">
            <div class="col-9">
                <div class="d-flex bg-lightgrey border border-light">
                    <div class="mr-auto">
                        <!-- dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn py-2 px-3 btn-transparent shadow-none text-uppercase dropdown-toggle" style="font-size:120%;" data-toggle="dropdown">
                            Current_Location
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="setup.html">Location 1</a>
                            <a class="dropdown-item" href="#">Location 2</a>
                            </div>
                        </div>
                    </div>
                    <div><button class="btn btn-primary rounded disabled" type="button">Loyalty</button></div>
                    <div><button class="btn btn-warning shadow-sm rounded border border-light text-capitalize" data-toggle="modal" data-target="#addNotesModal" type="button">Add Note</button></div>
                    <div><button class="btn btn-info shadow-sm rounded border boredr-light text-capitalize" data-toggle="modal" data-target="#addDiscountModal" type="button">+ Discount</button></div>
                </div>
            </div>
        
        <!-- Place Order button-->
            <div class="col-3">
                <button type="button" data-toggle="modal" data-target="#orderModal" class="btn rounded btn-success text-white text-center py-4 btn-block text-uppercase" data-toggle="modal" data-target="#menuCategoryModal">
                    place order
                </button>
            </div>
    </div>

    <!-- 3 MODALS -->

    <!-- add notes modal -->
    <div class="modal fade" id="addNotesModal">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title text-capitalize">add note</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body form-group">
            <textarea class="form-control" id="order_note" rows="4"></textarea>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer py-2 bg-warning">
        <button type="button" class="btn btn-sm btn-success text-white">save</button>
        </div>
        
    </div>
    </div>
    </div>

    <!-- add discount modal -->
    <div class="modal fade" id="addDiscountModal">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">add discount</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body container">

                <!-- discount container -->
                <div id="discount_container">

                    <!-- for each discount -->
                        <button class="text-white text-capitalize btn btn-block btn-info py-2 px-4 mb-2">
                            <div class="d-flex text-white">
                                <div class="mr-auto text-left">
                                    <h5 class="mb-1">name</h5>
                                    <p class="m-0">rate (on total)</p>
                                </div>
                                <div><i class="text-white mt-3 fa fa-arrow-right"></i></div>
                            </div>
                        </button>

                </div>
                                
                <!-- if no discounts added yet -->
                <div class="jumbotron mb-0 shadow-none rounded border border-light bg-lightgrey">
                    <h4>No discounts found!</h4>
                    <a href="setup-location-edit-discounts.html" type="button" class="btn btn-sm btn-primary text-capitalize rounded text-white">set one up right now</a>
                </div>


            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer py-2 bg-lightgrey">
            <button type="button" class="btn btn-sm btn-light text-capitalize border shadow-none font-weight-bold border-light rounded" data-dismiss="modal">Close</button>
            <button type="button" class="btn text-capitalize rounded btn-sm btn-success">add discount</button>
            </div>
            
        </div>
        </div>
    </div>

    <!-- order modal -->
    <div class="modal fade" id="orderModal">
        <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-lg">

            <!-- modal header -->
            <div class="bg-lightgrey text-center py-5">
                <h5 class="modal-title text-uppercase text-muted small">total amount(SGD)</h5>
                <h1 class="text-success mt-2 display-3">223.57</h1><!-- total amount -->
            </div>

            <!-- Modal body -->
            <div class="modal-body container py-2">
                <div class="form-row">
                    <div class="col-8">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-lg" value="" id="edited_total_amount"><!-- load the same value as total_amount-->
                            <div class="input-group-append">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">SGD</span>
                              </div>
                            <div class="invalid-tooltip">
                              Error!
                            </div>
                          </div>
                    </div>
                    <div class="col-4">
                        <select class="custom-select custom-select-lg mb-3">
                            <option selected>Cash</option>
                            <option>Payment1</option>
                            <option>Payment2</option>
                            <option>Payment3</option>
                          </select>                    
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer py-2 bg-lightgrey">
                <button type="button" class="btn p-3 btn-light text-capitalize border shadow-none border-light rounded" data-dismiss="modal">Close</button>
                <button type="button" class="btn py-3 px-5 text-capitalize rounded btn-success">pay</button>
            </div>
            
        </div>
        </div>
    </div>

    <!-- variance modal, for items with variances -->
    <div class="modal fade" id="varianceModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header pt-3 pb-2">
                <h3 class="modal-title text-success text-capitalize">food_name</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body container pb-4 mx-auto">

                <!-- variance header -->
                <h6 class="mb-4  pl-2 text-capitalize font-weight-bold" style="color:#607d8b;">variance_name</h6>

                <ul class="list-group">

                    <!-- li to list each variant option -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="mr-auto text-capitalize">rare
                            <small id="extra-cost" class="text-primary">+ 1.00</small>
                        </span>
                      <div class="form-group-inline d-flex">
                        <div class="btn-group">
                            <button type="button" class="btn shadow-none btn-lightgrey border p-2" id="subtract1">-</button>
                                <button id="qty_btn" class="btn border-0 shadow-none btn-transparent p-0">
                                    <input type="number" id="variant_option_qty" value="0" style="width:30px;"class="text-center border-0 m-0 bg-transparent p-0" />
                                </button>
                                <button type="button" class="btn shadow-none btn-lightgrey border p-2" id="add1">+</button>
                        </div>
                      </div>
                    </li>

                  </ul>

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer py-2 bg-lightgrey">
                <button type="button" class="btn p-3 btn-light text-capitalize border shadow-none border-light rounded" data-dismiss="modal">cancel</button>
                <button type="button" class="btn py-3 px-3 text-capitalize rounded btn-success">add variance</button>
            </div>
            
        </div>
        </div>
    </div>

    <div class="row mx-auto px-2">
    <!-- left side bar (main content) -->
        <div class="col-5 border-light">

            <div class="rounded-top font-weight-bold text-dark small text-capitalize p-2" style="background-color:rgb(219, 219, 219);"> <!-- header -->
                menu items selected
            </div>

            <div class="p-0 m-0 mb-0 bg-transparent border border-light"> <!-- selected menu items -->
                <table class="table">
                    <thead>
                    <tr>
                        <th class="small font-weight-bold">Item Name</th>
                        <th class="small pl-4 font-weight-bold">QTY</th>
                        <th class="small font-weight-bold">Price</th>
                        <th class="small font-weight-bold">Subtotal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><!-- for each item selected -->
                        <td class="text-primary">Chicken Rice</td>
                        <td class="w-25">  
                            <div class="btn-group">
                                <button type="button" class="btn shadow-none btn-lightgrey border p-2" id="subtract">-</button>
                                <button id="qty_btn" class="btn border-0 shadow-none btn-transparent p-0">
                                    <input type="number" id="qty" value="1" style="width:30px;"class="text-center border-0 m-0 bg-transparent p-0" />
                                </button>
                                <button type="button" class="btn shadow-none btn-lightgrey border p-2" id="add">+</button>
                            </div>
                        </td>
                        <td class="text-primary">$4.50</td>
                        <td class="text-primary">$4.50</td>
                        <td><button type="button" class="bg-danger border-light border rounded shadow-lg border-0 text-white">X</button></td>
                    </tr>
                    </tbody>
                </table>
                <div class="rounded-bottom bg-lightgrey p-3">
                    <p class="mb-1" style="font-size:90%;">Subtotal: <span class="float-right" >total_value</span></p>

                    <!-- tax, if no tax then value=0-->
                    <p class="mb-1" style="font-size:90%;">tax(tax_rate): <span class="float-right" >58</span></p>

                    <!-- if discount applied-->
                    <p class="mb-1">discount_name(discount_rate): <span class="float-right">-3.74</span></p>

                    <h5 class="mb-0">Total: <span class="font-weight-bold float-right">SGD 1128</span></h5>
                </div>
            </div>

        </div>

    <!-- right sidebar -->
        <div class="col-7">

            <div class="d-flex rounded-top font-weight-bold text-dark small text-capitalize" style="background-color:rgb(219, 219, 219);"> <!-- header -->
                <div class="mr-auto text-darker py-2 pl-2">menu categories</div>
            </div>

            <div class="bg-transparent border p-2 border-light rounded m-0">

                <div class="bg-transparent py-2 row mx-auto" id="menu-category-btns" role="tablist">

                    <!-- each div for each menu category-->
                        <div class="col-3">
                            <button class="btn border border-light w-100 py-5 px-0 bg-primary shadow-sm text-white" type="button" data-toggle="pill" onclick="gone()" href="#food-in-category1">category_name</button>
                        </div>
                        <div class="col-3">
                            <button class="btn border border-light w-100 py-5 px-0 bg-info shadow-sm text-white" type="button" data-toggle="pill" onclick="gone()" href="#food-in-category2">category_name</button>
                        </div>

                </div> 

                <!-- Food items -->
                <div class="tab-content">

                    <!-- food in a category -->
                    <div id="food-in-category1" class="row m-0 p-0 tab-pane">
                        <div class="row m-0">
                            <!-- list each food item in this category-->
                            <div class="col-3">
                                <button class="btn border border-light w-100 py-5 px-0 bg-primary shadow-sm text-white" type="button" data-toggle="modal" data-target="#varianceModal">food1</button>
                            </div>
                        </div>   
                    </div>

                    <!-- food in another category -->
                    <div id="food-in-category2" class="m-0 p-0 tab-pane">
                        <div class="row m-0">
                            <div class="col-3">
                                <button class="btn border border-light w-100 py-5 px-0 bg-primary shadow-sm text-white" type="button">food1</button>
                            </div>
                            <div class="col-3">
                                <button class="btn border border-light w-100 py-5 px-0 bg-primary shadow-sm text-white" type="button">food2</button>
                            </div>
                        </div> 
                    </div>
                </div>

            </div>
                
            <!-- if no menu items -->
            <div class="jumbotron w-100 mx-auto my-0 bg-lightgrey shadow-none rounded border-light border">
                <h2 class="mb-3">Oh no!</h2>
                <p class="small">Seems like there are <strong>no menu items added yet !</strong></p>
                <div class="d-flex">
                    <div><button type="button" onclick="menuItem()" class="btn btn btn-success shadow-none text-white text-capitalize py-2 px-3">Add menu item</button></div>        
                </div>
            </div>

        </div>
    </div>

</form>

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

    <script src="scripts/pos.js"></script>
    <script src="scripts/common.js"></script>

</body>

</html>
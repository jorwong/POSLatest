<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <title>Discounts & Surcharges | Edit</title>

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

<!-- navbar -->
<?php include "navbar.php" ?>

<!-- breadcrumb -->  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.html">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-location.html">location</a></li>
      <li class="breadcrumb-item small"><a href="#">location_name</a></li>
      <li class="breadcrumb-item small active" aria-current="page">Discounts</li>
    </ol>
  </nav>


<div class="container">

    <!-- header -->
    <div class="py-4 border-bottom">
      <h3 class="text-darker mb-0">Discounts & Surcharges</h3>
    </div>

    <!-- dynamic tabs -->
    <ul class="nav nav-tabs nav-justified mt-4">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tab1">Order Discounts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab2">Item Discounts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Additional Surcharges</a>
        </li>
      </ul>

    
      <!-- Tab panes -->
      <div class="tab-content">

          <!-- tab pane 1 -->
          <div class="tab-pane container active" id="tab1">
              <div class="d-flex pt-4"><!-- Order Discounts Header-->
                  <div class="mr-auto"><h4 class="text-darker">Order Discounts</h4></div>
                  <div><button data-toggle="modal" data-target="#addOrderDiscountModal" class="text-white btn btn-info btn-sm">+ add order discount</button></div>
              </div>
              <table class="table table-striped table-borderless"> <!-- list order discounts -->
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Rate</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- list each order discount here-->
                    <tr>
                      <td>Employee Discount</td>
                      <td>Percentage (%)</td>
                      <td>25%</td>
                      <td>
                      <!-- toggle box -->
                          <form>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch1">
                            <label class="custom-control-label" for="switch1"></label>
                          </div>
                        </form>
                      </td>
                      <td class="text-right">
                          <button type="button" data-toggle="modal" data-target="#editDiscountModal" class="btn w-50 btn-sm btn-success text-white">
                              Edit
                          </button><br />
                          <button type="button" class="btn w-50 btn-sm btn-danger text-white">
                              delete
                          </button>
                      </td>
                    </tr>
                  </tbody>
              </table>

              <!-- if nothing to list -->
              <div class="row p-2 mx-2 text-center bg-lightgrey">
                <p class="mb-0 text-capitalize text-darker">No Surcharges Added Yet</p>
              </div>

          </div>


          <!-- tab pane 2 -->
          <div class="tab-pane container fade" id="tab2">
              <div class="d-flex pt-4"><!-- Order Discounts Header-->
                  <div class="mr-auto"><h4 class="text-darker">Item Discounts</h4></div>
                  <div><button data-toggle="modal" data-target="#addItemDiscountModal" class="text-white btn btn-info btn-sm">+ add item discount</button></div>
              </div>
              <table class="table table-striped table-borderless"> <!-- list order discounts -->
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Rate</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- list each discount with this row -->
                    <tr>
                      <td>Employee Discount</td>
                      <td>Percentage (%)</td>
                      <td>25%</td>
                      <td><!-- toggle box -->
                          <form>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch1">
                            <label class="custom-control-label" for="switch1"></label>
                          </div>
                        </form>
                      </td>
                      <td class="text-right">
                          <button type="button" data-toggle="modal" data-target="#editDiscountModal" class="btn w-50 btn-sm btn-success text-white">
                              Edit
                          </button><br />
                          <button type="button" class="btn w-50 btn-sm btn-danger text-white">
                              delete
                          </button>
                      </td>
                    </tr>

                  </tbody>
              </table>

              <!-- if nothing to list -->
              <div class="row p-2 mx-2 text-center bg-lightgrey">
                <p class="mb-0 text-capitalize text-darker">No Surcharges Added Yet</p>
              </div>
          
            </div>

      </div>

</div>


<!-- Order Discount Modal -->
  <div class="modal fade" id="addOrderDiscountModal">
      <div class="modal-dialog modal-md">
      <div class="modal-content">
      
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title text-capitalize">Order Discount</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              
              <form>
                  <div class="form-row">
                      <div class="col">
                      <input type="text" class="form-control" id="discount_name" placeholder="Name" name="discount_name">
                      </div>
                  </div>
                  <div class="form-row my-3">
                      <div class="col">
                        <select name="discount_type" class="custom-select">
                          <option selected>Discount Type</option>
                          <option value="volvo">Percentage (%)</option>
                          <option value="fiat">Flat Value</option>
                        </select>                      
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                    <input type="number" class="form-control" id="rate" placeholder="Rate" name="rate">
                    </div>
                </div>

                <!-- 
                <div class="form-row mt-3">
                  <div class="col">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                      <label class="custom-control-label" for="customCheck">Discount on Total Amount?</label>
                    </div>
                  </div>
                </div> -->

                <!-- discount schedule portion -->
                <br />
                <h6 class="text-darker small mt-2 font-weight-bold">Discount Schedule</h6>
                <div class="container py-3 border border-light">

                  <!-- day options -->
                  <div class="form-row">
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Sun</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Mon</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Tue</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Wed</label>
                      </div>
                    </div>

                  </div>
                  <div class="form-row mt-1">
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Thurs</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Fri</label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Sat</label>
                      </div>
                    </div>
                  </div>

                  <hr class="my-4"/>

                  <!-- Specific Date -->
                  <div class="form-row mt-3 ml-1">
                      <div class="col">
                      <label for="date">Start Date</label>
                      <input type="date" class="form-control" id="date1" placeholder="Start Date" name="date">
                      </div>
                      <div class="col">
                        <label for="date">End Date</label>
                        <input type="date" class="form-control" id="date2" placeholder="Start Date" name="date">
                      </div>
                  </div>

                  <hr class="my-4"/>

                  <!-- Specific Timing -->
                  <div class="form-row mt-3 ml-1">
                    <div class="col">
                    <label for="time">Start Time</label>
                    <input type="time" class="form-control" id="time1" placeholder="Start Time" name="time">
                    </div>
                    <div class="col">
                      <label for="time">End Time</label>
                      <input type="time" class="form-control" id="time2" placeholder="Start Date" name="time">
                    </div>
                </div>

                </div>

                  </form>

          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer py-2 bg-lightgrey">
          <button type="button" class="btn btn-sm btn-success">save discount</button>
          </div>
          
      </div>
      </div>
  </div>


<!-- Item Discount Modal -->
<div class="modal fade" id="addItemDiscountModal">
  <div class="modal-dialog modal-md">
  <div class="modal-content">
  
      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title text-capitalize">Item Discount</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
          
          <form>
              <div class="form-row">
                  <div class="col">
                  <input type="text" class="form-control" id="discount_name" placeholder="Name" name="discount_name">
                  </div>
              </div>
              <div class="form-row my-3">
                  <div class="col">
                    <select name="discount_type" class="custom-select">
                      <option selected>Discount Type</option>
                      <option value="volvo">Percentage (%)</option>
                      <option value="fiat">Flat Value</option>
                    </select>                      
                  </div>
              </div>
              <div class="form-row">
                <div class="col">
                <input type="number" class="form-control" id="rate" placeholder="Rate" name="rate">
                </div>
            </div>

           <!-- <div class="form-row mt-3">
              <div class="col">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                  <label class="custom-control-label" for="customCheck">Discount on Total Amount?</label>
                </div>
              </div>
            </div> -->

            <!-- discount schedule portion -->
            <br />
            <h6 class="text-darker small mt-2 font-weight-bold">Discount Schedule</h6>
            <div class="container py-3 border border-light">

              <!-- day options -->
              <div class="form-row">
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Sun</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Mon</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Tue</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Wed</label>
                  </div>
                </div>

              </div>
              <div class="form-row mt-1">
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Thurs</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Fri</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Sat</label>
                  </div>
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Specific Date -->
              <div class="form-row mt-3 ml-1">
                  <div class="col">
                  <label for="date">Start Date</label>
                  <input type="date" class="form-control" id="date1" placeholder="Start Date" name="date">
                  </div>
                  <div class="col">
                    <label for="date">End Date</label>
                    <input type="date" class="form-control" id="date2" placeholder="Start Date" name="date">
                  </div>
              </div>

              <hr class="my-4"/>

              <!-- Specific Timing -->
              <div class="form-row mt-3 ml-1">
                <div class="col">
                <label for="time">Start Time</label>
                <input type="time" class="form-control" id="time1" placeholder="Start Time" name="time">
                </div>
                <div class="col">
                  <label for="time">End Time</label>
                  <input type="time" class="form-control" id="time2" placeholder="Start Date" name="time">
                </div>
            </div>

            </div>

              </form>

      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer py-2 bg-lightgrey">
      <button type="button" class="btn btn-sm btn-success">save discount</button>
      </div>
      
  </div>
  </div>
</div>


<!-- Edit Discount Modal -->
<div class="modal fade" id="editDiscountModal">
  <div class="modal-dialog modal-md">
  <div class="modal-content">
  
      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title text-capitalize">Edit Discount</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
          
          <form>
              <div class="form-row">
                  <div class="col">
                  <input type="text" class="form-control" id="discount_name" placeholder="Name" name="discount_name">
                  </div>
              </div>
              <div class="form-row my-3">
                  <div class="col">
                    <select name="discount_type" class="custom-select">
                      <option selected>Discount Type</option>
                      <option value="volvo">Percentage (%)</option>
                      <option value="fiat">Flat Value</option>
                    </select>                      
                  </div>
              </div>
              <div class="form-row">
                <div class="col">
                <input type="number" class="form-control" id="rate" placeholder="Rate" name="rate">
                </div>
            </div>

           <!-- <div class="form-row mt-3">
              <div class="col">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                  <label class="custom-control-label" for="customCheck">Discount on Total Amount?</label>
                </div>
              </div>
            </div> -->

            <!-- discount schedule portion -->
            <br />
            <h6 class="text-darker small mt-2 font-weight-bold">Discount Schedule</h6>
            <div class="container py-3 border border-light">

              <!-- day options -->
              <div class="form-row">
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Sun</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Mon</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Tue</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Wed</label>
                  </div>
                </div>

              </div>
              <div class="form-row mt-1">
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Thurs</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Fri</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Sat</label>
                  </div>
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Specific Date -->
              <div class="form-row mt-3 ml-1">
                  <div class="col">
                  <label for="date">Start Date</label>
                  <input type="date" class="form-control" id="date1" placeholder="Start Date" name="date">
                  </div>
                  <div class="col">
                    <label for="date">End Date</label>
                    <input type="date" class="form-control" id="date2" placeholder="Start Date" name="date">
                  </div>
              </div>

              <hr class="my-4"/>

              <!-- Specific Timing -->
              <div class="form-row mt-3 ml-1">
                <div class="col">
                <label for="time">Start Time</label>
                <input type="time" class="form-control" id="time1" placeholder="Start Time" name="time">
                </div>
                <div class="col">
                  <label for="time">End Time</label>
                  <input type="time" class="form-control" id="time2" placeholder="Start Date" name="time">
                </div>
            </div>

            </div>

              </form>

      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer py-2 bg-lightgrey">
      <button type="button" class="btn btn-sm btn-success">save discount</button>
      </div>
      
  </div>
  </div>
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

</body>

</html>
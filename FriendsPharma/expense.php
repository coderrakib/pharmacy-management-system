<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
<div class="row">
  <div class="col-9">
    <div class="pagetitle">
      <h1>Expense Lists</h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 text-end">
  <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success mt-2 rounded-1"><i class="bi bi-plus"></i> Add Expense </button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header border-0">
            <h3 style="color:#012970;font-weight:700;" class="modal-title">Add Expense</h3>
            <button style="font-size:23px;font-weight:700;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- Multi Columns Form -->
           <form class="row g-3" action="controllers/Expense.php?action=insert" method="POST" enctype="multipart/form-data">
              <div class="col-md-6 text-start">
                <label for="Manufacturer_Name" class="form-label fw-bold">Invoice ID<span class="text-danger">*</span></label>
                <input type="text" name="invoice_id" class="form-control rounded-1" id="Manufacturer_Name" placeholder="Invoice ID">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputState" class="form-label fw-bold">Category<span class="text-danger">*</span></label>
                <select name="category" id="inputState" class="form-select">
                  <option value="" selected>Select Category</option>
                  <option value="Electricity Charges">Electricity Charges</option>
                  <option value="Equipements">Equipements</option>
                  <option value="Maintenance">Maintenance</option>
                  <option value="Manufacture">Manufacture</option>
                </select>
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Date<span class="text-danger">*</span></label>
                <input type="date" name="date" class="form-control rounded-1" id="inputAddres5s" placeholder="Date">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Amount<span class="text-danger">*</span></label>
                <input type="text" name="amount" class="form-control rounded-1" id="inputAddres5s" placeholder="Amount">
              </div>
          </div>
            <div class="modal-footer border-0">
              <input type="submit" name="submit" class="btn btn-success mr-auto rounded-1" value="Add Expense">
              <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form><!-- End Multi Columns Form -->
        </div>
      </div><!-- End Vertically centered Modal-->
  </div>
</div>
<?php 
  if(!empty($_SESSION['messages']) && !empty($_SESSION['class_name'])){
    echo '<script type="module"> 
      var myModal = new bootstrap.Modal(document.getElementById("statusErrorsModal"), {});
      document.onreadystatechange = function () {
        myModal.show();
      }; 
    </script>';
    require_once ('messages.php');
    unset($_SESSION['messages'],$_SESSION['class_name']);
  }
?>
<section class="section dashboard mt-4">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body ">
                  <h5 class="card-title">Electricity Charges</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      &#x09F3;
                    </div>
                    <div class="ps-3">
                      <?php

                        $expense =  new Expense;
                        $expense->getExpense();
                        $query = $expense->query;

                        $electricity_charges = array();

                        $num = 0;

                        while ($row = $query->fetch_assoc()) {

                          $category = $row['category'];
                            if($category == "Electricity Charges"){
                              $electricity_charges[] = $row['amount'];
                              $num++;
                            }
                        }
                      ?>
                      <h6>&#x09F3;<?php echo array_sum($electricity_charges); ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total Electricity Bill</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-md-6 ">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Maintenance</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      &#x09F3;
                    </div>
                    <div class="ps-3">
                    <?php

                        $expense =  new Expense;
                        $expense->getExpense();
                        $query = $expense->query;

                        $maintenance = array();
                        
                        $num = 0;

                        while ($row = $query->fetch_assoc()) {

                          $category = $row['category'];
                            if($category == "Maintenance"){
                              $maintenance[] = $row['amount'];
                              $num++;
                            }
                        }
                      ?>
                      <h6>&#x09F3;<?php echo array_sum($maintenance); ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total Maintenance Bill</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            <!-- Customers Card -->
            <div class="col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Equipements</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      &#x09F3;
                    </div>
                    <div class="ps-3">
                    <?php

                      $expense =  new Expense;
                      $expense->getExpense();
                      $query = $expense->query;

                      $equipements = array();

                      $num = 0;

                      while ($row = $query->fetch_assoc()) {

                        $category = $row['category'];
                          if($category == "Equipements"){
                            $equipements[] = $row['amount'];
                            $num++;
                          }
                      }
                      ?>
                      <h6>&#x09F3;<?php echo array_sum($equipements); ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total Equipements Bill</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->
            <!-- Revenue Card -->
            <div class="col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Manufacture</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      &#x09F3;
                    </div>
                    <div class="ps-3">
                    <?php
                        $expense =  new Expense;
                        $expense->getExpense();
                        $query = $expense->query;

                        $manufacture = array();

                        $num = 0;

                        while ($row = $query->fetch_assoc()) {

                          $category = $row['category'];
                            if($category == "Manufacture"){
                              $manufacture[] = $row['amount'];
                              $num++;
                            }
                        }
                        ?>
                        <h6>&#x09F3;<?php echo array_sum($manufacture); ?></h6>
                        <span class="text-success small pt-1 fw-bold">Total Manufacture Bill</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
  <section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th style="font-size:15px;" class="text-center">Sl</th>
                        <th style="font-size:15px;" class="text-nowrap text-center">Invoice ID</th>
                        <th style="font-size:15px;" class="text-center">Category</th>
                        <th style="font-size:15px;" class="text-center">Date</th>
                        <th style="font-size:15px;" class="text-center">Amount</th>
                        <th style="font-size:15px;" class="text-center">Status</th>
                        <th style="font-size:15px;" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                      $expense =  new Expense;
                      $expense->getExpense();
                      $query = $expense->query;

                      $sl = 1;

                      while ($row = $query->fetch_assoc()) {

                        $id             = $row['id'];
                        $invoice_id	    = $row['invoice_id'];
                        $category       = $row['category'];
                        $date           = $row['date'];
                        $amount         = $row['amount'];
                        $status         = $row['status'];
                    ?>
                    <tr class="text-center">
                        <td style="font-size:15px;"><?php echo $sl++; ?></td>
                        <td style="font-size:15px;"><?php echo $invoice_id; ?></td>
                        <td style="font-size:15px;"><?php echo $category; ?></td>
                        <td style="font-size:15px;"><?php echo $date; ?></td>
                        <td style="font-size:15px;"><?php echo $amount; ?></td>
                        <td style="font-size:15px;">
                          <?php 

                            if($status == 0){
                                echo "<a href='change-status.php?id=$id&&value=1&&table=expense' class='btn btn-danger btn-sm rounded-1'>Disable</a>";
                            }elseif($status == 1){
                                echo "<a href='change-status.php?id=$id&&value=0&&table=expense' class='btn btn-success btn-sm rounded-1'>Enable</a>";
                            }
                          ?>
                        </td>
                        <td class="text-center">
                          <div class="btn-group" role="group">
                            <button class="btn border-danger btn-sm rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="delete-expense.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-trash"></i> Remove Selected </a></li>
                            </ul>
                          </div>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
  </section>
</main><!-- End #main -->
<?php include_once("includes/footer.php") ?>
<?php include_once("includes/js.php") ?>

</body>
</html>
<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
<div class="row">
  <div class="col-md-9">
    <div class="pagetitle">
      <h1>Invoices List</h1>
    </div><!-- End Page Title -->
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
<section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <h3 class="ml-3">All Invoice</h3>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center" style="font-size:14px;" scope="col">Invoice ID</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Date</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Amount</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Status</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Print</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Action</th>
                  </tr>
                </thead>
                  <?php 
                    $invoice = new OrderBy;
                    $invoice->OrderBy('','id','DESC');
                    $query   = $invoice->query;
                    while ($result = $query->fetch_assoc()) {
                      $id          = $result['id'];
                      $invoice_no  = $result['invoice_no'];
                      $date_issue  = $result['date_issue'];
                      $grand_total = $result['grand_total'];
                      $status      = $result['status'];
                    
                  ?>
                  <tr class="text-center">
                    <td style="font-size:15px;"><?php echo $invoice_no; ?></td>
                    <td style="font-size:15px;"><?php echo $date_issue ?></td>
                    <td style="font-size:15px;"><?php echo $grand_total." BDT";?></td>
                    <td style="font-size:15px;">
                        <?php
                          if($status == "1"){
                            echo "<p class='text-success'><i class='bi bi-circle-fill'></i> Complete</p>";
                          }
                          if($status == "2"){
                            echo "<p class='text-warning'><i class='bi bi-circle-fill'></i> Pending</p>";
                          }
                          if($status == "3"){
                            echo "<p class='text-danger'><i class='bi bi-circle-fill'></i> Cancelled</p>";
                          }
                        ?>
                    </td>

                    <td style="font-size:15px;"><a href="print-invoice.php?id=<?php echo $id; ?>" target="_blank" class="dropdown-item" type="button"><i class="bi bi-printer text-success"></i></a></td>

                    <td style="font-size:15px;" class="text-center">
                          <div class="btn-group" role="group">
                            <button class="btn border-danger btn-sm rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="invoice-details.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-eye"></i> View Details </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=2&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-arrow-counterclockwise"></i> Pending </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=3&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-trash"></i> Cancelled </a></li>
                              <li><a href="change-status.php?id=<?php echo $id; ?>&&value=1&&table=invoice" class="dropdown-item" type="button"><i class="bi bi-check2"></i> Complete </a></li>
                            </ul>
                          </div>
                      </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</main>
<?php include_once("includes/footer.php") ?>
<?php include_once("includes/js.php") ?>
</body>
</html>
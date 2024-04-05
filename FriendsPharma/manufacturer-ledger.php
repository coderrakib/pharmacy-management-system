<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>

<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">

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
<div class="row">
  <div class="col-9">
    <div class="pagetitle">
      <h1>Manufacturer Ledger</h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 pt-2 text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success rounded-1"><i class="bi bi-plus"></i> Add Ledger</button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header border-0">
            <h3 style="color:#012970;font-weight:700;" class="modal-title">Add Ledger</h3>
            <button style="font-size:23px;font-weight:700;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- Multi Columns Form -->
          <form class="row g-3" action="controllers/ManufacturerLedger.php?action=insert" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 text-start">
                <?php 
                  $invoec = 'FP'.date('y').date('m').date('d').rand(1111,9999);
                ?>
                <label for="Manufacturer_Name" class="form-label fw-bold">Invoice No</label>
                <input type="text" name="invoice" class="form-control rounded-1" id="supplier-Name" placeholder="Invoice No" value="<?php echo $invoec; ?>">
              </div>
              <div class="col-md-6 mb-3 text-start">
                <label for="Manufacturer_Name" class="form-label fw-bold">Date</label>
                <input type="date" name="date" class="form-control rounded-1" id="supplier-Name">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Manufacturer</label>
                <select id="inputState" class="form-select" name="manufacturer">
                  <option value="" selected>Choose...</option>
                  <?php 
                    $manufacturer =  new Manufacturer;
                    $manufacturer->getManufacturer();
                    $query = $manufacturer->query;

                    while ($row = $query->fetch_assoc()) {

                      $company_name   = $row['company_name'];
                  ?>
                  <option value="<?php echo $company_name; ?>"><?php echo $company_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6 text-start">
                <label for="Gender" class="form-label fw-bold">Payment Term</label>
                <select id="inputState" class="form-select" name="payment_term">
                  <option value="" selected>Choose...</option> 
                  <option value="On Delivery">On Delivery</option>
                  <option value="After Dispatch">After Dispatch</option>
                  <option value="Final Settlement">	Final Settlement</option>
                </select>
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Debit</label>
                <input type="text" name="debit" class="form-control rounded-1" id="inputAddres5s" placeholder="Debit">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress" class="form-label fw-bold">Credit</label>
                <input type="text" name="credit" class="form-control" id="inputAddress" placeholder="Credit">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress" class="form-label fw-bold">Balance</label>
                <input type="text" name="balance" class="form-control" id="inputAddress" placeholder="Balance">
              </div>
              <div class="modal-footer border-0">
                <input type="submit" name="submit" class="btn btn-success mr-auto rounded-1" value="Add Ledger">
                <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div><!-- End Vertically centered Modal-->
  </div>
</div>
  <section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Table with stripped rows -->
              <table class="table table-hover datatable text-center">
                <thead>
                  <tr>
                    <th style="font-size:15px;" class="text-center">Invoice</th>
                    <th style="font-size:15px;" class="text-center">Date</th>
                    <th style="font-size:15px;" class="text-center">Manufacturer</th>
                    <th style="font-size:15px;" class="text-nowrap text-center">Payment Term</th>
                    <th style="font-size:15px;" class="text-center">Debit</th>
                    <th style="font-size:15px;" class="text-center">Credit</th>
                    <th style="font-size:15px;" class="text-center">Balance</th>
                    <th style="font-size:15px;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                    $manufacturerLedger =  new ManufacturerLedger;
                    $manufacturerLedger->getLedger();
                    $query = $manufacturerLedger->query;

                    while ($row = $query->fetch_assoc()) {

                      $id             = $row['id'];
                      $invoice_no     = $row['invoice_no'];
                      $date           = $row['date'];
                      $manufacturer   = $row['manufacturer'];
                      $payment_term   = $row['payment_term'];
                      $debit          = $row['debit'];
                      $credit         = $row['credit'];
                      $balance        = $row['balance'];
                  ?>
                  <tr>
                    <td style="font-size:15px;"><?php echo $invoice_no; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $date; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $manufacturer; ?></td>
                    <td style="font-size:15px;"><?php echo $payment_term; ?></td>
                    <td style="font-size:15px;"><?php echo $debit; ?></td>
                    <td style="font-size:15px;"><?php echo $credit; ?></td>
                    <td style="font-size:15px;"><?php echo $balance; ?></td>
                    <td style="font-size:15px;"><a href="delete-ledger.php?id=<?php echo $id; ?>" type="button" class="btn-close" aria-label="Close"></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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
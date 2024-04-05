<?php require_once("config.php") ?>
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
      <h1><b>Add Purcahse</b></h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success mt-2 rounded-1"><i class="bi bi-plus"></i> Add Purcahse</button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header border-0">
            <h3 style="color:#012970;font-weight:700;" class="modal-title">Add Purcahse</h3>
            <button style="font-size:23px;font-weight:700;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- Multi Columns Form -->
           <form class="row g-3" action="controllers/Purcahse.php?action=insert" method="POST">
              <div class="col-md-6 mb-3 text-start">
                <label for="inputAddress" class="form-label fw-bold">Supplier Name<span class="text-danger">*</span></label>
                <select id="inputState" class="form-select" name="supplier_name">
                  <option value="" selected>Choose...</option>
                  <?php 
                    $suppliers =  new Suppliers;
                    $suppliers->getSuppliers();
                    $query = $suppliers->query;

                    while ($row = $query->fetch_assoc()) {

                      $name   = $row['name'];
                  ?>
                  <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6 mb-3 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Manufacturer<span class="text-danger">*</span></label>
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
              <div class="col-md-6 mb-3 text-start">
                <label for="inputAddress" class="form-label fw-bold">Quantity<span class="text-danger">*</span></label>
                <input type="number" name="qnt" class="form-control" id="quantity" placeholder="Enter Quantity"/>
              </div>
            <div class="col-md-6 mb-3 text-start">
              <label for="inputAddress" class="form-label fw-bold">Unit Price<span class="text-danger">*</span></label>
              <input type="number" name="uprice" class="form-control" id="Unit Price" placeholder="Enter Unit Price"/>
            </div>
            <div class="col-md-6 mb-3 text-start">
              <label for="inputAddress" class="form-label fw-bold">Total Amount<span class="text-danger">*</span></label>
              <input type="number" name="amount" class="form-control" id="totalAmount" placeholder="Enter Total Amount"/>
            </div>
            <div class="col-md-6 mb-3 text-start">
              <label for="inputAddress" class="form-label fw-bold">Purchase Date<span class="text-danger">*</span></label>
              <input type="date" name="date" class="form-control" id="purchaseDate"/>
            </div>
            <div class="col-md-6 mb-3 text-start">
              <label for="inputAddress" class="form-label fw-bold">Purchase Category<span class="text-danger">*</span></label>
              <select class="form-control" id="salesRepSelect" name="categories">
                <option value="" selected>Select Category</option>
                <option value="Liquid">Liquid</option>
                <option value="Tablet">Tablet</option>
                <option value="Capsules">Capsules</option>
                <option value="Topical medicines">Topical medicines</option>
                <option value="Suppositories">Suppositories</option>
                <option value="Drops">Drops</option>
                <option value="Inhalers">Inhalers</option>
                <option value="Injections">Injections</option>
                <option value="OT Supplier">OT Supplier</option>
                <option value="Cosmetics">Cosmetics</option>
              </select>
            </div>
            <div class="col-md-6 mb-3 text-start">
              <label for="inputAddress" class="form-label fw-bold">Additional Notes<span class="text-danger">*</span></label>
              <textarea class="form-control" name="notes" id="additionalNotes" rows="3" placeholder="Enter additional notes"></textarea>
            </div>
            <div class="modal-footer border-0">
              <input type="submit" name="submit" class="btn btn-success mr-auto rounded-1" value="Add Purchase">
              <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal">Cancel</button>
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
              <div class="table-responsive">
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th style="font-size:15px;" class="text-center">ID</th>
                    <th style="font-size:15px;" class="text-center">Supplier</th>
                    <th style="font-size:15px;" class="text-center">Manufacturer</th>
                    <th style="font-size:15px;" class="text-center">Quantity</th>
                    <th style="font-size:15px;" class="text-center">Categories</th>
                    <th style="font-size:15px;" class="text-center">Date</th>
                    <th style="font-size:15px;" class="text-center text-nowrap">Total Amount</th>
                    <th style="font-size:15px;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php

                  $purcahse =  new Purcahse;
                  $purcahse->getPurcahse();
                  $query = $purcahse->query;

                  $sl = 1;

                  while ($row = $query->fetch_assoc()) {

                    $id             = $row['id'];
                    $name           = $row['sname'];
                    $manufacturer   = $row['manufacturer'];
                    $qnt            = $row['qnt'];
                    $category       = $row['category'];
                    $date           = $row['date'];
                    $amount         = $row['amount'];
                  ?>
                  <tr class="text-center">
                    <td style="font-size:15px;"><?php echo "#P".$sl ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $name; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $manufacturer ?></td>
                    <td style="font-size:15px;"><?php echo $qnt ?></td>
                    <td style="font-size:15px;"><?php echo $category ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $date ?></td>
                    <td style="font-size:15px;"><?php echo $amount ?></td>
                    <td style="font-size:15px;"><a href="delete-purchase.php?id=<?php echo $id;?>" type="button" class="btn-close" aria-label="Close"></a>
                  </tr>
                  <?php $sl++; } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              </div>
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
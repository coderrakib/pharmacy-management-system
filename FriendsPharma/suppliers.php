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
      <h1><b>Suppliers</b></h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success mt-2 rounded-1"><i class="bi bi-plus"></i> Add Suppliers</button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header border-0">
            <h3 style="color:#012970;font-weight:700;" class="modal-title">Add Suppliers</h3>
            <button style="font-size:23px;font-weight:700;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- Multi Columns Form -->
           <form class="row g-3" action="controllers/Suppliers.php?action=insert" method="POST" enctype="multipart/form-data">
              <div class="col-md-6 mb-3 text-start">
                <label for="Manufacturer_Name" class="form-label fw-bold">Supplier Name<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control rounded-1" id="supplier-Name" placeholder="supplier Name">
              </div>
              <div class="col-md-6 text-start">
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
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                <input type="text" name="email" class="form-control rounded-1" id="inputAddres5s" placeholder="Email">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Phone Number<span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control rounded-1" id="inputAddres5s" placeholder="Amount">
              </div>
              <div class="col-6 text-start">
                <label for="inputAddress" class="form-label fw-bold">Address<span class="text-danger">*</span></label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address">
              </div>
            <!-- End Multi Columns Form -->
            </div>
            <div class="modal-footer border-0">
              <input type="submit" name="submit" class="btn btn-success mr-auto rounded-1" value="Add Supplier">
              <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
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
                    <th style="font-size:15px;" class="text-center">SL</th>
                    <th style="font-size:15px;" class="text-center">Name</th>
                    <th style="font-size:15px;" class="text-center">Manufacturer</th>
                    <th style="font-size:15px;" class="text-center">Email</th>
                    <th style="font-size:15px;" class="text-center">Phone</th>
                    <th style="font-size:15px;" class="text-center">Address</th>
                    <th style="font-size:15px;" class="text-center">Status</th>
                    <th style="font-size:15px;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php

                  $suppliers =  new Suppliers;
                  $suppliers->getSuppliers();
                  $query = $suppliers->query;

                  $sl = 1;

                  while ($row = $query->fetch_assoc()) {

                    $id             = $row['id'];
                    $name           = $row['name'];
                    $manufacturer   = $row['manufacturer'];
                    $email          = $row['email'];
                    $phone          = $row['phone'];
                    $address        = $row['address'];
                    $status         = $row['status'];
                  ?>
                  <tr class="text-center">
                    <td style="font-size:15px;"><?php echo $sl; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $name; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $manufacturer; ?></td>
                    <td style="font-size:15px;"><?php echo $email; ?></td>
                    <td style="font-size:15px;"><?php echo $phone; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $address; ?></td>
                    <td style="font-size:15px;">
                      <?php 
                        if($status == 0){
                          echo "<a href='change-status.php?id=$id&&value=1&&table=suppliers' class='btn btn-danger btn-sm rounded-1'>Disable</a>";
                        }elseif($status == 1){
                          echo "<a href='change-status.php?id=$id&&value=0&&table=suppliers' class='btn btn-success btn-sm rounded-1'>Enable</a>";
                        }
                      ?>
                    </td>
                    <td><a href="delete-supplier.php?id=<?php echo $id;?>" type="button" class="btn-close" aria-label="Close"></button></a>
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
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
      <h1>Manufacturer Lists</h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 text-end">
  <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success rounded-1 mt-2"><i class="bi bi-plus"></i> Add Manufacturer</button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header border-0">
            <h3 style="color:#012970;font-weight:700;" class="modal-title">Add Manufacturer</h3>
            <button style="font-size:23px;font-weight:700;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <!-- Multi Columns Form -->
           <form class="row g-3" action="controllers/Manufacturer.php?action=insert" method="POST" enctype="multipart/form-data">
              <div class="col-md-6 text-start">
                <label for="Manufacturer_Name" class="form-label fw-bold">Company Name<span class="text-danger">*</span></label>
                <input type="text" name="company" class="form-control rounded-1" id="Manufacturer_Name" placeholder="Company">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control rounded-1" id="inputAddres5s" placeholder="Email">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Phone<span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control rounded-1" id="inputAddres5s" placeholder="Phone">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Balance<span class="text-danger">*</span></label>
                <input type="text" name="balance" class="form-control rounded-1" id="inputAddres5s" placeholder="Balance">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">Country<span class="text-danger">*</span></label>
                <input type="text" name="country" class="form-control rounded-1" id="inputAddres5s" placeholder="Country">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">City<span class="text-danger">*</span></label>
                <input type="text" name="city" class="form-control rounded-1" id="inputAddres5s" placeholder="City">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputAddress5" class="form-label fw-bold">State<span class="text-danger">*</span></label>
                <input type="text" name="state" class="form-control rounded-1" id="inputAddres5s" placeholder="State">
              </div>
              <div class="col-md-6 text-start">
                <label for="inputState" class="form-label fw-bold">Status<span class="text-danger">*</span></label>
                <select name="status" id="inputState" class="form-select">
                  <option value="" selected>Select</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
          </div>
            <div class="modal-footer border-0">
              <input type="submit" name="submit" class="btn btn-success mr-auto rounded-1" value="Add Manufacturer">
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
                        <th style="font-size:15px;" class="text-nowrap text-center">Manufacturer ID</th>
                        <th style="font-size:15px;" class="text-center">Company</th>
                        <th style="font-size:15px;" class="text-center">Address</th>
                        <th style="font-size:15px;" class="text-center">Balance</th>
                        <th style="font-size:15px;" class="text-center">Status</th>
                        <th style="font-size:15px;" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                      $manufacturer =  new Manufacturer;
                      $manufacturer->getManufacturer();
                      $query = $manufacturer->query;

                      $sl = 1;

                      while ($row = $query->fetch_assoc()) {

                        $id             = $row['id'];
                        $company_name   = $row['company_name'];
                        $email          = $row['email'];
                        $phone          = $row['phone'];
                        $balance        = $row['balance'];
                        $country        = $row['country'];
                        $city           = $row['city'];
                        $state          = $row['state'];
                        $status         = $row['status'];
                    ?>
                    <tr class="text-center">
                        <td style="font-size:15px;" class="text-start"><?php echo $sl++; ?></td>
                        <td style="font-size:15px;" class="text-start"><?php echo "#M-0".$id; ?></td>
                        <td style="font-size:15px;" class="text-start">
                          <span class="text-success fw-bold"><?php echo $company_name; ?></span>
                          <?php echo $email; ?>
                          <?php echo "+880".$phone; ?>
                        </td>
                        <td style="font-size:15px;" class="text-start">
                          <span class="text-nowrap"><?php echo "State : ".$state; ?></span>
                          <br>
                          <span class="text-nowrap"><?php echo "City : ".$city; ?></span>
                          <br>
                          <span class="text-nowrap"><?php echo "Country : ".$country; ?></span>
                        </td>
                        <td style="font-size:15px;" class="text-start"><?php echo $balance; ?></td>
                        <td style="font-size:15px;" class="text-start">
                          <?php 

                            if($status == 0){
                                echo "<a href='change-status.php?id=$id&&value=1&&table=employee' class='btn btn-danger btn-sm rounded-1'>Disable</a>";
                            }elseif($status == 1){
                                echo "<a href='change-status.php?id=$id&&value=0&&table=employee' class='btn btn-success btn-sm rounded-1'>Enable</a>";
                            }
                          ?>
                        </td>
                        <td class="text-center">
                          <div class="btn-group" role="group">
                            <button class="btn border-danger btn-sm rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="edit-manufacturer.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-pencil-square"></i> Edit Selected</a></li>
                              <li><a href="delete-manufacturer.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-trash"></i> Remove Selected </a></li>
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
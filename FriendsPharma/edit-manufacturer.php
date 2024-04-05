<?php 
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $manufacturer = new Manufacturer;
    $manufacturer->getManufacturer(['id', '=', $id]);
    $query = $manufacturer->query;

    $result         = $query->fetch_assoc();
    $get_id         = $result['id'];
    $company_name   = $result['company_name'];
    $email          = $result['email'];
    $phone          = $result['phone'];
    $balance        = $result['balance'];
    $country        = $result['country'];
    $city           = $result['city'];
    $state          = $result['state'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Update Manufacturer</h1>
    </div><!-- End Page Title -->
    <section class="pt-3" class="section" >
      <div class="row" >
        <div class="col-lg-12" >
        <div class="card">
            <div class="card-body">
              <!-- Multi Columns Form -->
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
              <form class="row g-3 pt-4" action="controllers/Manufacturer.php?action=update" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="Manufacturer_Name" class="form-label fw-bold">Company Name<span class="text-danger">*</span></label>
                    <input type="text" name="company" class="form-control rounded-1" id="Manufacturer_Name" placeholder="Company" value="<?php echo $company_name; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control rounded-1" id="inputAddres5s" placeholder="Email" value="<?php echo $email; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">Phone<span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control rounded-1" id="inputAddres5s" placeholder="Phone" value="<?php echo $phone; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">Balance<span class="text-danger">*</span></label>
                    <input type="text" name="balance" class="form-control rounded-1" id="inputAddres5s" placeholder="Balance" value="<?php echo $balance; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">Country<span class="text-danger">*</span></label>
                    <input type="text" name="country" class="form-control rounded-1" id="inputAddres5s" placeholder="Country" value="<?php echo $country; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">City<span class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control rounded-1" id="inputAddres5s" placeholder="City" value="<?php echo $city; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label fw-bold">State<span class="text-danger">*</span></label>
                    <input type="text" name="state" class="form-control rounded-1" id="inputAddres5s" placeholder="State" value="<?php echo $state; ?>">
                </div>
                <div class="text-left">
                    <input type="hidden" name="id" value="<?php echo $get_id; ?>">
                    <input type="submit" name="submit" value="Update Manufacturer" class="btn btn-success rounded-1">
                </div>
              </form><!-- End Multi Columns Form -->
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
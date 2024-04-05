<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Medicine</h1>
      <h6 class="pt-2">You can add a medicine by fil these field</h6>
    </div><!-- End Page Title -->
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
    <section class="pt-3" class="section" >
      <div class="row" >
        <div class="col-lg-12" >
          <div class="card" >
            <div class="card-body pt-4" >
            <form class="row g-3" action="controllers/Medicine.php?action=insert" method="POST">
              <div class="col-md-4" >
                <label  for="inputEmail4" class="form-label">Medicine Name<span class="text-danger">*</span></label>
                <input type="text" name="medicine_name" class="form-control" id="inputEmail4" placeholder="Medicine Name">
              </div>
              <div class="col-md-4">
                <label  for="inputPassword4" class="form-label">Generic Name<span class="text-danger">*</span></label>
                <input type="text" name="generic_name" class="form-control" id="inputPassword4" placeholder="Generic Name">
              </div>
              <div class="col-md-4">
                <label for="inputPassword4" class="form-label">SKU<span class="text-danger">*</span></label>
                <input  type="text" name="sku" class="form-control" id="inputPassword4" placeholder="SKU">
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">MG<span class="text-danger">*</span></label>
                <input type="text" name="mg" class="form-control" id="inputAddress" placeholder="MG">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">Category<span class="text-danger">*</span></label>
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
              <div class="col-4">
                <label for="inputAddress" class="form-label">Manufacturer<span class="text-danger">*</span></label>
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
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Price<span class="text-danger">*</span></label>
                <input type="text" name="price" class="form-control" id="inputAddress2" placeholder="Price">
              </div>
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Manufacturer Price<span class="text-danger">*</span></label>
                <input type="text" name="mprice" class="form-control" id="inputAddress2" placeholder="Manufacturer Price">
              </div>
              <div class="col-4">
                <label for="stock" class="form-label">Stock(Box)<span class="text-danger">*</span></label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter Stock"/>
              </div>
              <div class="col-6">
                <label for="inputAddress2" class="form-label">Expire Date<span class="text-danger">*</span></label>
                <input type="date" name="expire_date" class="form-control" id="inputAddress2" placeholder="Expire Date">
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Status<span class="text-danger">*</span></label>
                <select id="inputState" class="form-select" name="status">
                  <option selected value="">Select Status</option>
                  <option value="1">Available</option>
                  <option value="0">Out of stock</option>
                </select>
              </div>
              <div class="col-md-12">
                  <label for="Gender" class="form-label">Description<span class="text-danger">*</span></label>
                  <textarea class="tinymce-editor" name="description">
                    
                  </textarea>
                </div>
              <div class="col-12">
                <input type="submit" name="submit" class="btn btn-success rounded-1" value="Add Medicine">
              </div>
            </form>
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
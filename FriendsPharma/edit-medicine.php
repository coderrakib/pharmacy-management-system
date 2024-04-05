<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Update Medicine</h1>
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
    <?php 

      $id = (int) $_GET['id'];

      $medicine = new Medicine;
      $medicine->getMedicine(['id', '=', $id]);
      $query = $medicine->query;

      $result = $query->fetch_assoc();
      $medicine_name      = $result['medicine_name'];
      $generic_name       = $result['generic_name'];
      $sku                = $result['SKU'];
      $MG                 = $result['MG'];
      $category           = $result['category'];
      $manufacturer_1     = $result['manufacturer'];
      $price              = $result['price'];
      $manufacturer_price = $result['manufacturer_price'];
      $stock              = $result['stock'];
      $expire_date        = $result['expire_date'];
      $status             = $result['status'];
      $description        = $result['description'];
    ?>
    <section class="pt-3" class="section" >
      <div class="row" >
        <div class="col-lg-12" >
          <div class="card" >
            <div class="card-body pt-4" >
            <form class="row g-3" action="controllers/Medicine.php?action=update" method="POST">
              <div class="col-md-4" >
                <label  for="inputEmail4" class="form-label">Medicine Name<span class="text-danger">*</span></label>
                <input type="text" name="medicine_name" class="form-control" id="inputEmail4" placeholder="Medicine Name" value="<?php echo $medicine_name; ?>">
              </div>
              <div class="col-md-4">
                <label  for="inputPassword4" class="form-label">Generic Name<span class="text-danger">*</span></label>
                <input type="text" name="generic_name" class="form-control" id="inputPassword4" placeholder="Generic Name" value="<?php echo $generic_name; ?>">
              </div>
              <div class="col-md-4">
                <label for="inputPassword4" class="form-label">SKU<span class="text-danger">*</span></label>
                <input  type="text" name="sku" class="form-control" id="inputPassword4" placeholder="SKU" value="<?php echo $sku; ?>">
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">MG<span class="text-danger">*</span></label>
                <input type="text" name="mg" class="form-control" id="inputAddress" placeholder="MG" value="<?php echo $MG; ?>">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">Category<span class="text-danger">*</span></label>
                <select class="form-control" id="salesRepSelect" name="categories">
                <option value="">Select Category</option>
                <option value="Liquid" <?php if($category == 'Liquid'){echo "selected ='selected'";}?>>Liquid</option>
                <option value="Tablet" <?php if($category == 'Tablet'){echo "selected ='selected'";}?>>Tablet</option>
                <option value="Capsules" <?php if($category == 'Capsules'){echo "selected ='selected'";}?>>Capsules</option>
                <option value="Topical medicines" <?php if($category == 'Topical medicines'){echo "selected ='selected'";}?>>Topical medicines</option>
                <option value="Suppositories" <?php if($category == 'Suppositories'){echo "selected ='selected'";}?>>Suppositories</option>
                <option value="Drops" <?php if($category == 'Drops'){echo "selected ='selected'";}?>>Drops</option>
                <option value="Inhalers" <?php if($category == 'Inhalers'){echo "selected ='selected'";}?>>Inhalers</option>
                <option value="Injections" <?php if($category == 'Injections'){echo "selected ='selected'";}?>>Injections</option>
                <option value="OT Supplier" <?php if($category == 'OT Supplier'){echo "selected ='selected'";}?>>OT Supplier</option>
                <option value="Cosmetics" <?php if($category == 'Cosmetics'){echo "selected ='selected'";}?>>Cosmetics</option>
              </select>
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">Manufacturer<span class="text-danger">*</span></label>
                <select id="inputState" class="form-select" name="manufacturer">
                  <option value="">Choose...</option>
                  <?php 
                    $manufacturer =  new Manufacturer;
                    $manufacturer->getManufacturer();
                    $query = $manufacturer->query;

                    while ($row = $query->fetch_assoc()) {

                      $company_name   = $row['company_name'];
                  ?>
                  <option value="<?php echo $company_name; ?>"<?php if($manufacturer_1 == $company_name){echo "selected ='selected'";}?>><?php echo $company_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Price<span class="text-danger">*</span></label>
                <input type="text" name="price" class="form-control" id="inputAddress2" placeholder="Price" value="<?php echo $price; ?>">
              </div>
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Manufacturer Price<span class="text-danger">*</span></label>
                <input type="text" name="mprice" class="form-control" id="inputAddress2" placeholder="Manufacturer Price" value="<?php echo $manufacturer_price; ?>">
              </div>
              <div class="col-4">
                <label for="stock" class="form-label">Stock(Box)<span class="text-danger">*</span></label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter Stock" value="<?php echo $stock; ?>">
              </div>
              <div class="col-6">
                <label for="inputAddress2" class="form-label">Expire Date<span class="text-danger">*</span></label>
                <input type="date" name="expire_date" class="form-control" id="inputAddress2" placeholder="Expire Date" value="<?php echo $expire_date; ?>">
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Status<span class="text-danger">*</span></label>
                <select id="inputState" class="form-select" name="status">
                  <option selected value="">Select Status</option>
                  <option value="1" <?php if($status == '1'){echo "selected ='selected'";}?>>Available</option>
                  <option value="0" <?php if($status == '0'){echo "selected ='selected'";}?>>Out of stock</option>
                </select>
              </div>
              <div class="col-md-12">
                  <label for="Gender" class="form-label">Description<span class="text-danger">*</span></label>
                  <textarea class="tinymce-editor" name="description">
                    <?php echo $description; ?>
                  </textarea>
                </div>
              <div class="col-12">
                <input type="hidden" name="getID" value="<?php echo $id; ?>">
                <input type="submit" name="submit" class="btn btn-success rounded-1" value="Update Medicine">
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
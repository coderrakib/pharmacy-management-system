<?php 

  require_once("config.php");

  $id = (int) $_GET['id'];

  $medicine = new Medicine;
  $medicine->getMedicine(['id', '=', $id]);
  $query = $medicine->query;

  $result = $query->fetch_assoc();
  $medicine_name      = $result['medicine_name'];
  $generic_name       = $result['generic_name'];
  $MG                 = $result['MG'];
  $category           = $result['category'];
  $manufacturer       = $result['manufacturer'];
  $price              = $result['price'];
  $manufacturer_price = $result['manufacturer_price'];
  $stock              = $result['stock'];
  $expire_date        = $result['expire_date'];
  $status             = $result['status'];
?>
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
        <h1>Medicine Details</h1>
      </div><!-- End Page Title -->
    </div>
    <div class="col-3 text-end">
      <a href="medicine-list.php" type="button" class="btn btn-success rounded-1"><b><i class="bi bi-arrow-return-left"></i></b> Back to Lists</a>
    </div>
  </div>
  <section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <h3 class="ml-3">Medicine Information</h3>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center" style="font-size:14px;" scope="col">Name</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Generic Name</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Weight (MG)</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Category</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Manufacture</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Expire Date</th>
                  </tr>
                </thead>
                <tr class="text-center">
                  <td style="font-size:15px;"><?php echo $medicine_name; ?></td>
                  <td style="font-size:15px;"><?php echo $generic_name; ?></td>
                  <td style="font-size:15px;"><?php echo $MG."MG"; ?></td>
                  <td style="font-size:15px;"><?php echo $category; ?></td>
                  <td style="font-size:15px;"><?php echo $manufacturer; ?></td>
                  <td style="font-size:15px;"><?php echo $expire_date; ?></td>
                </tr>
              </table>
              <hr>
              <h3>Stock</h3>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center" style="font-size:14px;" scope="col">Starting Stock</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Current Stock</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Stock Status</th>
                  </tr>
                </thead>
                <tr class="text-center">
                  <td style="font-size:15px;"><?php echo $stock." Box"; ?></td>
                  <td style="font-size:15px;"><?php echo $stock." Box"; ?></td>
                  <?php if($status == "1"){?>
                    <td style="font-size:15px;"><span class="badge bg-success">Available</span></td>
                  <?php } ?>
                  <?php if($status == "0"){?>
                    <td style="font-size:15px;"><span class="badge bg-danger">Out of Stock</span></td>
                  <?php } ?>
                </tr>
              </table>
              <hr>
              <h3>Estimate</h3>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center" style="font-size:14px;" scope="col">Manufacture price</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Seeling price</th>
                    <th class="text-center" style="font-size:14px;" scope="col">Wholesale Price</th>
                  </tr>
                </thead>
                <tr class="text-center">
                  <td style="font-size:15px;"><?php echo $manufacturer_price." &#2547;"; ?></td>
                  <td style="font-size:15px;"><?php echo $price." &#2547;"; ?></td>
                  <td style="font-size:15px;"><?php echo $price." &#2547;"; ?></td>
                </tr>
              </table>
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
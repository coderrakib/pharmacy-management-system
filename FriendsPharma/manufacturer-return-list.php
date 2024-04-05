<?php require_once ("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
<main id="main" class="main">
  <div class="pagetitle">
      <h1>Manufacture Return</h1>
    </div><!-- End Page Title -->
    <section class="section mt-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Table with stripped rows -->
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th style="font-size:14px;">Name</th>
                    <th style="font-size:14px;" class="text-nowrap">Generic Name</th>
                    <th style="font-size:14px;">MG(Weight)</th>
                    <th style="font-size:14px;">Category</th>
                    <th style="font-size:14px;">Price</th>
                    <th style="font-size:14px;">Stock</th>
                    <th style="font-size:14px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $medicine =  new Medicine;
                  $medicine->getMedicine();
                  $query = $medicine->query;

                  $sl = 1;

                  while ($row = $query->fetch_assoc()) {

                    $id             = $row['id'];
                    $name           = $row['medicine_name'];
                    $generic_name   = $row['generic_name'];
                    $MG             = $row['MG'];
                    $category       = $row['category'];
                    $price          = $row['price'];
                    $stock          = $row['stock'];
                    $status         = $row['status'];
                  ?>
                  <tr>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $name; ?></td>
                    <td style="font-size:15px;"><?php echo $generic_name; ?></td>
                    <td style="font-size:15px;"><?php echo $MG."mg"; ?></td>
                    <td style="font-size:15px;"><?php echo $category; ?></td>
                    <td style="font-size:15px;" class="text-nowrap"><?php echo $price." BDT"; ?></td>
                    <td style="font-size:15px;"><?php echo $stock." Box"; ?></td>
                    <td style="font-size:15px;"><span class="text-danger"><?php echo "Unavaiable"; ?></span></td>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- FontAwesome Script -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SYoprB+sqM7h7CEhV6B/6B4R2RZ/f1BrIslV9x"
      crossorigin="anonymous"
    ></script>
 
  <?php include_once("includes/footer.php") ?>
  <?php include_once("includes/js.php") ?>
 
</body>
</html>
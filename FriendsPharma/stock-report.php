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
      <h1><b>Stock Report</b></h1>
    </div><!-- End Page Title -->
  </div>
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
                    <td style="font-size:15px;">
                      <?php 
                        if($status == 0){
                            echo "<a href='change-status.php?id=$id&&value=1&&table=medicine' class='btn btn-danger btn-sm rounded-1 text-nowrap'>Out of Stock</a>";
                        }elseif($status == 1){
                            echo "<a href='change-status.php?id=$id&&value=0&&table=medicine' class='btn btn-success btn-sm rounded-1 text-nowrap'>Available</a>";
                        }
                      ?>
                    </td>
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
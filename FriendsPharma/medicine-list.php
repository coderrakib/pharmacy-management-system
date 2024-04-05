<?php require_once("config.php"); ?>
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
      <h1>Medicine Lists</h1>
    </div><!-- End Page Title -->
  </div>
  <div class="col-3 text-end">
    <a href="add-medicine.php" type="button" class="btn btn-success btn-sm rounded-1"><i style="font-size:20px;font-weight:700;" class="bi bi-plus"></i> Add Medicine</a>
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
                    <th style="font-size:14px;">Action</th>
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
                    <td style="font-size:15px;" class="text-center">
                          <div class="btn-group" role="group">
                            <button class="btn border-danger btn-sm rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="medicine-details.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-eye"></i> View Details </a></li>
                              <li><a href="edit-medicine.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-pencil-square"></i> Edit Selected</a></li>
                              <li><a href="delete-medicine.php?id=<?php echo $id; ?>" class="dropdown-item" type="button"><i class="bi bi-trash"></i> Remove Selected </a></li>
                            </ul>
                          </div>
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
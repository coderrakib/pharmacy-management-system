<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Employee lists</h1>
    </div><!-- End Page Title -->
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
                        <th style="font-size:15px;" class="text-center">Gender</th>
                        <th style="font-size:15px;" class="text-center">Birthday</th>
                        <th style="font-size:15px;" class="text-center">Phone</th>
                        <th style="font-size:15px;" class="text-center">Email</th>
                        <th style="font-size:15px;" class="text-center">Address</th>
                        <th style="font-size:15px;" class="text-center">Photo</th>
                        <th style="font-size:15px;" class="text-center">Designation</th>
                        <th style="font-size:15px;" class="text-center text-nowrap">Join Date</th>
                        <th style="font-size:15px;" class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                      $employees =  new Employee;
                      $employees->getEmployee();
                      $query = $employees->query;

                      $sl = 1;

                      while ($row = $query->fetch_assoc()) {

                        $id           = $row['id'];
                        $f_name       = $row['f_name'];
                        $l_name       = $row['l_name'];
                        $gender       = $row['gender'];
                        $birthday     = $row['birthday'];
                        $phone        = $row['phone'];
                        $email        = $row['email'];
                        $address      = $row['address'];
                        $designation  = $row['designation'];
                        $joining_date = $row['joining_date'];
                        $image        = $row['photo'];
                        $status       = $row['status'];

                        if($image){
                          if(file_exists("files/photo/$image")){
                            $image = "<img class='img-responsive img-fluid img-thumbnail' src='files/photo/$image' width='80px'>";
                          }else{
                            $image = "Image Not Found";
                          }
                                                
                        }else{
                          $image = "Image is Not Added";
                        }
                    ?>
                    <tr class="text-center">
                        <td style="font-size:15px;"><?php echo $sl++; ?></td>
                        <td style="font-size:15px;" class="text-nowrap"><?php echo $f_name.' '.$l_name; ?></td>
                        <td style="font-size:15px;"><?php echo $gender; ?></td>
                        <td style="font-size:15px;"class="text-nowrap"><?php echo date("d M Y", strtotime($birthday)); ?></td>
                        <td style="font-size:15px;"><?php echo "0".$phone; ?></td>
                        <td style="font-size:15px;"><?php echo $email; ?></td>
                        <td style="font-size:15px;" class="text-nowrap"><?php echo $address; ?></td>
                        <td style="font-size:15px;"><?php echo $image; ?></td>
                        <td style="font-size:15px;"><?php echo $designation; ?></td>
                        <td style="font-size:15px;"><?php echo date("d M Y", strtotime($joining_date)); ?></td>
                        <td style="font-size:15px;">
                          <?php 

                            if($status == 0){
                                echo "<a href='change-status.php?id=$id&&value=1&&table=employee' class='btn btn-danger btn-sm rounded-1'>Disable</a>";
                            }elseif($status == 1){
                                echo "<a href='change-status.php?id=$id&&value=0&&table=employee' class='btn btn-success btn-sm rounded-1'>Enable</a>";
                            }
                          ?>
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
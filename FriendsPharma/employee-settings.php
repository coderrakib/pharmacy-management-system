<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Employee Settings</h1>
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
        <div class="card">
            <div class="card-body">
              <!-- Multi Columns Form -->
              <form class="row g-3 pt-4" action="controllers/Employee.php?action=updateDesignation" method="POST">
                <div class="col-md-6">
                    <label for="Gender" class="form-label">Select Member</label>
                    <select id="inputState" class="form-select" name="member">
                        <option value="" selected>Choose...</option>
                        <?php 

                          $employees =  new Employee;
                          $employees->getEmployee();
                          $query = $employees->query;

                          while ($row_1 = $query->fetch_assoc()) {
                            $id_1         = $row_1['id'];
                            $f_name_1     = $row_1['f_name'];
                            $l_name_1     = $row_1['l_name'];
                        ?>
                        <option value="<?php echo $id_1; ?>"><?php echo $f_name_1." ".$l_name_1; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Gender" class="form-label">Select Designation</label>
                    <select id="inputState" class="form-select" name="designation">
                        <option value="" selected>Choose...</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Salesman">Salesman</option>
                    </select>
                </div>
                <div class="text-left mb-5">
                  <input type="submit" name="updateDeg" class="btn btn-success rounded-1" value="Add Selected">
                </div>
              </form><!-- End Multi Columns Form -->
              <!-- Table with stripped rows -->
              <table class="table table-hover datatable text-center">
                <thead>
                  <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Designation</th>
                    <th class="text-center" data-type="date" data-format="YYYY/DD/MM">Join Date</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $employees =  new Employee;
                    $employees->getEmployee();
                    $query = $employees->query;

                    while ($row = $query->fetch_assoc()) {

                      $id           = $row['id'];
                      $f_name       = $row['f_name'];
                      $l_name       = $row['l_name'];
                      $phone        = $row['phone'];
                      $designation  = $row['designation'];
                      $joining_date = $row['joining_date'];
                  ?>
                  <tr>
                    <td><?php echo $f_name." ".$lname; ?></td>
                    <td><?php echo "0".$phone; ?></td>
                    <td><?php echo $designation; ?></td>
                    <td><?php echo $joining_date?></td>
                    <td><a href="delete-employee.php?id=<?php echo $id; ?>" type="button" class="btn-close" aria-label="Close"></a></td>
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
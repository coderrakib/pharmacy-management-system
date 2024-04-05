<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Employee</h1>
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
              <form class="row g-3 pt-4" action="controllers/Employee.php?action=insert" method="POST" enctype="multipart/form-data">
                <div class="col-md-4">
                  <label for="First_Name" class="form-label">First Name<span class="text-danger">*</span></label>
                  <input name="f_name" type="text" class="form-control" id="First_Name" placeholder="First Name">
                </div>
                <div class="col-md-4">
                  <label for="Last_Name" class="form-label">Last Name<span class="text-danger">*</span></label>
                  <input name="l_name" type="text" class="form-control" id="Last_Name" placeholder="Last Name">
                </div>
                <div class="col-md-4">
                  <label for="Gender" class="form-label">Gender<span class="text-danger">*</span></label>
                  <select name="gender" id="inputState" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="first_Name" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                  <input name="birthday" type="date" class="form-control" id="first_Name">
                </div>
                <div class="col-md-4">
                  <label for="last_Name" class="form-label">Phone<span class="text-danger">*</span></label>
                  <input name="phone" type="number" class="form-control" id="last_Name" placeholder="Phone no" onfocusout="this.value = this.value.trim()">
                </div>
                <div class="col-md-4">
                  <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="col-md-4">
                  <label for="First_Name" class="form-label">Adddress<span class="text-danger">*</span></label>
                  <input name="address" type="text" class="form-control" id="First_Name" placeholder="Adddress">
                </div>
                <div class="col-md-4">
                  <label for="Last_Name" class="form-label">Upload Photo<span class="text-danger">*</span></label>
                  <input name="photo" type="file" class="form-control" id="Last_Name">
                </div>
                <div class="col-md-4">
                  <label for="Gender" class="form-label">Designation<span class="text-danger">*</span></label>
                  <select name="designation" id="inputState" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Salesman">Salesman</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="email" class="form-label">National ID<span class="text-danger">*</span></label>
                  <input name="n_id" type="file" class="form-control" id="email">
                </div>
                <div class="col-md-4">
                  <label for="First_Name" class="form-label">Certificates<span class="text-danger">*</span></label>
                  <input name="certificates" type="file" class="form-control" id="First_Name">
                </div>
                <div class="col-md-4">
                  <label for="Last_Name" class="form-label">Joining Date<span class="text-danger">*</span></label>
                  <input name="join_date" type="date" class="form-control" id="Last_Name">
                </div>
                <div class="col-md-4">
                  <label for="Gender" class="form-label">Status<span class="text-danger">*</span></label>
                  <select name="status" id="inputState" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="Gender" class="form-label">Short Biography<span class="text-danger">*</span></label>
                  <textarea name="biography" class="tinymce-editor"></textarea>
                </div>
                <div class="text-left">
                  <input type="submit" name="submit" value="Add Employee" class="btn btn-success rounded-1">
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
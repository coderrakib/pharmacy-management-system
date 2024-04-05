<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Manufacturer Return</h1>
    </div><!-- End Page Title -->
    <section class="pt-3" class="section" >
      <div class="row" >
        <div class="col-lg-12" >
          <div class="card" >
            <div class="card-body" >
              
            <form class="row g-3">
              <div class="col-md-4" >
                <label  for="inputEmail4" class="form-label">Company</label>
                <input  type="Name" class="form-control" id="inputEmail4" placeholder="Customer">
              </div>
              <div class="col-md-4">
                <label  for="inputPassword4" class="form-label">Email</label>
                <input type="Phone" class="form-control" id="inputPassword4" placeholder="Seller">
              </div>
              <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Phone</label>
                <input  type="Email" class="form-control" id="inputPassword4" placeholder="Email">
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Name">
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">Generic Name</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="generic Name">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">Category</label>
                <select id="inputState" class="form-select">
                  <option selected>Select</option>
                  <option>Tablet</option>
                  <option>syrup</option>
                  <option>vitamin</option>
                  <option>Inhealer</option>
                </select>
              </div>
              <div class="col-4">
                <label for="inputAddress" class="form-label">Amount</label>
                <input type="Purchased-quantity" class="form-control" id="inputAddress" placeholder="amount">
              </div>
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Invoice No</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Invoice No">
              </div>
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Reason</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Reason">
              </div>
         
              <div class="col-4">
                <label for="inputAddress2" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="quantity">
              </div>
              <div class="col-4">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>

              <div class="col-md-4">
                <label for="inputState" class="form-label">Status</label>
                <select id="inputState" class="form-select">
                  <option selected>Select</option>
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
              </div>
              <section class="section">
              <div class="col-md-12  pb-2">
                  <label for="Gender" class="form-label">Short Biography<span class="text-danger">*</span></label>
                  <textarea name="biography" class="tinymce-editor">
                    
                  </textarea>
                </div>
                <div class="text-left">
                  <input type="submit" name="submit" value="Add Return" class="btn btn-success rounded-1">
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
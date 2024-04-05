<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<?php include_once("includes/header.php") ?>
<?php include_once("includes/sidebar.php") ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Create New Invoice</h1>
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
  <form action="controllers/Invoice.php?action=insert" method="POST">
    <div class="row pt-3">
      <div class="col-md-3">
        <?php 
          $invoice_n_G = rand(1000, 99999);
          date_default_timezone_set('Asia/Dhaka');
          $create_date = date('d-m-Y');
        ?>
        <label for="inputEmail5" class="form-label">#Invoice No</label>
        <input type="text" name="invoiceNo" class="form-control" id="inputEmail5" value="<?php echo "#FP".$invoice_n_G; ?>">
      </div>
      <div class="col-md-3">
        <label for="inputPassword5" class="form-label">Date Issue</label>
        <input type="text" name="issueDate" class="form-control" id="inputPassword5" value="<?php echo $create_date; ?>">
      </div>
      <div class="col-md-3">
        <label for="inputPassword5" class="form-label">Date Due</label>
        <input type="text" name="dueDate" class="form-control" id="inputPassword5" value="<?php echo $create_date; ?>">
      </div>
      <div class="col-md-3">
        <label for="inputState" class="form-label">Payment Type<span class="text-danger">*</span></label>
        <select id="inputState" class="form-select" name="paymentType">
          <option value="" selected>Select Payment </option>
          <option value="Cash">Cash</option>
          <option value="Invoice">Invoice</option>
        </select>
      </div>
      <h6 class="pt-3">Bill To:</h6>
      <div class="col-md-3">
        <label for="inputEmail5" class="form-label">Customer Name</label>
        <input type="text" name="customerName" class="form-control" id="inputEmail5">
      </div>
      <div class="col-md-3">
        <label for="inputPassword5" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="inputPassword5">
      </div>
      <div class="col-md-3">
        <label for="inputPassword5" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control" id="inputPassword5">
      </div>
      <div class="col-md-3">
        <label for="inputPassword5" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputPassword5">
      </div>
      <div class="col-md-12 pt-4">
        <table class="table table-bordered table-hover" id="tab_logic">
          <thead>
            <tr>
              <th class="text-center"> # </th>
              <th class="text-center"> Medicine Lists<span class="text-danger">*</span> </th>
              <th class="text-center"> Qnt(Box)<span class="text-danger">*</span> </th>
              <th class="text-center"> Price<span class="text-danger">*</span> </th>
              <th class="text-center"> Total<span class="text-danger">*</span> </th>
            </tr>
          </thead>
          <tbody>
            <tr id='addr0'>
              <td>1</td>
              <td><select class="form-control" name='medicine[]' onChange="option_checker(this);"></select></td>
              <td><input type="number" name='qty[]' placeholder='Enter Qnt' class="form-control qty" step="0" min="0"/></td>
              <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
              <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            </tr>
            <tr id='addr1'></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <p id="add_row" class="btn btn-success float-start rounded-1">Add Item</p>
        <p id='delete_row' class="float-end btn btn-danger rounded-1">Delete Item</p>
      </div>
    </div>
    <div class="row clearfix" style="margin-top:20px">
      <div class="col-md-6">
        <table class="table table-bordered table-hover" id="tab_logic_total">
          <tbody>
            <tr>
              <th class="text-center">Sub Total</th>
              <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" <?php echo "readonly";?>></td>
            </tr>
            <tr>
              <th class="text-center">Tax</th>
              <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                  <input type="number" name="tax" class="form-control" id="tax" placeholder="0">
                  <div class="input-group-text">%</div>
                </div></td>
            </tr>
            <tr>
              <th class="text-center">Tax Amount</th>
              <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" <?php echo "readonly";?>></td>
            </tr>
            <tr>
              <th class="text-center">Grand Total</th>
              <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" <?php echo "readonly";?>></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="submit" class="btn btn-success rounded-1" value="Save Invoice">
      </div>
    </div>
  </form>
</main><!-- End #main -->
  <script> 
    $(document).ready(function(){
	
      option_list('addr0');
      
        var i=1;
        $("#add_row").click(function(){b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        option_list('addr'+i);
            i++; 
        });
        $("#delete_row").click(function(){
          if(i>1){
        $("#addr"+(i-1)).html('');
        i--;
        }
        calc();
      });
      
      $(".product").on('change',function(){
          option_checker(this)
      });
      
      
      $('#tab_logic tbody').on('keyup change',function(){
        calc();
      });
      $('#tax').on('keyup change',function(){
        calc_total();
      });

    });

    function option_checker(id)
    {
      var myOption=$(id).val();
      var s =0;
      $('#tab_logic tbody tr select').each(function(index, element){
            var myselect = $(this).val();
        if(myselect==myOption){
          s += 1;
        }
        });
      if(s>1){
        alert(myOption+' as been added already try new..')	
      }
    }

    function option_list(id)
    {
      el='#'+id;
      <?php
          $medicine =  new Medicine;
          $medicine->getMedicine();
          $query = $medicine->query;

          $productArray = array();
          $sl = 1;

          while ($row = $query->fetch_assoc()) {

            $id             = $row['id'];
            $name           = $row['medicine_name'];
            $productArray[] = $name;
            $sl++;
          }
      ?>
      var myArray = <?php echo json_encode($productArray); ?>;
      var collect = '<option value="">Select Medicine</option>';
        for(var i = 0; i<myArray.length;i++){
            collect += '<option value="'+myArray[i]+'">'+myArray[i]+'</option>';
        }
        $(el+" select").html(collect);
    }

    function calc()
    {
      $('#tab_logic tbody tr').each(function(i, element) {
        var html = $(this).html();
        
          var qty = $(this).find('.qty').val();
          var price = $(this).find('.price').val();
          $(this).find('.total').val(qty*price);
          
          calc_total();
        });
    }

    function calc_total()
    {
      total=0;
      $('.total').each(function() {
            total += parseInt($(this).val());
        });
      $('#sub_total').val(total.toFixed(2));
      tax_sum=total/100*$('#tax').val();
      $('#tax_amount').val(tax_sum.toFixed(2));
      $('#total_amount').val((tax_sum+total).toFixed(2));
    }
  </script>
  <?php include_once("includes/footer.php") ?>
  <?php include_once("includes/js.php") ?>
</body>

</html>
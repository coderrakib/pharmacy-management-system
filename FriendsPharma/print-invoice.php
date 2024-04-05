<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head-link.php") ?>
<body>
<div class="row">
<div class="col-md-8">
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

  $invoice = new Invoice;
  $invoice->getInvoice(['id', '=', $id]);
  $query = $invoice->query;

  $result             = $query->fetch_assoc();
  $invoice_no         = $result['invoice_no'];
  $date_issue         = $result['date_issue'];
  $date_due           = $result['date_due'];
  $customer_name      = $result['customer_name'];
  $address            = $result['address'];
  $phone              = $result['phone'];
  $email              = $result['email'];
  $medicine           = $result['medicine'];
  $qnt                = $result['qnt'];
  $price              = $result['price'];
  $total              = $result['total'];
  $sub_total          = $result['sub_total'];
  $tax                = $result['tax'];
  $tax_amount         = $result['tax_amount'];
  $grand_total        = $result['grand_total'];
  $status             = $result['status'];

  $explode_med    = explode(',', $medicine);
  $explode_qnt    = explode(',', $qnt);
  $explode_pri    = explode(',', $price);
  $explode_tol    = explode(',', $total);
?>
<section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="p-3 flex-fill bd-highlight">
                            <strong>Invoice:</strong> <span class="text-success"> <?php echo $invoice_no; ?> </span>
                            <br>
                            <strong>Issue Date:</strong> <span class="text-success"> <?php echo $date_issue; ?> </span>
                        </div>
                        <div class="p-3 flex-fill bd-highlight"><i style="font-size:25px;" class="bi bi-plus-circle text-success"></i>&nbsp;&nbsp;<span style="font-size:25px;"><b> Friends Pharma </b> </span> </div>
                        <div class="p-3 flex-fill bd-highlight">
                            <strong>Status:</strong> 
                            <?php
                                if($status == 1){
                                    echo "<span class='text-success'>Complete</span>";
                                }
                                if($status == 2){
                                    echo "<span class='text-warning'>Panding</span>";
                                }
                                if($status == 3){
                                    echo "<span class='text-danger'>Cancelled</span>";
                                }
                            ?>
                            <br><strong>Due Date:</strong> <span class="text-success"> <?php echo $date_due; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">From:</h6>
                        <div>
                        <strong><?php echo $customer_name; ?></strong>
                    </div>
                    <div><?php echo $address; ?></div>
                    <div>Email: <?php echo $email; ?></div>
                    <div>Phone: <?php echo $phone; ?></div>
                    </div>

                    <div class="col-sm-6 text-end">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>Friends Pharma</strong>
                    </div>
                    <div>Attn: Accountant</div>
                    <div>Mirpur-2, Dhaka-1216</div>
                    <div>Email: info@friendspharma.com</div>
                    <div>Phone: +48 123 456 789</div>
                    </div>
                </div>

                <div class="d-flex bd-highlight">
                    <div class="p-3 flex-fill bd-highlight">
                        <span class="mb-3"><b>Item</b></span>
                        <hr>
                        <?php $x = 1; foreach ($explode_med as $item => $itm) { ?>
                            <p><?php echo $itm;?></p>
                            <hr>
                        <?php $x++; } ?>  
                    </div>
                    <div class="p-3 flex-fill bd-highlight">
                        <span class="mb-3"><b>Quantity</b></span>
                        <hr>
                        <?php $y = 1; foreach ($explode_qnt as $item => $itm) { ?>
                            <p><?php echo $itm;?></p>
                            <hr>
                        <?php $y++; } ?>
                    </div>
                    <div class="p-3 flex-fill bd-highlight">
                        <span class="mb-3"><b>Price</b></span>
                        <hr>
                        <?php $y = 1; foreach ($explode_pri as $item => $itm) { ?>
                            <p><?php echo $itm;?></p>
                            <hr>
                        <?php $y++; } ?>
                    </div>
                    <div class="p-3 flex-fill bd-highlight">
                        <span class="mb-3"><b>Total</b></span>
                        <hr>
                        <?php $y = 1; foreach ($explode_tol as $item => $itm) { ?>
                            <p><?php echo $itm;?></p>
                            <hr>
                        <?php $y++; } ?> 
                    </div>
                 </div>
                
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right"><?php echo $sub_total." BDT";; ?></td>
                            </tr>
                            <tr>
                                <td class="left">
                                <strong>Discount (0%)</strong>
                                </td>
                                <td class="right">0 BDT</td>
                            </tr>
                            <tr>
                                <td class="left">
                                <strong>VAT (<?php echo $tax; ?>%)</strong>
                                </td>
                                <td class="right"><?php echo $tax_amount." BDT";; ?></td>
                            </tr>
                            <tr>
                                <td class="left">
                                <strong>Total</strong>
                                </td>
                                <td class="right">
                                <strong><?php echo $grand_total." BDT"; ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  <div>
<div>
<?php include_once("includes/js.php") ?>
</body>
</html>
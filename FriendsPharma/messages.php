<?php
	
	$class_name = $_SESSION['class_name'];
    $exlpd = explode("-",$class_name);

if($exlpd[1] == "danger"){
?>
<div id="app" class="container py-2">
    <div class="py-2">
        <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
            <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document"> 
                <div class="modal-content"> 
                    <div class="modal-body text-center p-lg-4"> 
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                            <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" /> 
                            <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                            <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" X2="34.4" y2="92.2" /> 
                        </svg> 
                        <h4 class="text-danger mt-3">Not successful!</h4>
                        <?php 
                            foreach ($_SESSION['messages'] as $message) {
                                $exlpd = explode("-",$class_name);
                                echo "<div class='alert $class_name alert-dismissible fade show mb-2 mt-2 p-2 text-start' role='alert'>
                                      <strong style='font-size:14px;' class='text-$exlpd[1]'>$message</strong>
                                </div>";
                            }
                        ?>
                        <button type="button" class="btn mt-3 btn-danger rounded-1" data-bs-dismiss="modal">Cancel</button> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
</div>
<?php } if($exlpd[1] == "success"){ ?>
<div id="app" class="container py-2">
    <div class="py-2">
        <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
            <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document"> 
                <div class="modal-content"> 
                    <div class="modal-body text-center p-lg-3"> 
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
							<circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
							<polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
						</svg>
                        <h4 class="text-success mt-3">Successfully!</h4>
                        <?php 
                            foreach ($_SESSION['messages'] as $message) {
                                $exlpd = explode("-",$class_name);
                                echo "<div class='alert $class_name alert-dismissible fade show mb-2 mt-2 p-2 text-start' role='alert'>
                                      <strong style='font-size:14px;' class='text-$exlpd[1]'>$message</strong>
                                </div>";
                            }
                        ?>
                        <button type="button" class="btn mt-3 btn-success rounded-1" data-bs-dismiss="modal">Done</button> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
</div>
<?php } ?>
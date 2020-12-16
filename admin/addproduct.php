<?php 
//include('../Dbcon.php');
//include('../User.php');
 include 'header.php';
//$Dbcon = new dbconnection();

 //echo "jai jawan";
 if (isset($_POST['submit'])) {
 	$productcat = $_POST['productcat'];
 	$productnam = $_POST['productnam'];
 	$pageurl = $_POST['pageurl'];
 	$monthlypri=$_POST['monthlypri'];
 	$annualpri=$_POST['annualpri'];
 	$sku =$_POST['sku'];
 	$webspace=$_POST['webspace'];
 	$bandwidth=$_POST['bandwidth'];
 	$domain=$_POST['domain'];
 	$language=$_POST['language'];
 	$mailbox=$_POST['mailbox'];
 	
 	// echo $productcat; 
 	// echo $productnam; 
 	// echo $sku; 
 	// echo $bandwidth;
 	$a = array("A"=>$webspace, "B"=>$bandwidth, "C"=>$domain,"D"=>$language,"E"=>$mailbox);
       json_encode($a);

 	$Dbcon = new dbconnection();
 	$user=new User();
 	$sql= $user -> insertaddproduct($productcat,$productnam,$pageurl,$monthlypri,$annualpri,$sku,json_encode($a),$Dbcon-> conn);
 }
 if(isset($_GET['id'])){
  $id=$_GET['id'];
  $Dbcon = new dbconnection();
  $user2=new User();
  $sql=$user2 -> deleteproduct($id,$Dbcon-> conn);
 }
 // if(isset($_GET['id'])){
 //  $id=$_GET['id'];
 //  $Dbcon = new dbconnection();
 //  $user2=new User();
 //  $sql=$user2 -> deleteproduct($id,$Dbcon-> conn);
 // }
?>
<div class="container mt--9 p-7">

  <div class="card p-5">
              <!-- <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Edit profile </h3>
                  </div>
                  <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div>
                </div>
              </div> -->
              <div class="card-body">
                <form action="addproduct.php" method="POST" id="form">
                  <h6 class="heading-small text-muted mb-4">ENTER PRODUCT DETAILS</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Select Product Category</label>
                          <!-- <input type="text" id="input-username" class="form-control" placeholder="Select Category" > -->
                          <select name="productcat" class="form-control" id="category">
                          	<option value="">Select Category</option>
                          	<?php
                          	$dbcon = new dbconnection();
                          	$user = new User();
                          	$sql = $user -> importcategory($dbcon-> conn) ;

                          	foreach($sql as $key=>$value){?>
                          		<option value="<?php echo  $value['id'] ?>"><?php echo $value['prod_name'] ?></option>
                          		<!-- echo ('<option value="'.$value['id'].'">'.$value['prod_name'].'</option>'); -->
                          	<?php }

                          	?>
                          	
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Enter Product Name</label>
                          <input type="text" id="input-email" class="form-control" placeholder="Enter Product Name" name="productnam">
                          <div class="invalid-feedback">invalid</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Page URL</label>
                          <input type="text" id="input-first-name" class="form-control" name="pageurl" placeholder="Page URL" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Last name</label>
                          <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">PRODUCT DESCRIPTION (ENTER PRODUCT DESCRIPTION BELOW)</h6>
                  
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Enter Monthly Price</label>
                          <input type="text" id="monthlyprice" name="monthlypri" class="form-control" placeholder="ex: 23" maxlength="15" >
                          <div class="invalid-feedback">invalid</div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Enter Annual Price</label>
                          <input type="text" id="annualprice" name="annualpri" class="form-control" placeholder="ex: 23" maxlength="15">
                          <div class="invalid-feedback">invalid</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">SKU</label>
                          <input type="text" id="sku" name="sku" class="form-control" placeholder="ex: 23" >
                          <div class="invalid-feedback">invalid</div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Last name</label>
                          <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">FEATURES</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Web Space(in GB)</label>
                          <input type="text" id="webspace" class="form-control" placeholder="Web Space(in GB)" name="webspace" maxlength="5">
                          <div class="invalid-feedback">invalid</div>
                          <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Bandwidth(in GB)</label>
                          <input type="text" id="bandwidth" class="form-control" name="bandwidth" placeholder="Bandwidth(in GB)" maxlength="5">
                          <div class="invalid-feedback">invalid</div>
                          <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Free Domain</label>
                          <input type="text" id="domain" name="domain" class="form-control" placeholder="Free Domain" >
                          <div class="invalid-feedback">invalid</div>
                          <small class="text-muted">ENTER 0 IF NO DOMAIN AVAILABLE IN THIS SERVICE</small>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Language/Technology Support</label>
                          <input type="text" id="language" name="language" class="form-control" placeholder="Language/Technology Support" >
                          <div class="invalid-feedback">invalid</div>
                          <small class="text-muted">SEPARATE BY(,) EX: PHP,MYSQL</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Mailbox</label>
                          <input type="text" id="mailbox" name="mailbox" class="form-control" placeholder="Mailbox	" >
                          <div class="invalid-feedback">invalid</div>
                          <small class="text-muted">ENTER NUMBER OF MAILBOX WILL BE PROVIDED,ENTER 0 IF NONE</small>
                        </div>
                      </div>
                      <!-- <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Language/Technology Support</label>
                          <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="text-center p-5">
                      <div ><input type="submit" id="submit" name="submit" value="Create New" class="btn btn-primary"></div>
                  </div>
                </form>
              </div>
  </div>
</div>
<!-- table -->
<!-- script -->

  


  <!-- //script -->


<?php include 'footer.php'; ?>
<!-- //       validate();
    //       $('#inputName, #inputEmail, #inputTel').change(validate);
    //   });

    //   function validate(){
    //       if ($('#category').val().length   >   0   &&
    //           $('#input-first-name').val().length  >   0   &&
    //           $('#input-email').val().length    >   0) {
    //           $("input[type=submit]").prop("disabled", false);
    //       }
    //       else {
    //           $("input[type=submit]").prop("disabled", true);
    //       } -->
    <!--submit disable // if($('#category').val()=='' || $('#input-email').val()=='' || $('#monthlyprice').val()=='' || $('#annualprice').val()=='' || $('#sku').val()=='' || $('#webspace').val()=='' || $('#bandwidth').val()=='' || $('#domain').val()=='' || $('#language').val()=='' || $('#mailbox').val()==''){
      //   $('#submit').prop('disabled',true);
      // }
      // if($('#category').val()!='' && $('#input-email').val()!='' && $('#monthlyprice').val()!='' && $('#annualprice').val()!='' && $('#sku').val()!='' && $('#webspace').val()!='' && $('#bandwidth').val()!='' && $('#domain').val()!='' && $('#language').val()!='' && $('#mailbox').val()!=''){
      //   $('#submit').prop('enabled',true);
      // } -->
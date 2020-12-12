<?php 
//include('../Dbcon.php');
//include('../User.php');
 include 'header.php';
 echo "jai jawan";
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
 	echo $productcat; 	
 }
?>

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
              <form action="addproduct.php" method="POST">
                <h6 class="heading-small text-muted mb-4">ENTER PRODUCT DETAILS</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Select Product Category</label>
                        <!-- <input type="text" id="input-username" class="form-control" placeholder="Select Category" > -->
                        <select name="productcat" class="form-control">
                        	<option value="">Select Category</option>
                        	<?php
                        	$dbcon = new dbconnection();
                        	$user = new User();
                        	$sql = $user -> importcategory($dbcon-> conn) ;

                        	foreach($sql as $key=>$value){?>
                        		<option value="<?php echo  $value['id'] ?>"><?php echo $value['prod_name'] ?></option>
                        		<!-- echo ('<option value="'.$value['id'].'">'.$value['prod_name'].'</option>'); -->
                        	<?php }

                        	?>">
                        	
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Product Name</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Enter Product Name" name="productnam">
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
                        <input type="text" id="input-username" name="monthlypri" class="form-control" placeholder="ex: 23" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Annual Price</label>
                        <input type="email" id="input-email" name="annualpri" class="form-control" placeholder="ex: 23">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">SKU</label>
                        <input type="text" id="input-first-name" name="sku" class="form-control" placeholder="ex: 23" >
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
                        <input type="text" id="input-username" class="form-control" placeholder="Web Space(in GB)" name="webspace">
                        <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Bandwidth(in GB)</label>
                        <input type="email" id="input-email" class="form-control" name="bandwidth" placeholder="Bandwidth(in GB)">
                        <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Free Domain</label>
                        <input type="text" id="input-first-name" name="domain" class="form-control" placeholder="Free Domain" value="Lucky">
                        <small class="text-muted">ENTER 0 IF NO DOMAIN AVAILABLE IN THIS SERVICE</small>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Language/Technology Support</label>
                        <input type="text" id="input-last-name" name="language" class="form-control" placeholder="Language/Technology Support" value="Jesse">
                        <small class="text-muted">SEPARATE BY(,) EX: PHP,MYSQL</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mailbox</label>
                        <input type="text" id="input-first-name" name="mailbox" class="form-control" placeholder="Mailbox	" value="Lucky">
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
                    <div ><input type="submit" name="submit" value="Create New" class="btn btn-primary"></div>
                </div>
              </form>
            </div>
</div>

<?php include 'footer.php'; ?>
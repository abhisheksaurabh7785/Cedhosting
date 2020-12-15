<?php 
include 'header.php';
$Dbcon = new dbconnection();
$id=isset($_GET['id'])?$_GET['id']:'';
//echo $id;
$user=new User();
$sql=$user-> vieweditfetch($id,$Dbcon-> conn);
//echo $sql['prod_name'];
foreach($sql as $key)
{

    $category=$key['prod_name'];
    
    // echo $category;
    $url=$key['html'];
    $b=json_decode ($key['description']);
    $webspace=$b->A;
    //echo $webspace;
    $bandwidth=$b->B;
    $domain=$b->C;
    $language=$b->D;
    $mailbox=$b->E;
    $month=$key['mon_price'];
    $annual=$key['annual_price'];
    $sku=$key['sku'];

   
}
if(isset($_POST['submit'])){
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
 	
 	 //echo $productcat; 
 	// echo $productnam; 
 	// echo $sku; 
 	// echo $bandwidth;
 	$a = array("A"=>$webspace, "B"=>$bandwidth, "C"=>$domain,"D"=>$language,"E"=>$mailbox);
       json_encode($a);
      // $Dbcon = new dbconnection();
 	   $user1=new User();
 	   $sql1= $user1 -> updateproduct($id,$productcat,$productnam,$pageurl,$monthlypri,$annualpri,$sku,json_encode($a),$Dbcon-> conn);
 	   if($sql1=true){
 	   	echo '<script>alert("successfully updated record");</script>';
 	   	echo '<script>window.location="viewproduct.php"</script>';
 	   	// echo "alert('successfully updated record');";
 	   	// echo "</script>";
 	   }
}
//print_r($sql);
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
                <form action="" method="POST">
                  <h6 class="heading-small text-muted mb-4">ENTER PRODUCT DETAILS</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Select Product Category</label>
                          <!-- <input type="text" id="input-username" class="form-control" placeholder="Select Category" > -->
                          <select name="productcat" class="form-control">
                          	<option value="0" selected><?php
				                    $User=new User();
				                    $Dbcon=new dbconnection();
				                    
				                   $sql=$User->parentname($category,$Dbcon->conn);
				               echo $sql;
				                   ?>
				                  </option>
				                <?php
				                        $User=new User();
				                           $Dbcon=new dbconnection();
				                         $sql=$User->importcategory($Dbcon->conn);
				                          // print_r($sql);
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
                          <input type="text" id="input-email" class="form-control" placeholder="<?php echo $category ?>" name="productnam">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Page URL</label>
                          <input type="text" id="input-first-name" class="form-control" name="pageurl" placeholder="<?php echo $url ?>" >
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
                          <input type="text" id="input-username" name="monthlypri" class="form-control" placeholder="<?php echo $month ?>" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Enter Annual Price</label>
                          <input type="text" id="input-email" name="annualpri" class="form-control" placeholder="<?php echo $annual ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">SKU</label>
                          <input type="text" id="input-first-name" name="sku" class="form-control" placeholder="<?php echo $sku ?>" >
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
                          <input type="text" id="input-username" class="form-control" placeholder="<?php echo $webspace ?>" name="webspace">
                          <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Bandwidth(in GB)</label>
                          <input type="text" id="input-email" class="form-control" name="bandwidth" placeholder="<?php echo $bandwidth ?>">
                          <small class="text-muted">ENTER 0.5 FOR 512 MB</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Free Domain</label>
                          <input type="text" id="input-first-name" name="domain" class="form-control" placeholder="<?php echo $domain ?>" >
                          <small class="text-muted">ENTER 0 IF NO DOMAIN AVAILABLE IN THIS SERVICE</small>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Language/Technology Support</label>
                          <input type="text" id="input-last-name" name="language" class="form-control" placeholder="<?php echo $language ?>" >
                          <small class="text-muted">SEPARATE BY(,) EX: PHP,MYSQL</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Mailbox</label>
                          <input type="text" id="input-first-name" name="mailbox" class="form-control" placeholder="<?php echo $mailbox ?>" >
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
                      <div ><input type="submit" name="submit" value="Update" class="btn btn-primary"></div>
                  </div>
                </form>
              </div>
  </div>
</div>
<!-- table -->


<?php include 'footer.php'; ?>
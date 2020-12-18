<?php
include('header.php');
//echo "string";
if(isset($_SESSION['insertid'])){
	//print_r($_SESSION['cart']);
	//echo $_SESSION['cart']['prod_name'];


	  //echo $prod;
	  //echo $price;


	// $id=$_GET['id'];
	// $user=new User();
	// $data = $user -> addcart($id,$dbcon-> conn);

	// print_r($data);

?>
<div class="table-responsive">
              <table class="table align-items-center table-flush p-5">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Product</th>
                    <th scope="col" class="sort" data-sort="budget">Quantity</th>
                    <th scope="col" class="sort" data-sort="status">Price</th>
                    <!-- <th scope="col">Users</th> -->
                    <!-- <th scope="col" class="sort" data-sort="completion">Completion</th> -->
                    <!-- <th scope="col"></th> -->
                  </tr>
                </thead>
                <tbody class="list">
                	<?php
                	$prod2='';
                	$total=0;
                	foreach ($_SESSION['cart'] as $key => $value) {

	  $prod= $value['prod_name'];
	  $price= $value['mon_price']; 
	 
	  if($prod != $prod2){

                	?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       <!--  <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a> -->
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $prod;
                          $prod2=$prod; ?></span>
                        </div>
                      </div>
                    </th>
                    
                    <td>
                      <!-- <span class="badge badge-dot mr-4"> -->
                        <!-- <i class="bg-warning"></i> -->
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="budget">$
                     <?php echo $price;
                     $total= $total + $price;
                    ?>
                    </td>

                    <!-- <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td> -->
                    <!-- <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td> -->
                    <!-- <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td> -->
                  </tr>

                 
                </tbody>
                <?php 
}}
?>

              </table>
              
                  	<?php echo "<h1>TOTAL PRICE=<span style='color: red;background-color: yellow'>$".$total."</span></h1>" ?>;
                  	
                  
</div>
<?php }else{
	echo "<h1>Cart is Empty</h1>";
} ?>

<!-- <?php //include('footer.php') ?> -->
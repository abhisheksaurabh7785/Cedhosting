<?php 
include 'header.php';
if(isset($_GET['id'])&& !(isset($_GET['action'])))
{
  $id=$_GET['id'];
  $Dbcon = new dbconnection();
  $user2=new User();
  $sql=$user2 -> deleteproduct($id,$Dbcon-> conn);
 }
?>
<div class="container  mt--9 p-5">
<!-- table -->
	<div class="container-fluid p-5">
	    <div class="row">
	        <div class="col">
	            <div class="card">
		            <!-- Card header -->
		            <div class="card-header border-0">
		              <h3 class="mb-0">Product table</h3>
		            </div>
		            <!-- Light table -->
		            <div class="table-responsive">
		                <table class="table align-items-center table-flush">
			                <thead class="thead-light">
			                    <tr>
				                    <!-- <th scope="col" class="sort" data-sort="id">Product ID</th> -->
				                    <th scope="col" class="sort" data-sort="budget">Product Name</th>
				                    <th scope="col" class="sort" data-sort="status">Link</th>
				                   
				                    <th scope="col" class="sort" data-sort="completion">Product Availability</th>
				                    <th scope="col" class="sort" data-sort="completion">Product Launch Date</th>
				                    <th scope="col" class="sort" data-sort="completion">Webspaces</th>
				                    <th scope="col" class="sort" data-sort="completion">Annual Price</th>
				                    <th scope="col" class="sort" data-sort="completion">SKU</th>
				                    <th scope="col" class="sort" data-sort="completion">Web Spaces</th>
				                    <th scope="col" class="sort" data-sort="completion">Bandwidth</th>
				                    <th scope="col" class="sort" data-sort="completion">Free Domain</th>
				                    <th scope="col" class="sort" data-sort="completion">Language</th>
				                    <th scope="col">MAILBOX</th>
				                    <th scope="col"class="sort" data-sort="completion">Action</th>
			                    </tr>
			                </thead>
			                <tbody class="list">
			                 

				                <?php 

				                
				                
				                
				                $User2=new User();
				                $Dbcon=new dbconnection();
				                $sql1=$User2->tableview($Dbcon-> conn);
				                //print_r($sql1['annual_price']);
				                foreach($sql1 as $key)
				                // echo $key['annual_price'];
				                {?>

				                <tr>
				                	<td>
				                      <span class="badge badge-dot mr-4">
				                        <i class="bg-warning"></i>
				                        <span class="status"><?php echo $key['prod_name']; ?></span>
				                      </span>
			                   		</td>
				                    <td>
					                    <div class="avatar-group">
					                        <?php echo $key['html']; ?>
					                       
					                    </div>
				                    </td>
				                    <td>
				                        <div class="d-flex align-items-center">
					                        <span class="completion mr-2">

						                        <?php $key['prod_available'];
						                         if($key['prod_available']=='1')
						                         {
						                           echo "AVAILABLE";
						                         }
						                         else {
						                           echo "not available";
						                         }
						                        
						                        
						                        ?>
					                        </span>
				                        </div>
				                          
				                        <!-- </div>
				                      </div> -->
				                    </td>
				                    <td>
					                    <div class="avatar-group">
					                       <?php echo $key['prod_launch_date'] ;?>
					                       
					                    </div>
				                    </td>
				                    <td>
				                        <div class="avatar-group">
				                            <?php echo $key['mon_price']; ?>
				                       
				                        </div>
				                    </td>
				                    <td>
				                      <div class="avatar-group">
				                        <?php echo $key['annual_price'] ?>
				                       
				                      </div>
				                    </td>
				                    <td>
					                    <div class="avatar-group">
					                        <?php echo $key['sku'] ?>
					                       
					                    </div>
				                    </td>
			                   
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">
				                           <?php   $b=json_decode ($key['description']);
							                        $a=$b->A;
				                              echo $a;
				                            ?>
				                      </div>
				                    </td> 
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">
				                     <?php   $b=json_decode ($key['description']);
							                        $bb=$b->B;
				                              echo $bb;
				                       ?>
				                      </div>
				                    </td> 
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">
				                     <?php   $b=json_decode ($key['description']);
							                        $c=$b->C;
				                              echo $c;
				                       ?>
				                      </div>
				                    </td> 
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">
				                     <?php   $b=json_decode ($key['description']);
							                        $d=$b->D;
				                              echo $d;
				                       ?>
				                      </div>
				                    </td> 
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">
				                     <?php   $b=json_decode ($key['description']);
							                        $e=$b->E;
				                              echo $e;
				                       ?>
				                      </div>
				                    </td> 
				                    <td>
				                      <div class="d-flex align-items-center">
				                        <span class="completion mr-2">

				                       
				                        <a href="vieweditproduct.php?action=1&id=<?php echo  $key['id'];?>" class="showtable">Edit</a>
				                        <a onclick="javascript: return confirm('are you sure?');" href="viewproduct.php?id=<?php echo  $key['id'];?>" class="showtable">Delete</a>
				                        </span>
				                        <div>
				                          
				                        </div>
				                      </div>
				                    </td>
				                </tr>
			                    <?php }
								              
								        ?>
		                  </tbody>
		                </table>
		            </div>
		          </div>
		      </div>
		  </div>
	</div>	
	

</div>	
<div class="mt-9">
<?php include 'footer.php'; ?>
</div>
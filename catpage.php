<?php
//session_start();
//18dec change


//
if(isset($_GET['id'])){
	require ('header.php'); 
	$_SESSION['catpage']=$_GET['id'];
    $id = $_GET['id'];
	$user =new User();
	$dbcon =new dbconnection();
	$data = $user-> importhosting($id,$dbcon-> conn);
	//$user1 =new User();
	$data2 = $user-> importhostingprice($id,$dbcon-> conn);
    //print_r($data2);
	foreach ($data as $key => $value) {
		//echo $value['prod_name'];
		echo $value['html'];

		$id2=$value['id'];
	}
	?>
		<div class="content">
			
					
					<div class="tab-prices">
						<div class="container">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<!-- <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
									</ul> -->
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="linux-prices">
											<?php 
	foreach ($data2 as $key2 => $value2) {
		$j = json_decode($value2['description']);
		$web = $j->A;
		$band = $j->B;
		$domain = $j->C;
		$lang = $j->D;
		$mail = $j->E;

		//echo $a;
?>
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4><?php echo $value2['prod_name']?></h4>
												</div>
												<div class="linux-bottom">
													<h5>$<?php echo $value2['mon_price'];?> <span class="month">per month</span></h5>
													<h5>$<?php echo $value2['annual_price'];?> <span class="month">per year</span></h5>
													<h6><?php echo $domain;?> Domain</h6>
													<ul>
													<li><strong><?php echo $web;?>GB</strong> web Space</li>
													<li><strong><?php echo $band;?>GB</strong> Bandwidth</li>
													<li><strong><?php echo $lang;?></strong>Technology Support</li>
													<li><strong><?php echo $mail;?> </strong>  Mailbox</li>
													<!-- <li><strong>High Performance</strong>  Servers</li> -->
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
													<?php $_GET['pid'] = $value2['prod_id'];
													//echo $_GET['pid'];?>
													
												</div>
												<!-- <div id="buy"> -->
															<!-- <?php //foreach ($_SESSION['cart'] as $key => $value) {
																//echo $value['prod_name'];
															}	?>	 -->						<!-- </div> -->
												<!-- <div id="gotocart"> -->
												<!-- 	<?php //i//f(in_array($_GET['pid'], $_SESSION['cart'])){

												//echo '<a href="cart.php" >go to cart</a>';}else{
													//echo $_GET['pid'];
													//echo $_SESSION['cart']['prod_id'];
													//print_r( $_SESSION['cart']);
													//echo "<a href='insert.php?id=". $_GET['pid']."'". ">buy now</a>";

												}?> -->
											<!-- </div> -->	
											<a href="insert.php?id=<?php echo $_GET['pid'] ?> ">buy now</a>	
													<!-- cart value -->


											</div>
									
											
											<div class="clearfix"></div>
										</div>
									</div>


									
									<!-- <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
										<div class="linux-prices">
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Standard</h4>
												</div>
												cart.php?id=<?php //echo $_GET['pid']?>

												<div class="linux-bottom us-bottom">
													<h5>$259 <span class="month">per month</span></h5>
													<h6>Single Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											
											<div class="clearfix"></div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
					<!-- clients -->
					<!-- Error to be solved -->



	<?php require ('footer.php');
}}else{
	echo "<script>window.location = 'catpage.php'</script>";
}
?>




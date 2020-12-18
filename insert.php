<?php 
include ('header.php');
									if(isset($_GET['id'])){
										$id=$_GET['id'];
										$_SESSION['insertid']=$id;
										//$user=new User();
										//$data=array();
										$data = $user -> addcart($id,$dbcon-> conn);
										if (empty($_SESSION['cart'])) {
											$_SESSION['cart'] = $data;
											} else {
											// if (in_array($data['id'], array_keys($_SESSION['cart']))) {
											// $_SESSION['cart'][$key]['qty'] += $itemQty; 
											// } else {
											$_SESSION['cart']
											= array_merge($_SESSION['cart'], $data);
											}
											//header('Location: catpage.php');
											echo "<script>window.location.href='catpage.php'</script>";
											


										//$_SESSION['cart']=$data;
										//print_r ($_SESSION['cart']);
										// foreach ($data as $key => $value) {
										// 	$_SESSION['cid']= $value['id'];
										// 	$_SESSION['cname']= $value['prod_name'];
										// 	$_SESSION['cqty']= 1;
										// 	$_SESSION['cmprice']=$value['mon_price'];

										// }
										//$_SESSION['cart']['ket'] =$data;
										//echo "<br>";
										//echo $_SESSION['cid'];
										//print_r($data);



									}


									?>
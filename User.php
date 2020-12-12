<?php
session_start();



// require 

class User{
	//signup form validation

	function register( $name, $mobile, $email, $ques, $answer, $password, $repassword,$conn ){
    	$sq= "SELECT * FROM user WHERE `email`='$email' OR `mobile`='$mobile'";
    	$res = $conn->query($sq);
    	//print_r($res) ;
		if($password==$repassword && $email!='' && $password!=''  && $ques!='' && $answer!='' && $repassword!='' && $mobile!=''&& $name!='')

	    {
	    	
				// mobile validation
				if( preg_match(" /^(0|[+91]{3})?[123456789][0-9]{9}$/", $mobile) ){
					if(strlen($password) > 7){
						if($res->num_rows > 0){
							echo '<script>alert("username or Mobile already exists!")</script>';
						}else{
							if(preg_match('/^([a-zA-Z]+\s?)*$/', $name)){
								if (0) {
									echo '<script>alert("invalid . character in email!")</script>';
								}else{
									// if (preg_match("/^(\d)\1{9}/", $mobile)) {
									// 	echo '<script>alert("phone number is identical")</script>';
									// }
									if($mobile=='1111111111' || $mobile=='01111111111' || $mobile=='2222222222' || $mobile=='02222222222' || $mobile=='3333333333' || $mobile=='03333333333' || $mobile=='4444444444' || $mobile=='04444444444' || $mobile=='5555555555' || $mobile=='05555555555' || $mobile=='6666666666' || $mobile=='06666666666' || $mobile=='7777777777' || $mobile=='07777777777' || $mobile=='8888888888' || $mobile=='08888888888' || $mobile=='9999999999' || $mobile=='09999999999'){
										echo "<script>alert('number are identical');</script>";
									}
									else{
										if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-])\S{8,16}$/", $password)) {
											if (preg_match("/^(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/", $answer)) {
												

											
										      // print_r('<script>'$res'</script>');

												$sql = "INSERT INTO user (`email`, `name`, `mobile`, `security_question`,`security_answer`,`password`) VALUES ('{$email}', '{$name}', '{$mobile}','{$ques}','{$answer}', MD5('$password'))";
													$result = $conn->query($sql); 
													return $result;
											}else{
												echo '<script>alert("answer pattern is invalid!")</script>';
											}
											}else{
												echo '<script>alert("password must be Combination of UPPERCASE, lowercase, special character and numeric value")</script>';
											}
									}	
							    }

							}else{
								echo '<script>alert("invalid name!")</script>';

							}

				            //echo '<script>alert("username already exists!")</script>'

						
					     }
										

									
					}else{
						echo '<script>alert("password should be eight character or more")</script>';
					}				

				}else{
					echo '<script>alert("Invalid number!")</script>';
					
				}
	    }else{
	    	echo '<script>alert("empty column")</script>'; 
	    }
	}

	//login validation
	function login($email,$password,$conn){
		$sql = "SELECT * FROM user WHERE `email`='$email' AND `password`= md5('$password')";
		$result = $conn-> query($sql);
		if($result->num_rows > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['ADMIN']= $data['is_admin'];
			$_SESSION['ACTIVE']= $data['active'];
			$_SESSION['USERID'] = $data['id'];
			$_SESSION['NAME'] = $data['name'];
			$_SESSION['EMAIL'] = $data['email'];
			$_SESSION['MOBILE'] = $data['mobile'];
			if ($_SESSION['ADMIN']==1) {
				echo "hurray! login credentials matched!";
				echo "<script>window.location='admin/index.php';</script>";
				//header('Location: admin/index.php');
			}
			if ($_SESSION['ACTIVE']==1) {
				if($_SESSION['ADMIN']==0){
					echo "<script>";
					echo "alert('Hurray! login credentials verified');";
					echo "window.location.href='index.php';";
					//header('Location: verification.php');
					echo "</script>";
			    }
			}
			if ($_SESSION['ACTIVE']==0) {
				
				echo "<script>";
				echo "alert('verify your email id!');";
				echo "window.location.href='verification.php';";
				//header('Location: verification.php');
				echo "</script>";

				//header('Location: verification.php');
			    
			}

		}elseif($email=='' || $password == ''){
			echo "<script>alert('email or password column is empty')</script>";

		}else{
			echo "<script>alert('email or password not matched!')</script>";
		}

	}
	//giving activation to user
	//UPDATE `user` SET `active`='1' WHERE `email`= 'abhisheksaurabh78663@gmail.com';
	function activate($email,$conn){
		$sql= "UPDATE `user` SET `active`='1' WHERE `email`= '$email'";
		$result = $conn -> query($sql);
		if($result){
			$msg = "success";
		}else{
			$msg = "failure";
		}
		return $msg;
	}
	//category table
	function Category($name,$plink,$conn){

		if($name==""||$plink==""){
			echo '<script>alert("null not allowed")</script>';
			return 1;
		}
		else{
			$sql= "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ( '1', '$name', '$plink', '1', NOW())";
			$result=$conn->query($sql);
			return 1;
		}
	}
	//delete category
	function deleteCategory($id,$conn){

		$sql1="DELETE  FROM `tbl_product` WHERE `id`= '$id'";
		$result=$conn->query($sql1);
		return $result;
	}
	function categorytable($name,$plink,$conn){

		$sql1="SELECT * FROM `tbl_product`WHERE `prod_name`!='Hosting'";
		$result=$conn->query($sql1);
		return $result;
	}
	function editCategory($id,$conn){

		$sql1="SELECT * FROM `tbl_product` WHERE `id`= '$id'";
		$result=$conn->query($sql1);
		return $result;
	}
	function updateCategory($id,$name,$link,$conn){

		$sql1="UPDATE `tbl_product` SET `prod_name`='$name', `link`='$link' WHERE `id`='$id'";
		$result=$conn->query($sql1);
		
		return $result;
	}
	//fetching category of parent hosting
	function importcategory($conn){
		$sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1'";
		$result = $conn->query($sql);
		return $result;
	}
}

?>
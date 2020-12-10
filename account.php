<?php 
require 'Dbcon.php';
require 'User.php';
$dbconnection = new dbconnection();
$dbconnection->conn;
//$user = new User();
if(isset($_POST['submit'])){
	//echo " u done it";
  
  $password = $_POST['password'];
  $repassword =$_POST['repassword'];
  
  $name=$_POST['user_name'];
  
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $ques = $_POST['squestion'];
  $answer = $_POST['sanswer'];
  //$_SESSION['Signupn']=$name;
  //$_SESSION['Signupem']=$email;
  	
  	

  $User = new User();
  //$Dbcon=new dbconnection();
  $sql=$User-> register($name, $mobile, $email, $ques, $answer, $password, $repassword,$dbconnection-> conn);
  if($sql){


    echo '<script>'; 
    echo 'alert("Successfully Registered");'; 
    echo 'window.location.href = "verification.php";';
    echo '</script>';
    //echo "<script>alert('successfully registered')";
    //header('Location: login.php');
    //echo "</script>";
    //header('Location: login.php');
  }else{
    echo "<script>alert('not registered')</script>";

  }

} 


?>

<?php require 'header.php'; ?>
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="user_name"> 
					 </div>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text" name="mobile"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" > 
					 </div>
					 <div>
					 	<span>Security Question<label>*</label></span>
						<select class="bg-white" name="squestion" id="squestion">
	                             <option value="">Select Your Security Question</option>
	                             <option value="What Is your favorite book?">What Is your favorite book?</option>
	                             <option value="What is your favorite food?">What is your favorite food?</option>
	                             <option value="What city were you born in?">What city were you born in?</option>
	                             <option value="Where is your favorite place to vacation?">Where is your favorite place to vacation?</option>
	                             <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
	                    </select>
                     </div>
                     <div id="divid">
						 <span>Security Answer<label>*</label></span>
						 <input type="text" name="sanswer"> 
					 </div>    
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Secure Information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="repassword">
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				 
					   <input type="submit" name="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<?php require('footer.php') ?>

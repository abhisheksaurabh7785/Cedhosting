<?php
// session_start();
// require 'Dbcon.php';
require 'User.php';
require 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';


if (isset($_SESSION['EMAIL'])) {
	$email= $_SESSION['EMAIL'];
	$name= $_SESSION['NAME'];

	$mail = new PHPMailer();



	try {
	   $otp=rand(100000,999999);
	   $_SESSION['otp']=$otp;
	   $mail->setFrom('abhisheksaurabh78663@gmail.com', 'CedHosting ');
	   $mail->addAddress($email, $name);
	   $mail->Subject = 'CedHosting Account Verification';
	   $mail->Body = 'Hi '.$name.',Your one time otp for account verification is '.$otp;
	   $mail->isSMTP(true);
	   $mail->Host = 'smtp.gmail.com';
	   $mail->SMTPAuth = TRUE;
	   $mail->SMTPSecure = 'tls';
	   $mail->Username = 'abhisheksaurabh78663@gmail.com';
	   $mail->Password = 'vttpzmsayborepet';
	   $mail->Port = 587;
	   
	   /* Enable SMTP debug output. */
	  // $mail->SMTPDebug = 4;
	   
	   $mail->send();
	}
	catch (Exception $e)
	{
	   echo $e->errorMessage();
	}
}
// if (isset($_POST['submit'])) {
// 	$otp = $_POST['otp'];
// 	if ($_SESSION['otp']==$otp) {
// 		//$User=new User();
//         //$Dbcon=new dbconnection();
//         //$sql=$User->activate($email,$Dbcon-> conn);

// 		echo "<script>
// 		alert('Your otp is verified');
// 		 windows.location.href='index.php';
// 		 </script>";
// 	}else{
// 		echo "<script>alert('Your otp is not verified');";
// 	}
// }

?>
<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-5 login-right">
									<h3>Verification through E-mail id</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="loginsubmit.php" method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" value="<?php 
										if(isset($_SESSION['EMAIL'])){
											echo $_SESSION['EMAIL'];
										}
										?>"> 
									  </div>
									  <div>
										<span>OTP<label>*</label></span>
										<input type="password" name="otp"> 
									  </div>
									  <a class="forgot" href="#">Regenerate OTP?</a>
									  <input type="submit" value="Verify" name="submit">
									</form>
								</div>
								<div class="col-md-2">
									<h1 class="text-primary">OR</h1>
								</div>
								<div class="col-md-5 login-right">
									<h3>Verification through mobile</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="" method="POST">
									  <div>
										<span>Mobile<label>*</label></span>
										<input type="text" name="email"> 
									  </div>
									  <div>
										<span>OTP<label>*</label></span>
										<input type="password" name="password"> 
									  </div>
									  <a class="forgot" href="#">Regenerate OTP?</a>
									  <input type="submit" value="Verify" name="submi">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php require 'footer.php'; ?>
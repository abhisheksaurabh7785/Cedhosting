<?php
require 'Dbcon.php';
require 'User.php';
if (isset($_POST['submit'])) {
	$otp = $_POST['otp'];
	$email = $_POST['email'];
	if ($_SESSION['otp']==$otp) {
		$User=new User();
        $Dbcon=new dbconnection();
        $sql=$User->activate($email,$Dbcon-> conn);
        // if ($sql) {
        // 	echo "alert('Data inserted');";
        // };
 //print_r($sql);

		echo "<script>";
		echo "alert('Your otp is verified');";
		//session_destroy();
	    echo " window.location.href='index.php';";
		echo "</script>";
	}else{
		echo "<script>alert('Your otp is not verified');";
	}
}

?>
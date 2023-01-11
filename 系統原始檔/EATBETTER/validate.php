<?php
    echo '<center>';
//    $myacct="haha123";
//	$mypass="123";

	$conn=mysqli_connect("localhost","chia","mypassword","eatbetter");
	//測試連線
//	if($conn){
//		echo "連線成功";
//	}

     if(isset($_POST['login'])){
		 $acct =$_POST['account_number'];
		 $pass =$_POST['password'];
		 
		 $sql = "SELECT * FROM USERS WHERE account_number='$acct' AND password='$pass'";
		$result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);
		 
		 if( $num>0 ){
			if( isset($_POST['remember'])) {
			  setcookie('account_nunber',$acct, time()+60*60*7);
			  setcookie('pass',$pass, time()+60*60*7);
			}
			  session_start();
			  $_SESSION['account_number'] = $acct;
			  header("location: welcome.php");
		  } else {
			 echo "帳號或密碼有錯誤<br/><br/>點擊這
			 <a href='login.php'>再試一次</a>";
		 }
	 } else {
	   header('location:login.php');
	 }
?>
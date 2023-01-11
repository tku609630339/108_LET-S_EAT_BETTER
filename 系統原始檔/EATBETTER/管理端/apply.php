<head>
<title>申請介面</title>
</head>
<body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
<?php
    session_start();
	//connect to database
	$db =mysqli_connect("localhost","chia","mypassword","eatbetter");
	mysqli_query($db,"SET NAMES utf8");
	
	if (isset($_POST['register_btn'])){
		session_start();
		
	  $name1 =($_POST['name1']);
	  $account_number =($_POST['account_number']);
	  $password =($_POST['password']);
	  $password2 =($_POST['password2']);
	  $address =($_POST['address']);
	  $email =($_POST['email']);
	  $birthday =($_POST['birthday']);
		$year =($_POST['year']);
		$month =($_POST['month']);
		$day =($_POST['day']);
	  $gender =($_POST['gender']);

		
	
	  if ($password == $password2) {
//		  $password = md5($password);
		  $password = ($password);
		  $sql ="INSERT INTO manager(name,account_number,password) VALUES('$name1','$account_number','$password')";
		  mysqli_query($db,$sql);
		  $_SESSION['message']="You are now logged in";
		  $_SESSION['account_number']= $account_number;
		  header("location:home.php");
	  }else{
		 echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密碼與密碼確認不一致！請重新再輸入一次!"."\"".")".";"."</script><br/>";
		 echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."apply.php"."\""."</script>";
		 
	  }
	}
?>
	
<?php
echo '<center>
      <tr><td><i><font size="10" face="DFKai-sb">申請帳號</i></font></td></tr>
	  <br/><br/><br/>'
?>
<form method="post" action="apply.php">
<?php 
echo '<center>';
echo '名字:<br/><input type="text" name="name1"><br/><br/>';
echo '帳號:<br/><input type="text" name="account_number"><br/><br/>';
echo '密碼:<br/><input type="text" name="password"><br/><br/>'; 
echo '密碼確認:<br/><input type="text" name="password2"><br/><br/>'; 

echo '<input type="submit" name="register_btn" value="送出">';


?>
</form>
</body>
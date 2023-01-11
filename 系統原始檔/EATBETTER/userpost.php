<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
//$id = $_POST["id"];
  $name1 =($_POST['name1']);
	  $account_number =($_POST['account_number']);
	  $password =($_POST['password']);
//	  $password2 =($_POST['password2']);
	  $address =($_POST['address']);
	  $email =($_POST['email']);
	  $birthday =($_POST['birthday']);
//		$year =($_POST['year']);
//		$month =($_POST['month']);
//		$day =($_POST['day']);
	  $gender =($_POST['gender']);
  
// $number =$_REQUEST['number'];
// $name = $_REQUEST['name'];
// $junior = $_REQUEST['junior'];
// $wish = $_REQUEST['wish'];
 
 $conn = create_connection();


  $sql = "UPDATE users SET `name1`='$name1',`account_number`='$account_number',`password`='$password',`address`='$address',`email`='$email',`birthday`='$birthday',`gender`='$gender' WHERE `account_number`='$account_number'";
          
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql);
  
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
//    personal information
}else{
    header("Location:information.php");

}

mysqli_close($conn);
?>
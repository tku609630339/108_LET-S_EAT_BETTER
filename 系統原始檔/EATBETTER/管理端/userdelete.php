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
		$year =($_POST['year']);
		$month =($_POST['month']);
		$day =($_POST['day']);
	  $gender =($_POST['gender']);
  
// $number =$_REQUEST['number'];
// $name = $_REQUEST['name'];
// $junior = $_REQUEST['junior'];
// $wish = $_REQUEST['wish'];

 $conn = create_connection();
  
//  mysqli_query($conn, "SET NAMES utf8");
//  mysqli_select_db($conn, $dbname);
  
 //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
  $sql_AI="ALTER TABLE users AUTO_INCREMENT = 1";
  $result_AI = execute_sql($conn, $dbname, $sql_AI);
 
  $sql_delete = "DELETE FROM users WHERE `name1` = '$name1'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_delete);
  
  
  
  if(mysqli_error()){
    echo mysqli_error();
    
}else{
    echo "<script>alert('delete success')</br>";
    echo "alert('已刪除')</script>";
    header("Location:usersmanage.php");
}
//  $sql_query = "select * from food";
//  $result1 = mysql_query($conn,$sql_query) or die('MySQL query error');
//  
//  while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
//  {
//   echo '<center>';
//		echo "
//	        <table border='1'>
//			
//			<tr>
//			<td width='50%'>食品分類</td>
//			<td width='50%'>".$row['食品分類']."</td></tr></br>
//			<tr>
//			<td width='50%'>樣品名稱</td>
//			<td width='50%'>".$row['樣品名稱']."</td></tr></br>
//			<tr>
//			<td>內容物描述</td>
//			<td>".$row['內容物描述']."</td></tr></br>
//			<tr>
//			<td width='50%'>熱量-成分值(kcal)</td>
//			<td width='50%'>".$row['熱量-成分值(kcal)']."</td></tr></br>
//			</table>";
//  }
//關閉資料連接
  mysqli_close($conn);

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>會員修改介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>會員修改介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
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
  
//  mysqli_query($conn, "SET NAMES utf8");
//  mysqli_select_db($conn, $dbname);
//  
//  
 //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
  $sql_AI="ALTER TABLE users AUTO_INCREMENT = 1";
  $result_AI = execute_sql($conn, $dbname, $sql_AI);
  

  $sql = "UPDATE users SET `name1`='$name1',`account_number`='$account_number',`password`='$password',`address`='$address',`email`='$email',`birthday`='$birthday',`gender`='$gender' WHERE `account_number`='$account_number'";
          
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql);
  
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
//    header("Location:usersmanage2.php");
    $name1 =($_POST['name1']);
    $sql = "SELECT * FROM users WHERE id = '$name1' OR name1 = '$name1'";
    $result = execute_sql($conn, $dbname, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
     echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                        <tr  bgcolor='#FF8888'>
			<td colspan='2'><center><a href='http://220.133.8.143:8080/EATBETTER/管理端/usersmanage.php'>回上頁</a></center></td></tr></br>
			<tr bgcolor='#FFAA33'>
			<td colspan='2'><center>更新後資料</center></td></tr></br>
			<tr>
			<td width='50%'>id : </td>
			<td width='50%'>".$row['id']."</td></tr></br>
			<tr>
			<td width='50%'>名字:</td>
			<td width='50%'>".$row['name1']."</td></tr></br>
			<tr>
			<td width='50%'>帳號: </td>
			<td width='50%'>".$row['account_number']."</td></tr></br>
			<tr>
			<td width='50%'>密碼:</td>
			<td width='50%'>".$row['password']."(kcal)</td></tr></br>
                        <td width='50%'>地址:</td>
			<td width='50%'>".$row['address']."</td></tr></br>
			<tr>
			<td width='50%'>電子信箱:</td>
			<td width='50%'>" .$row['email']."(g)</td></tr></br>
			<tr>
			<td width='50%'>生日:</td>
			<td width='50%'>".$row['birthday']."(g)</td></tr></br>
                        <td width='50%'>性別:</td>
			<td width='50%'>".$row['gender']."(g)</td></tr></br>
			
			
			
			</table>";
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

</body>
</html>
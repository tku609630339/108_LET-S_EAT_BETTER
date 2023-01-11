<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
//$id = $_POST["id"];
  $name = $_POST["name"];
  $a1 = $_POST["a1"];
  $a2 = $_POST["a2"];
  $a3 = $_POST["a3"];
  $a4 = $_POST["a4"];
  $a5 = $_POST["a5"];
  $a6 = $_POST["a6"];
  $a7 = $_POST["a7"];
  $a8 = $_POST["a8"];
  $a9 = $_POST["a9"];
  $a10 = $_POST["a10"];
  $a11 = $_POST["a11"];
  $a12 = $_POST["a12"];
  $a13= $_POST["a13"];
  $a14 = $_POST["a14"];
  $a15 = $_POST["a15"];
  $a16 = $_POST["a16"];
  
// $number =$_REQUEST['number'];
// $name = $_REQUEST['name'];
// $junior = $_REQUEST['junior'];
// $wish = $_REQUEST['wish'];
 
 $conn = create_connection();
  
//  mysqli_query($conn, "SET NAMES utf8");
//  mysqli_select_db($conn, $dbname);
  
 //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
  $sql_AI="ALTER TABLE food AUTO_INCREMENT = 1";
  $result_AI = execute_sql($conn, $dbname, $sql_AI);
 
  $sql_delete = "DELETE FROM food WHERE `樣品名稱` = '$name'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_delete);
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
    echo "<script>alert('delete success')";
    echo "alert('[已刪除]')</script>";
    header("Location:manage.php");
}
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
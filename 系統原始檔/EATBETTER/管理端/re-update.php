
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>食品修改介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>食品修改介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 

<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
$id1 = ($_POST["id1"]);
  $hieght =($_POST["hieght"]);
  $weight = ($_POST["weight"]);
  $bmi = ($_POST["bmi"]);
  $date1 = ($_POST["date1"]);
//                $year1 =($_POST['year1']);
//		$month1 =($_POST['month1']);
//		$day1 =($_POST['day1']);
//  
 
 $conn = create_connection();
  
  
  $sql_UPDATE = "UPDATE record SET `id`=$id1,`hieght`='$hieght',`weight`= '$weight' ,`bmi`='$bmi',`date`='$date1' WHERE `id`=$id1";
          
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_UPDATE);
  
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
//    header("Location:manage.php");
$id1 = ($_POST["id1"]);
//  $hieght =($_POST["hieght"]);
//  $weight = ($_POST["weight"]);
//  $bmi = ($_POST["bmi"]);
  $date1 = ($_POST["date1"]);
//                $year1 =($_POST['year1']);
//		$month1 =($_POST['month1']);
//		$day1 =($_POST['day1']);
    $sql = "SELECT * FROM record WHERE id = '$id1' AND `date`='$date1'";
    $result = execute_sql($conn, $dbname, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
     echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                        <tr  bgcolor='#FFCC22'>
			<td colspan='2'><center><a href='http://220.133.8.143:8080/EATBETTER/管理端/re-manage.php'>回上頁</a></center></td></tr></br>
			<tr bgcolor='#FFAA33'>
			<td colspan='2'><center>更新後資料</center></td></tr></br>
			<tr>
			<td width='50%'>id</td>
			<td width='50%'>".$row['id']."</td></tr></br>
			<tr>
			<td width='50%'>身高</td>
			<td width='50%'>".$row['hieght']."</td></tr></br>
			<tr>
			<td width='50%'>體重</td>
			<td width='50%'>".$row['weight']."</td></tr></br>
			<tr>
			<td>BMI</td>
			<td>".$row['bmi']."</td></tr></br>
			<tr>
			<td width='50%'>日期</td>
			<td width='50%'>".$row['date']."</td></tr></br>
			
			
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
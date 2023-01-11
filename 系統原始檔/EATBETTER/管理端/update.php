
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
//  
//  
 //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
  $sql_AI="ALTER TABLE food AUTO_INCREMENT = 1";
  $result_AI = execute_sql($conn, $dbname, $sql_AI);
  
  $sql_insert = "UPDATE food SET `熱量-成分值(kcal)`=$a1,`水分-成分值(g)`=$a2,`粗蛋白-成分值(g)`=$a3,`粗脂肪-成分值(g)`=$a4,`總碳水化合物-成分值(g)`=$a5,`膳食纖維-成分值(g)`=$a6,"
          . "`鈉-成分值(mg)`=$a7,`鉀-成分值(mg)`=$a8,`鈣-成分值(mg)`=$a9,`鎂-成分值(mg)`=$a10,`磷-成分值(mg)`=$a11,`鐵-成分值(mg)`=$a12,`鋅-成分值(mg)`=$a13,`維生素B1-成分值(mg)`=$a14,`維生素B2-成分值(mg)`=$a15,`維生素C-成分值(mg)`=$a16 WHERE `樣品名稱`='$name'";
          
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_insert);
  
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
//    header("Location:manage.php");
//  $id = $_POST["id"];
    $name = $_POST["name"];
//  $a1 = $_POST["a1"];
//  $a2 = $_POST["a2"];
//  $a3 = $_POST["a3"];
//  $a4 = $_POST["a4"];
//  $a5 = $_POST["a5"];
//  $a6 = $_POST["a6"];
//  $a7 = $_POST["a7"];
//  $a8 = $_POST["a8"];
//  $a9 = $_POST["a9"];
//  $a10 = $_POST["a10"];
//  $a11 = $_POST["a11"];
//  $a12 = $_POST["a12"];
//  $a13= $_POST["a13"];
//  $a14 = $_POST["a14"];
//  $a15 = $_POST["a15"];
//  $a16 = $_POST["a16"];
    $sql = "SELECT * FROM food WHERE 樣品名稱 = '$name'";
    $result = execute_sql($conn, $dbname, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
     echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                        <tr  bgcolor='#33FF33'>
			<td colspan='2'><center><a href='http://220.133.8.143:8080/EATBETTER/管理端/manage.php'>回上頁</a></center></td></tr></br>
			<tr bgcolor='#FFAA33'>
			<td colspan='2'><center>更新後資料</center></td></tr></br>
			<tr>
			<td width='50%'>食品分類</td>
			<td width='50%'>".$row['食品分類']."</td></tr></br>
			<tr>
			<td width='50%'>樣品名稱</td>
			<td width='50%'>".$row['樣品名稱']."</td></tr></br>
			<tr>
			<td>內容物描述</td>
			<td>".$row['內容物描述']."</td></tr></br>
			<tr>
			<td width='50%'>熱量</td>
			<td width='50%'>".$row['熱量-成分值(kcal)']."(kcal)</td></tr></br>
                        <td width='50%'>樣品名稱</td>
			<td width='50%'>".$row['樣品名稱']."</td></tr></br>
			<tr>
			<td width='50%'>水分</td>
			<td width='50%'>" . $row["水分-成分值(g)"] . "(g)</td></tr></br>
			<tr>
			<td width='50%'>粗蛋白</td>
			<td width='50%'>" . $row["粗蛋白-成分值(g)"] . "(g)</td></tr></br>
                        <td width='50%'>粗脂肪</td>
			<td width='50%'>" . $row["粗脂肪-成分值(g)"] . "(g)</td></tr></br>
			<tr>
			<td width='50%'>總碳水化合物</td>
			<td width='50%'>" . $row["總碳水化合物-成分值(g)"] . "(g)</td></tr></br>
			<tr>
			<td width='50%'>膳食纖維</td>
			<td width='50%'>" . $row["膳食纖維-成分值(g)"] . "(g)</td></tr></br>
                        <td width='50%'>鈉</td>
			<td width='50%'>" . $row["鈉-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>鉀</td>
			<td width='50%'>" . $row["鉀-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>鈣</td>
			<td width='50%'>" . $row["鈣-成分值(mg)"] . "(mg)</td></tr></br>
                        <td width='50%'>鎂</td>
			<td width='50%'>" . $row["鎂-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>磷</td>
			<td width='50%'>" . $row["磷-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>鐵</td>
			<td width='50%'>" . $row["鐵-成分值(mg)"] . "(mg)</td></tr></br>
                        <td width='50%'>鋅</td>
			<td width='50%'>" . $row["鋅-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>維生素B1</td>
			<td width='50%'>" . $row["維生素B1-成分值(mg)"] . "(mg)</td></tr></br>
			<tr>
			<td width='50%'>維生素B2</td>
			<td width='50%'>" . $row["維生素B2-成分值(mg)"] . "(mg)</td></tr></br>
                        <td width='50%'>維生素C</td>
			<td width='50%'>" . $row["維生素C-成分值(mg)"] . "(mg)</td></tr></br>
			
			
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

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
$id = ($_POST["id"]);
  $author =($_POST["author"]);
  $subject = ($_POST["subject"]);
  $content = ($_POST["content"]);
  $date = $_POST["date"];
 
//  
 
 $conn = create_connection();
  
  
  $sql_UPDATE = "UPDATE discuss SET `id`=$id,`author`='$author',`subject`= '$subject' ,`content`='$content',`date`='$date' WHERE `id`=$id";
          
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_UPDATE);
  
  
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
//    header("Location:manage.php");
$id = ($_POST["id"]);
//  $hieght =($_POST["hieght"]);
//  $weight = ($_POST["weight"]);
//  $bmi = ($_POST["bmi"]);
  $date = ($_POST["date"]);
//                $year1 =($_POST['year1']);
//		$month1 =($_POST['month1']);
//		$day1 =($_POST['day1']);
    $sql = "SELECT * FROM discuss WHERE id = '$id' AND `date`='$date'";
    $result = execute_sql($conn, $dbname, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
     echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                        <tr bgcolor='orangered'>
			<td colspan='2'><center><a href='http://220.133.8.143:8080/EATBETTER/%E7%AE%A1%E7%90%86%E7%AB%AF/dis-manage.php'>回上頁</a></center></td></tr></br>
			<tr bgcolor='#FFAA33'>
			<td colspan='2'><center>更新後資料</center></td></tr></br>
			<tr>
			<td width='50%'>id</td>
			<td width='50%'>".$row['id']."</td></tr></br>
			<tr>
			<td width='50%'>作者</td>
			<td width='50%'>".$row['author']."</td></tr></br>
			<tr>
			<td width='50%'>主題</td>
			<td width='50%'>".$row['subject']."</td></tr></br>
			<tr>
			<td>內容</td>
			<td>".$row['content']."</td></tr></br>
			<tr>
			<td width='50%'>日期</td>
			<td width='50%'>".$row['date']."</td></tr></br>
			
			
			</table>";
                
                
}

//關閉資料連接
  mysqli_close($conn);

?>
</body>
</html>
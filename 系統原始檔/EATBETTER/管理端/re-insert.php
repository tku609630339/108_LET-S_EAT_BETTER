<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
 
 
  $id = ($_POST["id"]);
  $hieght =($_POST["hieght"]);
  $weight = ($_POST["weight"]);
  $bmi = ($_POST["bmi"]);
  $date = ($_POST["date"]);
                $year =($_POST['year']);
		$month =($_POST['month']);
		$day =($_POST['day']);
  

 
 $conn = create_connection();
  
//  mysqli_query($conn, "SET NAMES utf8");
//  mysqli_select_db($conn, $dbname);
 
 //判斷帳號密碼是否為空值
//確認密碼輸入的正確性
$sql = "SELECT * FROM record WHERE `id` = '$id' AND `date` ='$year-$month-$day'";
$result_sel = execute_sql($conn, "eatbetter", $sql);
$num_rows = mysqli_num_rows($result_sel);
$row = mysqli_fetch_array($result_sel,MYSQLI_ASSOC);

  if($num_rows >= 1)
      {
      echo '資料已存在';
      
      }
  else if($id!=null && $hieght!=null&& $weight!=null&& $bmi!=null&& $year!=null)
      {
            
            $sql_insert = "INSERT INTO record(`id`,`hieght`,`weight`,`bmi`,`date`) VALUES ('$id','$hieght','$weight','$bmi','$year-$month-$day')";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
            $result = execute_sql($conn, $dbname, $sql_insert);
  
            if(mysqli_error($conn)){
                echo mysqli_error();
            }
            else
            {
                echo '新增成功';
                
                header("Location:re-manage.php");
                
                
            }
  

    }
    else{
        echo '欄位不可有空白';
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
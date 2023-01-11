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
 
 //判斷帳號密碼是否為空值
//確認密碼輸入的正確性
$sql = "SELECT * FROM food WHERE 樣品名稱 = '$name'";
$result_sel = execute_sql($conn, "eatbetter", $sql);
$num_rows = mysqli_num_rows($result_sel);
$row = mysqli_fetch_array($result_sel,MYSQLI_ASSOC);

  if($num_rows >= 1)
      {
      echo '資料已存在';
      
      }
  else if($name!=null && $a1!=null&& $a2!=null&& $a3!=null&& $a4!=null&& $a5!=null&& $a6!=null&& $a7!=null&& $a8!=null&& $a9!=null&& $a10!=null&& $a11!=null&& $a12!=null&& $a13!=null&& $a14!=null&& $a15!=null&& $a16!=null)
      {
            //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
            $sql_AI="ALTER TABLE food AUTO_INCREMENT = 1";
            $result_AI = execute_sql($conn, $dbname, $sql_AI);
            $sql_insert = "INSERT INTO food(`樣品名稱`,`熱量-成分值(kcal)`,`水分-成分值(g)`,`粗蛋白-成分值(g)`,`粗脂肪-成分值(g)`,`總碳水化合物-成分值(g)`,`膳食纖維-成分值(g)`,"
          . "`鈉-成分值(mg)`,`鉀-成分值(mg)`,`鈣-成分值(mg)`,`鎂-成分值(mg)`,`磷-成分值(mg)`,`鐵-成分值(mg)`,`鋅-成分值(mg)`,`維生素B1-成分值(mg)`,`維生素B2-成分值(mg)`,`維生素C-成分值(mg)`) "
          . "VALUES ('$name',$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16)";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
            $result = execute_sql($conn, $dbname, $sql_insert);
  
            if(mysqli_error()){
                echo mysqli_error();
            }
            else
            {
                echo '新增成功';
                
                header("Location:manage.php");
                
                
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
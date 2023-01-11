<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>食品搜尋介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>食品搜尋介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
      
<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
$id = $_POST["id"];
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
 
  $sql_select = "SELECT * FROM food WHERE `樣品名稱` = '$id' OR `識別碼`='$id'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_select);
  
  $row = mysqli_fetch_assoc($result);
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
    
    echo "<script>alert('select success')</script>";
//    header("Location:manage2.php");
//    echo "<table>";
//    echo "<tr><td></td><td></td>";
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
//  mysqli_close($conn);

?>
      
<form action=""name="form1" method="post" >
      <table border="0" width="350" align="center" cellspacing="0">
          <tr align="center" bgcolor="#33FF33">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/%E7%AE%A1%E7%90%86%E7%AB%AF/manage.php">回管理頁</a></td>
        
		</tr>
        <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">樣品名稱: </td>   
		<td width="75%"><input name="name" type="text" size="20"  readonly="value" value="<?php echo $row{"樣品名稱"} ?>">(不可更改)</td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">熱量: </td>   
		<td width="75%"><input name="a1" type="text" size="20"  value="<?php echo $row{"熱量-成分值(kcal)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">水分: </td>   
		<td width="75%"><input name="a2" type="text" size="20"  value="<?php echo $row{"水分-成分值(g)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">粗蛋白: </td>   
		<td width="75%"><input name="a3" type="text" size="20"  value="<?php echo $row{"粗蛋白-成分值(g)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">粗脂肪: </td>   
		<td width="75%"><input name="a4" type="text" size="20"  value="<?php echo $row{"粗脂肪-成分值(g)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">碳水化合物: </td>   
		<td width="75%"><input name="a5" type="text" size="20"  value="<?php echo $row{"總碳水化合物-成分值(g)"} ?>"></td></tr>
                <tr bgcolor="#00FF99">
                <td width="25%">總膳食纖維: </td>   
		<td width="75%"><input name="a6" type="text" size="20"  value="<?php echo $row{"膳食纖維-成分值(g)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">納: </td>   
		<td width="75%"><input name="a7" type="text" size="20"  value="<?php echo $row{"鈉-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鉀: </td>   
		<td width="75%"><input name="a8" type="text" size="20"  value="<?php echo $row{"鉀-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">鈣: </td>   
		<td width="75%"><input name="a9" type="text" size="20"  value="<?php echo $row{"鈣-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鎂: </td>   
		<td width="75%"><input name="a10" type="text" size="20"  value="<?php echo $row{"鎂-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">磷: </td>   
		<td width="75%"><input name="a11" type="text" size="20"  value="<?php echo $row{"磷-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鐵: </td>   
		<td width="75%"><input name="a12" type="text" size="20"  value="<?php echo $row{"鐵-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">鋅: </td>   
		<td width="75%"><input name="a13" type="text" size="20"  value="<?php echo $row{"鋅-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">維生素B1: </td>   
		<td width="75%"><input name="a14" type="text" size="20"  value="<?php echo $row{"維生素B1-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">維生素B2: </td>   
		<td width="75%"><input name="a15" type="text" size="20"  value="<?php echo $row{"維生素B2-成分值(mg)"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">維生素C: </td>   
		<td width="75%"><input name="a16" type="text" size="20"  value="<?php echo $row{"維生素C-成分值(mg)"} ?>"></td></tr>
                
<!--		<Select name="field">
		<Option Value="樣品名稱">樣品名稱</Option>
		<Option Value="熱量">熱量</Option>
		<Option Value="水分">水分</Option>
		<Option Value="粗蛋白">粗蛋白</Option>
		<Option Value="粗脂肪">粗脂肪</Option>
		<Option Value="碳水化合物">碳水化合物</Option>
		<Option Value="總膳食纖維">總膳食纖維</Option>
		<Option Value="納">納</Option>
		<Option Value="鉀">鉀</Option>
		<Option Value="鈣">鈣</Option>
		<Option Value="鎂">鎂</Option>
		<Option Value="磷">磷</Option>
		<Option Value="鐵">鐵</Option>
		<Option Value="鋅">鋅</Option>
		<Option Value="維生素B1">維生素B1</Option>
		<Option Value="維生素B2">維生素B2</Option>
		<Option Value="維生素C">維生素C</Option>
		
		</Select>-->
		<!--</td >-->
        <!--</tr>-->
		
<!--        <tr bgcolor="#00FFFF">
          <td width="25%">更改內容之名稱</td>
          <td width="55%"><input name="title" type="text" size="30"></td>
        </tr>
		
		<tr bgcolor="#00FFFF">
          <td width="25%">更改之內容</td>
          <td width="55%"><input name="content" type="text" size="30"></td>
		  
        </tr>-->
<!--        <tr bgcolor="#CCCCFF">
                <td colspan="2" align="center">  
		編號or名稱:<input name="id" type="text" size="10">
                <input type="button" value="搜尋" type="submit" onClick="form1.action='select.php';form1.submit();"/> </td></tr>-->
        <tr>
          <td colspan="2" align="center">
                        <input type="button" value="保存" type="submit" onClick="form1.action='update.php';form1.submit();"/>
			
          </td>
        </tr>
      </table>
    </form>
<?php
//關閉資料連接
  mysqli_close($conn);
?>

    
  </body>
</html>
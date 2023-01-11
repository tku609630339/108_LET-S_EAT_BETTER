<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>會員搜尋介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>會員搜尋介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
      
<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
$id = $_POST["id"];
  $name1 =($_POST['name1']);
//	  $account_number =($_POST['account_number']);
//	  $password =($_POST['password']);
////	  $password2 =($_POST['password2']);
//	  $address =($_POST['address']);
//	  $email =($_POST['email']);
//	  $birthday =($_POST['birthday']);
//		$year =($_POST['year']);
//		$month =($_POST['month']);
//		$day =($_POST['day']);
//	  $gender =($_POST['gender']);
//  
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
 
  $sql_select = "SELECT * FROM users WHERE `id` = '$id' OR `name1`='$id'";
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
          <tr align="center" bgcolor="#FF8888">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/%E7%AE%A1%E7%90%86%E7%AB%AF/usersmanage.php">回管理頁</a></td>
        
		</tr>
        <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">名字: </td>   
		<td width="75%"><input name="name1" type="text"  size="20"  value="<?php echo $row{"name1"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">帳號:</td>   
		<td width="75%"><input name="account_number"  readonly="value" type="text" size="20"  value="<?php echo $row{"account_number"} ?>">(不可更改)</td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">密碼:</td>   
		<td width="75%"><input name="password" type="text" size="20"  value="<?php echo $row{"password"} ?>"></td></tr>
<!--                <tr bgcolor="#99FFFF">
                <td width="25%">粗蛋白: </td>   
		<td width="75%"><input name="password2" type="text" size="20"  value=""></td></tr>-->
                <tr bgcolor="#99FFFF">
                <td width="25%">地址:</td>   
		<td width="75%"><input name="address" type="text" size="20"  value="<?php echo $row{"address"} ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">電子信箱:</td>   
		<td width="75%"><input name="email" type="text" size="20"  value="<?php echo $row{"email"} ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                    <td width="25%">生日:</td>
                   <td width="75%"> <input name="birthday" type="text" size="20"  value="<?php echo $row{"birthday"} ?>">
</td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">性別: </td>   
		<td width="75%"><input name="gender" type="text" size="20"  value="<?php echo $row{"gender"} ?>"></td></tr>
                
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
                        <input type="button" value="保存" type="submit" onClick="form1.action='userupdate.php';form1.submit();"/>
			
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
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>個人紀錄搜尋介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>個人紀錄搜尋介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
      
<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
 $id = ($_POST["id1"]);
//  $author =($_POST["author1"]);
//  $subject = ($_POST["subject1"]);
//  $content = ($_POST["content"]);
//  $date = $_POST["date"];
 
 
 $conn = create_connection();
  
 
  $sql_select = "SELECT * FROM discuss WHERE `id` = '$id'";
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
  

?>
      
<form action=""name="form1" method="post" >
      <table border="0" width="350" align="center" cellspacing="0">
          <tr align="center" bgcolor="orangered">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/%E7%AE%A1%E7%90%86%E7%AB%AF/dis-manage.php">回管理頁</a></td>
        
		</tr>
        <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">id: </td>   
                <td width="75%"><input name="id" type="text" size="20"  readonly="value" value="<?php echo $row["id"] ?>" ></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">作者: </td>   
		<td width="75%"><input name="author" type="text" size="20" value="<?php echo $row["author"] ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">主題: </td>   
                <td width="75%"><input name="subject" type="text" size="20" value="<?php echo $row["subject"] ?>"></td></tr>
		
                <tr bgcolor="#99FFFF">
                <td width="25%">內容: </td>   
		<td width="75%"><textarea name="content" cols="25" rows="10" ><?php echo $row["content"] ?></textarea></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">日期: </td>   
		<td width="75%">
                    <input name="date" type="text" size="20" value="<?php echo $row["date"] ?>"></td></tr>

        <tr>
          <td colspan="2" align="center">
                        <input type="button" value="保存" type="submit" onClick="form1.action='dis-update.php';form1.submit();"/>
			
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
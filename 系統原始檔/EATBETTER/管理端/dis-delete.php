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
 
  
// $number =$_REQUEST['number'];
// $name = $_REQUEST['name'];
// $junior = $_REQUEST['junior'];
// $wish = $_REQUEST['wish'];
 
 $conn = create_connection();
  
//  mysqli_query($conn, "SET NAMES utf8");
//  mysqli_select_db($conn, $dbname);
  
 if($id!=null && $author!=null && $author!= null)
 {
     
     //--------AUTO_INCREMENT=>識別碼重設為1,自動累加,避免跳號
            $sql_AI="ALTER TABLE discuss AUTO_INCREMENT = 1";
            $result_AI = execute_sql($conn, $dbname, $sql_AI);
            $sql_AI="ALTER TABLE discuss_reply AUTO_INCREMENT = 1";
            $result_AI = execute_sql($conn, $dbname, $sql_AI);
            
            
  $sql_delete = "DELETE FROM discuss WHERE `id` = '$id' AND `subject`='$subject' AND `author`='$author'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_delete);
  $sql="DELETE FROM discuss_reply WHERE `reply_id` = '$id'";
  $result1 = execute_sql($conn, $dbname, $sql);
 }else 
 {
     echo "<script>alert('ID,作者與主題不可為空')</script>";
 }
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
    echo "<script>alert('delete success')";
    echo "alert('[已刪除]')</script>";
    header("Location:dis-manage.php");
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
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>討論區管理端介面</title>
	
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>討論區管理端介面</h1></b></div>


    <script type="text/javascript">
        function check_data()
      {
        if (document.myForm.author.value.length == 0)
          alert("作者欄位不可以空白哦！");
        else if (document.myForm.subject.value.length == 0)
          alert("主題欄位不可以空白哦！");
        else if (document.myForm.content.value.length == 0)
          alert("內容欄位不可以空白哦！");
        else
          myForm.submit();
	  
      }
	  
    </script>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
      
<!--//	  require_once("dbtools.inc.php");
//      $conn = create_connection();
//      
//      //建立資料連接
//      $link = create_connection();
//					
//      //執行 SQL 命令
$sql_select = "SELECT * FROM food WHERE `樣品名稱` = '$name' OR `識別號`='$id'";
//      $sql = "SELECT * FROM food WHERE 食品分類 = '肉類'";
//      $result = execute_sql($link, "eatbetter", $sql);-->
      
      
   <form action=""name="form1" method="post" >
      <table border="0" width="350" align="center" cellspacing="0">
        <tr align="center" bgcolor='orangered'>
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/管理端/管理端介面.html">回管理頁</a></td>
        
		</tr>
          <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#D9F2FF">
          <td width="20%">作者</td>
          <td width="80%"><input name="author" type="text" size="20"></td>
        </tr>
        <tr bgcolor="#84D7FF">
          <td width="20%">主題</td>
          <td width="80%"><input name="subject" type="text" size="20"></td>
        </tr>
        <tr bgcolor="#D9F2FF">
          <td width="20%">內容</td>
          <td width="85%"><textarea name="content" cols="25" rows="10"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" height="40" align="center">
            <input type="button" value="新增" type="submit" onClick="form1.action='dis-insert.php';form1.submit();"/>
            <!--<input type="button" value="修改" type="submit" onClick="form1.action='update.php';form1.submit();"/>-->
            <input type="button" value="刪除" type="submit" onclick="form1.action='dis-delete.php';form1.submit();"/>
            <input type="reset" value="重新輸入">
          </td>  
        </tr>
                
<!--        <tr>
          <td colspan="2" align="center">
                        
		        <input type="button" value="新增" type="submit" onClick="form1.action='dis-insert.php';form1.submit();"/>
                        <input type="button" value="修改" type="submit" onClick="form1.action='update.php';form1.submit();"/>
			<input type="button" value="刪除" type="submit" onclick="form1.action='dis-delete.php';form1.submit();"/>
                        
                       
          </td>-->
        </tr>
        <tr><td  colspan="2" align="center">-----------------------------------------------------------------</td></tr>
        <tr bgcolor="#CCCCFF">
            <td align="center">編號:</td><td><input name="id1" type="text" size="10"><input type="button" value="搜尋欲修改的資料" type="submit" onClick="form1.action='dis-select.php';form1.submit();"/></td></tr>
        
      </table>
    </form>
      <p></p>
	
	<?php
	  require_once("dbtools.inc.php");
          
          //指定每頁顯示幾筆記錄
      $records_per_page = 5;
			
//      //取得要顯示第幾頁的記錄
//      if (isset($_GET["page"]))
//        $page = $_GET["page"];
//      else
//        $page = 1;
//          
          
	  $dbname='eatbetter';
//	  //mysql_select_db($dbname);
//	  $conn=mysqli_connect("localhost","root","","etb")or die('Error with MySQL connection');
          //建立資料連接
      $conn = create_connection();
	
	  
	  if( !mysqli_select_db($conn, $dbname)) 
	  {
        die ("無法選擇資料庫");
	  }
//	  mysqli_query($conn,"SET NAMES'utf8'");
	  mysqli_query($conn,"SET NAMES'utf8'");
	  $sql = "SELECT * FROM discuss ORDER BY date DESC LIMIT 1;";
	  $result=mysqli_query($conn,$sql);
	  $num = mysqli_num_rows($result);
          
//          -------------------------------------------------------------------------------------------------
           $j=1;
	  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) and $j <= $records_per_page)
	  {
		
		echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                <tr bgcolor='#FFAA33'><td colspan='2'><center>主題-最後一筆</center></td></tr>
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
			<td width='50%'>日期時間</td>
			<td width='50%'>".$row['date']."</td></tr></br>
                        <tr>
			<td colspan='2'><center><a href='show_news.php?id=". $row["id"] . "'>閱讀與加入討論</a></center></td></tr></br>	
                       
			</table>";
	 $j++;
	   }  	  
           mysqli_query($conn,"SET NAMES'utf8'");
	  $sql = "SELECT * FROM discuss_reply ORDER BY date DESC LIMIT 1;";
	  $result=mysqli_query($conn,$sql);
	  $num = mysqli_num_rows($result);
          
//          -------------------------------------------------------------------------------------------------
           $j=1;
	  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) and $j <= $records_per_page)
	  {
		
		echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                <tr><td colspan='2'><center>回復主題-最後一筆</center></td></tr>
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
			<td width='50%'>日期時間</td>
			<td width='50%'>".$row['date']."</td></tr></br>
                        <tr>
			<td width='50%'>回復編號</td>
			<td width='50%'>".$row['reply_id']."</td></tr></br>
			</table>";
	 $j++;
	   }  	  
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($conn);
    ?>
	 
	
    
  </body>
</html>
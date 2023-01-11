<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>食物管理端介面</title>
	
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>食物管理端介面</h1></b></div>


    <script type="text/javascript">
//      function select_data()
//      {
//        if (document.myForm.content.value.length == 0)
//          alert("欄位不可以空白哦！");
//        else
//          myForm.submit();
//      }
	  
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
        <tr align="center" bgcolor="#33FF33">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/管理端/管理端介面.html">回管理頁</a></td>
        
		</tr>
          <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">樣品名稱: </td>   
		<td width="75%"><input name="name" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">熱量: </td>   
		<td width="75%"><input name="a1" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">水分: </td>   
		<td width="75%"><input name="a2" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">粗蛋白: </td>   
		<td width="75%"><input name="a3" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">粗脂肪: </td>   
		<td width="75%"><input name="a4" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">碳水化合物: </td>   
		<td width="75%"><input name="a5" type="text" size="20"></td></tr>
                <tr bgcolor="#00FF99">
                <td width="25%">總膳食纖維: </td>   
		<td width="75%"><input name="a6" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">納: </td>   
		<td width="75%"><input name="a7" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鉀: </td>   
		<td width="75%"><input name="a8" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">鈣: </td>   
		<td width="75%"><input name="a9" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鎂: </td>   
		<td width="75%"><input name="a10" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">磷: </td>   
		<td width="75%"><input name="a11" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">鐵: </td>   
		<td width="75%"><input name="a12" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">鋅: </td>   
		<td width="75%"><input name="a13" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">維生素B1: </td>   
		<td width="75%"><input name="a14" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">維生素B2: </td>   
		<td width="75%"><input name="a15" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">維生素C: </td>   
		<td width="75%"><input name="a16" type="text" size="20"></td></tr>
                
        <tr>
          <td colspan="2" align="center">
                        
		        <input type="button" value="新增" type="submit" onClick="form1.action='insert.php';form1.submit();"/>
                        <!--<input type="button" value="修改" type="submit" onClick="form1.action='update.php';form1.submit();"/>-->
			<input type="button" value="刪除" type="submit" onclick="form1.action='delete.php';form1.submit();"/>
                        
                       
          </td>
        </tr>
        <tr><td  colspan="2" align="center">-----------------------------------------------------------------</td></tr>
        <tr bgcolor="#CCCCFF">
                <td colspan="2" align="center">  
		編號or名稱:<input name="id" type="text" size="10">
                <input type="button" value="搜尋欲修改的資料" type="submit" onClick="form1.action='select.php';form1.submit();"/> </td></tr>
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
	  $sql = "SELECT * FROM food ORDER BY 識別碼 DESC LIMIT 1;  ";
	  $result=mysqli_query($conn,$sql);
	  $num = mysqli_num_rows($result);
          
////          ------------------
//          //取得記錄數
//      $total_records = mysqli_num_rows($result);
//			
//      //計算總頁數
//      $total_pages = ceil($total_records / $records_per_page);
//			
//      //計算本頁第一筆記錄的序號
//      $started_record = $records_per_page * ($page - 1);
//			
//      //將記錄指標移至本頁第一筆記錄的序號
//      mysqli_data_seek($result, $started_record);
//          -------------------------------------------------------------------------------------------------
           $j=1;
	  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) and $j <= $records_per_page)
	  {
		
		echo '<center>';
		echo "
	        <table border='1' bgcolor='#BBFFEE'>
                <tr bgcolor='#FFAA33'><td colspan='2'><center>最後一筆</center></td></tr>
			<tr>
			<td width='50%'>識別碼</td>
			<td width='50%'>".$row['識別碼']."</td></tr></br>
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
			<td width='50%'>熱量-成分值(kcal)</td>
			<td width='50%'>".$row['熱量-成分值(kcal)']."</td></tr></br>
			</table>";
	 $j++;
	   }  	  
//	  if($_Post['title']==$row['樣品名稱'])
//	  {
//		  
//		  
//	  }
//	  
////產生導覽列
//      echo "<p>";
//			
//      if ($page > 1)
//        echo "<a href='manage2.php?page=". ($page - 1) . "'>上一頁</a> ";
//				
//      for ($i = 1; $i <= $total_pages; $i++)
//      {
//        if ($i == $page)
//          echo "$i ";
//        else
//          echo "<a href='manage2.php?page=$i'>$i</a> ";		
//      }
//			
//      if ($page < $total_pages)
//        echo "<a href='manage2.php?page=". ($page + 1) . "'>下一頁</a> ";			
//				
//      echo "</p>";
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($conn);
    ?>
	 
	
    
  </body>
</html>
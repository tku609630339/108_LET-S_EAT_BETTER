<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>個人紀錄管理端介面</title>
	
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>個人紀錄管理端介面</h1></b></div>


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
        <tr align="center" bgcolor="#FFCC22">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/管理端/管理端介面.html">回管理頁</a></td>
        
		</tr>
          <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">id: </td>   
		<td width="75%"><input name="id" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">身高: </td>   
		<td width="75%"><input name="hieght" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">體重: </td>   
		<td width="75%"><input name="weight" type="text" size="20"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">BMI: </td>   
		<td width="75%"><input name="bmi" type="text" size="20"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">日期: </td>   
		<td width="75%" name="date">
                    <select name="year">
                        <option value="2023">2023</option><option value="2022">2022</option>
	  <option value="2021">2021</option><option value="2020">2020</option>
      <option value="2019">2019</option><option value="2018">2018</option>
	  <option value="2017">2017</option><option value="2016">2016</option>
	  <option value="2015">2015</option><option value="2014">2014</option>
	  <option value="2013">2013</option><option value="2012">2012</option>
	  <option value="2011">2011</option><option value="2010">2010</option>
	  <option value="2009">2009</option><option value="2008">2008</option>
	  <option value="2007">2007</option><option value="2006">2006</option>
	  <option value="2005">2005</option><option value="2004">2004</option>
	  <option value="2003">2003</option><option value="2002">2002</option>
	  <option value="2001">2001</option><option value="2000">2000</option>
	  <option value="1999">1999</option><option value="1998">1998</option>
	  <option value="1997">1997</option><option value="1996">1996</option>
	  <option value="1995">1995</option><option value="1994">1994</option>
	  <option value="1993">1993</option><option value="1992">1992</option>
	
	  
	  </select>
      <select name="month">
      <option value="0">月</option><option value="1">1 月</option>
      <option value="2">2 月</option><option value="3">3 月</option>
      <option value="4">4 月</option><option value="5">5 月</option>
      <option value="6">6 月</option><option value="7">7 月</option>
      <option value="8">8 月</option><option value="9">9 月</option>
      <option value="10">10 月</option><option value="11">11 月</option>
      <option value="12">12 月</option>
      </select>
      <select name="day">
      <option value="0">日</option><option value="1">1</option>
	  <option value="2">2</option><option value="3">3</option>
	  <option value="4">4</option><option value="5">5</option>
	  <option value="6">6</option><option value="7">7</option>
	  <option value="8">8</option><option value="9">9</option>
	  <option value="10">10</option><option value="11">11</option>
	  <option value="12">12</option><option value="13">13</option>
	  <option value="14">14</option><option value="15">15</option>
	  <option value="16">16</option><option value="17">17</option>
	  <option value="18">18</option><option value="19">19</option>
	  <option value="20">20</option><option value="21">21</option>
	  <option value="22">22</option><option value="23">23</option>
	  <option value="24">24</option><option value="25">25</option>
	  <option value="26">26</option><option value="27">27</option>
	  <option value="28">28</option><option value="29">29</option>
	  <option value="30">30</option><option value="31">31</option>
	  </select></td></tr>
               
                
        <tr>
          <td colspan="2" align="center">
                        
		        <input type="button" value="新增" type="submit" onClick="form1.action='re-insert.php';form1.submit();"/>
                        <!--<input type="button" value="修改" type="submit" onClick="form1.action='update.php';form1.submit();"/>-->
			<input type="button" value="刪除" type="submit" onclick="form1.action='re-delete.php';form1.submit();"/>
                        
                       
          </td>
        </tr>
        <tr><td  colspan="2" align="center">-----------------------------------------------------------------</td></tr>
        <tr bgcolor="#CCCCFF">
            <td align="center">編號:</td><td><input name="id1" type="text" size="10"></td></tr>
        <tr bgcolor="#CCCCFF">
            <td align="center">日期:</td><td><input name="date1" type="text" size="10"><input type="button" value="搜尋欲修改的資料" type="submit" onClick="form1.action='re-select.php';form1.submit();"/> </td></tr>
         <!--<td name="date1">-->
             <!--<select name="year1">
                 <option value="2023">2023</option><option value="2022">2022</option>
	  <option value="2021">2021</option><option value="2020">2020</option>
      <option value="2019">2019</option><option value="2018">2018</option>
	  <option value="2017">2017</option><option value="2016">2016</option>
	  <option value="2015">2015</option><option value="2014">2014</option>
	  <option value="2013">2013</option><option value="2012">2012</option>
	  <option value="2011">2011</option><option value="2010">2010</option>
	  <option value="2009">2009</option><option value="2008">2008</option>
	  <option value="2007">2007</option><option value="2006">2006</option>
	  <option value="2005">2005</option><option value="2004">2004</option>
	  <option value="2003">2003</option><option value="2002">2002</option>
	  <option value="2001">2001</option><option value="2000">2000</option>
	  <option value="1999">1999</option><option value="1998">1998</option>
	  <option value="1997">1997</option><option value="1996">1996</option>
	  <option value="1995">1995</option><option value="1994">1994</option>
	  <option value="1993">1993</option><option value="1992">1992</option>
	  
	  </select>
      <select name="month1">
      <option value="0">月</option><option value="1">1 月</option>
      <option value="2">2 月</option><option value="3">3 月</option>
      <option value="4">4 月</option><option value="5">5 月</option>
      <option value="6">6 月</option><option value="7">7 月</option>
      <option value="8">8 月</option><option value="9">9 月</option>
      <option value="10">10 月</option><option value="11">11 月</option>
      <option value="12">12 月</option>
      </select>
      <select name="day1">
      <option value="0">日</option><option value="1">1</option>
	  <option value="2">2</option><option value="3">3</option>
	  <option value="4">4</option><option value="5">5</option>
	  <option value="6">6</option><option value="7">7</option>
	  <option value="8">8</option><option value="9">9</option>
	  <option value="10">10</option><option value="11">11</option>
	  <option value="12">12</option><option value="13">13</option>
	  <option value="14">14</option><option value="15">15</option>
	  <option value="16">16</option><option value="17">17</option>
	  <option value="18">18</option><option value="19">19</option>
	  <option value="20">20</option><option value="21">21</option>
	  <option value="22">22</option><option value="23">23</option>
	  <option value="24">24</option><option value="25">25</option>
	  <option value="26">26</option><option value="27">27</option>
	  <option value="28">28</option><option value="29">29</option>
	  <option value="30">30</option><option value="31">31</option>
	  </select>
             -->
             
                 
                    
                
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
	  $sql = "SELECT * FROM record WHERE id= (SELECT Max(id) FROM record) ORDER BY date DESC LIMIT 1;";
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
			<td width='50%'>id</td>
			<td width='50%'>".$row['id']."</td></tr></br>
			<tr>
			<td width='50%'>身高</td>
			<td width='50%'>".$row['hieght']."</td></tr></br>
			<tr>
			<td width='50%'>體重</td>
			<td width='50%'>".$row['weight']."</td></tr></br>
			<tr>
			<td>BMI</td>
			<td>".$row['bmi']."</td></tr></br>
			<tr>
			<td width='50%'>日期</td>
			<td width='50%'>".$row['date']."</td></tr></br>
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
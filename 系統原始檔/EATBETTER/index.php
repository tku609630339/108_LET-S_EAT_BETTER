<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>討論區</title>
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
  <body>
       <table style='border:1px #0000FF dashed;' cellpadding='10' border='1'>
    <tr bgcolor="yellow" align="center">
<td><a href='welcome.php'>回會員區主頁</a></td>

<!--  <td><a href='record.php'>回到 [我的紀錄]</a>-->
    </td><td><a href='logout.php'>logout</a></td>
</tr>

</table>
    <p><img src="fig2.jpg"></p>
    <?php
      require_once("dbtools.inc.php");
			
      //指定每頁顯示幾筆記錄
      $records_per_page = 5;
			
      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
				
      //建立資料連接
      $link = create_connection();
					
      //執行 SQL 命令
      $sql = "SELECT id, author, subject, date FROM discuss ORDER BY date DESC";
      $result = execute_sql($link, "eatbetter", $sql);
				
      //取得記錄數
      $total_records = mysqli_num_rows($result);
			
      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);
			
      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);
			
      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      echo "<table width='300' cellspacing='3'>";
			
      //使用 $bg 陣列來儲存表格背景色彩
      $bg[0] = "#D9D9FF";
      $bg[1] = "#FFCAEE";
      $bg[2] = "#FFFFCC";
      $bg[3] = "#B9EEB9";
      $bg[4] = "#B9E9FF";					
	  
      //顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr bgcolor='" . $bg[$j - 1] . "'>";
        echo "<td width='90' align='center'><img src='" . mt_rand(0, 9) . ".jpg'></td>";
        echo "<td bgcolor='" . $bg[$j - 1] . "'>作者：" . $row["author"] . "<br>";
        echo "主題：" . $row["subject"] . "<br>";
        echo "時間：" . $row["date"] . "<hr>";
        echo "<a href='show_news.php?id=";
        echo $row["id"] . "'>閱讀與加入討論</a></td></tr>";				
        $j++;
      }
      echo "</table>" ;
			
      //產生導覽列
      echo "<p>";
			
      if ($page > 1)
        echo "<a href='index.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='index.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='index.php?page=". ($page + 1) . "'>下一頁</a> ";			
				
      echo "</p>";?>
    
    
   
    <?php
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?> 	
    
    <hr>
    <!- 顯示輸入新留言表單 -->
    <form name="myForm" method="post" action="post.php">
      <table border="0" width="300" cellspacing="0">
        <tr bgcolor="#0084CA" align="center">
          <td colspan="2"><font color="white">請在此輸入新的討論</font></td>
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
            <input type="button" value="張貼討論" onClick="check_data()">　
            <input type="reset" value="重新輸入">
          </td>  
        </tr>
      </table>   
    </form> 
    
  </body>
</html>
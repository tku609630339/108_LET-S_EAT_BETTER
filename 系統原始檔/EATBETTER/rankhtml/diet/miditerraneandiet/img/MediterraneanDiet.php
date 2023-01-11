<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>資料庫</title>
	
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
   <center><img src="pic/MediterraneanDiet.png" width="300" height="180"></center>
    
    <?php
      require_once("dbtools.inc.php");
			
      //指定每頁顯示幾筆記錄
      $records_per_page = 1;

      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;

      //建立資料連接
      $link = create_connection();
			
      //執行 SQL 命令$sql = "SELECT * FROM food ORDER BY date DESC";
	  $sql = "SELECT * FROM `MediterraneanDiet`";
      	
      $result = execute_sql($link, "排行", $sql);

      //取得記錄數
      $total_records = mysqli_num_rows($result);

      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);

      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);

      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      //使用 $bg 陣列來儲存表格背景色彩
      $bg[0] = "#D1BBFF";
   

      echo "<table width='300' align='center' cellspacing='3'>";

      //顯示記錄 //
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr bgcolor='" . $bg[$j - 1] . "'>";
        /* echo "<td width='120' align='center'>
              <img src='" . mt_rand(0, 9) . ".jpg'></td>"; */
			 
			// echo "<img src=\"dash.png\">";
			  //<img src="圖片網址" width="圖片寬度" height="圖片高度">
//echo "<img src=\"1.gif\">";

			  
        echo "<td>" . $row["地中海飲食（Mediterranean Diet）"] . "</td>";
        
        
        $j++;
      }
      echo "</table>" ;

      //產生導覽列
      echo "<p align='center'>";

      if ($page > 1)
        echo "<a href='DB.php?page=". ($page - 1) . "'>上一頁</a> ";

      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='DB.php?page=$i'>$i</a> ";
      }

      if ($page < $total_pages)
        echo "<a href='DB.php?page=". ($page + 1) . "'>下一頁</a> ";
      echo "</p>";

      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    
	
	
	
  </body>
</html>
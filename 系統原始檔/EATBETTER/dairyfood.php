
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>食品分類</title>
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
    
    <?php
      require_once("dbtools.inc.php");
			
      //指定每頁顯示幾筆記錄
      $records_per_page = 10;
			
      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
				
      //建立資料連接
      $link = create_connection();
					
      //執行 SQL 命令
      $sql = "SELECT * FROM food WHERE 食品分類 = '乳品類'";
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
      $bg[0] = "#D1BBFF";
      $bg[1] = "#9F88FF";
      $bg[2] = "#33FFDD";
      $bg[3] = "#AAFFEE";
      $bg[4] = "#CCCCFF";
      $bg[5] = "#D1BBFF";
      $bg[6] = "#9F88FF";
      $bg[7] = "#33FFDD";
      $bg[8] = "#AAFFEE";
      $bg[9] = "#CCCCFF";
      
      
	//顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr bgcolor='" . $bg[$j - 1] . "'>";
        /* echo "<td width='120' align='center'>
              <img src='" . mt_rand(0, 9) . ".jpg'></td>"; */
        echo "<td>食品分類 :" . $row["食品分類"] . "</br>";
        echo "樣品名稱 :" . $row["樣品名稱"] . "</br>";
        echo "<hr><details><summary>內容物描述 :</summary>".$row["內容物描述"] . "</details>";
		echo  "<hr><details><summary>熱量 :" . $row["熱量-成分值(kcal)"] . "(kcal)</br></summary>";
		echo  "水分 :" . $row["水分-成分值(g)"] . "(g)</br>";
		echo  "粗蛋白 :" . $row["粗蛋白-成分值(g)"] . "(g)</br>";
		echo "粗脂肪 :" . $row["粗脂肪-成分值(g)"] . "(g)</br>";
//		echo "<td>" . $row["灰分-成分值(g)"] . "</td>";
		echo  "總碳水化合物 :" . $row["總碳水化合物-成分值(g)"] . "(g)</br>";
		echo "膳食纖維 :" . $row["膳食纖維-成分值(g)"] . "(g)</br>";
//		echo  "樣品名稱 :" . $row["糖質總量-成分值(g)"] . "</br>";
		echo "鈉 :" . $row["鈉-成分值(mg)"] . "(mg)</br>";
		echo "鉀 :" . $row["鉀-成分值(mg)"] . "(mg)</br>";
		echo  "鈣 :" . $row["鈣-成分值(mg)"] . "(mg)</br>";
		echo "鎂 :" . $row["鎂-成分值(mg)"] . "(mg)</br>";
		echo "磷 :" . $row["磷-成分值(mg)"] . "(mg)</br>";
		echo "鐵 :" . $row["鐵-成分值(mg)"] . "(mg)</br>";
		echo "鋅 :" . $row["鋅-成分值(mg)"] . "(mg)</br>";
		echo  "維生素B1 :" . $row["維生素B1-成分值(mg)"] . "(mg)</br>";
		echo  "維生素B2 :" . $row["維生素B2-成分值(mg)"] . "(mg)</br>";
//		echo "<td>" . $row["菸鹼素-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B6-成分值(mg)"] . "</td>";
//		echo "<td>" . $row["維生素B12-成分值(ug)"] . "</td>";
//		echo "<td>" . $row["葉酸-成分值(ug)"] . "</td>";
		echo "維生素C :" . $row["維生素C-成分值(mg)"] . "(mg)</td></tr></details>";
        $j++;
      }
      
      
      echo "</table>" ;
			
      //產生導覽列
      echo "<p>";
			
      if ($page > 1)
        echo "<a href='dairyfood.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='dairyfood.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='dairyfood.php?page=". ($page + 1) . "'>下一頁</a> ";			
				
      echo "</p>";
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?> 		
    
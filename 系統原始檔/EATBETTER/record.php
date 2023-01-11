<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>飲食健康指標</title>
	
    <script type="text/javascript">
//      function check_data()
//      {
//        if (document.myForm.hieght.value.length == 0)
//          alert("身高(cm)欄位不可以空白哦！");
//        else if (document.myForm.weight.value.length == 0)
//          alert("體重(kg)欄位不可以空白哦！");
//        else if (document.myForm.bmi.value.length == 0)
//          alert("BMI欄位不可以空白哦！");
//        else
//          myForm.submit();
//      }
	

function bmi($bw,$bh){ //$bh 身高 $bw  體重

    //BMI計算公式 公制單位: BMI = 體重 (公斤) / (身高 (公尺) x 身高 (公尺))

    return($bw/(($bh/100)*($bh/100)));

}
    </script>
  </head>
 

	<?php
        
	  session_start();
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
	  $sql = "SELECT R.* FROM RECORD R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."'";
     
      $result = execute_sql($link, "eatbetter", $sql);
      $row = mysqli_fetch_assoc($result)
?>
  
  <body>
      <table style='border:1px #0000FF dashed;' cellpadding='10' border='1'>
    <tr bgcolor="yellow" align="center">
<td><a href='welcome.php'>回會員區主頁</a></td>

<!--  <td><a href='record.php'>回到 [我的紀錄]</a>-->
    </td><td><a href='logout.php'>logout</a></td>
</tr>

</table>
      </br>
      <form name="myForm" method="post" action="postr.php">
      <table border="0" width="300" cellspacing="0">
        <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入個人資料</font></td>
        </tr>
        <tr bgcolor="#D9F2FF">
          <td width="55%">帳號：</td>
          <td width="45%"><input type="hidden" style="background-color:lightgray;text-align:center;" readonly="value" name="id" value="<?php echo $row['id']; ?>" size="1"><input type="text" style="background-color:lightgray;text-align:center;" readonly="value" name="account" value="<?php echo $_SESSION['account_number']; ?>" size="5"></td>
        </tr>
		<tr bgcolor="#D1BBFF">
                    <td width="55%">日期：</td>
          <td width="45%"><input type="date" name="date"></td>
        </tr>
        <tr bgcolor="#D28EFF">
          <td width="55%">身高(cm)：</td>
          <td width="45%"><input type="text" name="hieght" size="10"></td>
        </tr>
        <tr bgcolor="#00FFFF">
          <td width="55%">體重(kg)：</td>
          <td width="45%"><input type="text" name="weight" size="10"></td>
        </tr>
		
<!--        <tr bgcolor="#E8CCFF">
          <td width="25%">* BMI：</td>
          <td width="75%"><input type="text" name="bmi" size="10" ></td>
        </tr>-->
        <tr bgcolor="#D1BBFF">
          <td width="55%">今日熱量(kcal)：</td>
          <td width="45%"><input type="text" name="heat" size="10"></td>
        </tr>
       <tr bgcolor="#BBFFEEF">
          <td width="55%"> 今日水分(g)：</td>
          <td width="45%"><input type="text" name="water" size="10"></td>
        </tr>
        <tr bgcolor="#F0BBFF">
          <td width="55%"> 今日蛋白質(g)：</td>
          <td width="45%"><input type="text" name="protein" size="10"></td>
        </tr>
        <tr bgcolor="#CCEEFF">
          <td width="55%"> 今日脂肪值(g)：</td>
          <td width="45%"><input type="text" name="fat" size="10"></td>
        </tr>
        <tr bgcolor="#99FF99">
          <td width="55%"> 今日碳水化合物(g)：</td>
          <td width="45%"><input type="text" name="carbo" size="10"></td>
        </tr>
        <tr bgcolor="#BBFFEE">
          <td width="55%"> 今日膳食纖維(g)：</td>
          <td width="45%"><input type="text" name="fiber" size="10"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
		  
              <input type="submit" value="寫入"/>
            <input type="reset" value="重新輸入"/>
			 
          </td>
        </tr>
<!--        <tr>
          <td colspan="2" align="left">
		  
              <font color="red">[註]有" * "的欄位必填</font>
			 
          </td>
        </tr>-->
      </table>
    </form>
  
  <?php
      //取得記錄數
      $total_records = mysqli_num_rows($result);

      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);

      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);

      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      //使用 $bg 陣列來儲存表格背景色彩
      
      $bg[0] = "#FFDDAA";
      $bg[1] = "#BBFFEE";
      $bg[2] = "#AAFFEE";
      $bg[3] = "#99FFFF";
      $bg[4] = "#CCDDFF";
	  $bg[5] = "#99FF99";
      $bg[6] = "#FFC8B4";
      $bg[7] = "#FFCCCC";
      $bg[8] = "#CCCCFF";
      $bg[9] = "#FFFF77";
//	  $bg[10] = "";
//      $bg[11] = "#99BBFF";
//      $bg[12] = "#9999FF";
//      $bg[13] = "#9F88FF";
//      $bg[14] = "#D1BBFF";
//	  $bg[15] = "#B088FF";
//      $bg[16] = "#E8CCFF";
//      $bg[17] = "#D28EFF";
//      $bg[18] = "#77FFEE";
//      $bg[19] = "#77FFCC";
      echo "<form name='Form1' method='post' action='del.php'>";
      echo "<table width='300' cellspacing='3'>";

      //顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr bgcolor='" . $bg[$j - 1] . "'>";
        echo "<td><input type='hidden' style='background-color:lightgray;text-align:center;' readonly='value' name='id' value='".$row['id']."' size='1'>";
        echo "身高(cm)：<input type='text' readonly='value' name='hieght' value = '".$row["hieght"]."' size='3' ><br>";
        echo "體重(kg)：<input type='text' readonly='value' name='weight' value = '". $row["weight"]."' size='3' ><br>";
        echo "時間：<input type='text' readonly='value' name='date' value = '". $row["date"]."' size='10' ><hr>";
        echo "BMI：<input type='text' readonly='value' name='bmi' value = '". $row["bmi"]."' size='3' ><br>";
	echo "今日熱量(kcal)：<input type='text' readonly='value' name='heat' value = '". $row["heat"]."' size='3' ><br>";
        echo "今日水分(g)：<input type='text' readonly='value' name='water' value = '". $row["water"]."' size='3' ><br>";
        echo "今日蛋白質(g)：<input type='text' readonly='value' name='protein' value = '". $row["protein"]."' size='3' ><br>";
        echo "今日脂肪值(g)：<input type='text' readonly='value' name='fat' value = '". $row["fat"]."' size='3' ><br>";
        echo "今日碳水化合物(g)：<input type='text' readonly='value' name='carbo' value = '". $row["carbo"]."' size='3' ><br>";
        echo "今日膳食纖維(g)：<input type='text' readonly='value' name='fiber' value = '". $row["fiber"]."' size='3' ></td><td>";
        echo "<input type='submit' value='刪除'/></td></tr>";
		
        $j++;
      }
      echo "</table></form>" ;

      //產生導覽列
      echo "<p'>";

      if ($page > 1) {
    echo "<a href='record.php?page=" . ($page - 1) . "'>上一頁</a> ";
}

for ($i = 1; $i <= $total_pages; $i++)
      {
    if ($i == $page) {
        echo "$i ";
    } else {
        echo "<a href='record.php?page=$i'>$i</a> ";
    }
}

if ($page < $total_pages) {
    echo "<a href='record.php?page=" . ($page + 1) . "'>下一頁</a> ";
}
echo "</p>";

      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
	
      
	 
      <hr>
      
    
  </body>
</html>
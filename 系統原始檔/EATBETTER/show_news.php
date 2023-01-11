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
    <p><img src="fig1-1.jpg"></p>
    <?php	
      require_once("dbtools.inc.php");
			
      //取得要顯示之記錄
      $id = $_GET["id"];
				
      //建立資料連接
      $link = create_connection();
			
      //執行 SQL 命令
      $sql = "SELECT * FROM discuss WHERE id = $id";
      $result = execute_sql($link, "eatbetter", $sql);
				
      echo "<table width='300' cellpadding='3'>";
      echo "<tr height='40'><td colspan='2' align='center'
            bgcolor='#663333'><font color='white'>
            <b>討論主題</b></font></td></tr>";	 
						  
      //顯示原討論主題的內容
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td bgcolor='#CCFFCC'>主題：" . $row["subject"] . "　";
        echo "<br>作者：" . $row["author"] . "　";
        echo "<br>時間：" . $row["date"] . "</td></tr>";				
        echo "<tr height='40'><td bgcolor='CCFFFF'>";
        echo $row["content"] . "</td></tr>";
      }
			
      echo "</table>";		
			
      //釋放 $result 佔用的記憶體空間
      mysqli_free_result($result);

      //執行 SQL 命令
      $sql = "SELECT * FROM discuss_reply WHERE reply_id = $id";
      $result = execute_sql($link, "eatbetter", $sql);
			
      if (mysqli_num_rows($result) <> 0)
      {
        echo "<hr>";
        echo "<table width='300' cellpadding='3'>";
        echo "<tr height='40'><td colspan='2' align='center'
              bgcolor='#99CCFF'><font color='#FF3366'>
              <b>回覆主題</b></font></td></tr>";
							 
        //顯示回覆主題的內容
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          echo "<td bgcolor='#FFFF99'>主題：" . $row["subject"] . "　";
          echo "<br>作者：" . $row["author"] . "　";
          echo "<br>時間：" . $row["date"] . "</td></tr>";				
          echo "<tr><td bgcolor='CCFFFF'>";
          echo $row["content"] . "</td></tr>";
        }
				
        echo "</table>";			
      }

      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    <hr>
    <form name="myForm" method="post" action="post_reply.php">
      <input type="hidden" name="reply_id" value="<?php echo $id ?>">
      <table border="0" width="300" cellspacing="0">
        <tr bgcolor="#0084CA" align="center">
          <td colspan="2"><font color="white">請在此輸入您的回覆</font></td>
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
		  
		  
            <input type="button" value="回覆討論" onClick="check_data()">   
            <input type="reset" value="重新輸入">
          </td>
		  
        </tr>  <tr>
		<td>
		  <button type="button" value="返回" onClick="location.href='index.php'" style="width:80px;"><< 討論區</button></td>
      </tr></table>                   
    </form>
  </body>                                                                                 
</html>
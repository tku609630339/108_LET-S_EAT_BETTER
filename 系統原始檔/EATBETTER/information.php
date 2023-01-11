<?php
    
    session_start();
//	echo '<center>';
    if($_SESSION['account_number']!=null){
	echo '歡迎登入, ' .$_SESSION['account_number']."!</br>";
	
        
        
        require_once("dbtools.inc.php");
        
        
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
	  $sql = "SELECT R.* FROM USERS R JOIN USERS U ON R.ID=U.ID WHERE U.ACCOUNT_NUMBER='".$_SESSION['account_number']."'";
	  $result=mysqli_query($conn,$sql);
	  $num = mysqli_num_rows($result);
          if(mysqli_error($conn)){
              echo mysqli_error($conn);
              echo "<a href='login.php'>再登入一次</a>";
          }
//          ------------------
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
	  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	  {
		
//		echo '<center>';
		echo "
	        <form action=''name='form1' method='post' >
      <table border='1' width='300' align='left'bgcolor='#BBFFEE'>
                 <tr bgcolor='#FFAA33'><td colspan='2'><center>個人資料</center></td></tr>
			<tr bgcolor='#CCCCFF'>
		<td width='25%'>名字: </td>   
		<td width='75%'><input name='name1' type='text'  size='20'  value='".$row['name1']."'></td></tr>
                <tr bgcolor='#99FFFF'>
                <td width='25%'>帳號:</td>   
		<td width='75%'><input name='account_number'  readonly='value' type='text' size='20'  value='".$row{'account_number'} ."'></br>(不可更改)</td></tr>
                <tr bgcolor='#CCCCFF'>
                <td width='25%'>密碼:</td>   
		<td width='75%'><input name='password' type='password' size='20'  value='".$row{'password'} ."'></td></tr>

                <tr bgcolor='#99FFFF'>
                <td width='25%'>地址:</td>   
		<td width='75%'><input name='address' type='text' size='20'  value='".$row{'address'} ."'></td></tr>
                <tr bgcolor='#CCCCFF'>
                <td width='25%'>電子信箱:</td>   
		<td width='60%'><input name='email' type='text' size='20'  value='".$row{'email'} ."'></td></tr>
                <tr bgcolor='#99FFFF'>
                    <td width='25%'>生日:</td>
                   <td width='75%'> <input name='birthday' type='text' size='20'  value='".$row{'birthday'} ."'>
</td></tr>
                <tr bgcolor='#CCCCFF'>
                <td width='25%'>性別: </td>   
		<td width='75%'><input name='gender' type='text' size='20' value='".$row{'gender'}."'></td></tr>
                            <tr>";
                ?>
          <td colspan='2' align='center'>
                        <input type='button' value='保存' type='submit' onClick="form1.action='userpost.php';form1.submit();"/>
			
          </td>
        </tr>
			</table>
    </form>
        
        <?php
	 $j++;
	   }  	  
           
    }  else {
        echo '<script language="JavaScript">;alert("請先登入");location.href="login.php";</script>;';
}
           
           //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($conn);
?>
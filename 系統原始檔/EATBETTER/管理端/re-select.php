<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>個人紀錄搜尋介面</title>
	<div style="text-align:center;"><b><h1>LET'S EAT BETTER</h1></b></div>
<div style="text-align:center;"><b><h1>個人紀錄搜尋介面</h1></b></div>
  </head>
  <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
      
<?php  
require_once("dbtools.inc.php");
// $dbhost = 'localhost';  
// $dbuser = 'chia';  
// $dbpass = 'mypassword';  
 $dbname = 'eatbetter';
 $id1 = ($_POST["id1"]);
//  $hieght =($_POST["hieght"]);
//  $weight = ($_POST["weight"]);
//  $bmi = ($_POST["bmi"]);
  $date1 = ($_POST["date1"]);
//                $year1 =($_POST['year1']);
//		$month1 =($_POST['month1']);
//		$day1 =($_POST['day1']);
//  
  
// $number =$_REQUEST['number'];
// $name = $_REQUEST['name'];
// $junior = $_REQUEST['junior'];
// $wish = $_REQUEST['wish'];
 
 $conn = create_connection();
  
 
  $sql_select = "SELECT * FROM record WHERE `id` = '$id1' AND `date`='$date1'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  $result = execute_sql($conn, $dbname, $sql_select);
  
  $row = mysqli_fetch_assoc($result);
  
  if(mysqli_error($conn)){
    echo mysqli_error();
    
}else{
    
    echo "<script>alert('select success')</script>";
//    header("Location:manage2.php");
//    echo "<table>";
//    echo "<tr><td></td><td></td>";
}
  

?>
      
<form action=""name="form1" method="post" >
      <table border="0" width="350" align="center" cellspacing="0">
          <tr align="center" bgcolor="#FFCC22">
          <td colspan="2">
            <a align=center href="http://220.133.8.143:8080/EATBETTER/%E7%AE%A1%E7%90%86%E7%AB%AF/re-manage.php">回管理頁</a></td>
        
		</tr>
        <tr bgcolor="#9900FF" align="center">
          <td colspan="2">
            <font color="#FFFFFF">請在此輸入欲更新的資料</font></td>
        
		</tr>
		<tr bgcolor="#CCCCFF">
		<td width="25%">id: </td>   
                <td width="75%"><input name="id1" type="text" size="20"  readonly="value" value="<?php echo $row["id"] ?>">(不可更改)</td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">身高: </td>   
		<td width="75%"><input name="hieght" type="text" size="20" value="<?php echo $row["hieght"] ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">體重: </td>   
		<td width="75%"><input name="weight" type="text" size="20" value="<?php echo $row["weight"] ?>"></td></tr>
                <tr bgcolor="#99FFFF">
                <td width="25%">BMI: </td>   
		<td width="75%"><input name="bmi" type="text" size="20" value="<?php echo $row["bmi"] ?>"></td></tr>
                <tr bgcolor="#CCCCFF">
                <td width="25%">日期: </td>   
		<td width="75%">
                    <input name="date1" type="text" size="20" value="<?php echo $row["date"] ?>"></td></tr>
<!--                    <select name="year1">
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
	  </select></td></tr>-->
               
        <tr>
          <td colspan="2" align="center">
                        <input type="button" value="保存" type="submit" onClick="form1.action='re-update.php';form1.submit();"/>
			
          </td>
        </tr>
      </table>
    </form>
<?php
//關閉資料連接
  mysqli_close($conn);
?>

    
  </body>
</html>
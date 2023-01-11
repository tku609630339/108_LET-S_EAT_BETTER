<?php


  require_once("dbtools.inc.php");
	$dbname = 'eatbetter';
        
$id = $_POST["id"];
  $date = $_POST["date"];
  $hieght = $_POST["hieght"];
  $weight = $_POST["weight"];
  $bmi = $weight/(($hieght/100)*($hieght/100));
  $heat = $_POST["heat"];
  $water = $_POST["water"];
  $protein = $_POST["protein"];
  $fat = $_POST["fat"];
  $carbo = $_POST["carbo"];
  $fiber = $_POST["fiber"];
  
   //建立資料連接
  $link = create_connection();
  
//$sql ="DELETE FROM test WHERE id=".$_GET[id];  //刪除資料
  $sql_delete = "DELETE FROM record WHERE `id` = '$id' AND `date`='$date'";
//  $result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
  
  
 
  $result = execute_sql($link, "eatbetter", $sql_delete);

  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到 record.php
  header("location:record.php");
  exit();
  
?>
<?php
session_start();
  require_once("dbtools.inc.php");
//$no= $_GET["no"];	
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
  
//$heat = $_POST["heat"];
  //建立資料連接
  $link = create_connection();

  //執行 SQL 命令
  $sql = "INSERT INTO record(id, hieght, weight,bmi, date, heat,water,protein,fat,carbo,fiber)
          VALUES('$id','$hieght', '$weight', '$bmi', '$date','$heat','$water', '$protein', '$fat', '$carbo','$fiber')";
  $result = execute_sql($link, "eatbetter", $sql);

  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到 record.php
  header("location:record.php");
  exit();
?>
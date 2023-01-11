<html>
    <head>
        <title>welcome</title>
        <style>
            /* css 代码  */
            
            table {
 
     border-collapse: collapse;
 
     font-family: Futura, Arial, sans-serif;
 
}
 
caption {
 
     font-size: larger;
 
     margin: 1em auto;
 
}
 
th,td {
 
     padding: .65em;
 
}
 
th {
 
     background: #555 nonerepeat scroll 0 0;
 
   /* border: 1px solid #777; */
 
   color: #fff;
 
}
 
td {
 
     /* border: 1px solid #777; */
 
}
 
tbody tr:nth-child(odd) {
 
     background: #ccc;
 
}
 
th:first-child {
 
     border-radius: 9px 0 0 0;
 
}
 
th:last-child {
 
     border-radius: 0 9px 0 0;
 
}
 
tr:last-child td:first-child {
 
     border-radius: 0 0 0 9px;
 
}
 
tr:last-child td:last-child {
 
     border-radius: 0 0 9px 0;
 
}
tbody tr:hover {
 
     background: linear-gradient(#fff,#aaa);
 
     font-size: 17px;
 
}

        </style>
    </head>
    <body>
<?php
    
    session_start();
	echo '<center>';
        
        if($_SESSION['account_number']!=null){
//	echo "<caption>歡迎登入, " .$_SESSION['account_number']."!</caption>";
	echo "<table style='border:5px #0000FF dashed;' cellpadding='10' border='1'><tr><td colspan='1' height=60 ><center><a href='record.php'>前往[我的紀錄]</a></center></td></tr>";
        echo '<tr><ul><td colspan="1" height=60 ><center>指標變化圖</center></td></tr>';
        echo '<tr><td colspan="1"><center><li><a href="lineChart.php">前往[折線圖(BMI)]</a></li></center></br>';
        echo '<center><li><a href="barChart.php">前往[直條圖(熱量)]</a></li></center></br>';
        echo '<center><li><a href="pieChart.php">前往[圓餅圖(營養成分)]</a></li></center></ul></td></tr>';
        echo '<tr><td colspan="1" height=60 ><center><a href="index.php">前往[討論區]</a></center></td></tr>';
	echo '<tr><td colspan="1"  height=60 bgcolor="yellow"><center><a href="logout.php">logout</a></center></td></tr></table>';
        }  else {
            echo '<script language="JavaScript">;alert("請先登入");location.href="login.php";</script>;';
}
?>

    
    </body>
    </html>
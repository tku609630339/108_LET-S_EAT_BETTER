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
    <body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
<?php
    
     session_start();
	echo '<center>';
        
        if($_SESSION['account_number']!=null){
	echo "<table style='border:5px #0000FF dashed;' cellpadding='10' border='1'><caption>Welcome, " .$_SESSION['account_number']."!</caption>";
	echo '<tr><td colspan="2"><center><a href="管理端介面.html">前往[管理端介面]</a></center></td></tr>';
        
	echo '<tr><td colspan="2"><center><a href="logout.php">logout</a></center></td></tr></table>';
         }  else {
            echo '<script language="JavaScript">;alert("請先登入");location.href="login.php";</script>;';
}
?>

    
    </body>
    </html>
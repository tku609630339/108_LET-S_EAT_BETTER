<?php
   session_start();
?>
<body bgcolor="#F0FFF0" text="#000000" link="#0066cc" vlink="#336600"> 
<h1>Register, login and logout user php mysql</h1>
<h1>Home</h1>
<h4>welcome, <?php echo $_SESSION['account_number']; ?> !</h4>
你成功申請了帳戶!!點擊以下文字<br/><br/><a href='login.php'>再登入一次</a>
</body>
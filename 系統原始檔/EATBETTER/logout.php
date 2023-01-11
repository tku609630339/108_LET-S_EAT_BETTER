<?php
    session_start();
	session_destroy();
	echo '<center>';
	if(isset($_COOKIE['account_number']) and isset($_COOKIE['password'])){
	    $acct =$_COOKIE['account_number'];
        $pass =$_COOKIE['password'];
	setcookie('account_nunber',$acct, time()-1);
    setcookie('pass',$pass, time()-1);
	}
	echo "你成功登出了!!點擊以下文字<br/><br/><a href='login.php'>再登入一次</a>";
?>
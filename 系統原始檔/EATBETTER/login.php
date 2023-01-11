<title>登入介面</title>
<table>
<form method="POST" action="validate.php">
<h3 align="center">歡迎來到登入介面</h3>
<?php 
echo '<center>';
echo '帳號: <input type="text" id="account_number" name="account_number"><br/><br/>';
echo '密碼: <input type="password" id="password" name="password"><br/><br/>'; 
//echo '<input type="checkbox" name="remember" value="1">記住我 <br/><br/>';
echo '<input type="submit" name="login" value="登入">';
//下行的index.php 之後是要放申請帳號的php
echo '  <a href="apply.php">申請帳號</a>';
?>
</form>
</table>
<?php
  if(isset($_COOKIE['account_number']) and isset($_COOKIE['password'])){
      $acct =$_COOKIE['account_number'];
      $pass =$_COOKIE['password'];
      echo "<script>
          document.getElementById('account_number').value = '$acct';
          document.getElementById('password').value = '$pass';
	  </script>";
	  }
?>




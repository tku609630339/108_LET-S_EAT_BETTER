<head>
<title>申請介面</title>
</head>
<?php
    session_start();
	//connect to database
	$db =mysqli_connect("localhost","chia","mypassword","eatbetter");
	mysqli_query($db,"SET NAMES utf8");
	
	if (isset($_POST['register_btn'])){
		session_start();
		
	  $name1 =($_POST['name1']);
	  $account_number =($_POST['account_number']);
	  $password =($_POST['password']);
	  $password2 =($_POST['password2']);
	  $address =($_POST['address']);
	  $email =($_POST['email']);
	  $birthday =($_POST['birthday']);
		$year =($_POST['year']);
		$month =($_POST['month']);
		$day =($_POST['day']);
	  $gender =($_POST['gender']);

		
	
	  if ($password == $password2) {
//		  $password = md5($password);
		  $password = ($password);
		  $sql ="INSERT INTO users(name1,account_number,password,address,email,birthday,gender) VALUES('$name1','$account_number','$password','$address','$email','$year-$month-$day','$gender')";
		  mysqli_query($db,$sql);
		  $_SESSION['message']="You are now logged in";
		  $_SESSION['account_number']= $account_number;
		  header("location:home.php");
	  }else{
		 echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密碼與密碼確認不一致！請重新再輸入一次!"."\"".")".";"."</script><br/>";
		 echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."apply.php"."\""."</script>";
		 
	  }
	}
?>
	
<?php
echo '<center>
      <tr><td><i><font size="10" face="DFKai-sb">申請帳號</i></font></td></tr>
	  <br/><br/><br/>'
?>
<form method="post" action="apply.php">
<?php 
echo '<center>';
echo '名字:<br/><input type="text" name="name1"><br/><br/>';
echo '帳號:<br/><input type="text" name="account_number"><br/><br/>';
echo '密碼:<br/><input type="text" name="password"><br/><br/>'; 
echo '密碼確認:<br/><input type="text" name="password2"><br/><br/>'; 
echo '地址:<br/><input type="text" name="address"><br/><br/>';  
echo '電子信箱:<br/><input type="email" name="email"><br/><br/>'; 
echo '生日:<br/><name="birthday">';
echo '<select name="year">
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
	  <option value="1991">1991</option><option value="1990">1990</option>
	  <option value="1989">1989</option><option value="1988">1988</option>
	  <option value="1987">1987</option><option value="1986">1986</option>
	  <option value="1985">1985</option><option value="1984">1984</option>
	  <option value="1983">1983</option><option value="1982">1982</option>
	  <option value="1981">1981</option><option value="1980">1980</option>
	  <option value="1979">1979</option><option value="1978">1978</option>
	  <option value="1977">1977</option><option value="1976">1976</option>
	  <option value="1975">1975</option><option value="1974">1974</option>
	  <option value="1973">1973</option><option value="1972">1972</option>
	  <option value="1971">1971</option><option value="1970">1970</option>
	  <option value="1969">1969</option><option value="1968">1968</option>
	  <option value="1967">1967</option><option value="1966">1966</option>
	  <option value="1965">1965</option><option value="1964">1964</option>
	  <option value="1963">1963</option><option value="1962">1962</option>
	  <option value="1961">1961</option><option value="1960">1960</option>
	  <option value="1959">1959</option><option value="1958">1958</option>
	  <option value="1957">1957</option><option value="1956">1956</option>
	  <option value="1953">1953</option><option value="1952">1952</option>
	  <option value="1951">1951</option><option value="1950">1950</option>
	  <option value="1949">1949</option><option value="1948">1948</option>
	  <option value="1947">1947</option><option value="1946">1946</option>
	  <option value="1945">1945</option><option value="1944">1944</option>
	  <option value="1943">1943</option><option value="1942">1942</option>
	  <option value="1941">1941</option><option value="1940">1940</option>
	  <option value="1939">1939</option><option value="1938">1938</option>
	  <option value="1937">1937</option><option value="1936">1936</option>
	  <option value="1935">1935</option><option value="1934">1934</option>
	  <option value="1933">1933</option><option value="1932">1932</option>
	  <option value="1931">1931</option><option value="1930">1930</option>
	  </select>';
echo '<select name="month">
      <option value="0">月</option><option value="1">1 月</option>
      <option value="2">2 月</option><option value="3">3 月</option>
      <option value="4">4 月</option><option value="5">5 月</option>
      <option value="6">6 月</option><option value="7">7 月</option>
      <option value="8">8 月</option><option value="9">9 月</option>
      <option value="10">10 月</option><option value="11">11 月</option>
      <option value="12">12 月</option>
      </select>';
echo '<select name="day">
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
	  </select><br/><br/><br/>';
echo '性別:<br/>
      <input type="text" name="gender" placeholder="請輸入男性or女性"> 
      <br/><br/><br/>';
echo '<input type="submit" name="register_btn" value="送出">';


?>
</form>

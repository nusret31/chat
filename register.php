<?php

if(isset($_POST['submit'])){
	$con = mysql_connect('localhost','root','');
	mysql_select_db('chatbox',$con);

	$uname=$_POST['username'];
	$pword=$_POST['password'];
	$pword2=$_POST['password2'];


  if($pword!=$pword2){
  	echo "passwords do not match.<br>";
  }else{
  	$checkexist = mysql_query("SELECT username FROM users WHERE username ='$uname'");
  	if(mysql_num_rows($checkexist)){
  		echo "Username already exists, please select different username<br>";
  	}else{
  		mysql_query("INSERT into users(username, password)VALUES ('$uname','$pword') ");
  		echo "You have succesfully registered.Click <a href='index.php'>here</a> to chat<br>";
     	}
    }

}


?>


<html>
<head>
	<title></title>
</head>
<body>

 <table align="center" border="1" width="40%" action="register.php">

 <tr>
 <td>Enter your username: </td>
 <td><input type="text" name="username"</td>
 </tr>
 	
 <tr>
 <td>Enter your password:</td>
 <td><input type="password" name="password"></td>
 </tr>	

 <tr>
 	<td colspan="2"><input type="submit" name="submit" value="Register"></td>
 </tr>

 </table>

</body>
</html>
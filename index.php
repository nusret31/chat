<?php

session_start();
if(!isset($_SESSION['username'])){

?>

<form name="form2" action="login.php" method="post">

   <table border="1" align="center">
     <tr>
      	<td>Username: </td>
      	 <td><input type="text" name="username"></td>
      	 </tr>

      	 <tr>
      	 <td>Password: </td>
      	  <td><input type="password" name="password"></td>
      	  </tr>
      	  <tr>
      	   <td colspan="2"><input type="submit" name="submit" value="Login"></td>
      	   </tr>
      	   <tr>
      	    <td colspan="2"><a href="register.php">Register here to get an account</a></td>
      	    </tr>
      	   </table>


<?php
  exit;
  }
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>ChatBox</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script>

	 function submitChat()
	 {
	 	if(form1.msg.value == ''){
	 		alert('Enter your message');
	 		return;
	 	}

	 	$('#imageload').show();
	 	
	 	var msg = form1.msg.value;
	 	var xmlhttp = new XMLHttpRequest();

	 	xmlhttp.onreadystatechange = function(){
	 		if(xmlhttp.readyState==4&&xmlhttp.status==200){
	 			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
	 			$('#imageload').hide();
	 		}
	 	}

	 	xmlhttp.open('GET','insert.php?&msg='+msg,true);
	 	xmlhttp.send();
	 }

	 $(document).ready(function(e) {
	 	$.ajaxSetup({cache:false});
	 	setInterval(function(){$('#chatlogs').load('logs.php');},2000);
	 });



	</script>


</head>

<body>

<form name="form1">
<table border="1" align="center">
<tr>
Your Chat Name: <b><?php echo $_SESSION['username']; ?> </b> <br>
</tr>

<tr>
<td>
Your Message: <br />
</td>
<textarea name="msg" style="width:200px; height:70px"></textarea><br />
</tr>
<tr>
<td colspan="2">

<a href="#" onclick="submitChat()" class="button">Send</a><br /> <br />
</td>

<td colspan="2">

<a href="logout.php">Logout</a><br /> <br />
</td>

</tr>
</table>

<div id="imageload" style="display:none">
<img src="load.gif">

</div>

<div id="chatlogs" style ="width:100%; text-align:center">
LOADING   <img src="load.gif">

</div>

</body>

</html>
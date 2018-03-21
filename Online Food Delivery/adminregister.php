<?php
//$con=mysqli_connect("localhost","root","","rmbsdatabase");
//if(!$con)
//{
//die("Connection failed: " . mysqli_connect_error());
//}

//$sql="insert into admintable (username,password) value('".$_POST["inputusername"]."','".$_POST["inputuserpassword"]."')";
//
//$result=mysql_query($con,$sql);
//mysqli_close($con);

//?>




<!DOCTYPE html>
<html>
<head>
	<title>admin registration</title>
</head>
<body>

<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="inputusername" ></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="inputuserpassword" ></td>
	</tr>
	<tr>
		<td>CPassword:</td>
		<td><input type="password" name="inputusercpassword" ></td>
	</tr>
</table>
<input type="submit" name="btnsubmit" value="REGISTER">

</body>
</html>
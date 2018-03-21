
<?php include('headerfooter.php');?>
<?php
if (isset($_SESSION['username']) && $_SESSION['username']!="admin") {
	header("location:adminlogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
	<link rel="stylesheet" href="adminhome.css">
</head>
<body>
<?php include('headerfooter.php');?>
<div class="header">
	<h1>Restaurant Management And Booking System</h1>
</div>
<div>
	<form action="adminhome.php" method="post">
		<input type="submit" name="booking" value="booking list">
		<input type="submit" name="menulist" value="menu list">
		<input type="submit" name="menuadd" value="Add menu">
		<input type="submit" name="menuremove" value="Remove menu">
		<input type="submit" name="stufflist" value="stuff list">
		<input type="submit" name="stuffadd" value="Add stuff">
		<input type="submit" name="stuffremove" value="Remove stuff">
	</form>
</div>
<div>
<?php if(isset($_POST['booking'])){
	include('bookinglist.php');
}
?>
<?php if(isset($_POST['menulist'])){
	include('menulist.php');
}
?>
<?php if(isset($_POST['stufflist'])){
	include('stufflist.php');
}
?>
<?php if(isset($_POST['menuadd'])){
	header("location:menuadd.php");
}
?>
<?php if(isset($_POST['menuremove'])){
	header("location:menuremove.php");
}
?>
<?php if(isset($_POST['stuffadd'])){
	header("location:stuffregister.php");
}
?>
<?php if(isset($_POST['stuffremove'])){
	header("location:stuffremove.php");
}
?>
</div>
</body>
</html>
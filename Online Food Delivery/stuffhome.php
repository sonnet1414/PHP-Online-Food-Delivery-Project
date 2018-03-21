
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
	<form action="stuffhome.php" method="post">
		<input type="submit" name="booking" value="booking list">
		<input type="submit" name="menulist" value="menu list">
		<input type="submit" name="stufflist" value="stuff list">
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
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$servername = "localhost";
$username = "root";
$password = "";
$database = "rmbsdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['menuid'];
$available="select 1 from menu where menuid='$id'";
$result2=0;
$result=mysqli_query($conn,$available);
$result2=mysqli_num_rows($result);
if ($result2==1) {
	$sql = "delete from menu where menuid='$id'";
    if(mysqli_query($conn, $sql)){
	$successmsg="SUCCESSFUL.Menu Removed";
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
if($result2==0)
{
	$successmsg="SORRY. Menu not listed";
}
// Close connection
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<link rel="stylesheet" href="booking.css">
	<script>
    function validateform() {
    var name = document.forms["menuform"]["menuid"].value;
    if (name == "" || name == null ) {
        alert("All Fields must be filled out");
        return false;
    }
   }
</script>
</head>
<body>
<?php include('headerfooter.php');?>
<?php include('menulist.php');?>
<div class="successmessage"><?php if(!empty($successmsg)){echo $successmsg;}?></div>

<div class="bookingtab">
	<form name="menuform" method="post" action="menuremove.php" onsubmit="return validateform()" >
	<table>
		<tr>
			<td>Enter the id:</td>
			<td><input type="text" name="menuid"></td>
		</tr>
		<tr>
		<td></td>
			<td><input type="submit" name="submit" value="delete item"><button><a href="adminhome.php">Return</a></button></td>
		</tr>
	</table>
</form>

</div>

</body>
</html>
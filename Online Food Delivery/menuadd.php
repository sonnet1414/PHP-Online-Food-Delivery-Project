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
$name=$_POST['menuname'];
$time=$_POST['menutime'];
$price=$_POST['menuprice'];
$available="select 1 from menu where menuname='$name' and menutime='$time' and menuprice='$price'";
$result=0;
$result=mysqli_query($conn,$available);
$result=mysqli_num_rows($result);
if ($result==0) {
	$sql = "INSERT INTO menu (menuname,menutime,menuprice) VALUES ('$name','$time','$price')";
    if(mysqli_query($conn, $sql)){
	$successmsg="SUCCESSFUL.Menu Listed";
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
if($result==1)
{
	$successmsg="SORRY. Already Menu Listed";
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
    var name = document.forms["menuform"]["menuname"].value;
    var timeslot = document.forms["menuform"]["menutime"].value;
    var price = document.forms["menuform"]["menuprice"].value;
    if (name == "" || name == null  ||timeslot == "" || timeslot == 0 || price == "" || price == null) {
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
	<form name="menuform" method="post" action="menuadd.php" onsubmit="return validateform()" >
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="menuname"></td>
		</tr>
		<tr>
		    <td>Time/Slot</td>
			<td><select name="menutime"><option></option><option>breakfast</option><option>lunch</option><option>dinner</option></select></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="text" name="menuprice"></td>
		</tr>
		<tr>
		<td></td>
			<td><input type="submit" name="submit" value="Insert Item"><button><a href="adminhome.php">Return</a></button></td>
		</tr>
	</table>
</form>

</div>
</body>
</html>
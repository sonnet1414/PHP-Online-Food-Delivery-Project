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
$name=$_POST['bookingname'];
$email=$_POST['bookingemail'];
$time=$_POST['bookigtime'];
$tableno=$_POST['bookingtableno'];
$available="select 1 from booking where bookingtime='$time' and bookingtableno='$tableno'";
$result=0;
$result=mysqli_query($conn,$available);
$result=mysqli_num_rows($result);
if ($result==0) {
	$sql = "INSERT INTO booking (bookingname,bookingeamil,bookingtime,bookingtableno) VALUES ('$name','$email','$time','$tableno')";
    if(mysqli_query($conn, $sql)){
	$successmsg="SUCCESSFUL.BOOKING CONFIRM";
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
if($result==1)
{
	$successmsg="SORRY. Already Booked";
}
// Close connection
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>stuff</title>
	<link rel="stylesheet" href="booking.css">
	<script>
    function validateform() {
    var name = document.forms["bookingform"]["bookingname"].value;
    var email = document.forms["bookingform"]["bookingemail"].value;
    var timeslot = document.forms["bookingform"]["bookigtime"].value;
    var tableno = document.forms["bookingform"]["bookingtableno"].value;
    if (name == "" || name == null ||email == "" || email == null ||timeslot == "" || timeslot == null ||tableno == "" || tableno == 0) {
        alert("All Fields must be filled out");
        return false;
    }
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
    }
   }
</script>
</head>
<body>
<?php include('headerfooter.php');?>

<div style="margin-top: 100px;"></div>
<div class="successmessage"><?php if(!empty($successmsg)){echo $successmsg;}?></div>

<div class="bookingtab">
	<form name="bookingform" method="post" action="booking.php" onsubmit="return validateform()" >
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="bookingname"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="bookingemail"></td>
		</tr>
		<tr>
		    <td>Time/Slot</td>
			<td><select name="bookigtime"><option></option><option>breakfast</option><option>lunch</option><option>dinner</option></select></td>
		</tr>
		<tr>
			<td>Table No</td>
			<td><select name="bookingtableno"><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
		</tr>
		<tr>
		    <td></td>
			<td><input type="submit" name="submit" value="Booking"></td>
		</tr>
	</table>
</form>
</div>

</body>
</html>
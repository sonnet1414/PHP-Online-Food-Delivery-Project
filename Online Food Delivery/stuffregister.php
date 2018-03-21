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
$name=$_POST['name'];
$designation=$_POST['designation'];
$salary=$_POST['salary'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$address=$_POST['address'];
$available="select 1 from stuff where name='$name' and designation='$designation' and salary='$salary'and gender='$gender'and age='$age'and address='$address'";
$result=0;
$result=mysqli_query($conn,$available);
$result=mysqli_num_rows($result);
if ($result==0) {
	$sql = "INSERT INTO stuff (name,designation,salary,gender,age,address) VALUES ('$name','$designation','$salary','$gender','$age','$address')";
    if(mysqli_query($conn, $sql)){
	$successmsg="SUCCESSFUL.ADD CONFIRM";
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
if($result==1)
{
	$successmsg="SORRY. Already Exists";
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
    var name = document.forms["stuffform"]["name"].value;
    var designation = document.forms["stuffform"]["designation"].value;
    var salary = document.forms["stuffform"]["salary"].value;
    var gender = document.forms["stuffform"]["gender"].value;
    var age = document.forms["stuffform"]["age"].value;
    var address = document.forms["stuffform"]["address"].value;

    if (name == "" || name == null ||designation == "" || designation == null ||salary == "" || salary == null ||gender == "" || gender == 0|| age == "" || age == null || address == "" || address == null) {
        alert("All Fields must be filled out");
        return false;
    }
    
   }
</script>
</head>
<body>
<?php include('headerfooter.php');?>

<div class="successmessage"><?php if(!empty($successmsg)){echo $successmsg;}?></div>

<div class="bookingtab">
	<form name="stuffform" method="post" action="stuffregister.php" onsubmit="return validateform()" >
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
		    <td>Designation</td>
			<td><select name="designation"><option></option><option>admin</option><option>stuff</option></select></td>
		</tr>
		<tr>
			<td>Salary</td>
			<td><input type="text" name="salary"></td>
		</tr>
		
		<tr>
			<td>gender</td>
			<td><select name="gender"><option></option><option>male</option><option>female</option></select></td>
		</tr>
		<tr>
			<td>Age</td>
			<td><input type="text" name="age"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
		    <td></td>
			<td><input type="submit" name="submit" value="Add stuff"><button><a href="adminhome.php">Return</a></button></td>
		</tr>
	</table>
</form>
</div>
<?php include('stufflist.php');?>
</body>
</html>
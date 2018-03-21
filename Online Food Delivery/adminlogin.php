
<?php
if (isset($_POST['login_btn'])) {
  session_start();
//connect to database
$db=mysqli_connect("localhost","root","","rmbsdatabase");
if(isset($_POST['login_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
    $sql="SELECT * FROM admintable WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:adminhome.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combination incorrect";
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register , login and logout user php mysql</title>
  <link rel="stylesheet" type="text/css" href="adminlogin.css"/>
</head>
<body>
<div class="header">
    <h1>Admin Login Page</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<div class="logintable">
  <form method="post" action="adminlogin.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" class="Log In" value="Login"></td>
     </tr>
 
</table>
</form>
</div>

</body>
</html>
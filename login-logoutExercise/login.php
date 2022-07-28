<?php
error_reporting(0);
include('connect.php');
session_start();
?>
<form method="post">
    <label for="text">Username</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password</label>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="sub" value="submit"></input>
</form>
<!-- // php code for form submission -->
<?php
if(isset($_POST['sub']))
{
    $user=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM STUDENT WHERE username='$user' && password='$password'";
    $data=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($data);
if($rows==1)
{
    echo "Login Ok";
    $_SESSION['user_name']=$user;
    $_SESSION['pass_word']=$password;
    header('location:home.php');
}
else
{
    echo "Login failed";
}
}
?>
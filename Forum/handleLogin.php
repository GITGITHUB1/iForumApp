<?php
error_reporting(0);
if(isset($_POST['sub']))
{ 
  include('db_connect.php');
  $user_email=$_POST['emailLogin'];
  $user_pass=$_POST['passwordLogin'];
  $query="SELECT * FROM users WHERE user_email='$user_email'";
  $result=mysqli_query($conn,$query);
  $rows=mysqli_num_rows($result);  
  if($rows==1)
  {
    while($row=mysqli_fetch_assoc($result))
    {
      if(password_verify($user_pass,$row['user_pass']))
      {
        session_start();
        $_SESSION['user']=$user_email;
        $_SESSION['sno']=$row['sno'];
        header('location:index.php?loginsuccess=true');
        exit();
      }
      else
      {
      header('location:index.php?loginnotsuccess=true'); 
      exit();
      }
    }  
  }
  else
  {
  header('location:index.php?issueloginsuccess=true'); 
  exit();
  }
}
?>


   



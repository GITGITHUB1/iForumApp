<?php
// error_reporting(0);

if(isset($_POST['sub']))
{ 
  include('db_connect.php');
  $emailSignup=$_POST['emailSignup'];
  $passwordSignup=$_POST['passwordSignup'];
  $cpasswordSignup=$_POST['cpasswordSignup'];
  $subject="Thanks For Signing up to our website";
  $body="Hi, This email is sent from iForum, You can now login to our website and can participate in various discussions and share your experience. ";
  $headers="From:iforumwebsite12@gmail.com";
  $exist=false;
  //code to check existence
  $sql="SELECT * FROM `users` WHERE user_email='$emailSignup'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_num_rows($res);  
  if($rows>1)
  {
    $exist=true;
  }
  //Password code(outer if)
  if(($passwordSignup==$cpasswordSignup))
  {
    //inner if(username repetion check)
    if($exist==false)
    {
      $hash=password_hash($passwordSignup,PASSWORD_DEFAULT);
      $query="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$emailSignup','$hash',current_timestamp())";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        if (mail($emailSignup, $subject, $body, $headers)) {
          echo "Email successfully sent to $emailSignup...";
        } else {
          echo "Email sending failed...";
        }
        header('location:index.php?signupsuccess=true');
        exit();
      }
      else
      {
        header('location:index.php?signupsuccess=false');
        exit();
      }
    }
    else
    {
      header('location:index.php?usernotsuccess=true');
      exit();
    }
  }
  else
  {
    header('location:index.php?passnotsuccess=true');
    exit();
  }
}

?>
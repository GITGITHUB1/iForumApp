<?php
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script>
      let elem1=document.getElementById('nav3');
      elem1.classList.add(' active');
    </script>
  </head>
  <body>
    <?php
    require 'nav.php';
    ?>
    <!-- //php code -->
<?php

if(isset($_POST['sub']))
{ 
  include('connect1.php');
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $exist=false;

  //code to check existence
  $sql="SELECT * FROM USERS1 WHERE username='$username'";
  $res=mysqli_query($conn,$query);
  $rows=mysqli_num_rows($res);  
  if($rows>1)
  {
    $exist=true;
  }
  //Password code(outer if)
  if(($password==$cpassword))
  {
    //inner if(username repetion check)
    if($exist==false)
    {
      $hash=password_hash($password,PASSWORD_DEFAULT);
      $query="INSERT INTO `users1` (`username`, `password`, `date/time`) VALUES ('$username', '$hash',current_timestamp());";
      $result=mysqli_query($conn,$query);
      if($result)
      {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>You have signed up Successfully, You can Login now.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>'; 
      }
     else
     {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error! </strong>UserName Entered already exists.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
     }
    }
  }
  else
  {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>Please confirm your password again!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
}
?>



    <!-- //form started -->
    <div class="container">
        <h1 class="text-center text-success my-3">Signup to our website</h1><hr>
        <div id="main" style="display: flex;justify-content: center;">

            <form class="my-3" method="post">
              <div class="form-group row">
                <label for="name" class="col-form-label-lg col-md-2">Username</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="name" name="username" aria-describedby="emailHelp" placeholder="Enter username">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label-lg">Password</label>
                <input type="password" class="form-control" id="password" name="password"placeholder="Password">
              </div>
              <div class="form-group">
                <label for="cpassword" class="col-form-label-lg"> Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
              </div>
              
              <button type="submit" class="btn btn-primary btn-block" name="sub">Submit</button>
            </form>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


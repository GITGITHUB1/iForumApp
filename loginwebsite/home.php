<?php
session_start();
$user_name=$_SESSION['user'];
if($user_name)
{
    
}
else{
    header('location:login.php');
}    
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
    <style>
      <style>
/* unvisited link */
     a:link {
  color: green;
        }

/* visited link */
a:visited {
  color: green;
}

/* mouse over link */
a:hover {
  color:slateblue;
  text-decoration:none;
}

    </style>
    <script>
      let elem1=document.getElementById('nav1');
      elem1.classList.add(' active');
    </script>
  </head>
  <body>
  <?php
    require 'nav.php';
    ?>
  <div class="container">
    <div class="alert alert-success my-3" role="alert">
     <h4 class="alert-heading"><?php echo "WELCOME ".$_SESSION['user']; ?></h4>
     <p><h2>Hey! How are you doing? Welcome to iProtect. You are logged in as <?php echo $_SESSION['user'];?></h2></p>
     <hr>
     <p class="mb-0"><h4>Whenever you need to, be sure to logout <a href="logout.php">using this link</a></h4></p>
    </div>
  </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
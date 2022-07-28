<?php
echo "Hello there";
$cookie_name="user";
$cookie_value="Code With Harry";
setcookie($cookie_name,$cookie_value,time()+(86400),"/");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
   if(!isset($_COOKIE[$cookie_name]))
   {
       echo "It is not set";
    }
    else
    {
       echo "<br> <h1>$_COOKIE[$cookie_name]</h1>";

   }
  ?>
</body>
</html>
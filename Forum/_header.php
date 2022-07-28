<html>

<head>
 
</head>

<body>
    
    <?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          //php code to bring categories from categories table
          include'db_connect.php';
          $sql="SELECT category_name,category_id FROM `categories` LIMIT 6";
          $result=mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result))
          {
            $cat_id=$row[category_id];
            $cat_name=$row[category_name];
            echo'<li><a class="dropdown-item" href="threadList.php?catid='.$cat_id.'">'.$cat_name.'</a></li>';
          
          }
          echo'</ul>
          </li>
      </ul>
      <form class="d-flex" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" name="subsearch" id="sub" type="submit">Search</button>
      </form>';
    if(isset($_SESSION['user']))
    {
      echo '<span style="color:white;margin:7px;">Welcome '.$_SESSION['user'].'</span>
      <a href="logout.php" class="btn btn-outline-success">Logout</a>';
    }
    else
    {
      echo '
      <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
    }
echo 
'</div>
</div>
</nav>';
include'loginModal.php';
include'signupModal.php';
$signupsuccess=$_GET['signupsuccess'];
$passnotsuccess=$_GET['passnotsuccess'];
$usernotsuccess=$_GET['usernotsuccess'];
// $loginsuccess=$_GET['loginsuccess'];
$loginnotsuccess=$_GET['loginnotsuccess'];
$issueloginsuccess=$_GET['issueloginsuccess'];
if($signupsuccess)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: auto;">
    <strong>Success!</strong> You are signed in successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
elseif($usernotsuccess)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
    <strong>Error!</strong> Entered Username already exits.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
elseif ($passnotsuccess) 
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
    <strong>Error!</strong> Confirm your password again!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
// // For login
// elseif ($loginsuccess) {
//   echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: auto;">
//     <strong>Success!</strong> You have logged in successfully
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }
elseif ($loginnotsuccess){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
  <strong>Error!</strong> Recheck your password again!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
elseif($issueloginsuccess)
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
    <strong>Error!</strong> Try Signup first
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
</body>

</html>
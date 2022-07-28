<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iForum</title>
</head>
<!-- //php code -->
<?php
error_reporting(0);
include'db_connect.php';
$tid=$_GET['tid'];
$uid=$_GET['uid'];
$sql="SELECT * FROM `threads` WHERE `thread_id`=$tid";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result))
{
 $ttitle=$row[thread_title];
 $tdesc=$row[thread_desc];
}
?>

<body>
    <?php include'_header.php'?>
    <!-- //Php code for inserting data into comments table -->
    <?php
        if(isset($_POST['commsub']))
        {
            $comm=$_POST['comm'];
            $comm=str_replace("<","&lt;",$comm);
            $comm=str_replace(">","&gt;",$comm);
            $sno=$_POST['sno'];
            $query="INSERT INTO `comments` (`comment_content`, `thread_id`,`comment_by`,`comment_time`) VALUES ('$comm','$tid','$sno', current_timestamp())";
            $res=mysqli_query($conn,$query);
            if($res)
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Comment Entered successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Comment not entered
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';  
            }
        }

         ?>
    <div class="container">
        <div class="jumbotron p-5 my-4" style="margin-bottom: 2rem;background-color: #e9ecef;border-radius: .3rem;">
            <h1 class="display-4"><?php echo $ttitle ?></h1>
            <p class="lead"><?php echo $tdesc ?>
            </p>
            <hr class="my-4">
            <p> <small>No Spam / Advertising / Self-promote in the forums.Do not post “offensive” posts, links or
                    images.
                    Remain respectful of other members at all time. Be DESCRIPTIVE and Don’t use “stupid” topic
                    names.</small></p>
            <p>Posted By <?php echo $uid?></p>
        </div>
    </div>

    <div class="container">
        <hr>
        <?php
         session_start();
         if(isset($_SESSION['user']))
         {
            echo '<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
            <h1>Post a Comment</h1>
            <div class="mb-3">
                <label for="comm" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comm" name="comm" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-success" name="commsub">Post Comment</button>
        </form>';
         }
        else
        {
           echo' <h1>Post a Comment</h1>
            <p class="lead">You are not logged in. If you want to write comments then do login</p>';
        }
        ?>
        <h1 class="my-2">Comments</h1>
        <!-- //php code to bring data from comments table -->
        <?php
        error_reporting(0);
        $sql1="SELECT * FROM `comments` WHERE `thread_id`=$tid";
        $result1=mysqli_query($conn, $sql1);
        $noResult=true;
        while($row1=mysqli_fetch_assoc($result1))
        {
          $noResult=false;
          $content=$row1[comment_content];
          $ctime=$row1[comment_time];
          $cby=$row1[comment_by];
          $sql2="SELECT user_email FROM `users` WHERE sno=$cby";
          $result2=mysqli_query($conn,$sql2);
          $row2=mysqli_fetch_assoc($result2);
        echo ' <div class="media my-3">
                <div class="media-body">
                    <img class="mr-3" src="images/user2.jpg" height="45px" alt="Generic placeholder image">
                    <h5 class="mt-0" style="display:inline-block;">By<u> '.$row2[user_email].'</u> at '.$ctime.'</h5>
                    <div class="my-1 px-5">'.$content.'</div>
                </div>
            </div>';
        }
        if($noResult)
        {
            echo'
            <div class="jumbotron p-5 my-4" style="background-color: #e9ecef;border-radius: .3rem;">
                <h1 class="display-4">No Comments Found</h1>
                <p class="lead">Be the first person to write a comment
                </p>
            </div>';
        }
        ?>
    </div>



    <?php include'_footer.php'?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
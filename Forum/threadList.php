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
<!-- //php code for fetching data to write in jumbotron-->
<?php
include'db_connect.php';
error_reporting(0);
$id=$_GET['catid'];
$sql="SELECT * FROM `categories` WHERE category_id=$id";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result))
{
 $catname=$row['category_name'];
 $catdesc=$row['description'];
}
?>

<?php include'_header.php'?>
<!-- //Php code for inserting data into threads table -->
<?php
        if(isset($_POST['formsub']))
        {
            $ptitle=$_POST['ptitle'];
            $pdesc=$_POST['pdesc'];
            $ptitle=str_replace("<","&lt;",$ptitle);
            $ptitle=str_replace(">","&gt;",$ptitle);

            $pdesc=str_replace("<","&lt;",$pdesc);
            $pdesc=str_replace(">","&gt;",$pdesc);
            
            $sno=$_POST['sno'];
            $query="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread _cid`, `thread_user_id`, `timestamp`) VALUES ('$ptitle','$pdesc','$id', '$sno', current_timestamp())";
            $res=mysqli_query($conn,$query);
            if($res)
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Entered problem successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Problem not entered
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';  
            }
        }

         ?>

<body>
    <div class="container">
        <div class="jumbotron p-5 my-4" style="background-color: #e9ecef;border-radius: .3rem;">
            <h1 class="display-4">Welcome to <?php echo $catname ?> forums</h1>
            <p class="lead"><?php echo $catdesc ?>
            </p>
            <hr class="my-4">
            <p> No Spam / Advertising / Self-promote in the forums.Do not post “offensive” posts, links or images.
                Remain respectful of other members at all time. Be DESCRIPTIVE and Don’t use “stupid” topic names.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <!-- //start a discussion -->
    <div class="container">
        <?php
        session_start();
        if(isset($_SESSION['user']))
        {
            echo'<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
            <h2>Start a Discussion</h2>
            <div class="mb-3">
                <label for="ptitle" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="ptitle" name="ptitle" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible</div>
            </div>
            <div class="mb-3">
                <label for="pdesc" class="form-label">Ellaborate Your Concern</label>
                <textarea class="form-control" id="pdesc" name="pdesc" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'"
            </div>
            <button type="submit" class="btn btn-success my-2" name="formsub">Submit</button>
        </form>';
        }
        else
        {
            echo'<h2>Start a Discussion</h2>
            <p class="lead">You are not logged in. If you want to start a discussion then do login</p>';  
        }
        
        ?>
        <hr>
        <h2>Browse Questions</h2>
        <!-- //php code to bring the threads table data -->
        <?php
        error_reporting(0);
        $id=$_GET['catid'];
        $sql1="SELECT * FROM `threads` WHERE `thread _cid` = $id";
        $result1=mysqli_query($conn, $sql1);
        $noResult=true;
        while($row1=mysqli_fetch_assoc($result1))
        {
          $noResult=false;
          $tid=$row1[thread_id];
          $ttitle=$row1[thread_title];
          $tdesc=$row1[thread_desc];
          $thread_user_id=$row1[thread_user_id];
          $sql2="SELECT user_email FROM `users` WHERE sno=$thread_user_id";
          $result2=mysqli_query($conn,$sql2);
          $row2=mysqli_fetch_assoc($result2);
        echo ' <div class="media my-3">
                <div class="media-body">
                    <div class="my-3"> <b><u>Asked by:</b> '.$row2[user_email].'</div>
                    <img class="mr-3" src="images/user2.jpg" height="45px" alt="Generic placeholder image">
                    <h5 class="mt-0" style="display:inline-block;"><a href="thread.php?tid='.$tid.'&uid='.$row2[user_email].'" class="text-success text-decoration-none">'.$ttitle.'</a></h5>
                    <div class="my-1 px-5">'.$tdesc.'</div>
                </div>
            </div><hr>';
        }
        if($noResult)
        {
            echo'
            <div class="jumbotron p-5 my-4" style="background-color: #e9ecef;border-radius: .3rem;">
                <h1 class="display-4">No Threads Found</h1>
                <p class="lead">Be the first person to ask a question
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
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

<body>
    <?php
     error_reporting(0);
    include'_header.php';
    $search=$_GET['search'];
    ?>

    <div class="container my-3">
        <h2 class="text-danger">Search results for "<em><?php echo  $search ?></em>"</h2>
        <hr>
        <?php 
            if(isset($_GET['subsearch']))
            {
                include'db_connect.php';
                $query=$_GET["search"];
                $sql="SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against('$query')";
                $result=mysqli_query($conn, $sql);
                $noresult=true;
                while($row=mysqli_fetch_assoc($result))
                {
                    $noresult=false;
                    $thread_title=$row[thread_title];
                    $thread_desc=$row[thread_desc];
                    $thread_id=$row[thread_id];
                    $ss="SELECT user_email FROM `users` WHERE sno=$thread_id";
                    $res=mysqli_query($conn, $ss);
                    $row1=mysqli_fetch_assoc($res);
                    echo '<div class="result">
                                <h4><a href="thread.php?tid='.$thread_id.'&uid='.$row1[user_email].'" style="text-decoration:none;color:black;">' .$thread_title. '</a></h4>
                                <p>'.$thread_desc.'</p>
                        </div>';
                    
                }
                if($noresult)
                {
                   echo' <div class="jumbotron p-5 my-4" style="background-color: #e9ecef;border-radius: .3rem;">
                        <h1 class="display-4">No Results Found</h1>
                        <p class="lead">Suggestions:
                        </p>
                        <hr class="my-4">
                        <p>
                        <ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different Keywords.</li>
                        <li>Try more general Keywords.</li>
                        </ul>
                        </p>
                   </div>';
                }
                
            }

    ?>
    </div>
    <!-- //container -->

    <!-- //adding footer -->
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
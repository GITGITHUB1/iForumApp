<?php
include 'connection.php';
$message=false;
if(isset($_POST['sub']))
{
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $query="INSERT INTO `todolist` (`title`, `description`, `tstamp`) VALUES ('$title','$desc', current_timestamp());";
  $res=mysqli_query($conn,$query);
  if($res)
    {
       $message=true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <title>TODOLIST!</title>
</head>

<body>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade edit" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="modalTitle" class="form-label">Title</label>
                            <input type="email" class="form-control" id="modalTitle">
                        </div>
                        <div class="mb-3">
                            <label for="modalDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="modalDescription" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar starts here... -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iShare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    if($message)
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Note entered successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Note not entered
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';  
    }
    ?>
    <!-- Notes -->
    <div class="container my-3">
        <h2>Add a Note to iShare</h2>
        <form method="post" action="<?php $_SERVER['REQUEST_URI']?>">
            <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div class="mb-3">
                    <label for="desc" class="form-label">Note Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" name="sub" class="btn btn-primary">Add Note</button>
        </form>
    </div>
    <!-- Table starts here -->
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * FROM `todolist`";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result))
            {
            $sno=$row['sno'];
            $title=$row['title'];
            $description=$row['description'];
            echo '<tr>
            <th scope="row">'.$sno.'</th>
            <td>'.$title.'</td>
            <td>'.$description.'</td>
            <td><button class="btn edit btn-primary btn-sm">Edit</button><button class="btn btn-danger mx-2 btn-sm">Delete</button></td>
            </tr>';
            }
            ?>
        </tbody>

    </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <!-- extracting modal buttons -->
    <script>
    let edits = document.getElementsByClassName('edit');
    for (let item of edits) {
        item.addEventListener('click', (e) => {
            let tr = e.target.parentNode.parentNode;
            let title = tr.getElementsByTagName('td')[0].innerText;
            let description = tr.getElementsByTagName('td')[1].innerText;
            console.log(title, description);
            let modalTitle=document.getElementById('modalTitle');
            let modalDescription=document.getElementById('modalDescription');
            modalTitle.value=title;
            modalDescription.value=description;
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {
                keyboard: false
            })
            myModal.toggle();
        })
    }
    </script>
</body>

</html>
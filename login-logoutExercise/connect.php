<?php
$conn=mysqli_connect("localhost","root","","database");
if($conn)
{
    echo "Connection Established";
}
else
{
    echo "Connection not established";
 }
?>
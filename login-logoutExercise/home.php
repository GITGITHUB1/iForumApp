<?php
session_start();
error_reporting(0);
$user_name=$_SESSION['user_name'];
if($user_name)
{
    
}
else{
    header('location:logout.php');
}    
echo "WELCOME $user_name";
?>
<p align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sit harum explicabo, vero quo alias ea ullam inventore nemo. Dolorum minima quidem, numquam blanditiis cumque suscipit sunt praesentium unde architecto, vel in delectus sed consequuntur, quod odio assumenda eum beatae eius? Alias ratione fuga debitis temporibus omnis quod distinctio sequi. Mollitia quibusdam soluta reprehenderit ducimus modi libero unde. Voluptates corporis illum rem sapiente esse possimus rerum commodi quasi, reiciendis quibusdam earum veniam similique nisi ratione amet libero et asperiores dolorem quos voluptate, ad dignissimos debitis voluptatum at! Recusandae, harum quia?</p>
<br><br>
<p align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sit harum explicabo, vero quo alias ea ullam inventore nemo. Dolorum minima quidem, numquam blanditiis cumque suscipit sunt praesentium unde architecto, vel in delectus sed consequuntur, quod odio assumenda eum beatae eius? Alias ratione fuga debitis temporibus omnis quod distinctio sequi. Mollitia quibusdam soluta reprehenderit ducimus modi libero unde. Voluptates corporis illum rem sapiente esse possimus rerum commodi quasi, reiciendis quibusdam earum veniam similique nisi ratione amet libero et asperiores dolorem quos voluptate, ad dignissimos debitis voluptatum at! Recusandae, harum quia?</p>

<a href="logout.php">Click here to LOGOUT</a>


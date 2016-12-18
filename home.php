<?php
    session_start();

?>


<html>
 <head>
<title>HOME</title>
<link rel="stylesheet" type="text/css" href="new2.css"/>
 </head>
<h1>.COOP.</h1>
<div><a href="logout.php">LOGOUT</a></div>
 <?php   
   if (isset($_SESSION['message'])){
       echo "<div id='error_msg'>".$_SESSION['message']."</div>";
       unset($_SESSION['message']);
     
   } 
 ?>   
    
 </body>   
</html>
<?php
   session_start();
   $db = mysqli_connect("localhost", "root", "gumede", "authentication");
   if(isset($_POST["login_btn"])){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    
    if (mysqli_num_rows($result) == 1){
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header("location: index.html");
        
    }else{
         $_SESSION['message'] = "Username/password combination incorrect";
    }
   } 

?>



<html>
 <head>
<title>LOGIN</title>
<link rel="stylesheet" type="text/css" href="special.css"/>
 </head>
 <body>
 <h1>.COOP.</h1>
  <?php   
   if (isset($_SESSION['message'])){
       echo "<div id='error_msg'>".$_SESSION['message']."</div>";
       unset($_SESSION['message']);
     
   } 
 ?> 
 <form method="post"action="login.php">
  <table>   
    <tr>
        <td>Username:</td>
        <td><input type="text"name="username" class="textInput"></td>
    </tr>
   
   <tr>
        <td>Passsword:</td>
        <td><input type="password"name="password" class="textInput"></td>
    </tr>
   
   <tr>
        <td></td>
        <td class="secondary"><input type="submit"name="login_btn" value=".ENTER COOP."></td>
    </tr>
   
   
   </table>  
   </form>   
 </body>   
</html>
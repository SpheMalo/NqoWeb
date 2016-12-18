<?php
   session_start();
   $db = mysqli_connect("localhost", "root", "gumede", "authentication");
   if(isset($_POST["register_btn"])){
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    
    if($password == $password2){
       //create user
       $password = md5($password); //hash pasword before storing for security purposes
       $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
       mysqli_query($db, $sql);
       $_SESSION['message'] = "You are now logged in";
       $_SESSION['username'] = $username;
       header("location: index.html");
       
      }else{ 
          $_SESSION['message'] = "The two passwords do not match";
      }
    
   }

?>



<html>
 <head>
<title>REGISTER</title>
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
 <form method="post"action="register.php">
  <table>   
    <tr>
        <td>Username:</td>
        <td><input type="text"name="username" class="textInput"></td>
    </tr>
   <tr>
        <td>Email:</td>
        <td><input type="email"name="email" class="textInput"></td>
    </tr>
   <tr>
        <td>Passsword:</td>
        <td><input type="password"name="password" class="textInput"></td>
    </tr>
   <tr>
        <td>Confirm Password:</td>
        <td><input type="password"name="password2" class="textInput"></td>
    </tr>
   <tr>
        <td></td>
        <td class="secondary"><input type="submit"name="register_btn" value=".JOIN COOP."></td>
    </tr>
   
    
    
    
   </table>  
   </form>   
 </body>   
</html>
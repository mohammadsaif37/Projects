<?php 
 require('connection.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h2>Saifi Webs..</h2>
        <nav>
            <a href="#">Home</a>
            <a href="#">Vlog</a>
            <a href="#">Contact</a>
        </nav>
        <?php
              if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== true)
              {
                echo"
                <div class='user'>
                  $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
                </div>
                ";
              }
              else
              {
                echo"
                <div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\">Login</button>
                <button type='button' onclick=\"popup('register-popup')\">Register</button>
            </div>
                ";
              }
        ?>
       
    </header>

   

    <div class="popup-container"id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">x</button>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username">
                <input type="password" placeholder="password" name="password">
                <button type="submit" class="login-btn" name="login">LOGIN</button>

            </form>
        </div>
    </div>

    <div class="popup-container"id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">x</button>
                </h2>
                <input type="text" placeholder="Full Name" name="fullname">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="password" name="password">
                <button type="submit" class="register-btn" name="register">REGISTER</button>

            </form>
        </div>
    </div>


    <?php
     if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== true)
     {
       echo"<h1 style='text-align:center; margin-top: 200px;'> WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
     }
    ?>


    
    <script>
        function popup(popup_name)
        {
          get_popup=document.getElementById(popup_name);
          if(get_popup.style.display=="flex")
          {
            get_popup.style.display="none" ;
          }
          else
          {
            get_popup.style.display="flex"
          }

         }
    </script>
</body>
</html>
<?php

require('connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


  function sendMail($email,$v_code)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try 
    {
      //Server settings
     
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = '********@gmail.com';                     //SMTP username<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      $mail->Password   = '********';                               //SMTP password<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('************@gmail.com', 'Saifi Webs..');       #<<<<<<<<<<<<<<<<<<<<<<<<<<<
      $mail->addAddress($email);     //Add a recipient
      
     
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email Verification from Saifi Webs..';
      $mail->Body    = "Thanks for registration!
        Click the link below to verify the email address
        <a href='http://localhost/log_regs/verify.php?email=$email&v_code=$v_code'>Verify</a>";
    
  
      $mail->send();
      return true;
   } 
     catch (Exception $e) 
     {
      return false;
     }
  }

#for login
if(isset($_POST['login']))
{
    $query="SELECT * FROM `registered_user` WHERE`email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($con,$query);

    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
        $result_fetch=mysqli_fetch_assoc($result);
        if($result_fetch['is_verified']==1)
        {
          if(password_verify($_POST['password'],$result_fetch['password']))
          {
            $_SESSION['logged_in']=true;
            $_SESSION['username']=$result_fetch['username'];
            header("location: index.php");
          }
          else
          {
            echo"
           <script>
            alert('Incorrect password');
            window.location.href='index.php';
           </script>
            ";
          }

        }
        else
        {
          echo"
        <script>
          alert('Email not verified');
          window.location.href='index.php';
        </script>
      ";
        }
      }
      else
      {
        echo"
        <script>
          alert('Email or username not registered');
          window.location.href='index.php';
        </script>
      ";
      }
    }
    else
    {
        echo"
        <script>
          alert('cannot run Query');
          window.location.href='index.php';
        </script>
      ";
    }
}

# for registration
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_user` WHERE`username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0) #it will be exicuted if username or email is already taken
        {

            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username'])

            {
                // error forusername already registered
                echo"
                 <script>
                  alert('$result_fetch[username] - Username already taken');
                  window.location.href='index.php';
                 </script>
                ";
        
            }
            else
            {
                // error for email already registered
                echo"
                 <script>
                    alert('$result_fetch[email] - E-mail already registered');
                    window.location.href='index.php';
                 </script>
               ";

            }
        }
        else #it will be exicuted if no one has taken username or email before
        {
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $v_code= bin2hex(random_bytes(16));
    
            $query="INSERT INTO `registered_user`(`full_name`, `username`, `email`, `password`,`verification_code`,`is_verified`)
             VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0')";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
            {
                #if data inserted succesfully
                echo"
                  <script>
                    alert('Registration Successful');
                    window.location.href='index.php';
                  </script>
                ";

            }
            else 
            {
                // if data cannot be inserted
                echo"
                  <script>
                    alert('Server Down');
                    window.location.href='index.php';
                  </script>
                ";

            }

        }
    }
    else
    {
        echo"
         <script>
          alert('cannot run Query');
          window.location.href='index.php';
         </script>
        ";

    }
}
?>
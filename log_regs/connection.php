<?php

  $con=mysqli_connect("localhost","root","","testing"); #data base name tasting

  if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database');</script>";
    exit();
  }
?>
<?php
  include('connect.php');
  if(isset($_POST['loginsubmit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if($email==''){
          $msg = "email is required";
          header('Location:../login.php?errmsg='+$msg);
      }
      if($password==''){
          $msg = "password is required";
          header('Location:../login.php?errmsg='+$msg);
      }  
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($result);
    if($row==2){
        $data = mysqli_fetch_assoc($result);

        header('Location:../home.php');
    }else{
        header('Location:../login.php?errmsg=email and password does not match');
    }


  }

?>
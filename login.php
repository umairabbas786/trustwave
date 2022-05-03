<?php 
ob_start();
session_start();
require_once "include/db.php";
 ?>
 <?php

include "include/function.php";
function getWeekday($date) {
    return date('w', strtotime($date));
}


$weekday =  getWeekday(date("Y-m-d")); // returns 4 
if($weekday<6){
    $sql = "SELECT * FROM user_wallet WHERE date < DATE_SUB(NOW(),INTERVAL 1 DAY)";
    $r  = $conn->query($sql);
    $count=mysqli_num_rows($r);
    if($count >=1){
     while($row = mysqli_fetch_assoc($r)){
        $id = $row['user_id'];
        $plan = getuser_details("plan",$id);  
        $price = $row['price'];
           if($price!="0"){
             $percentage = ceil((4/$price) * 100);
            $earnquery = "UPDATE user_wallet SET earn = earn + $percentage , price = price + $percentage ,total_deposit = total_deposit + $percentage date=now() WHERE user_id='$id'";
            $conn->query($earnquery);  
             
           }
          
     }
    }

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Log In / Trustwave.com</title>
    <link rel="shortcut icon" href="styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles/assets/css/style.css">
    <script src="styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
    <script src="styles/assets/libs/modernizr/modernizr.js"></script>
    <script src="styles/assets/js/common.js"></script>
    <script src="gcode.js"></script>
</head>

<body>

    

    

    <div id="preloader" class="loader">
        <div class='sk-three-bounce'>
            <div class='sk-bounce-1 sk-child'></div>
            <div class='sk-bounce-2 sk-child'></div>
            <div class='sk-bounce-3 sk-child'></div>
        </div>
    </div>
    <div id="pjax-container">
        <div id="block-content">
            <section class="section section-auth bagblack textsite titlesite">
                <div class="container bagblack textsite titlesite">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="b--shadow b--auth">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="b--auth__left">
                                            <div class="text-center">
                                                <a href="index.html" class="logo" data-pjax="">
                                                    <img src="styles/assets/img/logo.png" alt="Golden" style="width: 180px;">
                                                </a>
                                            </div>
                                            <div class="b--shadow__title-bordered">
                                                <div class="title-bordered__wrapper">
                                                    <div class="title-bordered">LOG IN</div>
                                                </div>
                                            </div>

                     <?php 
if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM user WHERE email = '$email'";// here is check user email right or not
  $result = $conn->query($sql);
  $count = mysqli_num_rows($result);
  if ($count>=1) {
   while ($row = mysqli_fetch_assoc($result)) {

    $hash = $row['password'];
    $email_veification = $row['email_verification'];
if ($password != $hash){
     
      echo "<div class='alertnoti alert-warning bg-warning'>Please Enter Correct password</div>";

    }else if ($email_veification=="0") {
      echo "<div class='alertnoti alert-warning bg-warning'>Please Verifiy Email</div>";
        
    }
    else{
         $_SESSION['email'] = $email;
          
     header("Location:panel/");
    }
  } 
  }else{
    echo "<div class='alertnoti alert-warning'>Please Enter Correct Information</div>";
  }
  
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    $_SESSION['msg'] = NULL;
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM user WHERE token = '$token'";
    $r = $conn->query($sql);
    $count = mysqli_num_rows($r);
    if($count>=1){
        $sql2 = "UPDATE user SET email_verification='1' WHERE token ='$token'";
        $conn->query($sql2);
        echo "<div class='alertnoti alert-warning bg-warning'>Your Email has successfully Verified</div>";
    }else{
        header("Location: login.php");
    }
}

?>     

                    <form method='post' action=" " >
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name='email' class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Your Password *</label>
                            <input type="password"  name='password' class="form-control">
                        </div>

                       

                        <div class="form-group">
                            <span class="help-block text-right text-primary pr-1 mt-1">
                                <a href="forgot.php" data-pjax="">
                                    <strong class="text--underline">
                                        Forgot password?
                                    </strong>
                                </a>
                            </span>
                        </div>




                        <div class="form-group">
                            <button class="btn btn-warning btn-block" type="submit" name="signin">LOGIN</button>
                        </div>
                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
     
        <link rel="stylesheet" href="styles/assets/libs/bootstrap/fileinput.min.css">
        <script src="styles/assets/libs/bootstrap/bootstrap.min.js"></script>
        <script src="styles/assets/libs/bootstrap/fileinput.min.js"></script>
    </div>
</body>
</html>

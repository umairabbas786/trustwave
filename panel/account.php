<?php 
ob_start();
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    // code...
}else{
    header("Location:../login.php");
}
require_once '../include/db.php';
include "include/function.php";
$id = getid($_SESSION['email']);
?>
<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8">
	<title>TrustWave.com Building your future with digital assests</title>
	<link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="../styles/assets/css/style.css">
	<link rel="stylesheet" href="../styles/assets/css/helper.css">
	<script src="../styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
	<script src="../styles/assets/libs/modernizr/modernizr.js"></script>
	<script src="../styles/assets/js/common.js"></script>
</head>

<body>
	
<?php include "include/nav.php"; ?>
<section class="content bagblack">
    <div class="container">
        <style>
            th,
            td {
                padding: 4px;
                font-size: 13px;
            }

        </style>
<?php include "include/welcome.php"; ?>


      <?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $email = $_POST['email']; 
    $re_password = $_POST['re_password'];
    $password = $_POST['password'];
    if (empty($password)) {
        $password = getuser_details('password',$id);
$re_password = $password;
    }
   
   

    $transaction = $_POST['c_transaction'];
    $n_transaction = $_POST['n_transaction'];
    $r_transaction = $_POST['re_transaction'];
    if (empty($transaction)) {
       $transaction = getuser_details("transaction_code",$id);
       $n_transaction = $transaction;
       $r_transaction = $transaction;
   }
    $address = $_POST['address'];
    $error = ['username'=>"",'email'=>"",'password'=>"",'re_password'=>"",
'transaction'=>"",'n_transaction'=>"",'re_transaction'=>""];
   if (empty($username)) {
       $error['username'] = "Please Enter Username";
   }
   if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error['email'] = "PLease Enter Valid Email";
   }
   if (strlen($password)<8) {
       $error['password'] = "Please Enter password Greater than 8 character";
   }
   if ($re_password!=$password || empty($re_password)) {
       $error['re_password'] = "Confirm Password not Match";
   }
//   if ($transaction!=getuser_details("transaction_code",$id)) {
//       $error['transaction'] = "Transaction is not Correct";
//   }
//   if (strlen($n_transaction)<8) {
//       $error['n_transaction'] = "Please Enter Transaction code Greater than 8 character";
//   }
//     if ($r_transaction!=$transaction || empty($r_transaction)) {
//       $error['re_transaction'] = "Confirm Transaction Code not Match";
//   }
foreach ($error as $key => $value) {
     if (empty($value)) {
         unset($error[$key]);
     }
}
if (empty($error)) {
    $sql =  "UPDATE user SET username='$username',email='$email',password='$password',transaction_code='$n_transaction',coin_address='$address' WHERE id='$id'";
    $r = $conn->query($sql);
    if($r){
        echo "Account Has Updated Successfully";
    }else{
        echo $conn->error;
    }
}
}

       ?>  

        <form action="" method=post  name=editform>


                        




            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card member-card" style="min-height: 499px;border-radius: 0.55rem 0.55rem .25rem .25rem;">
                        <div class="headeraccount l-pink" style="background: #7FA9D1 !important">
                            <h4 class="m-t-10"><?php echo getuser_details("username",$id); ?></h4>
                        </div>
                        <div class="member-img">
                            <img src="../styles/assets/user2.png" class="rounded-circle" alt="profile-image">
                        </div>
                        <div class="body">
                            <div class="col-12">
                                <p class="text-muted">Registration: <?php echo getuser_details("date",$id); ?> </p>
                                <p class="text-muted" style="font-size: 16px"><?php echo $_SESSION['email']; ?></p>
								                                <br> <a href="?a=security"><i class="fa fa-lock m-r-10"></i> <span>Two Factor Authentication</span></a>
								                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card" style="min-height: 499px;">
                        <div class="headeraccount">
                            <h2><strong>Personal</strong> Details</h2>
                        </div>
                        <div class="body">
                            <table cellspacing=0 cellpadding=2 border=0 style="width: 100%">
                                <tr>
                                    <td>Full Name:</td>
                                    <td>
                                        <input type=text name=username value='<?php echo getuser_details("username",$id); ?>' class="editboxz calculate-amount form-controlamount">
                                        <small class="text-danger"><?php echo isset($error['username'])?$error['username']:" "; ?></small>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td>
                                        <input type=text name=email value='<?php echo getuser_details("email",$id); ?>' class="editboxz calculate-amount form-controlamount">
                                         <small class="text-danger"><?php echo isset($error['email'])?$error['email']:" "; ?></small>
                                                                        </tr>
                                <tr>
                                    <td>New Password:</td>
                                    <td>
                                        <input type=password name=password  class="editboxz calculate-amount form-controlamount">
                                         <small class="text-danger"><?php echo isset($error['password'])?$error['password']:" "; ?></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Retype Password:</td>
                                    <td>
                                        <input type=password name=re_password value="" class="editboxz calculate-amount form-controlamount">
                                         <small class="text-danger"><?php echo isset($error['re_password'])?$error['re_password']:" "; ?></small>
                                    </td>
                                </tr>


                                
                                <!--                                                                                                <tr>-->
                                <!--    <td>Current Transaction Code:</td>-->
                                <!--    <td><input type=password name=c_transaction  class="editboxz calculate-amount form-controlamount" size=30>-->
                                <!--        <small class="text-danger"><?php echo isset($error['transaction'])?$error['transaction']:" "; ?></small></td>-->
                                     
                                <!--</tr>-->
                                <!--                                                                <tr>-->
                                <!--    <td>New Transaction Code:</td>-->
                                <!--    <td><input type=password name=n_transaction value="" class="editboxz calculate-amount form-controlamount" >-->
                                <!--     <small class="text-danger"><?php echo isset($error['n_transaction'])?$error['n_transaction']:" "; ?></small></td>-->
                                <!--</tr>-->
                                <!--<tr>-->
                                <!--    <td>Retype Transaction Code:</td>-->
                                <!--    <td><input type=password name=re_transaction class="editboxz calculate-amount form-controlamount" size=30>-->
                                <!--     <small class="text-danger"><?php echo isset($error['re_transaction'])?$error['re_transaction']:" "; ?></small></td>-->
                                <!--</tr>-->
                                
                                                                                                                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card" style="min-height: 499px;">
                        <div class="headeraccount">
                            <h2><strong>Payment</strong> Details</h2>
                        </div>
                        <div class="body">
                            <table cellspacing=0 cellpadding=2 border=0 style="width: 100%">
                                                                <tr>
                                    <td>
                                        <img src="../styles/assets/pay2/69.png" style="width: 25px !important; float: left; margin: -2px 15px 0px 0px">TRC20:</td>
                                    <td>
                                        <input type=text class="editboxz calculate-amount form-controlamount" name="address" data-validate="regexp" data-validate-regexp="^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$" data-validate-notice="Litecoin Address" value="<?php echo getuser_details("coin_address",$id); ?>">                                    </td>
                                </tr>
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="col text-center">
                <button class="btn btn-primary btn-round btn-simple float-right m-l-10 btn-warning waves-effect" name="submit">Save Changes</button>
            </div>
            <div style="clear: both"></div>
        </form>
        <br>
        <br>
    </div>
</section> <?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>
<script>
    addClass(document.getElementById('js-sidebar-settings'), 'menu__link--active');

</script>
</div>

</body>

</html>

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
 $address = getuser_details("coin_address",$id);
if(empty($address)){
header("Location:withdraw.php");
}
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
  $price1 = $_POST['price'];
  $balance = getpayment("price",$id);
  $price = (3*$price1)/ 100;
  $price = $price1 + $price;
  $address = getuser_details("coin_address",$id);
  if ($price < $balance && $price<"10") {
      $msg = "Please Enter Valid Price";
  }else{
$sql  = "INSERT INTO withdraw (user_id,price,wallet,status,date) VALUES ('$id','$price1','$address','0',now())";
if ($conn->query($sql)) {
  $withdraw_id  = $conn->insert_id;
   $sql2 = "UPDATE user_wallet SET price=price-$price,total_withdraw=total_withdraw+$price WHERE user_id='$id'";
   if ($conn->query($sql2)) {
            
             $balance = getpayment('price',$id);
            addtransaction($id,"Withdraw",$price,"0",$balance,'0',$withdraw_id);
            $success =  "<p class='text-success'>Price is sending to your given wallet Please wait 1 to 24 hours</p>";
        }else{
            echo $conn->error;
        }
}
  }
}

       ?>  

        <form action="" method=post  name=editform>


                        




            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card" style="min-height:250px">
                            <div class="headeraccount">
                                <h2><strong>Quick </strong> Info</h2>
                            </div>
                            <div class="body">
                                <table class="table table-hover m-b-0">
                                    <tbody>
                                        <tr>
                                            <td>Min withdrawal - Crypto</td>
                                            <th>$70</th>
                                        </tr>
                                        <tr>
                                            <td>Min withdrawal - USD</td>
                                            <th>$70</th>
                                        </tr>
                                        <tr>
                                            <td>Withdrawal time</td>
                                            <th>3 hours to 24 hours</th>
                                        </tr>
                                        <tr>
                                            <td>Pending Withdrawals</td>
                                            <th>$<?php echo getpendingwithdraw($id); ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card" style="min-height: 250px;">
                        <div class="headeraccount">
                            <h2><strong>Balance:</strong>$<?php echo getpayment("price",$id); ?></h2>
                        </div>
                        <?php echo isset($success)?$success:" "; ?>
                        <div class="body">
                            <table cellspacing=099 cellpadding=2 border=0 style="width: 100%">
                                <tr>
                                    <td>Price:</td>
                                    <td>
                                        <input type=number name=price  class="editboxz calculate-amount form-controlamount" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" min="70">
                                        <small class="text-danger"><?php echo isset($msg)?$msg:" "; ?></small>
                                </tr>
                                
                                
                                                                                                                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card" style="min-height: 250px;">
                        <div class="headeraccount">
                            <h2><strong>Payment</strong> Details</h2>
                        </div>
                        <div class="body">
                            <table cellspacing=0 cellpadding=2 border=0 style="width: 100%">
                                                                <tr>
                                    <td>
                                        <img src="../styles/assets/pay2/69.png" style="width: 25px !important; float: left; margin: -2px 15px 0px 0px"> Wallet : <?php echo getuser_details("coin_address",$id); ?></td>
                                    <td>
                                                                            </td>
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

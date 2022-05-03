<?php 
ob_start();
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    // code...
}else{
    header("Location:../login.php");
}
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

    <style>
        .input-group-addon {
            background-color: transparent;
            border: 1px solid #535e69;
            border-radius: 30px;
            color: #555;
            width: initial;
        }


        .fixpadding {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }

    </style>

    <div class="container">
 <?php include"include/welcome.php"; ?>


   
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card" style="margin-top: 30px">
                    <div class="body block-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <h3>Withdraw is close on saturday and sunday.</h3>
                                
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
 </div>
        




        <div id="withdrawfd" class="col-lg-12" style="padding-right: 0px;padding-left: 0px;">


            <form method=post><input type="hidden" name="form_id" value="16410561272506"><input type="hidden" name="form_token" value="1830fa2bd20edc142bfcb32573fa8e98">
                <input type=hidden name=a value=withdraw>
                <input type=hidden name=action value=preview>
                <input type=hidden name=say value="">
                <!-- withdraw design start -->
                <div class="row clearfix">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="headeraccount">
                                <h2>Withdraw <strong>Funds</strong></h2>
                            </div>
                            <div class="body">
                                <h2 class="card-inside-title">Payment processor</h2>


                                                                You have no funds to withdraw.
                                
                            </div>
                        </div>
                        <div class="card">
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
                                            <th>30min</th>
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
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card">
                            <div class="headeraccount">
                                <h2><strong>Available</strong> Balance</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="m-b-0">$<?php 
                                        echo getpayment('price',$id); ?></h2>
                                        <p>Account balance</p>
                                    </div>
                                </div>
                                <div class="table-responsive">


                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Processor</th>
                                                <th>Available</th>
                                                <th>Wallet</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                                                                <tbody>
                                            <tr>
                                                <td style="max-width: 30px">
                                                    <img src="../styles/assets/pay2/69.png" style="width: 20px;min-width: 15px">
                                                </td>
                                                <td>Ethereum</td>

                                                <td class="text-left"><span>$<?php 
                                        echo getpayment('price',$id); ?></span>

                                                </td>
                                                <?php $address = getuser_details("coin_address",$id);
if(empty($address)){
    ?>
    <td><a href="account.php"><i>No Set</i></a>                                                </td>
    <?php
}else{
    ?>
    <td><a href="cash.php"><i><?php echo $address; ?></i></a>                                                </td>
    <?php
}
                                                 ?>
                                                
                                                <td style="width: 20px"></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        

    </div>
</section> <?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets//libs/bootstrap/bootstrap.min.js"></script>
<script src="../styles/assets//libs/bootstrap/fileinput.min.js"></script>

<script>
    document.write("<script type='text/javascript' src='../styles/assets/js/data.js?v=" + Date.now() + "'><\/script>");

</script>


<script>
    addClass(document.getElementById('js-sidebar-withdraw'), 'menu__link--active');

</script>

<script>
    if ($('#main-msj').length) {
        /* it exists */
        addClass(document.getElementById('withdrawfd'), 'fixpadding');
    } else {
        /* it doesn't exist */
    }

</script>


</div>
</body>

</html>

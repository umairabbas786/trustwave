<?php
session_start();
ob_start();
require_once '../include/db.php';
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    
}else{
    header("Location:login.php");
 }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard" />
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>TrustWave -  Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <!-- Summernote -->
    <link href="vendor/summernote/summernote.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

<?php  include 'include/nav.php';?>
        <?php include 'include/sidebar.php'; ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">In Add Funds</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Funds</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Funds</h4>
                            </div>

                            <div class="card-body">
                                <div class="summernote"></div>
                                <?php 
         include"../panel/include/function.php";
         if(isset($_GET['id'])){
               $user_id = $_GET['id'];
         echo "<p>User Fund is :$" .getpayment('price',$user_id) . "</p> "; 

         if(isset($_POST['send_price'])){

           $price = $_POST['price'];
           $user_id = $_GET['id'];
           // $transection_id = mt_rand(100000000,9999999999);
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO deposit (user_id,price,plan,coin,status,date) VALUES ('$user_id','$price','Admin Add','Ethereum','1',now())";
    $sql2 = "UPDATE user_wallet SET price=price+$price,total_deposit=total_deposit+$price WHERE user_id='$user_id'";
    $conn->query($sql2);
           if($conn->query($sql)){
            $balance = getpayment("price",$user_id);
            addtransaction($user_id,"Deposit","0",$price,$balance);
               echo "<p class='text-success'>Fund are Successfully Add in user account </p>";
           }else{
               echo $conn->error;
           }
                    
             
         }
         }else{
             echo "Please Put Right Url";
         }
         ?>     

                <form action='' method='POST'>
                    <div class='form-group'>
                        <lable for='Price'>Price</lable>
                    
                   <input type='number' name='price' class='form-control' placeholder='Please Enter Price' min='1'>
</div>

                    <input type='submit' value='Send price' class='btn btn-outline-primary btn-block' name='send_price'>
                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">TrustWave</a><?php echo date("Y"); ?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Summernote -->
    <script src="vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="js/plugins-init/summernote-init.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
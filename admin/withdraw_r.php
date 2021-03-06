<?php 
session_start();
ob_start();
require_once '../include/db.php';
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    
}else{
    header("Location:login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
  
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>TrustWave -  Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
  <link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
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
                            <h4>Hi, welcome back In!</h4>
                            <p class="mb-0">Withdraw</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Withdraw</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Withdraw Requests</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                           
                                            <th>Sender</th>
                                            <th>Price</th>
                                            <th>Wallet</th>
                                            <th>Date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
$sql="SELECT * FROM withdraw WHERE status='0' ORDER BY  id DESC";
$show=$conn->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($show)) {
    $id = $row['id'];
    $user_id = $row['user_id'];
    $price = $row['price'];
    $wallet = $row['wallet'];
    $date = $row['date'];
    
    ?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo getemail($user_id); ?></td>
                                            <td>$<?php echo $price;?></td>    
                                            <td><?php echo $wallet; ?></td>
                                            <td><?php echo date("j F Y",strtotime($date)); ?></td> 
                                             
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="withdraw_r.php?wr_approve=<?php echo$id; ?>">Approve</a>
                                                            <a class="dropdown-item" href="withdraw_r.php?wr_disapprove=<?php echo$id; ?>&price=<?php echo$price; ?>&user=<?php echo$user_id; ?>">Disapprove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
<?php
$i++;
}
                        ?>
                        <?php
                        ////////////************deposite request approve ************////////////
                       
                     if (isset($_GET['wr_approve'])) {
    $Approve=$_GET['wr_approve'];
    $mysqli="UPDATE  withdraw SET status='1' WHERE id='$Approve'";
    $mysql = "UPDATE transaction SET status='1' WHERE approve_id='$Approve'";
$conn->query($mysql);
    if ($conn->query($mysqli)){
             
                                        
        header("Location:withdraw_r.php");
    }
} 

///////////////////////////*************** deposite request approve end ***********///////////////



////////////////////////////*********** deposite request disapprove code*********////////////

    if (isset($_GET['wr_disapprove'])&& isset($_GET['price'])) {
     $delete=$_GET['wr_disapprove'];
     $price = $_GET['price'];
     $user_id = $_GET['user'];
    $mysqli="DELETE FROM withdraw WHERE id='$delete'";
    $mysqli2="UPDATE user_wallet SET price=price+$price,total_withdraw=total_withdraw-$price WHERE user_id='$user_id'";
    $mysql = "UPDATE transaction SET status='2' WHERE approve_id='$delete'";
    $conn->query($mysqli);
    $conn->query($mysql);
    if ($conn->query($mysqli2)){
      
    header("Location:withdraw_r.php");
      
    
    }
   
}     
////////////////////////////*********** deposite request disapprove code end*********////////////


                   ?>
    



                                        </tbody>
                                    </table>
                                </div>
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
                <p>Copyright ?? Designed &amp; Developed by <a href="#" target="_blank">Trustwave</a> <?php echo date("Y"); ?></p>
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
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
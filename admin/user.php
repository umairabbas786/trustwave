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
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>TrustWave -   Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--for images zoom-->
    <link type="text/css" rel="stylesheet" href="magiczoomplus/magiczoomplus.css"/>
<script type="text/javascript" src="magiczoomplus/magiczoomplus.js"></script>

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
                            <p class="mb-0">User Section</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Transaction code</th>                  
                                            <th>Balance</th>
                                            <th>Trc20 Address</th>                    
                                             <th>Referrals</th> 
                                             <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
$sql="SELECT * FROM user";
$show=$conn->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($show)) {
    $id=$row['id'];
    $username=$row['username'];
    $email=$row['email'];  
    $password=$row['password']; 
    $transaction=$row['transaction_code'];
    $address=$row['coin_address'];
    $date = $row['date'];
    
    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>  
                                            <td><?php  echo $password;?></td>
                                            <td><?php echo $transaction ?></td>
                                            <!--/////////here is code of total balance of user-->
                                            <td class="font-weight-bold">$
                                                 <?php 
                    
                     $sql1="SELECT * FROM user_wallet WHERE user_id='$id'";
$result=$conn->query($sql1);
                    
while ($row=mysqli_fetch_assoc($result)) {
    $price=$row['price'];
    echo $price;
}
                    
                       ?>
                                            <td><?php echo $address; ?></td>
                                            
                                              
                                          
                                            <td>
                                 
                                                <?php
                                                
    $q="SELECT * FROM user WHERE referral='$id'";
$r=$conn->query($q);
$count=mysqli_num_rows($r);
echo $count;                                         
                                                ?>
                                            </td>
                                             <td><?php echo date("j F Y",strtotime($date));?></td>
                                              
                                            
                                          
                                             <td></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="add_funds.php?id=<?php echo$id;?>">Add Funds</a>
                                                            <a class="dropdown-item" href="remove_funds.php?id=<?php echo$id; ?>">Remove Funds</a>
                                                            <a class="dropdown-item" href="user.php?ur_disapprove=<?php echo $id;?>" onclick="return confirm('Are you sure?')">Delete User</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
<?php
$i++;
}
                        ?>
                       

    <?php
                                       
                if (isset($_GET['ur_disapprove'])) {
     $delete=$_GET['ur_disapprove'];
      $sql="SELECT * FROM user WHERE id='$delete'";
        $useremail = $conn->query($sql);
        while($row = mysqli_fetch_assoc($useremail)){
            $email = $row['email'];
             
            $q= "DELETE FROM kyc WHERE email='$email';
            DELETE FROM withdraw WHERE email='$email';
             DELETE FROM deposit WHERE email='$email';
             DELETE FROM transection WHERE email='$email';
             DELETE FROM card WHERE email='$email';
            DELETE FROM user WHERE id='$delete'";
             if($conn->multi_query($q)){
                 
                  header("Location:user.php");
             }
             
            
    
    }
}                    ?>
                       
                        
    



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
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">TrustWave</a> <?php echo date("Y"); ?></p>
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
<?php 

session_start();
ob_start();
require_once "../include/db.php";
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
    <title>Trustwave -  Tranasaction </title>
    <!-- Favicon icon -->
	<link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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

        <?php include "include/nav.php"; ?>
		
		
<?php include 'include/sidebar.php'; ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="form-head d-flex align-items-center flex-wrap mb-sm-5 mb-3">
					<h2 class="font-w600 mb-0 text-black"> History</h2>
					
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive table-hover fs-14">
							<table class="table display mb-4 dataTablesCard short-one card-table text-black" >
								<thead>
									<tr>
										<th>
											<div class="checkbox mr-0 align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="checkAll" required="">
													<label class="custom-control-label" for="checkAll"></label>
												</div>
											</div>
										</th>
										<th>#</th>
										<th>ID</th>
										<th>Type</th>
										<th>Debit</th>
										
										<th>Credit</th>
										<th>Balance</th>
										
									</tr>
								</thead>
								<tbody>
									
									
						
									
									
							<?php 

$sql="SELECT * FROM transaction  ORDER BY  id DESC";
$show=$conn->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($show)) {
    $user_id = $row['user_id'];
    $type = $row['type'];
    $credit  = $row['credit'];
    $debit = $row['debit'];
    $balance = $row['balance'];
   
    ?>		
									
								
									<tr>
										<td class="pr-0">
											<span class="bg-success ic-icon">
												<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M16.7529 14.1563L3.5703 0.973665C3.00891 0.412277 2.09876 0.412277 1.53737 0.973665C0.975979 1.53505 0.975979 2.44521 1.53737 3.0066L14.72 16.1892L11.2913 16.1809L11.2912 16.1809C10.4973 16.179 9.85225 16.8211 9.85035 17.615C9.84842 18.4091 10.4907 19.054 11.2844 19.056L11.2856 18.556L11.2844 19.056L18.1954 19.0727L18.2028 19.0727L18.2051 19.0726C18.9947 19.0692 19.6329 18.4284 19.6363 17.6414L19.6363 17.6391L19.6363 17.6317L19.6196 10.7207L19.6196 10.7207C19.6177 9.92683 18.9727 9.28473 18.1787 9.28661C17.3847 9.28849 16.7427 9.9336 16.7446 10.7275L16.7446 10.7275L16.7529 14.1563Z" fill="white" stroke="white"/>
												</svg>
											</span>
										</td>
										<td><?php echo $i; ?></td>
										
										<td><?php  echo getemail($user_id); ?></td>
										<td>
											<?php echo $type; ?>
										</td>
										
										<td>
											<span class="text-black font-w700">$<?php echo $debit; ?></span>
										</td>
										<td>
											<span class="text-black font-w700">$<?php echo $credit; ?></span>
										</td>
										<td>
											<span class="text-black font-w700">$<?php echo $balance; ?></span>
										</td>
										
									</tr>
									<?php
$i++;
								}

									?>
								</tbody>
							</table>
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


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>	
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="js/plugins-init/datatables.init.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>
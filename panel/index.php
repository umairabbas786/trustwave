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
  $referral = getuser_details("referral_code",$id);
 $url = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8">
	<title>Dashboard  TrustWave.com</title>
	<link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="../styles/assets/css/style.css">
	<link rel="stylesheet" href="../styles/assets/css/account.css">
	<script src="../styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
	<script src="../styles/assets/libs/modernizr/modernizr.js"></script>
	<script src="../styles/assets/js/common.js"></script>
</head>

<body>
	<?php include "include/nav.php"; ?>
			<?php  include 'include/welcome.php';?>
	<?php
if (isset($_GET['status']) AND isset($_SESSION['price'])) {
	 $price = $_SESSION['price']; 
    $plan = $_SESSION['plan'];
    $id = getid($_SESSION['email']);
    $sql = "INSERT INTO deposit (user_id,price,plan,coin,status,date) VALUES ('$id','$price','$plan','Trc20','0',now())";
    if ($conn->query($sql)) {
    	// $sql2 = "UPDATE user_wallet SET price=price+$price,total_deposit=total_deposit+$price WHERE user_id='$id';UPDATE user SET plan = '$plan' WHERE id='$id'";
    	// if ($conn->multi_query($sql2)) {
    		
    		 $balance = getpayment('price',$id);
    		addtransaction($id,"Deposit","0",$price,$balance,"1"," ");
    		echo "<p class='text-primary'>Price will add after 3 hours</p>";
    		$_SESSION['price'] = NULL;
    		$_SESSION['plan'] = NULL;
    	// }
    }else{
    		echo $conn->error;
    	}
}else{
	$_SESSION['price'] = NULL;
	$_SESSION['plan'] = NULL;

}
	   
   

	 ?>

															
		            										<div class="row clearfix">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="card info-box-2">
								<div class="body" style="padding: 10px;">
									<div class="icon">
										<img src="../styles/assets/img/purse.png" class="accico">
									</div>
									<div class="content">
										<div class="text">EARNED TOTAL</div>
										<div class="number">$<?php 
										echo getpayment('earn',$id); ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="card info-box-2">
								<div class="body" style="padding: 10px;">
									<div class="icon">
										<img src="../styles/assets/img/briefcase.png" class="accico">
									</div>
									<div class="content">
										<div class="text">TOTAL DEPOSITS</div>
										<div class="number">$<?php 
										echo getpayment('total_deposit',$id); ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="card info-box-2">
								<div class="body" style="padding: 10px;">
									<div class="icon">
										<img src="../styles/assets/img/notes.png" class="accico">
									</div>
									<div class="content">
										<div class="text">ACTIVE DEPOSIT</div>
										<div class="number">$<?php 
										echo getpayment('price',$id); ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="card info-box-2">
								<div class="body" style="padding: 10px;">
									<div class="icon">
										<img src="../styles/assets/img/bitcoin.png" class="accico">
									</div>
									<div class="content">
										<div class="text">TOTAL WITHDRAW</div>
										<div class="number">$<?php 
										echo getpayment('total_withdraw',$id); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="col-xl-12 col-lg-12 col-md-12" style="padding: 0px">
								<div class="card">
									<div class="headeraccount">
										<h2><strong>Financial</strong> Statistics</h2>
									</div>
									<div class="body">
										<div class="row">
											<div class="col-md-7">
												<h2 class="m-b-0">$<?php echo getpayment("price",$id); ?></h2>
												<p>Account balance</p>
											</div>
											<div class="col-md-5 hidden-xs">
												<div class="sparkline m-b-20" data-type="bar" data-width="100%" data-height="50px" data-bar-width="4" data-bar-spacing="5" data-bar-color="#f6b827">
													<canvas width="58" height="50" style="display: inline-block; width: 58px; height: 50px; vertical-align: top;"></canvas>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table class="tabletwo table-hover m-b-0">
												<tbody>
													<tr>
														<th>
															<img src="../styles/assets/pay2/18.png" style="width: 20px">
														</th>
														<td>PerfectMoney</td>
														<td class="text-right"><span id="pay18">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/43.png" style="width: 20px">
														</th>
														<td>Payeer</td>
														<td class="text-right"><span id="pay43">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/48.png" style="width: 20px">
														</th>
														<td>Bitcoin</td>
														<td class="text-right"><span id="pay48">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/68.png" style="width: 20px">
														</th>
														<td>Litecoin</td>
														<td class="text-right"><span id="pay68">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/79.png" style="width: 20px">
														</th>
														<td>Dogecoin</td>
														<td class="text-right"><span id="pay79">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/69.png" style="width: 20px">
														</th>
														<td>Ethereum</td>
														<td class="text-right"><span id="pay69">$0.00</span>
														</td>
													</tr>
													<tr>
														<th>
															<img src="../styles/assets/pay2/77.png" style="width: 20px">
														</th>
														<td>Bitcoin Cash</td>
														<td class="text-right"><span id="pay77">$0.00</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12" style="padding: 0px">
								<a href="referral.php">
									<button class="btn btn-primary btn-simple btn-round btn-warning waves-effect" style="width: 100%;margin-top: -5px;">Promotional materials</button>
									<br>
									<br>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="col-xl-12 col-lg-12 col-md-12" style="padding: 0px">
								<div class="card">
									<div class="headeraccount">
										<h2><strong>Quick </strong> Info</h2>
									</div>
									<div class="body">
										<div class="hide-sm">
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Minimum Deposit
												<br><b>$50</b>
											</div>
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Minimum Withdrawal for Crypto
												<br><b>$70</b>
											</div>
											
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Withdrawal Time
												<br><b>After 3 hours to 24 hours</b>
											</div>
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Deposits in Cryptocurrencies visible
												<br><b>After 3 Blockchain confirmations</b>
											</div>
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Deposits in USD (Ethereum, ETH)
												<br><b>Adding automatically</b>
											</div>
											<div style="border-bottom: 1px solid #26323B; padding: 10px 20px">Referral Commission
												<br><b>15%-10%-5%-3%</b>
											</div>
										</div>
										<table class="tabletwo table-hover m-b-0 hide-xs">
											<tbody>
												<tr>
													<td>Minimum Deposit</td>
													<th>$50</th>
												</tr>
												<tr>
													<td>Minimum Withdrawal for Crypto</td>
													<th>$70</th>
												</tr>
												<tr>
													<td>Minimum Withdrawal for USD</td>
													<th>$70</th>
												</tr>
												<tr>
													<td>Withdrawal Time</td>
													<th>3 hours to 24 hours</th>
												</tr>
												<tr>
													<td>Deposits in Cryptocurrencies visible</td>
													<th>After 3 Blockchain Confirmations</th>
												</tr>
												<tr>
													<td>Deposits in USD (Payeer, PM)</td>
													<th>Adding automatically</th>
												</tr>
												<tr>
													<td>Referral Commission</td>
													<th>15%-10%-5%-3%</th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12" style="padding: 0px">
								<div class="card overflowhidden weather2">
									<div class="body city-selected l-khaki">
										<div class="row">
											<div class="col-12">
												<div class="city">Your referral url</div>
												<div class="col-md-6" style="padding-left: 0px;padding-top: 10px;color: #7FA9D1;">
													<div class="night" style="font-size: 16px"><?php  echo $url; ?>/register.php?referral=<?php echo $referral; ?></div>
												</div>
												<div class="col-md-6 text-right" style="padding-right: 0px;">
													<button class="btn btn-warning js-copy" data-text="<?php  echo $url; ?>/register.php?referral=<?php echo $referral; ?>">COPY LINK</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php include "include/footer.php"; ?>
		</div>
		
		<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
		<script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>
		<script>
			addClass(document.getElementById('js-sidebar-cabinet'), 'menu__link--active');
		</script>
		<script>
        document.write("<script type='text/javascript' src='../styles/assets/js/data.js?v=" + Date.now() + "'><\/script>");
        
        </script>
        
      
      
	</div>
	
</body>

</html>
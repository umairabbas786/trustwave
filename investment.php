
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Investment / "TrustWave"</title>
	<link rel="shortcut icon" href="styles/assets/img/favicon/favicon.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="styles/assets/css/style.css">
	<script src="styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
	<script src="styles/assets/libs/modernizr/modernizr.js"></script>
	<script src="styles/assets/js/common.js"></script>
	<link rel="stylesheet" href="styles/assets/css/invest.css">
	<script src="styles/assets/js/calculator.js"></script>
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
		<div id="block-content" class="">
			<header class="header-clean">
				<div class="header__decors">
					<div class="decor"></div>
					<div class="decor"></div>
					<div class="decor"></div>
					<div class="decor"></div>
					<div class="decor"></div>
					<div class="decor"></div>
					<div class="decor"></div>
				</div>
				<div class="container">
					<div class="row">
						<?php  include "include/nav.php";?>
						<div class="col-lg-12">
							<div class="header__content">
								<h1 class="header__h1">
                                    Investment                                </h1>
								<h2 class="header__h2">
                                    We offer the ideas that raise your investment above the expected income.                                </h2>
							</div>
						</div>
					</div>
				</div>
			</header>
			<section class="section textsite titlesite">
				<div class="container">
					<div class="row">
						<div class="col-md-12 section__title">
							<h2 class="section__h2">
                    About our investment offer
                </h2>
							<h3 class="section__h3">
                    We suggest you to take part in this highly profitable online investment plan.
                </h3>
						</div>
						<div class="col-md-12">
							<p class="section__text">As part of the program to expand staff and staff, increase the investment portfolio and modernize technical capacities (professional equipment including marine and continental dredges, metal detectors, industrial instruments, industrial equipment, and localizers are used in the work), this online platform was created. This is the main and only instrument for attracting investments from individuals. Our investment activity is regulated at the legislative level and is accompanied by guarantees of timely payments to investors and partners.</p>
							<br>
							<p class="section__text">We suggest you to take part in this highly profitable online investment plan. It is our strategy to let the investor know that when they use "TrustWave" investment plans, they will be assured of having the highest level of support by our professional support team and get the highest secured return on their investments through highly qualified capital management.</p>
							<p class="section__text"> </p>
							<section class="inv-plans bg-iv-plan textsite titlesite">
								<div class="container">
									<div class="col-md-12 section__title">
										<h2 class="section__h2">
                    Income Plans
                </h2>
										<h3 class="section__h3">
                     
                </h3>
									</div>
									<div class="row">
										<div class="col-sm-4  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
											<div class="plans">
												<div class="plan_details text-center">
													<div class="plan_title">Investment Plan</div>
													<div class="percentage">7% TO 15%</div>
													<p class="profit_duration">MONTHLY PROFIT</p>
													<ul class="list-items">
														<li class="list-item"> </li>
														<li class="list-item">Minimum Investment $100</li>
										                <li class="list-item"> </li>
													</ul>
													<div class="plans_btn"> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
											<div class="plans cyne">
												<div class="plan_details text-center">
													<div class="plan_title">Referral Program</div>
													<div class="percentage">4 Levels <br>-<br>
													Referral <br>-<br> commissoin </div>
													<p class="profit_duration"> </p>15%-10%-5%-3%
													<ul class="list-items">
														<li class="list-item"> </li>
														<li class="list-item"> </li>
										                <li class="list-item"> </li>
													</ul> 
												</div>
											</div>
										</div>
										<div class="col-sm-4  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
											<div class="plans magenta">
												<div class="plan_details text-center">
													<div class="plan_title"> Rewards </div>
													<div class="percentage">Bonus<br>-<br>Insentive <br>-<br>
													on  <br>-<br>Target <br><br>   </div>
													<p class="profit_duration"> </p> 
													<ul class="list-items">
														<li class="list-item"> </li>
														<li class="list-item"> </li>
										                <li class="list-item"> </li>
													</ul> 
												</div>
											</div>
										</div>
									</div>
									<br>
									<br>
									
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</section>
						</div>
					</div>
				</div>
			</section>
   <?php include "include/footer.php"; ?>
		</div>
		
		<link rel="stylesheet" href="styles/assets/libs/bootstrap/fileinput.min.css">
		<script src="styles/assets/libs/bootstrap/bootstrap.min.js"></script>
		<script src="styles/assets/libs/bootstrap/fileinput.min.js"></script>
		<script>
			$(function(){ 
			                                            $("#p-1-tabs .icontext").click(function(e){
			                                                e.preventDefault();
			                                                $(this).tab('show');
			                                            });
			                                            $("#p-1-tabs .icontext").on('shown.bs.tab', function (e) {
			                                                $("#p-1-tabs .icontext").removeClass("active");
			                                                $(e.target).addClass("active");
			                                            });
			                                        });
		</script>
		<script>
			addClass(document.getElementById('js-menu-investment'), 'menu__link--active');
			    
			    function calculate(target) {
			        var percent = parseFloat(target.getAttribute('js-percent')), 
			            days = parseInt(target.getAttribute('js-days')),
			            amount = parseFloat(target.value),
			            daily = amount / 100 * percent,
			            weekly = amount / 100 * percent * 7,
			            mounthly = amount / 100 * percent * 31,
			            total = amount / 100 * percent * days,
			            dailyDom = document.getElementById(target.getAttribute('js-daily')),
			            weeklyDom = document.getElementById(target.getAttribute('js-weekly')),
			            totalDom = document.getElementById(target.getAttribute('js-total')),
			            mounthlyDom = document.getElementById(target.getAttribute('js-mounthly'));
			
			        dailyDom.innerText = isNaN(daily) ? 0.00 : parseFloat(daily.toFixed(8));
			        weeklyDom.innerText = isNaN(weekly) ? 0.00 : parseFloat(weekly.toFixed(8));
			        
			        if (totalDom !== null) {
			            totalDom.innerText = isNaN(total) ? 0.00 : parseFloat(total.toFixed(8));
			        }
			        if (mounthlyDom !== null) {
			            mounthlyDom.innerText = isNaN(mounthly) ? 0.00 : parseFloat(mounthly.toFixed(8));
			        }
			    }
		</script>
	</div>
</body>


<!-- Mirrored from TrustWave.com/?a=cust&page=investment by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 20:36:27 GMT -->
</html>
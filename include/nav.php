<?php

include "include/function.php";
function getWeekday($date) {
    return date('w', strtotime($date));
}


$weekday =  getWeekday(date("Y-m-d")); // returns 4 
if($weekday<6){
	include"include/db.php";
	$sql = "SELECT * FROM user_wallet WHERE date < DATE_SUB(NOW(),INTERVAL 1 DAY)";
	$r  = $conn->query($sql);
	$count=mysqli_num_rows($r);
	if($count >=1){
	 while($row = mysqli_fetch_assoc($r)){
	 	$id = $row['user_id'];
        $plan = getuser_details("plan",$id);  
        $price = $row['price'];
           if($price!="0"){
           	 $percentage = ceil((4*$price) / 100);
            $earnquery = "UPDATE user_wallet SET earn = earn + $percentage , price = price + $percentage ,total_deposit = total_deposit + $percentage date=now() WHERE user_id='$id'";
            $conn->query($earnquery);  
           	 
           }
          
	 }
	}

}
 ?>
<div class="col-md-12">
							<div class="topline header__topline">
	<a href="index.php" class="logo topline__logo" width="100" data-pjax>
		<img src="styles/assets/img/logo.png" alt="Golden" style="width: 180px;">
	</a>
	<nav class="menu topline__menu header__menu" id="js-menu"> <a href="index.php" class="menu__link" id="js-menu-home" data-pjax>
                                        Home
                                    </a>
		<a href="about.php" class="menu__link" id="js-menu-about" data-pjax>
                                        About us
                                    </a>
		<a href="investment.php" class="menu__link" id="js-menu-investment" data-pjax>
                                        Investment
                                    </a>
		<a href="partner.php" class="menu__link" id="js-menu-partners" data-pjax>
                                        Partners
                                    </a>
		<a href="contact.php" class="menu__link" id="js-menu-contact" data-pjax>
                                        Contact us
                                    </a>
                                    	<!-- <a href=""  target="_blank" class="menu__link" id="js-menu-contact" data-pjax>
                                        Presentation
                                    </a> -->
		<span class="dropdown menu__link">
                                            <span class="dropdown-toggle" data-toggle="dropdown">
                                                <img src="styles/assets/default/images/flags/en.svg" 
                                                     style="width: 20px;">
                                            </span>
		<ul class="dropdown-menu">
			<li>
				<a href="#" data-pjax>
					<img src="styles/assets/default/images/flags/en.svg" style="width: 20px;" class="mr-1">English</a>
			</li>
			<!--<li>-->
			<!--	<a href="#" data-pjax>-->
			<!--		<img src="styles/assets/default/images/flags/ru.svg" style="width: 20px;" class="mr-1">Русский</a>-->
			<!--</li>-->
		</ul>
		</span>
	
	</nav>
	<div class="topline__controls">
		<div class="header__login"> <a href="login.php" class="btn btn-warning" data-pjax>
                                             &nbsp; Login
                                        </a>
			<a href="register.php" class="btn btn-signup" data-pjax>
                                             &nbsp; Register
                                        </a>
			</div> <span class="burger header__burger" id="js-menu-burger">
                                        <i class="fa fa-bars"></i>
                                    </span>
	</div>
</div>
</div>
<?php 

function getemail($id){
	include "../include/db.php";
	$sql = "SELECT * FROM user WHERE id='$id'";
	$r = $conn->query($sql);
	$row = mysqli_fetch_assoc($r);
	return $row['email'];
}

?>
**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<div class="image-bx">
						<img src="images/Untitled-1.jpg" alt="">
						<a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> Admin</h5>
					<p class="email">admin@trustwave.com</p>
				</div>
				<ul class="metismenu" id="menu">
					<li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="index.php">Dashboard </a></li>
							
                            <!-- <li><a href="kyc.php">Kyc Details</a></li>
                            <li><a href="corporate.php">Corperate Details</a></li> -->
                            <li><a href="deposit_r.php">Deposit Details</a></li>
                            <li><a href="withdraw_r.php">Withdraw Requests</a></li>
							<li><a href="tranasactions.php">History</a></li>
							<li><a href="user.php">User</a></li>
							
						</ul>

                    </li>
					<!-- <li class="nav-label">Admin Works</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-077-menu-1"></i>
							<span class="nav-text">Admin Works</span>
						</a>
                        <ul aria-expanded="false">
                            
							<li><a href="notification.php">Notification send</a></li>
							<li><a href="text_send.php">Animated Text Send<span class="badge badge-xs badge-danger">New</span></a></li>
                            <li><a href="ticket.php">Ticket<span class="badge badge-xs badge-danger">New</span></a></li>
							
                                                    </ul>
                    </li> -->
					
                </ul>
				<div class="copyright">
					<p><strong>TrustWave  Admin Dashboard</strong> © <?php echo date('Y'); ?> All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by TrustWave</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************
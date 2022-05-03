<?php
function getusername($email){
    include "../include/db.php";
  $sql = "SELECT * FROM user WHERE email='$email'";
  $r = $conn->query($sql);
  $row = mysqli_fetch_assoc($r);
  return $row['username'];
}

?>
    <div id="preloader" class="loader">
        <div class='sk-three-bounce'>
            <div class='sk-bounce-1 sk-child'></div>
            <div class='sk-bounce-2 sk-child'></div>
            <div class='sk-bounce-3 sk-child'></div>
        </div>
    </div>
    <div id="pjax-container">
        <div id="block-content" class="page--cabinet">
            <header class="header-bull header--cabinet">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12"><div class="topline header__topline">
    <div class="topline__logo">
        <a href="/" class="logo" data-pjax>
            <img src="../styles/assets/img/logo.png" alt="Ethen" style="width: 180px;">
        </a>
    </div>
    <div class="topline__controls">
        <div class="dropdown topline__dropdown"> <a href="#" class="dropdown-toggle userdropdown topline__userdropdown" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <?php echo getusername($_SESSION['email']); ?>                                            <span class="caret userdropdown__caret"></span>
                                        </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li> <a href="index.php" data-pjax>
                                                    Dashboard
                                                </a>
                </li>
                <li> <a href="../contact.php" data-pjax>
                                                    Support
                                                </a>
                </li>
                <li> <a href="logout.php">
                                                    Log out
                                                </a>
                </li>
            </ul>
        </div> <span class="burger header__burger" id="js-menu-burger">
                                        <i class="fa fa-bars"></i>
                                    </span>
    </div>
</div>
<nav class="menu header__menu" id="js-menu"> <a href="index.php" class="menu__link" id="js-sidebar-cabinet" data-pjax>
                                    Dashboard
                                </a>
    <a href="deposit.php" class="menu__link" id="js-sidebar-invest" data-pjax>
                                    Add Deposit
                                </a>
    <a href="withdraw.php" class="menu__link" id="js-sidebar-withdraw" data-pjax>
                                    Withdraw
                                </a>
    <a href="deposit_list.php" class="menu__link" id="js-sidebar-deposits" data-pjax>
                                    Deposits
                                </a>
    <a href="history.php" class="menu__link" id="js-sidebar-history" data-pjax>
                                    History
                                </a>
    <a href="referral.php" class="menu__link" id="js-sidebar-partners" data-pjax>
                                    Partners
                                </a>
    <a href="account.php" class="menu__link" id="js-sidebar-settings" data-pjax>
                                    Settings
                                </a>
</nav>
</div>
                    </div>
                </div>
            </header>

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
	<title>TrustWave.com Building your future with digital assests</title>
	<link rel="shortcut icon" href="../styles/assets/img/favicon/favicon.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="../styles/assets/css/style.css">
	<link rel="stylesheet" href="../styles/assets/css/helper.css">
	<script src="../styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
	<script src="../styles/assets/libs/modernizr/modernizr.js"></script>
	<script src="../styles/assets/js/common.js"></script>
    <script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>

	    <script src="chat.js"></script>
    <script src="gcode.js"></script>
    
    <style>
            div.tab-frame input {
                display: none;
            }

            div.tab-frame label {
                display: block;
                float: left;
                padding: 5px 10px;
                cursor: pointer;
                margin: 20px;
                border-radius: 30px
            }

            div.tab-frame input:checked+label {
                background: #f6b827;
                color: #000;
                cursor: default
            }

            div.tab-frame div.tab {
                display: none;
                padding: 0px;
                clear: left
            }

            div.tab-frame input:nth-of-type(1):checked~.tab:nth-of-type(1),
            div.tab-frame input:nth-of-type(2):checked~.tab:nth-of-type(2),
            div.tab-frame input:nth-of-type(3):checked~.tab:nth-of-type(3),
            div.tab-frame input:nth-of-type(4):checked~.tab:nth-of-type(4) {
                display: block;
            }

            @media only screen and (min-width:991px) {
                .tabpad {
                    margin-left: 240px !important
                }
            }

            @media only screen and (min-width:1200px) {
                .tabpad {
                    margin-left: 330px !important
                }
            }

            @media only screen and (min-width:1366px) {
                .tabpad {
                    margin-left: 400px !important
                }
            }

            @media only screen and (min-width:1600px) {
                .tabpad {
                    margin-left: 500px !important
                }
            }


            .table {
                color: inherit;
            }

            .m-b-0 {
                margin-bottom: 0;
            }

            .table {
                width: 100%;
                color: #212529;
            }

            table {
                border-collapse: collapse;
            }

            .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(88, 88, 88, 0.05);
            }

            .weather2 .table tbody tr td {
                padding: 14px 20px;
            }

            .table tr td,
            .table tr th {
                vertical-align: middle;
                border-top: 1px solid #263238;
                white-space: nowrap;
            }

            .weather2 {
                color: #9e9e9e;
            }

            .overflowhidden {
                overflow: hidden;
            }

            .table tr td {
                vertical-align: middle !important;
                border-top: 1px solid #263238 !important;
                white-space: nowrap !important;
            }

        </style>
</head>

<body>
<?php include "include/nav.php"; ?>
<section class="content bagblack">
    <div class="container">
      <?php  include "include/welcome.php";  ?>
        <div class="row clearfix">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card overflowhidden weather2" style="min-height: 352.67px;">
                    <div class="body city-selected l-khaki">
                        <div class="row">
                            <div class="col-12">
                                <div class="city">Your referral url</div>
                                <div class="night" style="font-size: 13px;color: #7FA9D1;"><?php  echo $url; ?>/register.php?referral=<?php echo $referral; ?></div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped m-b-0" style="color: #9e9e9e;">
                        <tbody>
                            <tr>
                                <td>Your status</td>
                                <td class="font-medium">Client</td>
                            </tr>
                            <tr>
                                <td>Your upline</td>
                                <td class="font-medium"> <?php echo getusername($_SESSION['email']); ?></td>
                            </tr>
                            <tr>
                                <td>Referrals</td>
                                <td class="font-medium"><?php $sql = "SELECT * FROM user WHERE referral ='$id'";
$r =$conn->query($sql);
$count = mysqli_num_rows($r);
echo $count;
 ?></td>
                            </tr>
                            <tr>
                                <td>Active referrals</td>
                                <td class="font-medium">
                                    <?php $sql = "SELECT * FROM user WHERE referral ='$id'";
$r =$conn->query($sql);
$count = mysqli_num_rows($r);
echo $count;
 ?></td>
                            </tr>
                            <tr>
                                <td>Total commission</td>
                                <td class="font-medium">$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="card user-account" style="min-height: 352.67px;">
                    <div class="headeraccount">
                        <h2>Your <strong>Referrals</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <div class="alert alert-warning">You have earned $<?php echo get_payment("earn",$id); ?> from referrals so far!</div>
                            <br>Each participant of the program invites investors using their referral link.
                            <br>
                            <br><b>Your personal referral link: <?php  echo $url; ?>/register.php?referral=<?php echo $referral; ?></b>
                            <br>
                            <br>When opening an investment deposit by invited participant you get 5% of additional income from each deposit of invited participant.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">

                        <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card info-box-2" style="min-height: 326.33px;">
                    <div class="headeraccount">
                        <h2><strong>Referral</strong> Filter</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form method=post name=opts><input type="hidden" name="form_id" value="16410563163976"><input type="hidden" name="form_token" value="dbcb748c40c9c68b01cd2d0ee79a4ad1">
                                <input type=hidden name=a value=referals>
                                <div class="col-xl-6 col-lg-6 col-md-6" style="padding-right: 5px;padding-left: 0px;">
                                    <h2 class="card-inside-title" style="margin-top: 0px;">From</h2>
                                    <div class="btntwo-group bootstrap-select">
                                        <label class="select" style="width: 100%;padding-bottom: 3px;">
                                            <select name="month_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 selected>Jan</option>
                                                            <option value=2 >Feb</option>
                                                            <option value=3 >Mar</option>
                                                            <option value=4 >Apr</option>
                                                            <option value=5 >May</option>
                                                            <option value=6 >Jun</option>
                                                            <option value=7 >Jul</option>
                                                            <option value=8 >Aug</option>
                                                            <option value=9 >Sep</option>
                                                            <option value=10 >Oct</option>
                                                            <option value=11 >Nov</option>
                                                            <option value=12 >Dec</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="day_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 selected>1</option>
                                                            <option value=2 >2</option>
                                                            <option value=3 >3</option>
                                                            <option value=4 >4</option>
                                                            <option value=5 >5</option>
                                                            <option value=6 >6</option>
                                                            <option value=7 >7</option>
                                                            <option value=8 >8</option>
                                                            <option value=9 >9</option>
                                                            <option value=10 >10</option>
                                                            <option value=11 >11</option>
                                                            <option value=12 >12</option>
                                                            <option value=13 >13</option>
                                                            <option value=14 >14</option>
                                                            <option value=15 >15</option>
                                                            <option value=16 >16</option>
                                                            <option value=17 >17</option>
                                                            <option value=18 >18</option>
                                                            <option value=19 >19</option>
                                                            <option value=20 >20</option>
                                                            <option value=21 >21</option>
                                                            <option value=22 >22</option>
                                                            <option value=23 >23</option>
                                                            <option value=24 >24</option>
                                                            <option value=25 >25</option>
                                                            <option value=26 >26</option>
                                                            <option value=27 >27</option>
                                                            <option value=28 >28</option>
                                                            <option value=29 >29</option>
                                                            <option value=30 >30</option>
                                                            <option value=31 >31</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="year_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=2021 >2021</option>
                                                            <option value=2022 selected>2022</option>
                                                        </select>
    </label>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6" style="padding-left: 5px;padding-right: 0px;">
<h2 class="card-inside-title" style="margin-top: 0px;">To</h2>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="month_to" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 selected>Jan</option>
                                                            <option value=2 >Feb</option>
                                                            <option value=3 >Mar</option>
                                                            <option value=4 >Apr</option>
                                                            <option value=5 >May</option>
                                                            <option value=6 >Jun</option>
                                                            <option value=7 >Jul</option>
                                                            <option value=8 >Aug</option>
                                                            <option value=9 >Sep</option>
                                                            <option value=10 >Oct</option>
                                                            <option value=11 >Nov</option>
                                                            <option value=12 >Dec</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="day_to" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 selected>1</option>
                                                            <option value=2 >2</option>
                                                            <option value=3 >3</option>
                                                            <option value=4 >4</option>
                                                            <option value=5 >5</option>
                                                            <option value=6 >6</option>
                                                            <option value=7 >7</option>
                                                            <option value=8 >8</option>
                                                            <option value=9 >9</option>
                                                            <option value=10 >10</option>
                                                            <option value=11 >11</option>
                                                            <option value=12 >12</option>
                                                            <option value=13 >13</option>
                                                            <option value=14 >14</option>
                                                            <option value=15 >15</option>
                                                            <option value=16 >16</option>
                                                            <option value=17 >17</option>
                                                            <option value=18 >18</option>
                                                            <option value=19 >19</option>
                                                            <option value=20 >20</option>
                                                            <option value=21 >21</option>
                                                            <option value=22 >22</option>
                                                            <option value=23 >23</option>
                                                            <option value=24 >24</option>
                                                            <option value=25 >25</option>
                                                            <option value=26 >26</option>
                                                            <option value=27 >27</option>
                                                            <option value=28 >28</option>
                                                            <option value=29 >29</option>
                                                            <option value=30 >30</option>
                                                            <option value=31 >31</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="year_to" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=2021 >2021</option>
                                                            <option value=2022 selected>2022</option>
                                                        </select>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col text-center">
                                    <button class="btn btn-primary btn-round btn-simple float-right m-l-10 btn-warning waves-effect">Apply filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                         
			            <div class="col-xl-8 col-lg-8 col-md-12">

                <div class="card" style="min-height: 326.33px;">

                    
                    <div class="headeraccount">
                        <h2>Referral <strong>ins/signups</strong></h2>
                    </div>
                    
                    <div class="body">


                        
                        <table width=100% celspacing=1 cellpadding=1 border=2px>
                            <tr>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Date</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Name</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Signups</th>
                            </tr>
                <?php
$sql = "SELECT * FROM user WHERE referral ='$id'";
$r =$conn->query($sql);
$count = mysqli_num_rows($r);
if ($count>=1) {
  while ($row = mysqli_fetch_assoc($r)) {
      $username = $row['username'];
      $date = $row['date'];
      ?>
      <tr>
          <td align="center"><?php echo date("j F Y",strtotime($date)); ?></td>
          <td align="center"><?php echo $username; ?></td>
          <td align="center"></td>
      </tr>
      <?php
  }
}else{
    ?>
     <tr>
                                <td class=item align=center colspan=3 style="border: 1px solid #ddd;padding: 8px;">No statistics found for this period.</td>
                            </tr>
    <?php
}

                 ?>
                                                       
                                                    </table><br><br>
                        

                                                                        


                    </div>
                    </br>
                </div>
            </div>
			        </div>
        <br>
        

        <br>
        <br>
    </div>
</section> 
<?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>

<script>
    addClass(document.getElementById('js-sidebar-partners'), 'menu__link--active');

</script>

</div>
</body>

</html>

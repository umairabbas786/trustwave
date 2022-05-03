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
</head>

<body>
	
<?php include "include/nav.php"; ?>
<section class="content bagblack">
    <div class="container">
        
        <script language=javascript>
            function go(p) {
                document.opts.page.value = p;
                document.opts.submit();
            }

        </script>
        <?php include "include/welcome.php"; ?>

        <div class="row clearfix">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="card info-box-2" style="min-height: 326.33px;">
                    <div class="headeraccount">
                        <h2><strong>Transactions</strong> Filter</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form method=post name=opts><input type="hidden" name="form_id" value="16410562305456"><input type="hidden" name="form_token" value="46b4c84142e28168f24783a27a775fa7">
                                <input type=hidden name=a value=earnings>
                                <input type=hidden name=page value=1>
                                <div class="btntwo-group bootstrap-select">
                                    <label class="select" style="width: 100%;">
                                        <select name="type" id="type" onchange="document.opts.submit();" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
        <option value="">All transactions</option>
                                                    <option value="deposit" >Deposit</option>
                                                    <option value="withdrawal" >Withdrawal</option>
                                                    <option value="earning" >Earning</option>
                                                    <option value="commissions" >Referral commission</option>
                                                </select>
</label>
</div>
                            <div class="btntwo-group bootstrap-select" style="width: 100%;padding-bottom: 10px;">
<label class="select" style="width: 100%;">
    <select name="ec" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
        <option value="1">All eCurrencies</option>
                                                    <option value=68 >Litecoin</option>
                                                </select>
</label>
</div>
                            <div class="col-xl-6 col-lg-6 col-md-6" style="padding-right: 5px;padding-left: 0px;">
<h2 class="card-inside-title" style="margin-top: 0px;">From</h2>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="month_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 >Jan</option>
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
                                                            <option value=12 selected>Dec</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="day_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=1 >1</option>
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
                                                            <option value=29 selected>29</option>
                                                            <option value=30 >30</option>
                                                            <option value=31 >31</option>
                                                        </select>
    </label>
</div>
<div class="btntwo-group bootstrap-select">
    <label class="select" style="width: 100%;padding-bottom: 3px;">
        <select name="year_from" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                                            <option value=2021 selected>2021</option>
                                                            <option value=2022 >2022</option>
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
                <div class="card info-box-2">
                    <div class="headeraccount">
                        <h2><strong>Financial</strong> Statistics</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <tbody>
                                    <tr>
                                        <td>Total Transaction</td>
                                        <td>$ <?php 
$sql = "SELECT sum(debit) as 'debit',sum(credit) as 'credit',(sum(debit)+sum(credit)) as 'total' FROM transaction WHERE user_id='$id'";
$r = $conn->query($sql);
echo $conn->error;
while ($row=mysqli_fetch_assoc($r)) {
    echo $row['total'];
}

                                    ?></td>
                                    </tr>
                                                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="card">
                    <div class="headeraccount">
                        <h2>Transactions <strong>History</strong></h2>
                    </div>
                    <div class="body">




                                                <table cellspacing=1 cellpadding=2 border=1px width=100%>                            <tr>
                                <th class=inheader align=left style="color: #7FA9D1;">Date</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Type</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Credit</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Debit</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Balance</th>
                                <th class=inheader style="text-align: center;color: #7FA9D1;">Status</th>
                            </tr>
                            <?php 
if (count_data("transaction",$id,"")>=1) {
    $sql = "SELECT * FROM transaction WHERE user_id='$id'";
    $r = $conn->query($sql);
    if (!$r) {
        echo $conn->error;
    }
    while ($row = mysqli_fetch_assoc($r)) {
        $date = $row['date'];
        $type = $row['type'];
        $credit = $row['credit'];
        $debit = $row['debit'];
        $balance = $row['balance'];
        $status = $row['status'];
        if ($status=="0") {
          $msg = "progress";
        }elseif ($status=="1") {
            $msg = "Success";
        }else{
            $msg = "Cancle";
             }
         ?>
       
    <tr >
        <th ><?php  echo date("j F Y",strtotime($date));?></th>
        <th style='text-align: center;'><?php echo $type; ?></th>
        <th style='text-align: center;'>$<?php echo $credit; ?></th>
        <th style='text-align: center;'>$<?Php echo $debit ?></th>
        <th style='text-align: center;'>$<?php echo $balance; ?></th>
        <th style='text-align: center;'><?php echo $msg; ?></th>
    </tr>
    <?php

    }
   
}else{
    ?>
<tr>
                                <td colspan=6 align=center style="border: 1px solid #ddd;padding: 8px;">No transactions found</td>
                            </tr>
    <?php
}

                            ?>
                                                        
                                                        
                        </table>
                        
                        </br></br>

                        

                    </div>




                    </br>
                </div>
            </div>
        </div>
    </div>
</section> <?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>		
<script>
    addClass(document.getElementById('js-sidebar-history'), 'menu__link--active');

</script>
</div>
</body>

</html>

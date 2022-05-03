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
	    <script src="chat.js"></script>
    <script src="gcode.js"></script>
</head>

<body>

<?php include "include/nav.php"; ?>
<section class="content bagblack">
    <div class="container">
        <?php include "include/welcome.php"; ?>
        <div class="row clearfix">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card info-box-2">
                    <div class="body">
                        <div class="icon">
                            <img src="../styles/assets/img/notes.png" class="accico">
                        </div>
                        <div class="content">
                            <div class="text">ACTIVE DEPOSITS</div>
                            <div class="number">$<?php 
                                        echo getpayment('total_deposit',$id); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        <style>
                            input[type=radio] {
                                width: auto;
                                height: auto;
                            }

                            .customers {
                                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }

                            .customers td,
                            .customers th {
                                border: 1px solid #ddd;
                                padding: 8px;
                            }

                            .customers tr:nth-child(even) {
                                background-color: #f2f2f2;
                            }

                            .customers th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #4CAF50;
                                color: white;
                            }

                        </style>





                                                <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                            <tr>
                                <td class=item>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% id="a1" class="tab">
                                        <tr>
                                            <td colspan=3 align=center style="color: #7FA9D1;"><b>10 year investment plan</b></td>
                                        </tr>
                                        <tr>
                                            <th class=inheader style="color: #7FA9D1;">Plan</th>
                                            <th class=inheader width=200 style="color: #7FA9D1;">Amount Spent ($)</th>
                                            <th class=inheader width=100 nowrap style="color: #7FA9D1;">
                                                <nobr>Daily Profit (%)</nobr>
                                            </th>
                                        </tr>
                                                                                <tr>
                                            <td class=item align=left>Silver Packeg</td>
                                            <td class=item align=right>$10.00 - $200000.00</td>
                                            <td class=item align=right>0.30</td>
                                        </tr>
                                                                                <tr>
                                            <td class=item align=left>Eth packeg</td>
                                            <td class=item align=right>$200000.00 - $2000000.00</td>
                                            <td class=item align=right>0.40</td>
                                        </tr>
                                                                            </table>
                                    <br>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100%>             <?php
                            if (count_data("deposit",$id,"plan='10'")>=1) {
                                ?>
                                <thead>
                                    <tr>
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Amount
                                       </th> 
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Date
                                       </th>
                                    </tr>
                                </thead>
                                <?php
$sql = "SELECT * FROM deposit WHERE user_id='$id' And plan='10'";
$r = $conn->query($sql);
if (!$r) {
    echo $conn->error;
}
while ($row = mysqli_fetch_assoc($r)) {
    $price = $row['price'];
    $date = $row['date'];
    ?>
                                <tr>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b>$<?php echo $price; ?></b></td>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b><?php
                                             echo date("j F Y",strtotime($date));
                                             ?></b></td>

                                             </tr>
                                <?php
}

                                
                                
                            }else{
                                ?>
                                <tr>
                                            <td colspan="4" style="border: 1px solid #ddd;padding: 8px;"><b>No deposits for this plan</b></td>
                                             </tr>
                                <?php
                            }

                                     ?>                                                                   
                                            </table>
                                                                        <br>
                                </td>
                            </tr>
                        </table>
                        <br>
                                                <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                            <tr>
                                <td class=item>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% id="a1" class="tab">
                                        <tr>
                                            <td colspan=3 align=center style="color: #7FA9D1;"><b>20 year investment plan</b></td>
                                        </tr>
                                        <tr>
                                            <th class=inheader style="color: #7FA9D1;">Plan</th>
                                            <th class=inheader width=200 style="color: #7FA9D1;">Amount Spent ($)</th>
                                            <th class=inheader width=100 nowrap style="color: #7FA9D1;">
                                                <nobr>Daily Profit (%)</nobr>
                                            </th>
                                        </tr>
                                                                                <tr>
                                            <td class=item align=left>silver packeg</td>
                                            <td class=item align=right>$10.00 - $200000.00</td>
                                            <td class=item align=right>0.20</td>
                                        </tr>
                                                                                <tr>
                                            <td class=item align=left>Eth packeg</td>
                                            <td class=item align=right>$200000.00 - $2000000.00</td>
                                            <td class=item align=right>0.30</td>
                                        </tr>
                                                                            </table>
                                    <br>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100%>                                                                                <?php
                            if (count_data("deposit",$id,"plan='20'")>=1) {
                                ?>
                                <thead>
                                    <tr>
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Amount
                                       </th> 
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Date
                                       </th>
                                    </tr>
                                </thead>
                             <?php
$sql = "SELECT * FROM deposit WHERE user_id='$id' And plan='20'";
$r = $conn->query($sql);
if (!$r) {
    echo $conn->error;
}
while ($row = mysqli_fetch_assoc($r)) {
    $price = $row['price'];
    $date = $row['date'];
    ?>
                                <tr>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b>$<?php echo $price; ?></b></td>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b><?php
                                             echo date("j F Y",strtotime($date));
                                             ?></b></td>

                                             </tr>
                                <?php
}

                                
                            }else{
                                ?>
                                <tr>
                                            <td colspan="4" style="border: 1px solid #ddd;padding: 8px;"><b>No deposits for this plan</b></td>
                                             </tr>
                                <?php
                            }

                                     ?>  
                                                                            </table>
                                                                        <br>
                                </td>
                            </tr>
                        </table>
                        <br>
                                                <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                            <tr>
                                <td class=item>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% id="a1" class="tab">
                                        <tr>
                                            <td colspan=3 align=center style="color: #7FA9D1;"><b>LIFE TIME PACKEG</b></td>
                                        </tr>
                                        <tr>
                                            <th class=inheader style="color: #7FA9D1;">Plan</th>
                                            <th class=inheader width=200 style="color: #7FA9D1;">Amount Spent ($)</th>
                                            <th class=inheader width=100 nowrap style="color: #7FA9D1;">
                                                <nobr>Daily Profit (%)</nobr>
                                            </th>
                                        </tr>
                                                                                <tr>
                                            <td class=item align=left>PREMIUM PACKEG</td>
                                            <td class=item align=right>$10.00 - $2000000.00</td>
                                            <td class=item align=right>0.10</td>
                                        </tr>
                                                                            </table>
                                    <br>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100%>                                                                              <?php
                            if (count_data("deposit",$id,"plan='all'")>=1) {
                                ?>
                                <thead>
                                    <tr>
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Amount
                                       </th> 
                                       <th style="border: 1px solid #ddd;padding: 8px;" colspan="2">
                                           Date
                                       </th>
                                    </tr>
                                </thead>
                                 <?php
$sql = "SELECT * FROM deposit WHERE user_id='$id' And plan='all'";
$r = $conn->query($sql);
if (!$r) {
    echo $conn->error;
}
while ($row = mysqli_fetch_assoc($r)) {
    $price = $row['price'];
    $date = $row['date'];
    ?>
                                <tr>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b>$<?php echo $price; ?></b></td>
                                            <td colspan="2" style="border: 1px solid #ddd;padding: 8px;"><b><?php
                                             echo date("j F Y",strtotime($date));
                                             ?></b></td>

                                             </tr>
                                <?php
}

                                
                            }else{
                                ?>
                                <tr>
                                            <td colspan="4" style="border: 1px solid #ddd;padding: 8px;"><b>No deposits for this plan</b></td>
                                             </tr>
                                <?php
                            }

                                     ?>  
                                                                            </table>
                                                                        <br>
                                </td>
                            </tr>
                        </table>
                        <br>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    </div>
    </div>
    </div>
</section> <?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>
<script>
    addClass(document.getElementById('js-sidebar-deposits'), 'menu__link--active');

</script>
</div>

</body>

</html>

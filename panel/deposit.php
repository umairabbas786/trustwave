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
<?php 
 include "include/welcome.php";
?>
<div class="row clearfix">
            <div class="col-lg-12">
                <div class="card" style="margin-top: 30px">
                    <div class="body block-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <h3>Deposit is close on saturday and sunday.</h3>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

<?php
if (isset($_POST['submit'])) {
    $price = $_POST['amount'];
    $plan = $_POST['h_id'];
    $type = $_POST['type'];
   //$id = getid($_SESSION['email']);
   //$sql = "INSERT INTO deposit (user_id,price,plan,coin,status) VALUES ('$id','$price','$plan','$type','0')";
    $_SESSION['price'] = $price + ceil((4 * $price) / 100);

    $_SESSION['plan'] = $plan;
      ?>
      <form action="https://www.coinpayments.net/index.php" method="post" id="coinpayment" style='display: none'>
    <input type="hidden" name="cmd" value="_pos">
    <input type="hidden" name="reset" value="1">
     <input type="hidden" name="currency" value="ETH"> 
    <input type="hidden" name="merchant" value="e3fc64a52c1c110bed6884f8d6cac66f">
    <input type="hidden" name="item_name" value="deposit">
    <input type="hidden" name="currency" value="USD">
    <input type='hidden' name='email' value='<?php echo $_SESSION['email'] ?>'>
    <input type="hidden" name="amountf" value="<?php echo isset($_SESSION['price'])?$_SESSION['price']:""; ?>">
    <input type='hidden' name='allow_amount' value='0'>
    <input type="hidden" name="want_shipping" value="0">
    <input type="hidden" name="success_url" value="https://check.itsbloging.com/panel/index.php?status=Bitcoin">
    <input type="hidden" name="cancel_url" value="http://check.itsbloging.com/panel/">
    <input type="image" src="https://www.coinpayments.net/images/pub/buynow-grey.png" alt="Buy Now with CoinPayments.net">
</form>
      <script>$("#coinpayment").submit();</script>
      <?php
   
}

 ?>



        
        

        

        <form method=post name="spendform">
            <div class="row clearfix">
                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 0px">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card" style="min-height: 428px;">
                            <div class="headeraccount">
                                <h2>Make an <strong>Investment</strong></h2>
                            </div>
                            <div class="body">
 

                                                                <h2 class="card-inside-title">Payment processor</h2>
                                <div class="btntwo-group bootstrap-select">
                                    <label class="select" style="width: 100%;">
                                  <select name=type id="type" style="width: 100%;padding: 10px 22px;border-color: #535e69;z-index: 9999;position: relative;" class="btntwo dropdown-togglex btntwo-round btntwo-simple" tabindex="-98">
                                      <!-- <option>LiteCoin</option> -->
                                     <!--  <option>Bitcoin</option>
                                      <option>Dogecoin</option>-->

                                      <option>USDT TRC20</option>
                                                                          
                                  </select>
                                       

                                    </label>
                                </div>
                                

                                <br>
                                
                                <h2 class="card-inside-title">Deposit amount</h2>
                                <input type="number" name="amount" value='50.00' class="calculate-amount form-controlamount" min='50' style="font-size: 14px;padding: 10px 22px;">
                                <small>3% fee on every deposit</small>
                                <br>
                                <div class="col text-center">
                                        <button class="btn btn-primary btn-round btn-simple float-right m-l-10 btn-warning waves-effect" type="submit" name="submit">Make deposit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 hide-xs">
                        <div class="card">
                            <div class="headeraccount">
                                <h2><strong>Available</strong> Balance</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="m-b-0">$ <?php echo getpayment("price",$id); ?></h2>
                                        <p>Account balance</p>
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
                                                <td class="text-right"><span id="pay18b">&nbsp;</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <img src="../styles/assets/pay2/43.png" style="width: 20px">
                                                </th>
                                                <td>Payeer</td>
                                                <td class="text-right"><span id="pay43b">&nbsp;</span>
                                                </td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <th>-->
                                            <!--        <img src="../styles/assets/pay2/48.png" style="width: 20px">-->
                                            <!--    </th>-->
                                            <!--    <td>Bitcoin</td>-->
                                            <!--    <td class="text-right"><span id="pay48b">&nbsp;</span>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <th>-->
                                            <!--        <img src="../styles/assets/pay2/68.png" style="width: 20px">-->
                                            <!--    </th>-->
                                            <!--    <td>Litecoin</td>-->
                                            <!--    <td class="text-right"><span id="pay68b">&nbsp;</span>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <th>-->
                                            <!--        <img src="../styles/assets/pay2/79.png" style="width: 20px">-->
                                            <!--    </th>-->
                                            <!--    <td>Dogecoin</td>-->
                                            <!--    <td class="text-right"><span id="pay79b">&nbsp;</span>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <th>-->
                                            <!--        <img src="../styles/assets/pay2/69.png" style="width: 20px">-->
                                            <!--    </th>-->
                                            <!--    <td>Ethereum</td>-->
                                            <!--    <td class="text-right"><span id="pay69b">&nbsp;</span>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <th>-->
                                            <!--        <img src="../styles/assets/pay2/77.png" style="width: 20px">-->
                                            <!--    </th>-->
                                            <!--    <td>Bitcoin Cash</td>-->
                                            <!--    <td class="text-right"><span id="pay77b">&nbsp;</span>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 ">
                    <div class="card" style="min-height: 428px;">
                        <div class="headeraccount">
                            <h2><strong>Invesment</strong> Plan</h2>
                        </div>
                        <div class="body">



<script language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}
var cps = {};
--></script>



                              <div class="row" id="planselectz">


                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;padding-bottom: 30px;">

                                                                        <input id="plan3" type=radio name=h_id value='10'  checked >
                                    <label class="counterz" for="plan3">
                                        <div class="plans">
                                                                                        <div class="plan_details text-center">
                                                <div class="plan_title">10 year investment plan</div>
                                                <div class="percentage">0.30%</div>
                                                <p class="profit_duration">Daily Profit</p>
                                                <ul class="list-items">
                                                    <li class="list-item">Minimum $50</li>
                                                    <li class="list-item">Maximum $200000</li>
                                                    <li class="list-item"><a href="javascript:openCalculator('3')">Calculate your profit &gt;&gt;</a></li>
                                                </ul>
                                                <div class="plans_btn"> <a class="btnplan btn-deposit">Select Plan</a>
                                                </div>
                                            </div>
                                                      <br><br>                                  <div class="plan_details text-center">
                                                <div class="plan_title">10 year investment plan</div>
                                                <div class="percentage">0.40%</div>
                                                <p class="profit_duration">Daily Profit</p>
                                                <ul class="list-items">
                                                    <li class="list-item">Minimum $200000</li>
                                                    <li class="list-item">Maximum $2000000</li>
                                                    <li class="list-item"><a href="javascript:openCalculator('3')">Calculate your profit &gt;&gt;</a></li>
                                                </ul>
                                                <div class="plans_btn"> <a class="btnplan btn-deposit">Select Plan</a>
                                                </div>
                                            </div>
                                                                                    </div>

                                    </label>
                                                                    </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;padding-bottom: 30px;">

                                                                        <input id="plan6" type=radio name=h_id value='20' >
                                    <label class="counterz" for="plan6">
                                        <div class="plans">
                                                                                        <div class="plan_details text-center">
                                                <div class="plan_title">20 year investment plan</div>
                                                <div class="percentage">0.20%</div>
                                                <p class="profit_duration">Daily Profit</p>
                                                <ul class="list-items">
                                                    <li class="list-item">Minimum $50</li>
                                                    <li class="list-item">Maximum $200000</li>
                                                    <li class="list-item"><a href="javascript:openCalculator('6')">Calculate your profit &gt;&gt;</a></li>
                                                </ul>
                                                <div class="plans_btn"> <a class="btnplan btn-deposit">Select Plan</a>
                                                </div>
                                            </div>
                                                    <br><br>                                  <div class="plan_details text-center">
                                                <div class="plan_title">20 year investment plan</div>
                                                <div class="percentage">0.30%</div>
                                                <p class="profit_duration">Daily Profit</p>
                                                <ul class="list-items">
                                                    <li class="list-item">Minimum $200000</li>
                                                    <li class="list-item">Maximum $2000000</li>
                                                    <li class="list-item"><a href="javascript:openCalculator('6')">Calculate your profit &gt;&gt;</a></li>
                                                </ul>
                                                <div class="plans_btn"> <a class="btnplan btn-deposit">Select Plan</a>
                                                </div>
                                            </div>
                                                                                    </div>

                                    </label>
                                                                    </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" data-wow-duration="1s" data-wow-delay="0s" cellspacing="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;padding-bottom: 30px;">

                                                                        <input id="plan8" type=radio name=h_id value='all'  >
                                    <label class="counterz" for="plan8">
                                        <div class="plans">
                                                                                        <div class="plan_details text-center">
                                                <div class="plan_title">LIFE TIME PACKEGE Plan</div>
                                                <div class="percentage">0.10%</div>
                                                <p class="profit_duration">Daily Profit</p>
                                                <ul class="list-items">
                                                    <li class="list-item">Minimum $50</li>
                                                    <li class="list-item">Maximum $2000000</li>
                                                    <li class="list-item"><a href="javascript:openCalculator('8')">Calculate your profit &gt;&gt;</a></li>
                                                </ul>
                                                <div class="plans_btn"> <a class="btnplan btn-deposit">Select Plan</a>
                                                </div>
                                            </div>
                                                                                    </div>

                                    </label>
                                                                    </div>
                                
                            </div>					
							 <div class="col text-center hide-sm">


                                        <button class="btn btn-primary btn-round btn-simple float-right m-l-10 btn-warning waves-effect" type="submit" name="submit">Make deposit</button>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        
        <script language=javascript>
            for (i = 0; i < document.spendform.type.length; i++) {
                if ((document.spendform.type[i].value.match(/^process_/))) {
                    document.spendform.type[i].checked = true;
                    break;
                }
            }
            updateCompound();

        </script>
        

        <script>
            cps[{
                $plans[plans].id
            }] = {
                $plans[plans].compound_percents_json
            };

        </script>

    </div>
</section> <?php include "include/footer.php"; ?></div>

<link rel="stylesheet" href="../styles/assets/libs/bootstrap/fileinput.min.css">
<script src="../styles/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="../styles/assets/libs/bootstrap/fileinput.min.js"></script>
<script src="../styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
<script>
    document.write("<script type='text/javascript' src='../styles/assets/js/data.js?v=" + Date.now() + "'><\/script>");

</script>




<script>
    addClass(document.getElementById('js-sidebar-invest'), 'menu__link--active');

</script>

<script>
    $(document).ready(function() {
        $(':radio').change(function() {
            $(':radio[name=' + this.name + ']').next('label').removeClass('selexty');
            $(this).next('label').addClass('selexty');
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("input:radio:checked").next('label').addClass("selexty");
    });

</script>

</div>
</body>

</html>

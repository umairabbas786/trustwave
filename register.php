<?php
ob_start();
session_start();
require_once 'include/db.php';
require_once "include/function.php";
 ?>
 <?php

function getWeekday($date) {
    return date('w', strtotime($date));
}


$weekday =  getWeekday(date("Y-m-d")); // returns 4 
if($weekday<6){
    $sql = "SELECT * FROM user_wallet WHERE date < DATE_SUB(NOW(),INTERVAL 1 DAY)";
    $r  = $conn->query($sql);
    $count=mysqli_num_rows($r);
    if($count >=1){
     while($row = mysqli_fetch_assoc($r)){
        $id = $row['user_id'];
        $plan = getuser_details("plan",$id);  
        $price = $row['price'];
           if($price!="0"){
             $percentage = ceil((4/$price) * 100);
            $earnquery = "UPDATE user_wallet SET earn = earn + $percentage , price = price + $percentage ,total_deposit = total_deposit + $percentage date=now() WHERE user_id='$id'";
            $conn->query($earnquery);  
             
           }
          
     }
    }

}
 ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign up / trustwave.com</title>
    <link rel="shortcut icon" href="styles/assets/img/favicon/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles/assets/css/style.css">
    <script src="styles/assets/libs/jquery/jquery-1.9.1.min.js"></script>
    <script src="styles/assets/libs/modernizr/modernizr.js"></script>
    <script src="styles/assets/js/common.js"></script>
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
        <div id="block-content">
            <section class="section section-auth bagblack textsite titlesite">
                <div class="container bagblack textsite titlesite">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="b--shadow b--auth">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="b--auth__left">
                                            <div class="text-center">
                                                <a href="index.html" class="logo" data-pjax="">
                                                    <img src="styles/assets/img/logo.png" alt="trustwave.com" style="width: 150px;">
                                                </a>
                                            </div>
                                            <div class="b--shadow__title-bordered">
                                                <div class="title-bordered__wrapper">
                                                    <div class="title-bordered">CREATE YOUR ACCOUNT NOW</div>
                                                </div>
                                            </div>


                                            
<?php
function getRandomHex($num_bytes=4) {
  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}
////// this function user email already register or not//////
function mail_checker($email){
    include'include/db.php';
    $sql = "SELECT * FROM user WHERE email='$email'";
    $s = $conn->query($sql);
    $count = mysqli_num_rows($s);
    if ($count>=1) {
      return true;
    }else{
      return false;
    }
  }
  if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $transection_code = $_POST['transaction_code'];
      $transection_code2 = $_POST['transaction_code2'];
      $password = $_POST['password'];
       $token = getRandomHex(50);
       $referral_code = mt_rand(10000000,99999999);
       if (isset($_GET['referral'])) {
           $sql = "SELECT * FROM user WHERE referral_code='".$_GET['referral']."'";
           $r =$conn->query($sql);
           $count = mysqli_num_rows($r);
           if ($count>=1) {
               $row = mysqli_fetch_assoc($r);
              
               $referral =  $row['id'];
           }else{
             $referral = "none";
           }
       }
      $error = ['username'=>"",'email'=>"",'transection_code'=>"",'transection_code2'=>"",'password'=>"",'value_stay'=>""];
      if (empty($username)) {
          $error['username']="Please Enter Username";
          $error['value_stay'] = "1";
      }
      if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $error['email'] = "Please Enter Valid Email";
          $error['value_stay'] = "1";

      }
      if (mail_checker($email)) {
          $error['email'] = "Email Is already exist";
          $error['value_stay'] = "1";
      }
    //   if (empty($transection_code) || strlen($transection_code)<8) {
    //       $error['transection_code'] = "Please Enter Transaction Code greater than 8 character";
    //       $error['value_stay'] = "1";

    //   }
    //   if ($transection_code2!=$transection_code) {
    //      $error['transection_code2'] = "Confirm Transaction Code not Match";
    //       $error['value_stay'] = "1";

    //   }
      if (strlen($password)<8) {
          $error['password']= " PLease Enter password Greater than 8 character";
          $error['value_stay'] = "1";

      }
      if ($password!=$transection_code) {

      }else{
         $error['password'] = "Please Enter different password from Transaction Code";
          $error['value_stay'] = "1";
      }
            foreach($error as $key => $value){
      
        if (empty($value)) {
            unset($error[$key]);
        }
      }
      if(empty($error)){
       $sql = "INSERT INTO user (username,email,password,transaction_code,token,date,referral_code,referral) VALUES('$username','$email','$password','$transection_code','$token',now(),'$referral_code','$referral')";
       if ($conn->query($sql)) {
        $last_id = $conn->insert_id;
        $sql2 = "INSERT INTO user_wallet (user_id,price,coin,total_deposit,total_withdraw) VALUES ('$last_id','0','Ethereum','0','0')";
        $conn->query($sql2);
        ///////////////referral query//////////
        if(isset($referral)&& !empty($referral)){
            $count_r = count_table_data("user",'referral='.$referral);
            //$balance = //getpayment("price",$referral);
            if($count_r=="1"){
               $value = 15;
            }else if($count_r==2){
                $value = 10;
            }else if($count_r==3){
                $value = 5;
            }else{
                $value = 4;
            }
            // $percentage = ceil(($value/$balance) * 100);
            $percentage = $value;
            $earnquery = "UPDATE user_wallet SET earn = earn + $percentage , price = price + $percentage , total_deposit = total_deposit + $percentage WHERE user_id='$referral'";
            $conn->query($earnquery);

        }
        ////////// end refferal earn ///////////
          $to = $email;
$subject = "Email Verification From Trust Wave.com";
$from = 'support@itsbloging.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$variables = array();

$variables['email'] = $email;
$variables['token'] = $token;

$template = file_get_contents("mail_template.php");

foreach($variables as $key => $value)
{
    $template = str_replace('{{'.$key.'}}', $value, $template);
}

$message =  $template;
 if(mail($to, $subject, $message, $headers)){
     $_SESSION['msg'] = "<div class='alertnoti alert-success'>Please check mailbox and verify your email</div>";
        header("Location:login.php");
 }
       }else{
        echo $conn->error;
       }
      }
  }

 ?>


                                            


<?php 
if(isset($error['username']) && $error['username']!=" "){
   ?>
   <div class="alertnoti alert-warning"><?php echo isset($error['username'])?$error['username']:" "; ?></div>
   <?php 
}
?>
<?php 
if(isset($error['email']) && $error['email']!=" "){
   ?>
  <div class="alertnoti alert-warning"><?php echo isset($error['email'])?$error['email']:" "; ?></div>

   <?php 
}
?>
<?php 
if(isset($error['transection_code']) && $error['transection_code']!=" "){
   ?>
 <div class="alertnoti alert-warning"><?php echo isset($error['transection_code'])?$error['transection_code']:" "; ?></div>

   <?php 
}
?>
<?php 
if(isset($error['transection_code2']) && $error['transection_code2']!=" "){
   ?>
 <div class="alertnoti alert-warning"><?php echo isset($error['transection_code2'])?$error['transection_code2']:" "; ?></div>

   <?php 
}
?>
<?php 
if(isset($error['password']) && $error['password']!=" "){
   ?>
 <div class="alertnoti alert-warning"><?php echo isset($error['password'])?$error['password']:" "; ?></div>

   <?php 
}
?>
    <form method='post' action="">
        <div class="form-group">
            <label>Username *</label>
            <input id="username" type="text" name="username" class="form-control" value="<?php if(isset($username)&& !empty($error['value_stay'])){
                echo $username;
            } ?>">
        </div>


        
        <div class="form-group">
            <label>E-mail *</label>
            <input id="email" type="text" name="email" class="form-control" value="<?php if(isset($email) && isset($error['value_stay'])){
                echo $email;
            } ?>">
        </div>

        
        <div class="form-group">
            <label>Country *</label>

            <select id="country" name="country" class="form-control">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
        </div>


        <div class="form-group">
            <label>ID Card *</label>
            <input type="text" name="idcard"  class="form-control" value="<?php if(isset($idcard) && isset($error['value_stays'])){
                echo $idcard;
            } ?>">
        </div>
        
       <!--                                                      <div class="form-group">
            <label>Your Litecoin Account:</label>
            <input type=text name=pay_account[68] value="" data-validate="regexp" data-validate-regexp="^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$" data-validate-notice="Litecoin Address" class="form-control">
        </div>
        
         -->

        <div class="form-group">
            <label>Your Password *</label>
            <input id="password" type="password"  name="password" class="form-control" value="<?php if(isset($password) && isset($error['value_stay'])){
                echo $password;
            } ?>">
        </div>



        

                                                            
        <div class="form-group">
            <label>Your Upline  <?php
 if (isset($_GET['referral'])) {
           $sql = "SELECT * FROM user WHERE referral_code ='".$_GET['referral']."'";
           $r = $conn->query($sql);
           $count = mysqli_num_rows($r);
           if ($count>=1) {
               $row = mysqli_fetch_assoc($r);
              
             echo $row['referral_code'];
           }else{
            echo  "N/A (n/a)";
           }
       }else{
        echo  "N/A (n/a)";
       }
             ?></label>
        </div>

                                                            
        <div class="form-group">
            <input type="checkbox" name="agree" value="1" class="checkbox__input" id="terms" required checked>
            <label for="terms" class="checkbox__label">I'm agree with
                <a href="termandcondition.php" data-pjax> <strong class="text--underline">
                        Terms & Conditions
                    </strong>
                </a>*</label>
        </div>




                                                    <div class="form-group">
                            <button class="btn btn-warning btn-block" type="submit" name="submit">REGISTER</button>
                                                    </div>
                                                </form>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
      
        <link rel="stylesheet" href="styles/assets/libs/bootstrap/fileinput.min.css">
        <script src="styles/assets/libs/bootstrap/bootstrap.min.js"></script>
        <script src="styles/assets/libs/bootstrap/fileinput.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                //////////////
                $("#password").on('keyup change', function() {
                    var psw = $("#password").val();
                    $("#password2").val(psw);
                });

                $("#email").on('keyup change', function() {
                    var ema = $("#email").val();
                    $("#email1").val(ema);
                });


                $("#username").keyup(function() {
                    $("#fullname").val(this.value);
                });

            });

        </script>

    </div>
</body>

</html>

<?php 

function count_table_data($table,$andquery){
    include "include/db.php";
    if (!empty($andquery) && $andquery!=" " && isset($andquery)) {
$sql = "SELECT * FROM $table WHERE $andquery";    
    }else{
             $sql = "SELECT * FROM $table";  
    }
 
    $count = mysqli_num_rows($conn->query($sql));
    return $count;
}
  function getpayment($column,$id){
  	include 'include/db.php';
  	$sql = "SELECT $column FROM user_wallet WHERE user_id='$id'";
  	$r = $conn->query($sql);
  $row = mysqli_fetch_assoc($r);
  	return $row[$column];
  }
function getid($email){
    include "include/db.php";
  $sql = "SELECT * FROM user WHERE email='$email'";
  $r = $conn->query($sql);
  $row = mysqli_fetch_assoc($r);
  return $row['id'];
}
function getuser_details($column,$id){
    include "include/db.php";
  $sql = "SELECT $column FROM user WHERE id='$id'";
  $r = $conn->query($sql);
  $row = mysqli_fetch_assoc($r);
  return $row[$column];
}

function count_data($table,$id,$andquery){
    include "include/db.php";
    if (!empty($andquery) && $andquery!=" " && isset($andquery)) {
$sql = "SELECT * FROM $table WHERE user_id='$id' AND $andquery";    
    }else{
             $sql = "SELECT * FROM $table WHERE user_id='$id'";  
    }
 
    $count = mysqli_num_rows($conn->query($sql));
    return $count;
}

function addtransaction($id,$type,$debit,$credit,$balance,$status,$withdraw_id){
      include "include/db.php";
    $sql = "INSERT INTO transaction (user_id,type,debit,credit,balance,date,status,approve_id) VALUES ('$id','$type','$debit','$credit','$balance',now(),'$status','$withdraw_id')";
    $conn->query($sql);
}
function getpendingwithdraw($id){
    include "../include/db.php";
    $sql = "SELECT sum(price) as pending FROM withdraw WHERE user_id='$id'and status='0'";
    $r = $conn->query($sql);
    $row = mysqli_fetch_assoc($r);
    $price =  $row['pending'];
    if ($price<1) {
        return "0.00";
    }else{
        return $price;
    }
}

?>
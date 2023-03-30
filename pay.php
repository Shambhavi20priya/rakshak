<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$name=$fname." ".$lname;
$email=$_POST['email'];
$contact=$_POST['mob'];
$plan=$_POST['plan'];
$subs="Basic";
$price=0;
if ($plan=='1') {
    $price=10;
}
elseif($plan=='2'){
    $price=50;
    $subs="Individual";
}
elseif($plan=='3')
{
    $subs="Family";
    $price=500;
}
include 'instamojo/Instamojo.php';

$api = new Instamojo\Instamojo('test_e21d0a5d3ec617ae448058512e0', 'test_ef151341507d0d4a62bffaa9dd8','https://test.instamojo.com/api/1.1/');
 
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $subs,
            "amount" => $price,
            "send_email" => true,
            "allow_repeated_payments"=>false,
            "email" => $email,
            "buyer_name" =>$name,
            "phone"=>$contact,
            "send_sms"=>true,
            "redirect_url" => "http://localhost/rakshak/thankyou.php"
            //"webhook"=>
            ));
        // print_r($response);
        $pay_url=$response['longurl'];
        header("location:$pay_url");
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
?>

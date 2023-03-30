<?php
$pincode=$_POST['pincode'];
// print_r($_POST);
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
// echo $data;
$data=json_decode($data);
if (isset($data->PostOffice['0'])) {
        $arr['district']=$data->PostOffice['0']->District;
        $arr['state']=$data->PostOffice['0']->State;
        $arr['town']=$data->PostOffice['0']->Taluk;
        echo json_encode($arr);
}
else{
    echo 'no';
}
?>
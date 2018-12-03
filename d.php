<?php
/*
$header = array();
$header[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$header[] = "Host: yousrewards.com";
$header[] = "Connection: Keep-Alive";
$header[] = "Accept-Encoding: gzip";
$header[] = "Content-Length: 88";
$header = explode("\n", $header);
*/
$email = readline("Masukkan Email :");
$pass = "ibuku354";
$nama = readline("Masukkan Nama : ");
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://yousrewards.com//api/v3/account.signUp.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&fullname=$nama&clientId=1&password=$pass&username=$nama&");
//curl_setopt($ch, CURLOPT_HTTPHEADER, );
curl_setopt($ch, CURLOPT_USERAGENT, "Dalvik/2.1.0 (Linux; U; Android 7.1.2; Redmi 5A MIUI/V9.5.1.0.NCKMIFA)");
$data = curl_exec($ch);
curl_close($ch);
$data = json_decode($data);
$id = $data->accountId;
$token = $data->accessToken;
$user = $nama;
echo $token."\n";
// Memasukkan Referer
$r = "MYNKG9";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://yousrewards.com/api/v3/account.Refer.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'data={"clientId":"1","accountId":"'.$id.'","accessToken":"'.$token.'","user":"'.$user.'","name":"refer","value":"'.$r.'","dev_name":"Redmi 5A","dev_man":"Xiaomi","ver":"3.0","pckg":"com.yousrewards.app"}&');
//curl_setopt($ch, CURLOPT_HTTPHEADER, );
curl_setopt($ch, CURLOPT_USERAGENT, "Dalvik/2.1.0 (Linux; U; Android 7.1.2; Redmi 5A MIUI/V9.5.1.0.NCKMIFA)");
$data = curl_exec($ch);
curl_close($ch);
echo $data;


?>
<?php
// https://github.com/BaseMax/RouteDistance
$api="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";// Modify this!
$origin=$_GET['from1'].",".$_GET['from2'];
$destination=$_GET['to1'].",".$_GET['to2'];
$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=".$api;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_PROXYPORT, 3128);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($curl);
curl_close($curl);
// print_r($response);
$json=[];
$response=json_decode($response, true);
$result=$response['rows'][0]['elements'][0];
$json["status"]="success";
$json["distance"]=$result["distance"];
$json["duration"]=$result["duration"];
print json_encode($json);

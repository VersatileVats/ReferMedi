<?php

$country = $_POST['country'];

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://covid-193.p.rapidapi.com/statistics?country=".$country,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: covid-193.p.rapidapi.com",
		"X-RapidAPI-Key: a1e245bc00msh17b5bf88579175fp1cd37bjsnc2184a3efa43"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$resArr = json_decode($response);
    
    echo $resArr->response[0]->population; echo '*';
    echo $resArr->response[0]->cases->total; echo '*';
    echo $resArr->response[0]->cases->active; echo '*';
    echo $resArr->response[0]->deaths->total; echo '*';
    echo $resArr->response[0]->tests->total; echo '*';
}
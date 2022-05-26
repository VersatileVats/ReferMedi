<?php

$search_disease = $_POST['disease'];
$search_disease = str_replace(" ","_",$search_disease);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://en.wikipedia.org/wiki/'.$search_disease,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
));

$response = curl_exec($curl);

$positions = array(strpos($response, "Specialty"),strpos($response, "Symptoms"),strpos($response, "Risk factors"),strpos($response, "Treatment"),strpos($response, "Prognosis"));

$difference = array(
    $positions[1]-$positions[0]-9,
    200,
    $positions[3]-$positions[2]-12,
    $positions[4]-$positions[3]-9);

$swup_chars = array(
    filter_var(substr($response, $positions[0]+9, $difference[0]), FILTER_SANITIZE_STRING),
    filter_var(substr($response, $positions[1]+8, $difference[1]), FILTER_SANITIZE_STRING),
    filter_var(substr($response, $positions[2]+12, $difference[2]), FILTER_SANITIZE_STRING),
    filter_var(substr($response, $positions[3]+9, $difference[3]), FILTER_SANITIZE_STRING));

$final_string = array(
    preg_replace('/\&#91;.*?\&#93;/i', '', $swup_chars[0]),
    preg_replace('/\&#91;.*?\&#93;/i', '', $swup_chars[1]),
    preg_replace('/\&#91;.*?\&#93;/i', '', $swup_chars[2]),
    preg_replace('/\&#91;.*?\&#93;/i', '', $swup_chars[3]));
    
//1. Specialty 2. Symptoms 3. Risk Factors 4. Treatment
if(!strpos($final_string[0],"Wikipedia") and !strpos($final_string[0],"Bad")) {
 foreach ($final_string as $key => $value) {
    if(strlen("$value") > 150) {
        $value = substr($value,0,50);
    }
    if($find_ml = strpos("$value","Wikipedia")) {
        $value = "NA";
    }
    if("$key"==2) {
        if($result = strpos("$value","Diagnostic method")) {
            $value = substr($value,0,$result);
        }
    }
    echo "$value /";
}   
} else {
    echo "NA";
}

?>

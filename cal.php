<?php
include_once('vendor/simple_html_dom.php');
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

$comida = $_GET['comida'];

header('Content-Type: application/json');

$ch = curl_init();

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$params = array(
    "search"=>$comida,
    "utf8"=>"&#x2713;",
    "authenticity_token"=>"AjM2Hi1tcY7Y4S5qj9jy/2awh1yBVgTX7K0dswQFk+A="
);

curl_setopt($ch,CURLOPT_URL,"http://www.myfitnesspal.com/pt/food/search");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($params));

try {
    $result = curl_exec($ch);

    $resultHTML = str_get_html($result);
    
    $resultString = explode(",", $resultHTML->find('ul.food_search_results > li.odd > div.nutritional_info')[0]->plaintext);

    $finalString = substr($resultString[1], strpos($resultString[1], ":") + 3);

    echo $finalString;

} catch (Exception $e) {}
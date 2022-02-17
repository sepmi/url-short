<?php
use App\models\DB;


function random_string($length)
{


    $mainString = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $first = substr(str_shuffle($mainString), 0, $length);
    $second = substr(str_shuffle($mainString), 0, $length);
    $third = substr(uniqid(),-3);


    $final_Url = $first .rand(1,2) . $second . rand(1,2) . $third;


    return $final_Url;
}



function mixSreverAddressWithRandomUrl($siteAddress,$random_string){

    return "https://".$siteAddress."/".$random_string;
}

function checkUrl($url){


    $url = filter_var($url, FILTER_SANITIZE_URL);

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
    } else {
        return false;
    }

}



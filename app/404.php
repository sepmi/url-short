<?php
require_once "../vendor/autoload.php";
use App\models\Urls;



if($_SERVER["REQUEST_METHOD"] == "GET" ){

    $userUrl = str_replace("/url-short/" , "",htmlspecialchars($_SERVER["REQUEST_URI"]));

    $UrlsModel = new Urls();
    $Lurl = $UrlsModel->find($userUrl);
    header("Location: $Lurl");


}
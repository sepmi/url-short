<?php
require_once "../vendor/autoload.php";
use App\models\Urls;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SERVER["REQUEST_METHOD"] == "GET" ){

    $userUrl = str_replace("/url-short/" , "",htmlspecialchars($_SERVER["REQUEST_URI"]));

    $UrlsModel = new Urls();
    $Lurl = $UrlsModel->find($userUrl);
    header("Location: $Lurl");


}
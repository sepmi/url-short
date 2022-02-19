<?php
use App\models\Urls;
use App\models\DB;
require_once "../vendor/autoload.php";
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$hostName= new DB();
$hostName = $hostName->hostName();


if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){

    die(header("Location: https://$hostName/url-short/index.php"));

}elseif(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ) {




    if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
        exit("Token is not set!");
    }

    if(!isset($_POST['url-input'])){
        header("Location: https://$hostName/url-short/index.php");
        exit("Input is empty");
    }


    if ($_SESSION["token"]==$_POST["token"]) {

        if (time() >= $_SESSION["token-expire"]) {
            exit("Token expired. Please reload form.");
        }else {

            unset($_SESSION["token"]);
            unset($_SESSION["token-expire"]);
            session_destroy();



            $Lurl = $_POST['url-input'];
            $Lurl = htmlspecialchars($Lurl);

            if(checkUrl($Lurl)){
                $randomString = random_string(2);
                $finalString = mixSreverAddressWithRandomUrl("$hostName/url-short",$randomString);


                $urlList = new Urls();
                $urlList->create($Lurl,$finalString);
            }else{
                exit("Url is invalid");
            }


        }
    }else{
        exit("INVALID TOKEN");
    }


}




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <title>Url-shorten-result</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




<div class="card">
    <div class="card-body">
        <form  action="../index.php" method="post">

            <div class="mb-3">
                <label class="form-label mb-3 " for="url-input">  Your long URL</label>
                <input class="form-control " type="text"  readonly="readonly" placeholder=<?php echo $_POST['url-input'] ??  "https://example.com"  ?>>


            </div>


            <div class="mb-3 ">
                <label class="form-label mb-3 " for="url-input">  New Short URL</label>
                <input class="form-control" type="text" id="shortUrl" value="<?php echo $finalString  ?>" placeholder=<?php echo $finalString ?? "" ?>>
            </div>

            <script>
                function myFunction() {

                    var copyText = document.getElementById("shortUrl");
                    copyText.select();
                    navigator.clipboard.writeText(copyText.value);

                }
            </script>


            <button class="btn btn-primary text-center" type="submit">Try Again</button>
            <button class="btn btn-success text-center" type="button" onclick="myFunction()">Copy Url</button>

        </form>
    </div>

</div>


<div style="text-align: center ; margin-top: 100px">  <a href="https://github.com/sepmi" target="_blank"><img src="../Img/Icons/github.png"> </a></div>



</body>
</html>
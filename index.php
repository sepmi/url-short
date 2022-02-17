<?php
use App\models\Urls;
require_once "./vendor/autoload.php";
session_start();


if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET' || strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){


    $_SESSION['token'] = bin2hex(random_bytes(35));
    $_SESSION["token-expire"] = time() + 600;


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
    <link rel="stylesheet" href="app/css/style.css">
    <title>Url-shorten</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




    <div class="card">
        <div class="card-body">
            <form  action="./app/url.php" method="post">

                <div class="mb-3">
                    <label class="form-text mb-3 " for="url-input"> Enter Your long URL</label>
                    <input class="form-control " type="text" name="url-input" placeholder=<?php echo $_POST['url-input'] ??  "https://example.com"  ?>>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">

                </div>



                <button class="btn btn-primary " type="submit">Make it short</button>

            </form>
        </div>

    </div>


</body>
</html>
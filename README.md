# Url-short

simple site with php that makes urls shorter.


<img width="1534" alt="1" src="https://user-images.githubusercontent.com/74340951/154805552-e0c59317-b064-4d19-adfa-44dcaff1acb9.png">
<img width="1534" alt="2" src="https://user-images.githubusercontent.com/74340951/154805569-d2fa3b78-baeb-4a8c-b3f5-33cab91544df.png">



## Usage: 



  step1: download this project on your local system 
  and change the folder name to "url-short" if it has different name.
 
 
  step2: run composer install command
 
  step3: make a mysql database "url-shorten" 
 
 
  step4: use "url_shorten.sql"  in the sql folder
  to make a table for your new database(made in previous step)
 
 
## !important 
if you do **not** connect to mysql with these settings 

username ="root" and password=" " and "localhost" 


you  should change the settings in the App\Models\DB class [$username , $password , $server ]



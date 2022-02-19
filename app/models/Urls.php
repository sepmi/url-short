<?php
namespace App\models;


class Urls extends DB{

    public function create($Lurl,$Surl){

         $stm = $this ->pdo->prepare("INSERT INTO urls_list (longUrl, shortUrl) values (:longUrl , :shortUrl)");


        $stm->execute([
            "longUrl" => $Lurl,
            "shortUrl" => $Surl
        ]);

    }


    public function find($suffix){

        $Surl = "https://{$this->hostName()}/url-short/". $suffix;
        $stm = $this->pdo->prepare("SELECT longUrl from urls_list where shortUrl = :shortUrl ");
        $stm->execute(["shortUrl" => $Surl]);

        if($stm->rowCount() != 0){
            $Lurl = $stm->fetch();
            return $Lurl["longUrl"];
        }else{
            echo "همچین سایتی وجود ندارد" ;
        }
    }


}
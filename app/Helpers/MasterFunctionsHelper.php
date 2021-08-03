<?php

namespace App\Helpers;

class MasterFunctionsHelper{

    public static function sayhello()
    {
        return "Hello Friends";
    }
    public static function OKResponse($issuccess,$msg,$data){
        return [
            "success"=>$issuccess,
            "messages"=>$msg,
            "data"=>$data
        ];
    }
}
?>

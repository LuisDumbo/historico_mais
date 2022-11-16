<?php

namespace App\BD;

use MongoDB\Client;


class BDconnection{
    
    public static function connect(){
        $client = new Client(
            'mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV']
         );
         
         return $client ;
         
    }
}
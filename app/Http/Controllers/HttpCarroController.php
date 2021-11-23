<?php

namespace App\Http\Controllers;


class HttpCarroController
{
    private String $http;
    
    public function __construct($placa){
        $this->http = "http://www.regcheck.org.uk/api/reg.asmx/CheckBrazil%20?RegistrationNumber=" . $placa . "&username=";
    }

    public function get(){
        $values = file_get_contents($this->http); 
        $xml=simplexml_load_string($values);
        $strJson = $xml->vehicleJson;
        $json = json_decode($strJson);
        return $json;
    }



}

<?php 
function date2soap($date) {
    return date("Y-m-d", $date) . "T" . date("h:i:s", $date) . "." . (date("u", $date) / 1000) . date("P");
}

function GiveMeString() { 
    return "This Sample String(tm) is (C) Serge V. Izmaylov, released under GPLv2 :)"; 
} 

function GiveMeInteger() { 
    return 2; 
} 

function GiveMeFloat() { 
    return 3.14159265; 
} 

function GiveMeBoolean() { 
    return true; 
} 

function GiveMeDate() { 
    return date2soap(time());
} 

function StringsAreEqual($str1, $str2) { 
    return ($str1 == $str2);
} 

function RoundFloat($num) { 
    return (int)round($num);
} 

function WhatIsNextDay($datestring) { 
    $dp = explode("-",substr($datestring, 0, 10));
    $date = mktime(0, 0, 0, $dp[1], $dp[2]+1, $dp[0]);
    return date2soap($date);
} 

if (($_SERVER["REQUEST_METHOD"] == "GET")) {
    $myurl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
    if (isset($_GET["wsdl"])) {
        header("Content-type: text/xml; charset=utf-8");
        echo str_replace("@@__URL__@@", $myurl, file_get_contents("BasicService.wsdl"));
    } else if (isset($_GET["service-source"])){
        header("Content-type: text/plain; charset=utf-8");
        header("Content-disposition: attachment; filename=service.php");
        echo file_get_contents(__FILE__);
    } else if (isset($_GET["client-source"])){
        header("Content-type: text/plain; charset=utf-8");
        header("Content-disposition: attachment; filename=client.php");
        echo file_get_contents(str_replace("-ws.php", "-cli.php", __FILE__));
    } else {
        header("Content-type: text/plain; charset=utf-8");
        echo "This is HTTP SOAP BasicService web service.\r\n" .
             "See " . $myurl . "?wsdl";
    }
} else {
    ini_set("error_reporting", false);
    $server = new SoapServer("BasicService.wsdl"); 
    $server->addFunction("GiveMeString"); 
    $server->addFunction("GiveMeInteger"); 
    $server->addFunction("GiveMeFloat"); 
    $server->addFunction("GiveMeBoolean"); 
    $server->addFunction("GiveMeDate"); 
    $server->addFunction("StringsAreEqual"); 
    $server->addFunction("RoundFloat"); 
    $server->addFunction("WhatIsNextDay"); 
    $server->handle(); 
}

<?php 
function date2soap($date) {
    return date("Y-m-d", $date) . "T" . date("h:i:s", $date) . "." . (date("u", $date) / 1000) . date("P");
}

function GiveMeIntArray() { 
    return array(1, 2, 3, 4, 5);
} 

function JoinArrayOfStrings($o) { 
    return implode("", $o);
} 

function FilterInvalidIds($o) { 
    $res = array();
    foreach ($o as $v)
        if (($v > 0) && ($v < 65535))
            $res[] = $v;
    return $res;
} 

function FilterInvalidIdsInGroups($o) { 
    $res = array();
    foreach ($o as $v)
        $res[] = FilterInvalidIds($v);
    return $res;
} 

function ReverseArray($o) { 
    return array_reverse($o);
} 

if (($_SERVER["REQUEST_METHOD"] == "GET")) {
    $myurl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
    if (isset($_GET["wsdl"])) {
        header("Content-type: text/xml; charset=utf-8");
        echo str_replace("@@__URL__@@", $myurl, file_get_contents("ArraysService.wsdl"));
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
        echo "This is HTTP SOAP ArraysService web service.\r\n" .
             "See " . $myurl . "?wsdl";
    }
} else {
    ini_set("error_reporting", false);
    $server = new SoapServer("ArraysService.wsdl"); 
    $server->addFunction("GiveMeIntArray"); 
    $server->addFunction("JoinArrayOfStrings"); 
    $server->addFunction("FilterInvalidIds"); 
    $server->addFunction("FilterInvalidIdsInGroups"); 
    $server->addFunction("ReverseArray"); 
    $server->handle(); 
}

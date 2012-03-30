<?php 
function createUser($id, $login, $password, $expires, $homedir) {
    $res = new stdClass();
    $res->Id = $id;
    $res->Login = $login;
    $res->Password = $password;
    $res->Expires = $expires;
    $res->HomeDirectory = $homedir;
    return $res;
}

function GetUserById($o) {
    return createUser((int)$o, "Alice", "wonderland", "2015-12-31T23.59.59.999Z", "/home/alice");
}


function SaveUserData($o) {
    return true;
}

function CopyUserProfile($t, $f) { 
    $res = createUser($t->Id, $t->Login, $t->Password, "", "");
    $res->Expires = $f->Expires;
    $res->HomeDirectory = $f->HomeDirectory;
    return $res;
} 

function ListProperties($o) { 
    $r = array();
    foreach ($o as $k => $v)
        $r[] = $k;
    return implode(", ", $r);
} 

if (($_SERVER["REQUEST_METHOD"] == "GET")) {
    $myurl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
    if (isset($_GET["wsdl"])) {
        header("Content-type: text/xml; charset=utf-8");
        echo str_replace("@@__URL__@@", $myurl, file_get_contents("ObjectsService.wsdl"));
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
        echo "This is HTTP SOAP ObjectsService web service.\r\n" .
             "See " . $myurl . "?wsdl";
    }
} else {
    ini_set("error_reporting", false);
    $server = new SoapServer("ObjectsService.wsdl"); 
    $server->addFunction("GetUserById"); 
    $server->addFunction("SaveUserData"); 
    $server->addFunction("CopyUserProfile"); 
    $server->addFunction("ListProperties"); 
    $server->handle(); 
}

<?php 

class EventSource {
    public $SubsystemName;
    public $InterfaceName;
    public function __construct($s, $i) {$this->SubsystemName = $s; $this->InterfaceName = $i;}
}

class TraceRecord {
    public $FileName;
    public $FunctionName;
    public $CodeLine;
    public function __construct($fi, $fu, $l) {$this->FileName = $fi; $this->FunctionName = $fu; $this->CodeLine = (int)$l;}
}

class FailureEvent {
    public $Message;
    public $Source;
    public $Stack;
    public function __construct($msg, $src, $starr) {$this->Message = $msg; $this->Source = $src; $this->Stack = $starr;}
}

$trace1 = array (
    new TraceRecord("graph.wcl", "AddNeighbor()", 12),
    new TraceRecord("fraud.wcl", "CorrelateTrans()", 187),
    new TraceRecord("controlling.wcl", "Entry()", 22)
);

$trace2 = array (
    new TraceRecord("sql.wcl", "Query()", 142),
    new TraceRecord("persist.wcl", "LoadProfile()", 487),
    new TraceRecord("webui.wcl", "Entry()", 156)
);

$failures = array(
    new FailureEvent("Out of memory", new EventSource("FraudDetection", "TransactionCorrelator"), $trace1),
    new FailureEvent("SQL syntax error near 'WHERE (!=0) AND'", new EventSource("Persistence", "Deserialization"), $trace2),
);

function GiveMeComplexObject() { 
    global $failures;
    return $failures[0];
} 

function GiveMeArrayOfComplexObjects() { 
    global $failures;
    return $failures;
} 

function PHPExportObject($o) {
    return var_export($o, true);
}

function GiveMeFault($o) {
    throw new SoapFault("513", $o);
}

if (($_SERVER["REQUEST_METHOD"] == "GET")) {
    $myurl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
    if (isset($_GET["wsdl"])) {
        header("Content-type: text/xml; charset=utf-8");
        echo str_replace("@@__URL__@@", $myurl, file_get_contents("MixedService.wsdl"));
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
        echo "This is HTTP SOAP MixedService web service.\r\n" .
             "See " . $myurl . "?wsdl\r\n";
    }
} else {
    ini_set("error_reporting", false);
    $server = new SoapServer("MixedService.wsdl"); 
    $server->addFunction("GiveMeComplexObject"); 
    $server->addFunction("GiveMeArrayOfComplexObjects"); 
    $server->addFunction("PHPExportObject"); 
    $server->addFunction("GiveMeFault"); 
    $server->handle(); 
}

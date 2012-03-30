<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" version="-//W3C//DTD XHTML 1.1//EN" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MixedService Examples</title>
    <link href="../css/samples.css" rel="stylesheet" type="text/css">
    <?php
        require_once("../util/formatxml.php");
        ini_set("error_reporting", true);
        $part1 = new stdClass();
        $part1->Id = 1;
        $part1->Name = "One";
        $part2 = new stdClass();
        $part2->Id = 2;
        $part2->Name = "Two";
        $part3 = new stdClass();
        $part3->Text = "Some string";
        $part3->Arr = array($part1, $part2);
        $part4 = new stdClass();
        $part4->Numbers = array(2,3,4,5,6,7);
        $part4->Booleans = array(true,true,false,true,false,true);
        $obj = new stdClass();
        $obj->FirstPart = $part3;
        $obj->SecondPart = $part4;
    ?>
</head>
<body><div id="page-content">

    <h1>MixedService Examples</h1>

<?php 
    $url = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["SCRIPT_NAME"]) . "/mixed-ws.php?wsdl";
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0)); 
?>
    <h2>tns:FailureEvent GiveMeComplexObject()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeComplexObject() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeComplexObject()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>tns:FailureEventsCollection GiveMeArrayOfComplexObjects()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeArrayOfComplexObjects() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeArrayOfComplexObjects()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:string PHPExportObject(soapenc:Struct)</h2>
    <pre class="console">
<?php 
    try { 
        print "PHPExportObject(obj) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->PHPExportObject($obj)

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:string GiveMeFault(xsd:string)</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeFault(\"test string\") returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeFault("test string")

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

</div></body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" version="-//W3C//DTD XHTML 1.1//EN" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ArraysService Examples</title>
    <link href="../css/samples.css" rel="stylesheet" type="text/css">
    <?php
        require_once("../util/formatxml.php");
        ini_set("error_reporting", true);
    ?>
</head>
<body><div id="page-content">

    <h1>ArraysService Examples</h1>

<?php 
    $url = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["SCRIPT_NAME"]) . "/arrays-ws.php?wsdl";
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0)); 
?>
    <h2>xsd:int[] GiveMeIntArray()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeIntArray() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeIntArray()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:string JoinArrayOfStrings(xsd:string[])</h2>
    <pre class="console">
<?php 
    try { 
        print "JoinArrayOfStrings([\"Foo\", \"Bar\", \"Baz\"]) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->JoinArrayOfStrings(array("Foo", "Bar", "Baz"))

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>tns:ArrayOfIds FilterInvalidIds(tns:ArrayOfIds)</h2>
    <pre class="console">
<?php 
    try { 
        print "FilterInvalidIds([-5, 4, 0, 20, 1000000, 48]) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->FilterInvalidIds(array(-5, 4, 0, 20, 1000000, 48))

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>tns:ArrayOfIdGroups FilterInvalidIdsInGroups(tns:ArrayOfIdGroups)</h2>
    <pre class="console">
<?php 
    try { 
        print "FilterInvalidIdsInGroups([[-5, 4, 0, 20, 1000000, 48], [1, 2, 3], [0, 1, -1, 2, -2]]) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->FilterInvalidIdsInGroups(array(
                array(-5, 4, 0, 20, 1000000, 48),
                array(1, 2, 3),
                array(0, 1, -1, 2, -2)
            ))

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>soapenc:Array ReverseArray(soapenc:Array)</h2>
    <pre class="console">
<?php 
    try { 
        print "ReverseArray([true, \"text\", [1, 2, 3]]) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->ReverseArray(array(true, "text", array(1, 2, 3)))

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

</div></body>
</html>

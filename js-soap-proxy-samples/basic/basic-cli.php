<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" version="-//W3C//DTD XHTML 1.1//EN" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>BasicService Examples</title>
    <link href="../css/samples.css" rel="stylesheet" type="text/css">
    <?php
        require_once("../util/formatxml.php");
        ini_set("error_reporting", false);
    ?>
</head>
<body><div id="page-content">

    <h1>BasicService Examples</h1>

<?php 
    $url = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["SCRIPT_NAME"]) . "/basic-ws.php?wsdl";
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 1)); 
?>
    <h2>xsd:string GiveMeString()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeString() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeString()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:int GiveMeInteger()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeInt() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeInteger()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:double GiveMeFloat()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeFloat() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeFloat()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:boolean GiveMeBoolean()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeBoolean() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeBoolean()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:dateTime GiveMeDate()</h2>
    <pre class="console">
<?php 
    try { 
        print "GiveMeDate() returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GiveMeDate()

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:boolean StringsAreEqual(xsd:string, xsd:string)</h2>
    <pre class="console">
<?php 
    try { 
        print "StringsAreEqual(\"foo\", \"bar\") returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->StringsAreEqual("foo", "bar")

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:int RoundFloat(xsd:double)</h2>
    <pre class="console">
<?php 
    try { 
        print "RoundFloat(2.718281828) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->RoundFloat(2.718281828)

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:dateTime WhatIsNextDay(xsd:dateTime)</h2>
    <pre class="console">
<?php 
    try { 
        print "WhatIsNextDay(\"2012-11-30T14:56:03Z\") returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->WhatIsNextDay("2012-11-30T14:56:03Z")

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

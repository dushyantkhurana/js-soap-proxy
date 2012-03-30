<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" version="-//W3C//DTD XHTML 1.1//EN" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ObjectsService Examples</title>
    <link href="../css/samples.css" rel="stylesheet" type="text/css">
    <?php
        require_once("../util/formatxml.php");
        ini_set("error_reporting", false);
        $user1 = new stdClass();
        $user1->Id = 5;
        $user1->Login = "Alice";
        $user1->Password = "wonderland";
        $user1->Expires = "2015-12-31T23.59.59.999Z";
        $user1->HomeDirectory = "/home/alice";
        $user2 = new stdClass();
        $user2->Id = 7;
        $user2->Login = "Bob";
        $user2->Password = "marley";
        $user2->Expires = "2013-12-31T23.59.59.999Z";
        $user2->HomeDirectory = "/home/jah";
        $obj = new stdClass();
        $obj->IntProp = 5;
        $obj->StrProp = "text";
        $obj->ArrProp = array(1,2,3);
    ?>
</head>
<body><div id="page-content">

    <h1>ObjectsService Examples</h1>

<?php 
    $url = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["SCRIPT_NAME"]) . "/objects-ws.php?wsdl";
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0)); 
?>
    <h2>tns:User GetUserById(xsd:int)</h2>
    <pre class="console">
<?php 
    try { 
        print "GetUserById(5) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->GetUserById(5)

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:boolean SaveUserData(tns:User)</h2>
    <pre class="console">
<?php 
    try { 
        print "SaveUserData({7, \"Bob\", \"marley\", \"2013-12-31T23.59.59.999Z\", \"/home/jah\"}) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->SaveUserData($user2)

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>tns:User CopyUserProfile(tns:User, tns:User)</h2>
    <pre class="console">
<?php 
    try { 
        print "CopyUserProfile(\r\n"+
              "    {7, \"Bob\", \"marley\", \"2013-12-31T23.59.59.999Z\", \"/home/jah\"},\r\n"+
              "    {5, \"Alice\", \"wonderland\", \"2015-12-31T23.59.59.999Z\", \"/home/alice\"},\r\n"+
              ") returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->CopyUserProfile($user2, $user1)

        , true)); ?></span><?php
        print "\r\n\r\nRequest was:\r\n" . preXml($client->__getLastRequest()) . "\r\n"; 
        print "\r\nResponse was:\r\n" . preXml($client->__getLastResponse()) . "\r\n"; 
    } catch (SoapFault $x) { 
        print "Exception:\r\n". $x . "\r\n"; 
    } 
?> 
    </pre>

    <h2>xsd:string ListProperties(soapenc:Struct)</h2>
    <pre class="console">
<?php 
    try { 
        print "ListProperties({IntProp: 7, StrProp: \"text\", ArrProp: [1, 2, 3]}) returns:\r\n";
        ?><span class="return"><?php echo htmlspecialchars(var_export(

            $client->ListProperties($obj)

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

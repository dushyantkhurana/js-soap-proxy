<?php
function preXml($xml) {  
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token      = strtok($xml, "\n");
    $result     = ''; // holds formatted version as it is built
    $pad        = 0; // initial indent
    $matches    = array(); // returns from preg_matches()
    while ($token !== false) : 
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) : 
            $indent=0;
        elseif (preg_match('/^<\/\w/', $token, $matches)) :
            $pad -= 4;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
            $indent = 4;
        else :
            $indent = 0; 
        endif;
        $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token   = strtok("\n");
        $pad    += $indent;
    endwhile; 
    return htmlspecialchars($result);
}

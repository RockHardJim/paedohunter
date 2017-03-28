<?php
defined('VIEW_FILES') || die('Direct access not allowed');

//Proxy Protection    
    //Method 1
    $url = 'http://www.shroomery.org/ythan/proxycheck.php?ip=' . $ip . '';
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_REFERER, "https://google.com");
    $proxy_check = curl_exec($ch);
    curl_close($ch);
    
    if ($proxy_check == "Y") {
        
        include "lib/ip_details.php";
        
        $type = "Proxy";
        
die("Fuck off");
}


//Method 2
    $proxy_headers = array(
        'HTTP_VIA',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED',
        'HTTP_CLIENT_IP',
        'HTTP_FORWARDED_FOR_IP',
        'VIA',
        'X_FORWARDED_FOR',
        'FORWARDED_FOR',
        'X_FORWARDED',
        'FORWARDED',
        'CLIENT_IP',
        'FORWARDED_FOR_IP',
        'HTTP_PROXY_CONNECTION'
    );
    foreach ($proxy_headers as $x) {
        if (isset($_SERVER[$x])) {
            
            $type = "Proxy";
            
die("Fuck off");
        }
    }

//Method 3
    $ports = array(
        8080,
        80,
        81,
        1080,
        6588,
        8000,
        3128,
        553,
        554,
        4480
    );
    foreach ($ports as $port) {
        if (@fsockopen($_SERVER['REMOTE_ADDR'], $port, $errno, $errstr, 30)) {
            
            $type = "Proxy";
            
die("Fuck off");
        }
    }
?>
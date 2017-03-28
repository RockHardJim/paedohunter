<?php
defined('VIEW_FILES') || die('Direct access not allowed');

@$hostname = strtolower(gethostbyaddr($ip));

//Fake Googlebot Detection
if (strpos(strtolower($useragent), "googlebot") !== false) {
    if (strpos($hostname, "googlebot.com") !== false OR strpos($hostname, "google.com") !== false) {
    } else {
        
        include "lib/ip_details.php";
        
        $type = "Fake Bot";
        
        //Logging
		die("Fuck Off");
    }
}

//Fake Bingbot Detection
if (strpos(strtolower($useragent), "bingbot") !== false) {
    if (strpos($hostname, "search.msn.com") !== false) {
    } else {
        
        include "lib/ip_details.php";
        
        $type = "Fake Bot";
        
		die("Fuck Off");
    }
}

//Fake Yahoo Bot Detection
if (strpos(strtolower($useragent), "yahoo! slurp") !== false) {
    if (strpos($hostname, "yahoo.com") !== false OR strpos($hostname, "crawl.yahoo.net") OR strpos($hostname, "yandex.com") !== false) {
    } else {
        
        include "lib/ip_details.php";
        
        $type = "Fake Bot";
        
        //Logging
		die("Fuck Off");
    }
}
?>
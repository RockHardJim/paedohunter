<?php
defined('VIEW_FILES') || die('Direct access not allowed');

//Detect Missing User-Agent Header
if (empty($useragent)) {
    
    include "lib/ip_details.php";
    
    $type = "Missing User-Agent header";
    
//die("Fuck off");
}
?>
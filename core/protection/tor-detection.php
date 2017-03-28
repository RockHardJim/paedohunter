<?php
defined('VIEW_FILES') || die('Direct access not allowed');
    
    $dnsbl_lookup = array(
        "tor.dan.me.uk",
        "tor.dnsbl.sectoor.de"
    );
    $reverse_ip   = implode(".", array_reverse(explode(".", $ip)));
    
    foreach ($dnsbl_lookup as $host) {
        if (checkdnsrr($reverse_ip . "." . $host . ".", "A")) {
            
            include "lib/ip_details.php";
            
            $type = "TOR Detected";
            
die("Fuck off");
    }
    
}
?>
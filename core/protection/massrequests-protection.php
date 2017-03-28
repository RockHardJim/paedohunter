<?php
defined('VIEW_FILES') || die('Direct access not allowed');
    
    if (!isset($_SESSION)) {
        @session_start();
    }
    
    //Many requests for less than 0.5 seconds (By Default)
    if (@$_SESSION['last_session_request'] > time() - 0.2) {
        
        include "lib/ip_details.php";
        
        $type = "Mass Requests";
        
die("Fuck off");
    }
    @$_SESSION['last_session_request'] = time();
?>
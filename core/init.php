<?php
defined('VIEW_FILES') || die('Direct access not allowed');
define("HASH_COST_FACTOR", "10");
require("configuration/configuration.php");
require("nano-xss.php");
include("authentication/user.php");
require("encryption/spark-crypt.php");
require("database/database-connection.php");
include("protection/sqli-protection.php");
include "protection/proxy-protection.php";
//include "protection/spam-protection.php";
include("protection/massrequests-protection.php");
//include("protection/tor-detection.php");
include("protection/badbots-protection.php");
include("protection/optimizations.php");
include("protection/fakebots-protection.php");
include("protection/headers-check.php");
 $sparklock = new spark_crypt("P@3d0ZB3w@r3W#");

//Error Reporting
if ($error_reporting == 1) {
    error_reporting(0);
}
if ($error_reporting == 2) {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}
if ($error_reporting == 3) {
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}
if ($error_reporting == 4) {
    error_reporting(E_ALL & ~E_NOTICE);
}
if ($error_reporting == 5) {
    error_reporting(E_ALL);
}

$theme_name = "basic/";
?>
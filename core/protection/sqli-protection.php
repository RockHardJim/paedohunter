<?php
defined('VIEW_FILES') || die('Direct access not allowed');            
    //Sanitization of all fields and requests
    //$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    
	if (!function_exists('cleanInput')) {
    function cleanInput($input)
    {
        $search = array(
            '@<script[^>]*?>.*?</script>@si', // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments
        );
        
        $output = preg_replace($search, '', $input);
        return $output;
    }
	}
    
	if (!function_exists('sanitize')) {
    function sanitize($input)
    {
        if (is_array($input)) {
            foreach ($input as $var => $val) {
                $output[$var] = sanitize($val);
            }
        } else {
            $input  = str_replace('"', "", $input);
            $input  = str_replace("'", "", $input);
            $input  = cleanInput($input);
            $output = htmlentities($input, ENT_QUOTES);
        }
        return @$output;
    }
	}
    
        $_POST    = sanitize($_POST);
        $_GET     = sanitize($_GET);
        $_REQUEST = sanitize($_REQUEST);
        $_COOKIE  = sanitize($_COOKIE);
        if (isset($_SESSION)) {
            $_SESSION = sanitize($_SESSION);
        }
    
    $request_uri  = $_SERVER['REQUEST_URI'];
    $query_string = $_SERVER['QUERY_STRING'];
    
    //Patterns, used to detect Malicous Request (SQL Injection)
    $patterns = array(
        "union",
        "coockie",
        "concat",
        "alter",
        "exec",
        "shell",
        "wget",
        "**/",
        "/**",
        "0x3a",
        "null",
        "DR/**/OP/",
        "drop",
        "/*",
        "*/",
        "*",
        "--",
        ";",
        "||",
        "' #",
        "or 1=1",
        "'1'='1",
        "BUN",
        "S@BUN",
        "char",
        "OR%",
        "`",
        "[",
        "]",
        "<",
        ">",
        "++",
        "script",
        "1,1",
        "substring",
        "ascii",
        "sleep(",
        "insert",
        "between",
        "values",
        "truncate",
        "benchmark",
        "sql",
        "mysql",
        "%27",
        "%22",
        "(",
        ")",
        "<?",
        "<?php",
        "?>",
        "../",
        "/localhost",
        "127.0.0.1",
        "loopback",
        ":",
        "%0A",
        "%0D",
        "%3C",
        "%3E",
        "%00",
        "%2e%2e",
        "input_file",
        "execute",
        "mosconfig",
        "environ",
        "scanner",
        "path=.",
        "mod=.",
        "eval\(",
        "javascript:",
        "base64_",
        "boot.ini",
        "etc/passwd",
        "self/environ",
        "md5",
        "echo.*kae",
        "=%27$",
		"Base64",
		"cmd"
    );
    foreach ($patterns as $pattern) {
        if (strlen($query_string) > 255 OR strpos(strtolower($query_string), strtolower($pattern)) !== false) {
                        
            include "lib/ip_details.php";
            
            $type   = "SQLi";
            exit("fuck off");
				
        }
    }
?>
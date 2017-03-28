<?php
defined('VIEW_FILES') || die('Direct access not allowed');
class spark_xss{

	//Initialize class...
	public function __construct(){
		
	}
	
	//Call native PHP function "htmlspecialchars"
	private function html_special_character($string_arg){
		$string_arg = htmlspecialchars($string_arg, ENT_QUOTES, 'utf-8');

		return $string_arg;
	}

	//Call native PHP function "strip_tags"
	private function stripe_tags($string_arg){
		// Sanitize HTML from the string
		$string_arg = strip_tags($string_arg);

		return $string_arg;
	}

	//Call native PHP function "stripe_slashes"
	private function stripe_slashes($string_arg){
		$string_arg = stripslashes($string_arg);

		return $string_arg;
	}

	//Call native PHP function "filter_var" and "FILTER_SANITIZE_STRING"
	private function filter_sanitize($string_arg){
		$string_arg = filter_var($string_arg, FILTER_SANITIZE_STRING);

		return $string_arg;
	}

	//Call native PHP function "filter_var" and "FILTER_VALIDATE_EMAIL"
	private function filter_email($string_arg){
		$string_arg = filter_var($string_arg, FILTER_VALIDATE_EMAIL);

		return $string_arg;
	}

	//Clean accents from string and other characters
	private function rare_accent($string_arg){
		$string_arg = str_replace(array("á","à","â","ã","ª","ä"),"a",$string_arg);
		$string_arg = str_replace(array("Á","À","Â","Ã","Ä"),"A",$string_arg);
		$string_arg = str_replace(array("Í","Ì","Î","Ï"),"I",$string_arg);
		$string_arg = str_replace(array("í","ì","î","ï"),"i",$string_arg);
		$string_arg = str_replace(array("é","è","ê","ë"),"e",$string_arg);
		$string_arg = str_replace(array("É","È","Ê","Ë"),"E",$string_arg);
		$string_arg = str_replace(array("ó","ò","ô","õ","ö","º"),"o",$string_arg);
		$string_arg = str_replace(array("Ó","Ò","Ô","Õ","Ö"),"O",$string_arg);
		$string_arg = str_replace(array("ú","ù","û","ü"),"u",$string_arg);
		$string_arg = str_replace(array("Ú","Ù","Û","Ü"),"U",$string_arg);
		$string_arg = str_replace(array("[","^","´","`","¨","~","]"),"",$string_arg);
		$string_arg = str_replace("ç", "c",$string_arg);
		$string_arg = str_replace("Ç", "C",$string_arg);
		$string_arg = str_replace("ñ", "n",$string_arg);
		$string_arg = str_replace("Ñ", "N",$string_arg);
		$string_arg = str_replace("Ý", "Y",$string_arg);
		$string_arg = str_replace("ý", "y",$string_arg);
		$string_arg = str_replace("&", "-",$string_arg);
		$string_arg = str_replace('"', "",$string_arg);
		$string_arg = str_replace("'", "",$string_arg);

		return $string_arg;
	}

	//Clean special characters from string
	private function special_character($string_arg){
		$string_arg = str_replace(" ", "-", $string_arg);
		$string_arg = str_replace("×", "x",$string_arg);
		$string_arg = str_replace("°", "", $string_arg);
		$string_arg = str_replace("'", "_", $string_arg);
		$string_arg = str_replace('"', "_", $string_arg);
		$string_arg = str_replace("+", "-",$string_arg);
		$string_arg = str_replace(",", "-",$string_arg);
		$string_arg = str_replace(":", "-",$string_arg);
		$string_arg = str_replace("--", "-", $string_arg);
		$string_arg = str_replace("---", "-",$string_arg);
		$string_arg = str_replace("{", "(",$string_arg);
		$string_arg = str_replace("}", ")",$string_arg);
		$string_arg = str_replace("[", "(",$string_arg);
		$string_arg = str_replace("]", ")",$string_arg);
		$string_arg = str_replace("<", "(",$string_arg);
		$string_arg = str_replace(">", ")",$string_arg);

		return $string_arg;
	}

	//Clean characters not allowed for name file in Windows and others
	private function allowed_by_os($string_arg){
		$string_arg = str_replace("*", "+", $string_arg);
		$string_arg = str_replace("|", "+",$string_arg);
		$string_arg = str_replace("\\", "+", $string_arg);
		$string_arg = str_replace(":", "+", $string_arg);
		$string_arg = str_replace('"', "+", $string_arg);
		$string_arg = str_replace("'", "+", $string_arg);
		$string_arg = str_replace("<", "(",$string_arg);
		$string_arg = str_replace(">", ")",$string_arg);
		$string_arg = str_replace("?", ".",$string_arg);
		$string_arg = str_replace("/", "+", $string_arg);

		return $string_arg;
	}

	//Clean dangerous characters for prevent XSS Attacks
	private function prevent_basic_xss($string_arg){
		$string_arg = str_replace(" ", "", $string_arg);
		$string_arg = str_replace("<", "[eugsxss]+",$string_arg);
		$string_arg = str_replace(">", "[eugsxss]-", $string_arg);
		$string_arg = str_replace("'", "", $string_arg);
		$string_arg = str_replace('"', "", $string_arg);
		$string_arg = str_replace("(", "-",$string_arg);
		$string_arg = str_replace(")", "-",$string_arg);
		$string_arg = str_replace("%3C", "[eugsxss]+",$string_arg);
		$string_arg = str_replace("%3E", "[eugsxss]-",$string_arg);

		if(strpos($string_arg,'[eugsxss]')!==false){
			$tmp_arr = explode("[eugsxss]", $string_arg);
			$string_arg = $tmp_arr[0];
		}

		return $string_arg;
	}

	//Clean your string with the specifieds methods
	public function clean($str_arg="", $methods_arr=null){
		$type_arg = gettype($methods_arr);
		if($type_arg=='array'){
			$countArr = count($methods_arr);
			for($i=0;$i<$countArr;++$i){
				$tmp_function_b = $methods_arr[$i];
				//$str_arg = call_user_func($tmp_function_b, $str_arg);
				$str_arg = $this->$tmp_function_b($str_arg);
			}
			return $str_arg;
		}
		return "";
	}

}
?>
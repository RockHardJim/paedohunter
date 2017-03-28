<?php
defined('VIEW_FILES') || die('Direct access not allowed');
function ConnectDB() 
{
$HOST = HOST;
$USER = USERNAME;
$PASSWORD = DB_PASSWORD;
$NAME = DATABASE;
			try {
				$this->DBCON = new PDO("mysql:host=".$HOST.";dbname=".$NAME, $USER, $PASSWORD); 
					$this->DBCON->exec("set names utf8");
					$this->DBCON->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return true;
				}
					catch (PDOException $e) 
				{
					echo 'Connection failed: ' . $e->getMessage();
				}

}
?>
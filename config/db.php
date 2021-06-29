<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', 'sasa', 'php_work');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}


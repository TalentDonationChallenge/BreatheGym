<?php
	class Database {
		private static $instance = NULL;

		private $database;

		private function __construct() {
			$this->database = new PDO("mysql:host=localhost;dbname=breathegym;port=8889", "root", "root");
			$this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$this->database->exec('set names utf8');
		}

		public static function getInstance() {
			if (self::$instance === NULL) {
				self::$instance = new Database();
			}

			return self::$instance->database;
		}
	}
?>

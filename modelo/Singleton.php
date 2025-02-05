<?php 
	class Singleton {
		private static $host = "localhost";
		private static $DB = "montana";
		private static $user = "root";
		private static $pass = "";
		private static $con = null;
		
		public static function getCon() {
			if (self::$con === null) {
				try {
					self::$con = new PDO("mysql:host=". self::$host .";dbname=". self::$DB, self::$user, self::$pass);
					self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				} catch (PDOException $e) {
					echo "Connection Failed: ". $e->getMessage();
				}
			}
			return self::$con;
		}
	}
?>
<?php

namespace AdvancedBan;

use PDO;

class Database {
	
	private static $host;
	private static $user;
	private static $password;
	private static $database;
	
	private static $connection;
	
	public static function initialize(string $host, string $user, string $password, string $database) {
		self::$host = $host;
		self::$user = $user;
		self::$password = $password;
		self::$database = $database;
		
		self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database . ";port=3306;charset=utf8mb4", self::$user, self::$password);
		self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	
	/*
	public static function getHost( ) {
		return self::$host;
	}
	
	public static function getUser( ) {
		return self::$user;
	}
	
	public static function getPassword( ) {
		return self::$password;
	}
	
	public static function getDatabase( ) {
		return self::$database;
	}
	*/
	
	public static function getData(string $table) {
		return self::$connection->query("SELECT * FROM " . $table)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public static function getConnection( ) {
		return self::$connection;
	}
	
}
<?php

namespace App;

use \PDO;

class Database
{
	private static ?PDO $connection = null;

	/** Establishes and caches database connection */
	public static function connection(): PDO
	{
		if(self::$connection === null)
		{
			self::$connection = self::establishConnection();
		}

		return self::$connection;
	}

	private static function establishConnection(): PDO
	{
		$env_path = __DIR__ . '/../.env';

		if(file_exists($env_path) === false)
		{
			throw new \Exception('Missing environment variables');
		}

		$ENV_VALUES = parse_ini_file($env_path);

		$driver = $ENV_VALUES['DB_DRIVER'] 	?? 'mysql';
		$host 	= $ENV_VALUES['DB_HOST'] 	?? 'localhost';
		$name 	= $ENV_VALUES['DB_NAME'] 	?? 'simple_php_framework';

		$dsn = "{$driver}:host={$host};dbname={$name}";

		$user = $ENV_VALUES['DB_USER'] ?? 'root';
		$pass = $ENV_VALUES['DB_PASSWORD'] ?? '';

		return new PDO($dsn, $user, $pass);
	}
}
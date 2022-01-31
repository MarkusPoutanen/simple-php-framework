<?php

namespace App;

use \PDO;

class Database
{
	public static function connect()
	{
		$env_path = __DIR__ . '/../env.ini';

		if(file_exists($env_path) === false)
		{
			throw new \Exception('Missing enviroment variables');
		}

		$ENV_VALUES = parse_ini_file($env_path);

		$driver = $ENV_VALUES['DB_DRIVER'];

		$pdo_values = [
			'host=' . $ENV_VALUES['DB_HOST'],
			'dbname=' . $ENV_VALUES['DB_NAME']
		];

		return new PDO($driver . ':' . implode(';', $pdo_values), $ENV_VALUES['DB_USER'], $ENV_VALUES['DB_PASSWORD']);
	}
}
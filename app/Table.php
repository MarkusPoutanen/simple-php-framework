<?php

namespace App;

use App\Database;

class Table
{
	public static function create($name, $fields)
	{
		$connection = Database::connect();

		$connection->query('CREATE TABLE ' . $name . '(' . implode(',', $fields) . ');');
	}

	public static function column($name, $type, $length = null)
	{
		return $name . ' ' . strtoupper($type) . ($length !== null ? '(' . $length . ')' : '');
	}

	public static function id()
	{
		return 'id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY';
	}

	public static function drop($name)
	{
		$connection = Database::connect();

		$connection->query('DROP TABLE ' . $name . ';');
	}
}
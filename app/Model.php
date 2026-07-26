<?php

namespace App;

use \PDO;
use App\DB;

class Model
{
	private static string $tableName;

	/** Infers and caches database table name from class name */
	private static function tableName(): string
	{
		$class_array = explode('\\', get_called_class());
		$class_name = strtolower(array_pop($class_array));

		if(substr($class_name, -1) === 'y')
		{
			self::$tableName = substr($class_name, 0, (strlen($class_name) - 1)) . 'ies';
		}
		else
		{
			self::$tableName = "{$class_name}s";
		}

		return self::$tableName;
	}

	/** @return array<object> */
	public static function all(): array
	{
		$query = DB::connection()->query('SELECT * FROM ' . self::tableName() . ';');

		if($query === false)
		{
			return [];
		}

		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public static function find(int $id): bool|object|null
	{
		$query = DB::connection()->query('SELECT * FROM ' . self::tableName() . " WHERE id = {$id} ORDER BY id ASC LIMIT 1;");

		if($query === false)
		{
			return null;
		}

		return $query->fetchObject();
	}

	public static function findOrFail(int $id): object|bool
	{
		$model = self::find($id);

		if($model === null || $model === false)
		{
			http_response_code(404);
			exit;
		}

		return $model;
	}
}
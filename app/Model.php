<?php

namespace App;

use \PDO;
use App\Database;

class Model
{
	private static $connection;
	private static $tableName;

	private static function databaseConnection()
	{
		Model::$connection = Database::connect();
	}

	private static function getTableNameFromClassName($model_name)
	{
		$class_array = explode('\\', $model_name);
		$class_name = strtolower(array_pop($class_array));

		if(substr($class_name, -1) === 'y')
		{
			Model::$tableName = substr($class_name, 0, (strlen($class_name) - 1)) . 'ies';
			
			return;
		}
		
		Model::$tableName = "{$class_name}s";
	}

	public static function all()
	{
		Model::databaseConnection();
		Model::getTableNameFromClassName(get_called_class());

		$models = Model::$connection->query('SELECT * FROM ' . Model::$tableName . ';')->fetchAll(PDO::FETCH_OBJ);

		return $models;
	}

	public static function find($id)
	{
		Model::databaseConnection();
		Model::getTableNameFromClassName(get_called_class());

		$model = Model::$connection->query('SELECT * FROM ' . Model::$tableName . ' WHERE id = ' . $id . ' ORDER BY id ASC LIMIT 1;')->fetchObject();

		if($model === false)
		{
			http_response_code(404);
			exit;
		}

		return $model;
	}
}
<?php

namespace App;

use App\DB;

class Table
{
	/**
	 * @param string $name
	 * @param array<string> $fields
	 */
	public static function create(string $name, array $fields): void
	{
		$fields_sql = implode(',', $fields);

		DB::connection()->query("CREATE TABLE {$name} ({$fields_sql});");
	}

	public static function column(string $name, string $type, ?int $length = null): string
	{
		$type = strtoupper($type);
		$length = $length !== null ? "({$length})" : '';

		return "{$name} {$type}{$length}";
	}

	public static function id(): string
	{
		return 'id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY';
	}

	public static function drop(string $name): void
	{
		DB::connection()->query("DROP TABLE {$name};");
	}
}
<?php

namespace App;

use App\Database;

class Table
{
	/**
	 * @param string $name
	 * @param array<string> $fields
	 */
	public static function create(string $name, array $fields): void
	{
		$fields_sql = implode(',', $fields);

		Database::connection()->query("CREATE TABLE {$name} ({$fields_sql});");
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
		Database::connection()->query("DROP TABLE {$name};");
	}
}
<?php

namespace Cli;

use App\Database;
use App\Table;
use PDO;

class Simple
{
	public static function install()
	{
		Simple::line('Installing Simple PHP Framework...');

		if(file_exists(__DIR__ . '/../.env') === false)
		{
			Simple::line('.env file is missing, copying defaults...');

			copy(__DIR__ . '/../.env.example', __DIR__ . '/../.env');

			Simple::success('.env file created!');
		}

		Simple::success('Install completed!');
	}

	public static function migrations()
	{
		$connection = Database::connect();

		$done_migrations = Simple::getDoneMigrations();

		echo "Running migrations..." . PHP_EOL;

		$scanned_directory = array_diff(scandir('migrations'), array('..', '.'));

		foreach($scanned_directory as $filename)
		{
			echo 'Migrating: ' . $filename . "\t";

			$class = 'Migrations\\' . explode('.', $filename)[0];

			if(in_array($filename, $done_migrations))
			{
				echo Simple::colored('[SKIPPED]', 'yellow') . PHP_EOL;
				continue;
			}

			$migration = new $class;

			try
			{
				$connection->query('INSERT INTO migrations VALUES (NULL, "' . $filename . '");');

				$migration::run();

				echo Simple::colored('[OK]', 'green') . PHP_EOL;
			}
			catch(\Exception $e)
			{
				echo Simple::colored('[FAILED]', 'red') . "\t" . $e->getMessage() . PHP_EOL;
			}

		}

		echo 'All migrations done!';
	}

	private static function getDoneMigrations()
	{
		$connection = Database::connect();

		try
		{
			$connection->query('SELECT id FROM migrations;');
		}
		catch(\Exception $e)
		{
			Table::create('migrations', [
				Table::id(),
				Table::column('name', 'varchar', 256),
			]);
		}

		return $connection->query('SELECT name FROM migrations;')->fetchAll(PDO::FETCH_COLUMN);
	}

	private static function colored($string, $color)
	{
		$colors = [
			'red' 	 => '[91m',
			'green'  => '[92m',
			'yellow' => '[93m',
		];

		return "\033" . $colors[$color] . $string . "\033[0m";
	}

	private static function line($message)
	{
		Simple::printLine("[INFO] {$message}");
	}

	private static function success($message)
	{
		Simple::printLine(Simple::colored('[OK]', 'green') . " {$message}");
	}

	private static function printLine($message)
	{
		echo $message . PHP_EOL;
	}

	public static function help()
	{
		$commands = [
			'help'	  => 'Display available commands',
			'install' => 'Install settings',
			'migrate' => 'Run all available migrations',
		];

		echo PHP_EOL;

		foreach($commands as $command => $description)
		{
			echo Simple::colored($command, 'yellow') . "\t\t" . $description . PHP_EOL;
		}

		echo PHP_EOL;
	}
}
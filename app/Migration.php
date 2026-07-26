<?php

namespace App;

interface Migration
{
	public static function run(): void;

	public static function revert(): void;
}
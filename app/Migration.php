<?php

namespace App;

interface Migration
{
	public static function run();

	public static function revert();
}
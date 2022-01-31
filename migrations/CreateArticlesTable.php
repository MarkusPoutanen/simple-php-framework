<?php

namespace Migrations;

use App\Migration;
use App\Table;

class CreateArticlesTable implements Migration
{
	public static function run()
	{
		Table::create('articles', [
			Table::id(),
			Table::column('slug', 'varchar', 196),
			Table::column('heading', 'varchar', 128),
			Table::column('content', 'text'),
			Table::column('published_at', 'timestamp'),
		]);
	}
	
	public static function revert()
	{
		Table::drop('articles');
	}
}

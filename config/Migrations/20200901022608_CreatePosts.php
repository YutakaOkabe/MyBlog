<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePosts extends AbstractMigration
{
	/**
	 * Change Method.
	 *
	 * More information on this method is available here:
	 * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
	 * @return void
	 */
	public function change()
	{
		$table = $this->table('posts');
		$table
			->addColumn('user_id', 'integer', [
				'null' => false
			])
			->addColumn('title', 'string', [
				'limit' => 255,
				'null' => false
			])
			->addColumn('body', 'text', [
				'null' => false
			])
			->addColumn('published', 'boolean', [
				'default' => true
			])
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();
	}
}

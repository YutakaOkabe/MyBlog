<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAttachmentsAdd extends AbstractMigration
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
        $table = $this->table('attachments');
        $table
        ->addColumn('model', 'text', [
            'comment' => 'モデル名',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('model_id', 'integer', [
            'comment' => 'モデルID',
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('field_name', 'text', [
            'comment' => 'フィールド名',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('file_name', 'text', [
            'comment' => 'ファイル名',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('file_content_type', 'text', [
            'comment' => 'ファイルタイプ',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('file_size', 'integer', [
            'comment' => 'ファイルサイズ',
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('file_object', 'text', [
            'comment' => 'ファイル',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('file_random_path', 'text', [
            'comment' => 'ランダムパス',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('created', 'timestamp', [
            'comment' => '作成日',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('modified', 'timestamp', [
            'comment' => '更新日',
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addIndex(
            [
                'model_id',
            ]
        )
        ->create();
    }
}

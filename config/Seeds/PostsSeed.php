<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Posts seed.
 */
class PostsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'title' => 'テストタイトル1',
                'body' => 'testtesttesttesttesttest1',
                'published' => true,
                'created' => '2020-09-01 12:00:00',
                'modified' => '2020-09-01 12:00:00'
            ],[
                'user_id' => 2,
                'title' => 'テストタイトル2',
                'body' => 'testtesttesttesttesttest2',
                'published' => false,
                'created' => '2020-09-02 12:00:00',
                'modified' => '2020-09-02 12:00:00'
            ],[
                'user_id' => 3,
                'title' => 'テストタイトル3',
                'body' => 'testtesttesttesttesttest3',
                'published' => true,
                'created' => '2020-09-03 12:00:00',
                'modified' => '2020-09-03 12:00:00'
            ]
            
        ];

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}

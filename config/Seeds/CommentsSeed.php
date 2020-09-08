<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Comments seed.
 */
class CommentsSeed extends AbstractSeed
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
                'post_id' => 2,
                'body' => 'いいですね！',
                'created' => '2020-09-05 12:00:00',
                'modified' => '2020-09-05 12:00:00'
            ],[
                'post_id' => 3,
                'body' => 'めっちゃいいですね！',
                'created' => '2020-09-06 12:00:00',
                'modified' => '2020-09-06 12:00:00'
            ],[
                'post_id' => 1,
                'body' => 'すごくいいですね！',
                'created' => '2020-09-06 12:00:00',
                'modified' => '2020-09-06 12:00:00'
            ],[
                'post_id' => 1,
                'body' => 'とてもいいですね！',
                'created' => '2020-09-06 12:00:00',
                'modified' => '2020-09-06 12:00:00'
            ]
        ];

        $table = $this->table('comments');
        $table->insert($data)->save();
    }
}

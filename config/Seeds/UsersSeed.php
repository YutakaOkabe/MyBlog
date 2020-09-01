<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'ユーザ1',
                'email' => 'user1@gmail.com',
                'password' => $this->_setPassword('password1'),
                'created' => '2020-09-01 12:00:00',
                'modified' => '2020-09-01 12:00:00'
            ],[
                'username' => 'ユーザ2',
                'email' => 'user2@gmail.com',
                'password' => $this->_setPassword('password2'),
                'created' => '2020-09-02 12:00:00',
                'modified' => '2020-09-02 12:00:00'
            ],[
                'username' => 'ユーザ3',
                'email' => 'user3@gmail.com',
                'password' => $this->_setPassword('password3'),
                'created' => '2020-09-03 12:00:00',
                'modified' => '2020-09-03 12:00:00'
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}

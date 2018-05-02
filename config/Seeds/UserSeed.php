<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User seed.
 */
class UserSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
         $data = [
        'name'=>'root',
            'email'=>'admin@admin.com',
            'password'=> (new DefaultPasswordHasher)->hash('123456'),
            'status'=> 1,
            'photo'=> 'NoPhoto',
            'role_id'=> 2,
            'created'=>date("Y-m-d H:i:s"),
            'modified'=>date("Y-m-d H:i:s")];
        $table = $this->table('users');
        $table->insert($data)->save();
}}

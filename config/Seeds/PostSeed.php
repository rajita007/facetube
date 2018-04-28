<?php
use Migrations\AbstractSeed;

/**
 * Post seed.
 */
class PostSeed extends AbstractSeed
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
        $data = ['sender_id'=>2,
      'description'=>'qwertyuioplkjhgfdsazxcvbnm',
      'attach'=>'qweasdfghjklmnbvcxz',
    'receiver_id'=>1,
    'created' => date('Y-m-d H:i:s'),
    'modified' => date('Y-m-d H:i:s')];

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}

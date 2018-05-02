<?php
use Migrations\AbstractSeed;

/**
 * NotificationType seed.
 */
class NotificationTypeSeed extends AbstractSeed
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
        [
            'name'=>'Messages',
            'created'=>date("Y-m-d H:i:s"),
            'modified'=>date("Y-m-d H:i:s")

        
        ],

        [

            'name'=>'Friends',
            'created'=>date("Y-m-d H:i:s"),
            'modified'=>date("Y-m-d H:i:s")
        ],
        [

            'name'=>'Likes',
            'created'=>date("Y-m-d H:i:s"),
            'modified'=>date("Y-m-d H:i:s")
        ],
        [

            'name'=>'Posts',
            'created'=>date("Y-m-d H:i:s"),
            'modified'=>date("Y-m-d H:i:s")
        ],
    ];

        $table = $this->table('notification_types');
        $table->insert($data)->save();
    }
}

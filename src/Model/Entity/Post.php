<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $sender_id
 * @property string $description
 * @property string $attach
 * @property int $receiver_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $sender
 * @property \App\Model\Entity\User $receiver
 * @property \App\Model\Entity\Like[] $likes
 */
class Post extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'sender_id' => true,
        'description' => true,
        'attach' => true,
        'receiver_id' => true,
        'created' => true,
        'modified' => true,
        'sender' => true,
        'receiver' => true,
        'likes' => true
    ];
}

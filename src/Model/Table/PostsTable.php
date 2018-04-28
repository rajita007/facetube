<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\SendersTable|\Cake\ORM\Association\BelongsTo $Senders
 * @property \App\Model\Table\ReceiversTable|\Cake\ORM\Association\BelongsTo $Receivers
 * @property \App\Model\Table\LikesTable|\Cake\ORM\Association\HasMany $Likes
 *
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Senders', [
            'className'=>'Users',
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Receivers', [
            'className'=>'Users',
            'foreignKey' => 'receiver_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Likes', [
            'foreignKey' => 'post_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('attach')
            ->requirePresence('attach', 'create')
            ->notEmpty('attach');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sender_id'], 'Senders'));
        $rules->add($rules->existsIn(['receiver_id'], 'Receivers'));

        return $rules;
    }
}

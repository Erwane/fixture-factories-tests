<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerUser Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CustomerUser newEmptyEntity()
 * @method \App\Model\Entity\CustomerUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomerUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CustomerUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomerUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomerUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomerUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CustomerUserTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('customer_user');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('customer_id')
            ->requirePresence('customer_id', 'create')
            ->notEmptyString('customer_id');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->integer('is_super')
            ->requirePresence('is_super', 'create')
            ->notEmptyString('is_super');

        $validator
            ->integer('is_tech')
            ->requirePresence('is_tech', 'create')
            ->notEmptyString('is_tech');

        $validator
            ->integer('is_guest')
            ->requirePresence('is_guest', 'create')
            ->notEmptyString('is_guest');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('customer_id', 'Customers'), ['errorField' => 'customer_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

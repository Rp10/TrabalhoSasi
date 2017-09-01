<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Objetos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Historicos
 *
 * @method \App\Model\Entity\Objeto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Objeto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Objeto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Objeto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Objeto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Objeto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Objeto findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObjetosTable extends Table
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

        $this->table('objetos');
        $this->displayField('nome_obj');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Historicos', [
            'foreignKey' => 'objeto_id'
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
            ->requirePresence('nome_obj', 'create')
            ->notEmpty('nome_obj');

        $validator
            ->requirePresence('utilidade', 'create')
            ->notEmpty('utilidade');

        $validator
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

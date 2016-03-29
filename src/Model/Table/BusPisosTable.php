<?php
namespace App\Model\Table;

use App\Model\Entity\BusPiso;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusPisos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buses
 */
class BusPisosTable extends Table
{
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('bus_pisos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Buses', [
            'foreignKey' => 'bus_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BusAsientos', [
            'foreignKey' => 'bus_piso_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('imagen', 'create')
            ->notEmpty('imagen');

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
        $rules->add($rules->existsIn(['bus_id'], 'Buses'));
        return $rules;
    }
}

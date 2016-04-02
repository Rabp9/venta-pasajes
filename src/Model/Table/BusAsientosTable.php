<?php
namespace App\Model\Table;

use App\Model\Entity\BusAsiento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusAsientos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BusPisos
 * @property \Cake\ORM\Association\BelongsTo $Estados
 */
class BusAsientosTable extends Table
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

        $this->table('bus_asientos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BusPisos', [
            'foreignKey' => 'bus_piso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
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
            ->integer('nro_asiento')
            ->allowEmpty('nro_asiento');

        $validator
            ->integer('x')
            ->allowEmpty('x');

        $validator
            ->integer('y')
            ->allowEmpty('y');

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
        $rules->add($rules->existsIn(['bus_piso_id'], 'BusPisos'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        return $rules;
    }
}

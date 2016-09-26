<?php
namespace App\Model\Table;

use App\Model\Entity\DetalleConductor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleConductores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Programaciones
 * @property \Cake\ORM\Association\BelongsTo $Conductores
 */
class DetalleConductoresTable extends Table
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

        $this->table('detalle_conductores');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Programaciones', [
            'foreignKey' => 'programacion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Conductores', [
            'foreignKey' => 'conductor_id',
            'joinType' => 'INNER',
            'propertyName' => 'conductor'
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
            ->allowEmpty('condicion');

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
        $rules->add($rules->existsIn(['programacion_id'], 'Programaciones'));
        $rules->add($rules->existsIn(['conductor_id'], 'Conductores'));
        return $rules;
    }
}

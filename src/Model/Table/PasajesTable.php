<?php
namespace App\Model\Table;

use App\Model\Entity\Pasaje;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pasajes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $BusAsientos
 * @property \Cake\ORM\Association\BelongsTo $Programaciones
 */
class PasajesTable extends Table
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

        $this->table('pasajes');
        $this->displayField('id');
        $this->primaryKey(['id', 'persona_id', 'bus_asiento_id', 'programacion_id']);

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BusAsientos', [
            'foreignKey' => 'bus_asiento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Programaciones', [
            'foreignKey' => 'programacion_id',
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
            ->decimal('valor')
            ->allowEmpty('valor');

        $validator
            ->dateTime('fechahora')
            ->allowEmpty('fechahora');

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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['bus_asiento_id'], 'BusAsientos'));
        $rules->add($rules->existsIn(['programacion_id'], 'Programaciones'));
        return $rules;
    }
}

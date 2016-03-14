<?php
namespace App\Model\Table;

use App\Model\Entity\Agencia;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agencias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ubigeos
 */
class AgenciasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('agencias');
        $this->displayField('direccion');
        $this->primaryKey('id');

        $this->belongsTo('Ubigeos', [
            'foreignKey' => 'ubigeo_id',
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
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->integer('celular')
            ->allowEmpty('celular');

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
        $rules->add($rules->existsIn(['ubigeo_id'], 'Ubigeos'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        return $rules;
    }
}

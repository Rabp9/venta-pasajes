<?php
namespace App\Model\Table;

use App\Model\Entity\Restriccion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Restricciones Model
 *
 */
class RestriccionesTable extends Table
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

        $this->table('restricciones');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->integer('desplazamiento_x')
            ->allowEmpty('desplazamiento_x', 'create');

        $validator
            ->integer('desplazamiento_y')
            ->allowEmpty('desplazamiento_y', 'create');

        $validator
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        return $validator;
    }
}

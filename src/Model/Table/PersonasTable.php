<?php
namespace App\Model\Table;

use App\Model\Entity\Persona;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 */
class PersonasTable extends Table
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

        $this->table('personas');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Conductores', [
            'foreignKey' => 'persona_id'
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
            ->allowEmpty('dni');

        $validator
            ->allowEmpty('nombres');

        $validator
            ->allowEmpty('apellidos');

        $validator
            ->allowEmpty('domicilio');

        $validator
            ->date('fecha_nac')
            ->allowEmpty('fecha_nac');

        $validator
            ->allowEmpty('sexo');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('cel');

        $validator
            ->allowEmpty('correo');

        return $validator;
    }
}

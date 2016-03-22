<?php
namespace App\Model\Table;

use App\Model\Entity\Desplazamiento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Desplazamientos Model
 *
 */
class DesplazamientosTable extends Table
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

        $this->table('desplazamientos');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->belongsTo('AgenciaOrigen', [
            "className" => "Agencias",
            'foreignKey' => 'origen',
            'joinType' => 'INNER',
            'propertyName' => 'AgenciaOrigen'
        ]);
        
        $this->belongsTo('AgenciaDestino', [
            "className" => "Agencias",
            'foreignKey' => 'destino',
            'joinType' => 'INNER',
            'propertyName' => 'AgenciaDestino'
        ]);
        
        $this->hasMany('Tarifas', [
            'foreignKey' => 'desplazamiento_id'
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
            ->integer('origen')
            ->allowEmpty('origen', 'create');

        $validator
            ->integer('destino')
            ->allowEmpty('destino', 'create');

        return $validator;
    }
}

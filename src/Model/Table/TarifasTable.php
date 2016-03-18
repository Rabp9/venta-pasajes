<?php
namespace App\Model\Table;

use App\Model\Entity\Tarifa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tarifas Model
 * @property \Cake\ORM\Association\BelongsTo $AgenciaOrigen
 * @property \Cake\ORM\Association\BelongsTo $AgenciaDestino
 * @property \Cake\ORM\Association\BelongsTo $Servicios
 */
class TarifasTable extends Table
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

        $this->table('tarifas');
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
        
        $this->belongsTo('Servicios', [
            'foreignKey' => 'servicio_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Detalle_desplazamientos', [
            'foreignKey' => 'tarifa_id'
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

        $validator
            ->decimal('precio_min')
            ->allowEmpty('precio_min');

        $validator
            ->decimal('precio_max')
            ->allowEmpty('precio_max');

        $validator
            ->integer('tiempo')
            ->allowEmpty('tiempo');

        return $validator;
    }
}

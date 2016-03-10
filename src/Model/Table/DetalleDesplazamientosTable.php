<?php
namespace App\Model\Table;

use App\Model\Entity\DetalleDesplazamiento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleDesplazamientos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rutas
 * @property \Cake\ORM\Association\BelongsTo $ProgramacionViajes
 * @property \Cake\ORM\Association\BelongsTo $Agencias
 */
class DetalleDesplazamientosTable extends Table
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

        $this->table('detalle_desplazamientos');
        $this->displayField('id');
        $this->primaryKey(['id', 'ruta_id', 'programacion_viaje_id', 'agencia_id']);

        $this->belongsTo('Rutas', [
            'foreignKey' => 'ruta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProgramacionViajes', [
            'foreignKey' => 'programacion_viaje_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Agencias', [
            'foreignKey' => 'agencia_id',
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
            ->dateTime('hora_salida')
            ->allowEmpty('hora_salida');

        $validator
            ->dateTime('hora_llegada')
            ->allowEmpty('hora_llegada');

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
        $rules->add($rules->existsIn(['ruta_id'], 'Rutas'));
        $rules->add($rules->existsIn(['programacion_viaje_id'], 'ProgramacionViajes'));
        $rules->add($rules->existsIn(['agencia_id'], 'Agencias'));
        return $rules;
    }
}

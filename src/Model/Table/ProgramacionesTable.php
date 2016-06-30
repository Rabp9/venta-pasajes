<?php
namespace App\Model\Table;

use App\Model\Entity\Programacione;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Programaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\BelongsTo $Rutas
 * @property \Cake\ORM\Association\BelongsTo $Servicios
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\HasMany $DetalleConductores
 */
class ProgramacionesTable extends Table
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

        $this->table('programaciones');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Buses', [
            'foreignKey' => 'bus_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Rutas', [
            'foreignKey' => 'ruta_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Servicios', [
            'foreignKey' => 'servicio_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('DetalleConductores', [
            'foreignKey' => 'programacion_id'
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
            ->dateTime('fechahora_prog')
            ->allowEmpty('fechahora_prog');

        $validator
            ->dateTime('fecha_via')
            ->allowEmpty('fecha_via');

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
        $rules->add($rules->existsIn(['ruta_id'], 'Rutas'));
        $rules->add($rules->existsIn(['servicio_id'], 'Servicios'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        return $rules;
    }
    
    public function findProgramacion($id) {
        $programacion = $this->get($id, [
            "contain" => ["Rutas", "Servicios", "Buses.BusPisos.BusAsientos"]
        ]);
        
        foreach ($programacion->buses as $bus) {
            
        }
    }
}

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
 * @property \Cake\ORM\Association\BelongsTo $Desplazamientos
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
        $this->primaryKey('id');

        $this->belongsTo('Rutas', [
            'foreignKey' => 'ruta_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Desplazamientos', [
            'foreignKey' => 'desplazamiento_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Restricciones', [
            'foreignKey' => 'desplazamiento_x',
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
        $rules->add($rules->existsIn(['desplazamiento_id'], 'Desplazamientos'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\DetalleProgramacione;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleProgramaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rutas
 * @property \Cake\ORM\Association\BelongsTo $Programaciones
 * @property \Cake\ORM\Association\BelongsTo $Servicios
 */
class DetalleProgramacionesTable extends Table
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

        $this->table('detalle_programaciones');
        $this->displayField('id');
        $this->primaryKey(['id', 'ruta_id', 'programacion_id', 'servicio_id']);

        $this->belongsTo('Rutas', [
            'foreignKey' => 'ruta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Programaciones', [
            'foreignKey' => 'programacion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Servicios', [
            'foreignKey' => 'servicio_id',
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
        $rules->add($rules->existsIn(['programacion_id'], 'Programaciones'));
        $rules->add($rules->existsIn(['servicio_id'], 'Servicios'));
        return $rules;
    }
}

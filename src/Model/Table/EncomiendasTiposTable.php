<?php
namespace App\Model\Table;

use App\Model\Entity\EncomiendaTipo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Encomiendas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TipoProductos
 */
class EncomiendasTiposTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('encomiendas_tipos');
        $this->displayField('detalle');
        $this->primaryKey('id');
        
        $this->belongsTo('TipoProductos', [
            'foreignKey' => 'tipo_producto_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Encomiendas', [
            'foreignKey' => 'encomienda_id',
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['encomienda_id'], 'Encomiendas'));
        $rules->add($rules->existsIn(['tipo_producto_id'], 'TipoProductos'));
        return $rules;
    }
}

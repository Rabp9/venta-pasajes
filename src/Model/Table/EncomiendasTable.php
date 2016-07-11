<?php
namespace App\Model\Table;

use App\Model\Entity\Encomienda;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Encomiendas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Programaciones
 * @property \Cake\ORM\Association\BelongsTo $Desplazamientos
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\HasMany $eEncomiendasTipos
 */
class EncomiendasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('encomiendas');
        $this->displayField('valor');
        $this->primaryKey('id');
        
        $this->belongsTo('Desplazamientos', [
            'foreignKey' => 'desplazamiento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Remitente', [
            "className" => "Personas",
            'foreignKey' => 'remitente',
            'joinType' => 'INNER',
            'propertyName' => 'remitente'
        ]);
        
        $this->belongsTo('Destinatario', [
            "className" => "Personas",
            'foreignKey' => 'destinatario',
            'joinType' => 'INNER',
            'propertyName' => 'destinatario'
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
        $rules->add($rules->existsIn(['desplazamiento_id'], 'Desplazamientos'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        return $rules;
    }
}

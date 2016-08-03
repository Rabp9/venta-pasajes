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
 * @property \Cake\ORM\Association\BelongsTo $Clientes
 * @property \Cake\ORM\Association\BelongsTo $Desplazamientos
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\HasMany $EncomiendasTipos
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
        
        $this->belongsTo('Programaciones', [
            'foreignKey' => 'programacion_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('PersonaRemitente', [
            "className" => "Personas",
            'foreignKey' => 'remitente',
            'joinType' => 'INNER',
            'propertyName' => 'personaRemitente'
        ]);
        
        $this->belongsTo('PersonaDestinatario', [
            "className" => "Personas",
            'foreignKey' => 'destinatario',
            'joinType' => 'INNER',
            'propertyName' => 'personaDestinatario'
        ]);
        
        $this->hasMany('EncomiendasTipos', [
            'foreignKey' => 'encomienda_id'
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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Giro;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Giros Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Programaciones
 * @property \Cake\ORM\Association\BelongsTo $Desplazamientos
 * @property \Cake\ORM\Association\BelongsTo $Estados
 */
class GirosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('giros');
        $this->displayField('valor_total');
        $this->primaryKey('id');
        
        $this->belongsTo('Desplazamientos', [
            'foreignKey' => 'desplazamiento_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Programaciones', [
            'foreignKey' => 'programacion_id',
            'joinType' => 'LEFT',
            'propertyName' => 'programacion'
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
            'joinType' => 'LEFT',
            'propertyName' => 'personaDestinatario'
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
    
    public function getNextNroDoc() {
        $encomiendas = TableRegistry::get('Encomiendas');
        $encomienda = $encomiendas->find()
            ->where(['tipodoc' => 'boleta'])
            ->limit(1)
            ->orderDesc('nro_doc')
            ->first();
        $giro = $this->find()
            ->limit(1)
            ->orderDesc('nro_doc')
            ->first();
        if ($encomienda && $giro) {
            $last_nro_doc = max(array($encomienda->nro_doc, $giro->nro_doc)) + 1;
        } elseif($encomienda) {
            $last_nro_doc = $encomienda->nro_doc + 1;
        } elseif($giro) {
            $last_nro_doc = $giro->nro_doc + 1;
        } else {
            $last_nro_doc = 1;
        }
        return $last_nro_doc;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Ubigeo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ubigeos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentUbigeos
 * @property \Cake\ORM\Association\HasMany $Agencias
 * @property \Cake\ORM\Association\HasMany $ChildUbigeos
 */
class UbigeosTable extends Table
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

        $this->table('ubigeos');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->addBehavior('Tree');

        $this->belongsTo('ParentUbigeos', [
            'className' => 'Ubigeos',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Agencias', [
            'foreignKey' => 'ubigeo_id'
        ]);
        $this->hasMany('ChildUbigeos', [
            'className' => 'Ubigeos',
            'foreignKey' => 'parent_id'
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
            ->allowEmpty('lft');

        $validator
            ->allowEmpty('rght');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('categoria');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentUbigeos'));
        return $rules;
    }
}

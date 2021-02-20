<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\AddUsersTable|\Cake\ORM\Association\BelongsTo $AddUsers
 * @property \App\Model\Table\AddUpdatesTable|\Cake\ORM\Association\BelongsTo $AddUpdates
 * @property \App\Model\Table\EstimatesTable|\Cake\ORM\Association\HasMany $Estimates
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personnels', [
            'foreignKey' => 'personnel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AddUsers', [
            'foreignKey' => 'add_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AddUpdates', [
            'foreignKey' => 'add_update_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Estimates', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'project_id'
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
            ->scalar('title')
            ->maxLength('title', 137)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('git_data')
            ->maxLength('git_data', 2083)
            ->requirePresence('git_data', 'create')
            ->notEmpty('git_data');

        $validator
            ->scalar('id_pass_area')
            ->requirePresence('id_pass_area', 'create')
            ->notEmpty('id_pass_area');

        $validator
            ->scalar('memo')
            ->requirePresence('memo', 'create')
            ->notEmpty('memo');

        $validator
            ->boolean('is_delete')
            ->requirePresence('is_delete', 'create')
            ->notEmpty('is_delete');

        $validator
            ->dateTime('create_at')
            ->requirePresence('create_at', 'create')
            ->notEmpty('create_at');

        $validator
            ->dateTime('update_at')
            ->requirePresence('update_at', 'create')
            ->notEmpty('update_at');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));
        $rules->add($rules->existsIn(['add_user_id'], 'AddUsers'));
        $rules->add($rules->existsIn(['add_update_id'], 'AddUpdates'));

        return $rules;
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $title
 * @property string $git_data
 * @property string $id_pass_area
 * @property string $memo
 * @property int $company_id
 * @property int $personnel_id
 * @property bool $is_delete
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime $update_at
 * @property int $add_user_id
 * @property int $add_update_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\AddUser $add_user
 * @property \App\Model\Entity\AddUpdate $add_update
 * @property \App\Model\Entity\Estimate[] $estimates
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'git_data' => true,
        'id_pass_area' => true,
        'memo' => true,
        'company_id' => true,
        'personnel_id' => true,
        'is_delete' => true,
        'create_at' => true,
        'update_at' => true,
        'add_user_id' => true,
        'add_update_id' => true,
        'company' => true,
        'personnel' => true,
        'add_user' => true,
        'add_update' => true,
        'estimates' => true,
        'tasks' => true
    ];
}

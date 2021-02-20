<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $assumption_time
 * @property string $real_time
 * @property int $status_id
 * @property int $project_id
 * @property int $personnel_id
 * @property bool $is_delete
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime $update_at
 * @property int $add_user_id
 * @property int $add_update_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\AddUser $add_user
 * @property \App\Model\Entity\AddUpdate $add_update
 */
class Task extends Entity
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
        'content' => true,
        'assumption_time' => true,
        'real_time' => true,
        'status_id' => true,
        'project_id' => true,
        'personnel_id' => true,
        'is_delete' => true,
        'create_at' => true,
        'update_at' => true,
        'add_user_id' => true,
        'add_update_id' => true,
        'status' => true,
        'project' => true,
        'personnel' => true,
        'add_user' => true,
        'add_update' => true
    ];
}

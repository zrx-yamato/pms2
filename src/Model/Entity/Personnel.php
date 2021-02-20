<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personnel Entity
 *
 * @property int $id
 * @property string $name
 * @property string $mail
 * @property int $company_id
 * @property bool $is_delete
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime $update_at
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Task[] $tasks
 */
class Personnel extends Entity
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
        'name' => true,
        'mail' => true,
        'company_id' => true,
        'is_delete' => true,
        'create_at' => true,
        'update_at' => true,
        'company' => true,
        'projects' => true,
        'tasks' => true
    ];
}

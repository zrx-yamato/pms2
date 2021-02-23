<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estimate Entity
 *
 * @property int $id
 * @property string $title
 * @property string $document
 * @property int $price
 * @property int $project_id
 * @property int $add_user_id
 * @property int $update_user_id
 * @property int $status_id
 * @property bool $is_delete
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime $update_at
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\User $add_user
 * @property \App\Model\Entity\UpdateUser $update_user
 * @property \App\Model\Entity\Status $status
 */
class Estimate extends Entity
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
        'document' => true,
        'price' => true,
        'project_id' => true,
        'add_user_id' => true,
        'update_user_id' => true,
        'status_id' => true,
        'is_delete' => true,
        'create_at' => true,
        'update_at' => true,
        'project' => true,
        'add_user' => true,
        'update_user' => true,
        'status' => true
    ];
}

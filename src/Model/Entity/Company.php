<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $address
 * @property bool $is_delete
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime $update_at
 *
 * @property \App\Model\Entity\Personnel[] $personnels
 * @property \App\Model\Entity\Project[] $projects
 */
class Company extends Entity
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
        'tel' => true,
        'address' => true,
        'is_delete' => true,
        'create_at' => true,
        'update_at' => true,
        'personnels' => true,
        'projects' => true
    ];
}

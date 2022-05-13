<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerUser Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property int $is_super
 * @property int $is_tech
 * @property int $is_guest
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\User $user
 */
class CustomerUser extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'customer_id' => true,
        'user_id' => true,
        'is_super' => true,
        'is_tech' => true,
        'is_guest' => true,
        'customer' => true,
        'user' => true,
    ];
}

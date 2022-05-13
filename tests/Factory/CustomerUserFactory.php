<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;

/**
 * CustomerUserFactory
 *
 * @method \App\Model\Entity\CustomerUser getEntity()
 * @method \App\Model\Entity\CustomerUser[] getEntities()
 * @method \App\Model\Entity\CustomerUser|\App\Model\Entity\CustomerUser[] persist()
 * @method static \App\Model\Entity\CustomerUser get(mixed $primaryKey, array $options = [])
 */
class CustomerUserFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'CustomerUser';
    }

    /**
     * Defines the factory's default values. This is useful for
     * not nullable fields. You may use methods of the present factory here too.
     *
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function (Generator $faker) {
            return [
                'is_super' => 0,
                'is_tech' => 0,
                'is_guest' => 0,
            ];
        });
    }

    /**
     * @param array|callable|null|int $parameter
     * @return CustomerUserFactory
     */
    public function withCustomers($parameter = null): CustomerUserFactory
    {
        return $this->with(
            'Customers',
            \App\Test\Factory\CustomerFactory::make($parameter)
        );
    }

    /**
     * @param array|callable|null|int $parameter
     * @return CustomerUserFactory
     */
    public function withUsers($parameter = null): CustomerUserFactory
    {
        return $this->with(
            'Users',
            \App\Test\Factory\UserFactory::make($parameter)
        );
    }
}

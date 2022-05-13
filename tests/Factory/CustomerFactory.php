<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;

/**
 * CustomerFactory
 *
 * @method \App\Model\Entity\Customer getEntity()
 * @method \App\Model\Entity\Customer[] getEntities()
 * @method \App\Model\Entity\Customer|\App\Model\Entity\Customer[] persist()
 * @method static \App\Model\Entity\Customer get(mixed $primaryKey, array $options = [])
 */
class CustomerFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'Customers';
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
                'title' => $faker->company,
            ];
        });
    }

    /**
     * @param array|callable|null|int $parameter
     * @param int $n
     * @return CustomerFactory
     */
    public function withCustomerUser($parameter = null, int $n = 1): CustomerFactory
    {
        return $this->with(
            'CustomerUser',
            \App\Test\Factory\CustomerUserFactory::make($parameter, $n)
        );
    }

    /**
     * @param array|callable|null|int $parameter
     * @param int $n
     * @return CustomerFactory
     */
    public function withUsers($parameter = null, int $n = 1): CustomerFactory
    {
        return $this->with(
            'CustomerUser.Users',
            \App\Test\Factory\UserFactory::make($parameter, $n)->without('Customers')
        );
    }
}

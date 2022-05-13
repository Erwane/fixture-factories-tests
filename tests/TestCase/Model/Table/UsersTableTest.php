<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Entity\CustomerUser;
use App\Model\Table\UsersTable;
use App\Test\Factory\CustomerFactory;
use App\Test\Factory\CustomerUserFactory;
use App\Test\Factory\UserFactory;
use Cake\TestSuite\TestCase;
use CakephpTestSuiteLight\Fixture\TruncateDirtyTables;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    use TruncateDirtyTables;

    /**
     * @test
     */
    public function testComplexFactory(): void
    {
        $user = UserFactory::make()
            ->persist();
        $customer = CustomerFactory::make()
            ->persist();
        $link = CustomerUserFactory::make()
            ->patchData(['customer_id' => $customer->id, 'user_id' => $user->id, 'is_tech' => 1])
            ->persist();

        debug($user->toArray());
        debug($customer->toArray());
        debug($link->toArray());
    }

    /**
     * @test
     */
    public function testIncompatibleAssociation(): void
    {
        $this->addWarning("don't return same error if test run single");

        $user = UserFactory::make()
            ->with('Customers.CustomerUser', ['is_super' => 1])
            ->persist();
        debug($user->toArray());

        $customer = CustomerFactory::make()
            ->with('Users.CustomerUser', ['is_tech' => 1])
            ->persist();
        debug($customer->toArray());

    }

    /**
     * @test
     */
    public function testIsSuperNotSet(): void
    {
        $customer = CustomerFactory::make()
            ->withUsers()
            ->persist();

        debug($customer->toArray());
    }
}

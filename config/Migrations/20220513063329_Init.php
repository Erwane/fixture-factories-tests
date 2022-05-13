<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Init extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('customers')
            ->addColumn('title', 'string')
            ->save();

        $this->table('users')
            ->addColumn('email', 'string')
            ->save();

        $this->table('customer_user')
            ->addColumn('customer_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('is_super', 'integer')
            ->addColumn('is_tech', 'integer')
            ->addColumn('is_guest', 'integer')
            ->save();
    }
}

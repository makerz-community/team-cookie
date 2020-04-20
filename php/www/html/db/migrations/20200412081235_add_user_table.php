<?php

use Phinx\Migration\AbstractMigration;

class AddUserTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('members');
        $table->addColumn('name', 'string', ['limit' => 20], ['null' => false])
            ->addColumn('password', 'string', ['limit' => 40], ['null' => false])
            ->addColumn('email', 'string', ['limit' => 255], ['null' => false])
            ->addColumn('created_date', 'datetime')
            ->addColumn('updated_date', 'datetime')
            ->create();
    }
}

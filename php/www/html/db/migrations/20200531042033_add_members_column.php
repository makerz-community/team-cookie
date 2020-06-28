<?php

use Phinx\Migration\AbstractMigration;

class AddMembersColumn extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('members');
        $table->addColumn('image', 'string', ['limit' => 40], ['null' => false], ['after' => 'email'])
            ->update();
    }
}

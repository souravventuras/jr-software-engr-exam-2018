<?php
use Migrations\AbstractMigration;

class DeveloperProgrammingLanguages extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('developer_programming_languages');
        $table->addColumn('developer_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('programming_language_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}

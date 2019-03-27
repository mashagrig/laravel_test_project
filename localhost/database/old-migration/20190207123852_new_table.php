<?php


use Phinx\Migration\AbstractMigration;

class NewTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
//        if(!$this->hasTable('main_user')) {
//            $this->table('main_user')->drop()->save();
//        }
//        if(!$this->hasTable('sub_user_role')) {
//            $this->table('sub_user_role')->drop()->save();
//        }

        $table = $this->table('main_user');
        $table->addColumn('name', 'string')
            ->addColumn('role', 'integer', ['null' => true])
            ->addForeignKey('role', 'sub_user_role', 'id')
          //  ('role', 'sub_user_role', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->create();

        $table2 = $this->table('sub_user_role');
        $table2->addColumn('role_name', 'string')
            ->create();
    }
}

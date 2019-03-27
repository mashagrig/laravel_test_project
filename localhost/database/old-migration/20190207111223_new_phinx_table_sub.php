<?php


use Phinx\Migration\AbstractMigration;

class NewPhinxTableSub extends AbstractMigration
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
        if(!$this->hasTable('sub_user_role')) {
            $table = $this->table('sub_user_role');

            // $table->addColumn('id', 'integer'); - automatic!!!
            $table->addColumn('role_name', 'string')
                ->create();
        }
    }
//    public function down()
//    {
//        if(!$this->hasTable('sub_user_role')) {
//            $this->table('sub_user_role')->drop()->save();
//          //$this->dropTable('sub_user_role');
//            //$this->execute('DELETE FROM status');
//        }
//    }
}

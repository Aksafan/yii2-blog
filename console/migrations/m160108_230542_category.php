<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_230542_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'active' => $this->boolean()->defaultValue(true),
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('category');
    }
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    public function safeDown()
    {
    }
    */
}

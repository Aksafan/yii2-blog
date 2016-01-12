<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_204114_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'active' => $this->boolean()->defaultValue(true),
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('post');
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

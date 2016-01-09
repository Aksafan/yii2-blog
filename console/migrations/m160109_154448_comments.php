<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_154448_comments extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'id_post' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'description' => $this->text()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_comments_post', 'comments', 'id_post', 'post', 'id');
    }
    public function safeDown()
    {
        $this->dropTable('comments');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_143558_post_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('post_category', [
            'id_post' => $this->integer(),
            'id_category' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('FK_post_category', 'post_category', 'id_post', 'post', 'id');
        $this->addForeignKey('FK_category_post', 'post_category', 'id_category', 'category', 'id');
    }
    public function safeDown()
    {
        $this->dropTable('post_category');
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

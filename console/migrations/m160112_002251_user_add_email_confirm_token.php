<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_002251_user_add_email_confirm_token extends Migration
{
    public function Up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->addColumn('user', 'email_confirm_token', $this->string());
    }
    public function Down()
    {
        $this->dropColumn('user', 'email_confirm_token');
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

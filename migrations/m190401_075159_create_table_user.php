<?php

use yii\db\Migration;

/**
 * Class m190401_075159_create_table_user
 */
class m190401_075159_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $tableOptions = null;
	
	    if ($this->db->driverName === 'mysql') {
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	    }
	
	    $this->createTable('user', [
		    'id' => $this->primaryKey(),
		    'username' => $this->string()->notNull()->unique(),
		    'auth_key' => $this->string(32)->notNull(),
		    'password_hash' => $this->string()->notNull(),
		    'password_reset_token' => $this->string()->unique(),
		    'status' => $this->smallInteger()->notNull()->defaultValue(10),
		    'created_at' => $this->integer()->notNull(),
		    'updated_at' => $this->integer()->notNull(),
		    'balance' => $this->integer()->defaultValue(0)
	    ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('user');
    }
}

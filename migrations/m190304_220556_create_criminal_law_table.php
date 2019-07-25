<?php

use yii\db\Migration;

/**
 * Handles the creation of table `criminal_law`.
 */
class m190304_220556_create_criminal_law_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('criminal_law', [
	        'id' => $this->primaryKey(),
	        'name' => $this->string(255)->notNull(),
	        'full_name' => $this->string(255)->notNull(),
	        'body' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('criminal_law');
    }
}

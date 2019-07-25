<?php

use yii\db\Migration;

/**
 * Handles the creation of table `administrative_law`.
 */
class m190304_220540_create_administrative_law_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('administrative_law', [
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
        $this->dropTable('administrative_law');
    }
}

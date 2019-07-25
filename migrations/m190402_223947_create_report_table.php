<?php

use yii\db\Migration;

/**
 * Handles the creation of table `report`.
 */
class m190402_223947_create_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('report', [
            'id' => $this->primaryKey(),
	        'subject' => $this->string(255)->null(),
            'phone' => $this->string(255)->null(),
            'latitude' => $this->string(255)->null(),
	        'longitude' => $this->string(255)->null(),
	        'photo' => $this->string(255)->null(),
	        'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('report');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `drug_law`.
 */
class m190330_125237_create_drug_law_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('drug_law', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->null(),
            'full_name' => $this->string(255)->null(),
            'summary' => $this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('drug_law');
    }
}

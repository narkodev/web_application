<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city_organization`.
 */
class m190221_231609_create_city_organization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('city_organization', [
            'id' => $this->primaryKey(),
	        'city_id' => $this->integer()->notNull(),
	        'name' => $this->string(255)->notNull(),
	        'phone' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey(
        	'fk-city_organization-city_id',
	        'city_organization',
	        'city_id',
	        'city',
	        'id',
	        'CASCADE',
	        'CASCADE'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->dropForeignKey('fk-city_organization-city_id', 'city_organization');
    	
        $this->dropTable('city_organization');
    }
}

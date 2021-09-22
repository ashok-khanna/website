<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trends}}`.
 */
class m191108_101408_create_trends_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trends}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('FK_trends_city', 'trends', 'city_id', 'cities', 'id', 'CASCADE');
        $this->addForeignKey('FK_trends_service', 'trends', 'service_id', 'services', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trends}}');
    }
}

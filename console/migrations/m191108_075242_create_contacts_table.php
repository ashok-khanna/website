<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m191108_075242_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->null(),
            'city_id' => $this->integer()->notNull(),
            'phone' => $this->string()->null(),
            'address_rus' => $this->string()->null(),
            'address_kaz' => $this->string()->null(),
            'address_eng' => $this->string()->null(),
            'email' => $this->string()->null(),
        ]);

        $this->addForeignKey('FK_contacts_city', 'contacts', 'city_id', 'cities', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}

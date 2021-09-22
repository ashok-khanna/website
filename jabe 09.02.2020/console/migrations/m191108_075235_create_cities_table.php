<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cities}}`.
 */
class m191108_075235_create_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'country_rus' => $this->string()->null(),
            'country_kaz' => $this->string()->null(),
            'country_eng' => $this->string()->null(),            
            'city_rus' => $this->string()->null(),
            'city_kaz' => $this->string()->null(),
            'city_eng' => $this->string()->null(),            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cities}}');
    }
}

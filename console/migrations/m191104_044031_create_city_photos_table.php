<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city_photos}}`.
 */
class m191104_044031_create_city_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city_photos}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->null(),
            'name_rus' => $this->string()->null(),
            'name_kaz' => $this->string()->null(),
            'name_eng' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city_photos}}');
    }
}

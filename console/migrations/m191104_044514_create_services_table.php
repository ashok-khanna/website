<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m191104_044514_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
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
        $this->dropTable('{{%services}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m191111_073216_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'name_rus' => $this->string()->null(),
            'name_kaz' => $this->string()->null(),
            'name_eng' => $this->string()->null(),
            'img' => $this->string()->null(),
            'body_rus' => $this->text()->null(),
            'body_kaz' => $this->text()->null(),
            'body_eng' => $this->text()->null(),
            'date' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}

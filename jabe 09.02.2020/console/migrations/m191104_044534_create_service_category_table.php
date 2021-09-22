<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_category}}`.
 */
class m191104_044534_create_service_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_category}}', [
            'id' => $this->primaryKey(),
            'name_rus' => $this->string()->null(),
            'name_kaz' => $this->string()->null(),
            'name_eng' => $this->string()->null(),
            'video_name' => $this->string()->null(),
            'video_size' => $this->string()->null(),
            'video_mime' => $this->string()->null(),
            'video_ext' => $this->string()->null(),
            'video_path' => $this->string()->null(),
            'video_link' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service_category}}');
    }
}

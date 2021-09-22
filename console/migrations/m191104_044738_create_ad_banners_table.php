<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad_banners}}`.
 */
class m191104_044738_create_ad_banners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ad_banners}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string()->null(),
            'file_name' => $this->string()->null(),
            'file_size' => $this->string()->null(),
            'file_mime' => $this->string()->null(),
            'file_ext' => $this->string()->null(),
            'file_path' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ad_banners}}');
    }
}

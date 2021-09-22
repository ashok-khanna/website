<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%services}}`.
 */
class m191104_121643_add_Video_column_to_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%service_category}}', 'video_name');
        $this->dropColumn('{{%service_category}}', 'video_size');
        $this->dropColumn('{{%service_category}}', 'video_mime');
        $this->dropColumn('{{%service_category}}', 'video_ext');
        $this->dropColumn('{{%service_category}}', 'video_path');

        $this->addColumn('{{%services}}', 'img', $this->string()->null());
        


        $this->createTable('{{%langs}}', [
            'id' => $this->primaryKey(),
            'source' => $this->string()->null(),
            'name' => $this->string()->null(),
        ]);

        $this->createTable('{{%service_video}}', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer(),
            'services_id' => $this->integer(),
            'file_name' => $this->string()->null(),
            'file_size' => $this->string()->null(),
            'file_mime' => $this->string()->null(),
            'file_ext' => $this->string()->null(),
            'file_path' => $this->string()->null(),
            'video_link' => $this->string()->null()
        ]);

        $this->addForeignKey('FK_service_video_lang', 'service_video', 'lang_id', 'langs', 'id', 'CASCADE');
        $this->addForeignKey('FK_service_video_services', 'service_video', 'services_id', 'services', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}

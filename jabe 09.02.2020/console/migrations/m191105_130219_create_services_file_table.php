<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services_file}}`.
 */
class m191105_130219_create_services_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%included_services}}', [
            'id' => $this->primaryKey(),
            'services_id' => $this->integer(1)->notNull(),        
            'gid' => $this->integer(1)->defaultValue(0),
            'eco' => $this->integer(1)->defaultValue(0),
            'transfer' => $this->integer(1)->defaultValue(0),
            'selfie' => $this->integer(1)->defaultValue(0),
            'eat' => $this->integer(1)->defaultValue(0),
            'cafe' => $this->integer(1)->defaultValue(0),
        ]);

        $this->addForeignKey('FK_included_services_services', 'included_services', 'services_id', 'services', 'id', 'CASCADE');

        $this->createTable('{{%services_file}}', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer(),
            'file_name' => $this->string()->null(),
            'file_size' => $this->string()->null(),
            'file_mime' => $this->string()->null(),
            'file_ext' => $this->string()->null(),
            'file_path' => $this->string()->null(),
        ]);

        $this->addForeignKey('FK_services_file_lang', 'services_file', 'lang_id', 'langs', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%included_services}}');
        $this->dropTable('{{%services_file}}');
    }
}

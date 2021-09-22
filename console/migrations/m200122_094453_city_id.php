<?php

use yii\db\Migration;

/**
 * Class m200122_094453_city_id
 */
class m200122_094453_city_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%city_photos}}', 'city_id', $this->integer()->notNull());
        $this->addForeignKey('FK_cityphotos_city', 'city_photos', 'city_id', 'cities', 'id', 'CASCADE');

        $this->addColumn('{{%service_category}}', 'city_id', $this->integer()->notNull());
        $this->addForeignKey('FK_ser_category_city', 'service_category', 'city_id', 'cities', 'id', 'CASCADE');
        $this->addColumn('{{%service_category}}', 'video_name', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'video_size', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'video_mime', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'video_ext', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'video_path', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'video_link', $this->string()->null());


        $this->addColumn('{{%included_services}}', 'img', $this->string()->null());
        $this->addColumn('{{%included_services}}', 'name_rus', $this->string()->null());
        $this->addColumn('{{%included_services}}', 'name_eng', $this->string()->null());
        
        $this->addColumn('{{%news}}', 'category_news', $this->string()->null());

        $this->addColumn('{{%trends}}', 'img', $this->string()->null());
        $this->addColumn('{{%trends}}', 'header_rus', $this->string()->null());
        $this->addColumn('{{%trends}}', 'header_eng', $this->string()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m200122_094453_city_id cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200122_094453_city_id cannot be reverted.\n";

        return false;
    }
    */
}

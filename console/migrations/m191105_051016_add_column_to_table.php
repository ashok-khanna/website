<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%}}`.
 */
class m191105_051016_add_column_to_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%service_category}}', 'video_link');

        $this->addColumn('{{%service_category}}', 'header_rus', $this->string(70)->null());
        $this->addColumn('{{%service_category}}', 'header_kaz', $this->string(70)->null());
        $this->addColumn('{{%service_category}}', 'header_eng', $this->string(70)->null());

        $this->addColumn('{{%services}}', 'cost', $this->integer()->null());
        $this->addColumn('{{%services}}', 'rating', $this->integer(5)->null());

        $this->addColumn('{{%services}}', 'body_rus', $this->text()->null());
        $this->addColumn('{{%services}}', 'body_kaz', $this->text()->null());
        $this->addColumn('{{%services}}', 'body_eng', $this->text()->null());

        $this->addColumn('{{%services}}', 'has_tags', $this->string()->null());
        $this->addColumn('{{%services}}', 'photos', $this->text()->null());

        $this->createTable('{{%requirements}}', [
            'id' => $this->primaryKey(),
            'services_id' => $this->integer()->notNull(),
            'suit_rus' => $this->string()->null(),
            'suit_kaz' => $this->string()->null(),
            'suit_eng' => $this->string()->null(),
            'duration_time_rus' => $this->string()->null(),
            'duration_time_kaz' => $this->string()->null(),
            'duration_time_eng' => $this->string()->null(),
            'recommendation_rus' => $this->string()->null(),
            'recommendation_kaz' => $this->string()->null(),
            'recommendation_eng' => $this->string()->null(),
            'season_rus' => $this->string()->null(),
            'season_kaz' => $this->string()->null(),
            'season_eng' => $this->string()->null(),
            'count_people_rus' => $this->string()->null(),
            'count_people_kaz' => $this->string()->null(),
            'count_people_eng' => $this->string()->null(),
            'necessarily_rus' => $this->string()->null(),
            'necessarily_kaz' => $this->string()->null(),
            'necessarily_eng' => $this->string()->null(),
            'winter_recommend_rus' => $this->string()->null(),
            'winter_recommend_kaz' => $this->string()->null(),
            'winter_recommend_eng' => $this->string()->null(),
        ]);

        $this->addForeignKey('FK_requirements_services', 'requirements', 'services_id', 'services', 'id', 'CASCADE');
        
        // $this->createTable('{{%included_services_name}}', [
        //     'id' => $this->primaryKey(),
        //     'gid' => $this->string()->null(),
        //     'eco' => $this->string()->null(),
        //     'transfer' => $this->string()->null(),
        //     'selfie' => $this->string()->null(),
        //     'eat' => $this->string()->null(),
        //     'cafe' => $this->string()->null(),
        // ]);
                
        
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'services_id' => $this->integer()->notNull(),        
            'name_rus' => $this->string()->null(),
            'name_kaz' => $this->string()->null(),
            'name_eng' => $this->string()->null(),
            'coment_rus' => $this->text()->null(),
            'coment_kaz' => $this->text()->null(),
            'coment_eng' => $this->text()->null(),
        ]);

        $this->addForeignKey('FK_feedback_services', 'feedback', 'services_id', 'services', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}

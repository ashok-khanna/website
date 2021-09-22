<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gids}}`.
 */
class m191108_075440_create_gids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gids}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'lang'=> $this->string()->null(),
            'name_rus'=> $this->string()->null(),
            'name_kaz'=> $this->string()->null(),
            'name_eng'=> $this->string()->null(),
            'rating' => $this->double()->defaultValue(0),
            'img_sad' => $this->string()->null(),
            'img_smile' => $this->string()->null()
        ]);

        $this->addForeignKey('FK_gids_city', 'gids', 'city_id', 'cities', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gids}}');
    }
}

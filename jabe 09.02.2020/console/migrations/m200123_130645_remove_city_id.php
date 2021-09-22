<?php

use yii\db\Migration;

/**
 * Class m200123_130645_remove_city_id
 */
class m200123_130645_remove_city_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('FK_ser_category_city', 'service_category');
        $this->dropColumn('{{%service_category}}', 'city_id');
        $this->dropColumn('{{%service_category}}', 'sub_header_eng');
        $this->dropColumn('{{%service_category}}', 'sub_header_rus');
        $this->addColumn('{{%service_category}}', 'cities', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200123_130645_remove_city_id cannot be reverted.\n";

        return false;
    }
    */
}

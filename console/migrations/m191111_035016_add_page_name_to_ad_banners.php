<?php

use yii\db\Migration;

/**
 * Class m191111_035016_add_page_name_to_ad_banners
 */
class m191111_035016_add_page_name_to_ad_banners extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ad_banners}}', 'page_name', $this->string()->null());
        $this->addColumn('{{%contacts}}', 'phone_2', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m191111_035016_add_page_name_to_ad_banners cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191111_035016_add_page_name_to_ad_banners cannot be reverted.\n";

        return false;
    }
    */
}

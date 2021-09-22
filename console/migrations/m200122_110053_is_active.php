<?php

use yii\db\Migration;

/**
 * Class m200122_110053_is_active
 */
class m200122_110053_is_active extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%partners}}', 'is_active', $this->integer()->defaultValue(0));
        $this->addColumn('{{%trends}}', 'is_active', $this->integer()->defaultValue(0));
        $this->addColumn('{{%news}}', 'is_active', $this->integer()->defaultValue(0));
        $this->addColumn('{{%ad_banners}}', 'is_active', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m200122_110053_is_active cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200122_110053_is_active cannot be reverted.\n";

        return false;
    }
    */
}

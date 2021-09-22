<?php

use yii\db\Migration;

/**
 * Class m200124_101951_remove_colums_included_service
 */
class m200124_101951_remove_colums_included_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%included_services}}', 'img');
        $this->dropColumn('{{%included_services}}', 'name_rus');
        $this->dropColumn('{{%included_services}}', 'gid');
        $this->dropColumn('{{%included_services}}', 'eco');
        $this->dropColumn('{{%included_services}}', 'transfer');
        $this->dropColumn('{{%included_services}}', 'selfie');
        $this->dropColumn('{{%included_services}}', 'eat');
        $this->dropColumn('{{%included_services}}', 'cafe');

        $this->addColumn('{{%included_services}}', 'included', $this->text()->null());
        $this->addColumn('{{%included_services}}', 'not_included', $this->text()->null());
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
        echo "m200124_101951_remove_colums_included_service cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m191227_115614_alter_column_date
 */
class m191227_115614_alter_column_date extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('news','date','string NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m191227_115614_alter_column_date cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191227_115614_alter_column_date cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m191218_091048_add_some_column
 */
class m191218_091048_add_some_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%services}}', 'category_id', $this->integer()->notNull());
        $this->addForeignKey('FK_services_ser_category', 'services', 'category_id', 'service_category', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m191218_091048_add_some_column cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191218_091048_add_some_column cannot be reverted.\n";

        return false;
    }
    */
}

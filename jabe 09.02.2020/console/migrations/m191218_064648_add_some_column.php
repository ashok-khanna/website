<?php

use yii\db\Migration;

/**
 * Class m191218_064648_add_some_column
 */
class m191218_064648_add_some_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%service_category}}', 'sub_header_rus', $this->string()->null());
        $this->addColumn('{{%service_category}}', 'sub_header_eng', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m191218_064648_add_some_column cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191218_064648_add_some_column cannot be reverted.\n";

        return false;
    }
    */
}

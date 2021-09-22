<?php

use yii\db\Migration;

/**
 * Class m191105_105959_add_langs_to_table
 */
class m191105_105959_add_langs_to_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "insert into `langs` values( 1, 'en-US','English'),(2, 'ru-RU','Русский'),(3, 'kz-KZ','Қазақ тілі')";

        $this->execute($sql);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m191105_105959_add_langs_to_table cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191105_105959_add_langs_to_table cannot be reverted.\n";

        return false;
    }
    */
}
